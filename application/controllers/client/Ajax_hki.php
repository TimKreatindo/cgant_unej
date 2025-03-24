<?php
defined('BASEPATH')or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
/**
 *
 */
class Ajax_hki extends CI_Controller
{
  public function validation(){
        cek_ajax();
        $input_post = $this->input->post(null, true);
        $act = $this->input->post('act');
        $user = get_user();


        switch($act){
            case 'add':
                $this->form_validation->set_rules('no_hki', 'No. HKI', 'required|trim|is_unique[sh_hki.no_hki]');

                $this->form_validation->set_message('required', '{field} harap di isi');
                $this->form_validation->set_message('is_unique', '{field} sudah terdaftar');

                if($this->form_validation->run() == false){

                  $params = [
                      'status' => false,
                      'msg' => form_error('no_hki'),
                      'token' => get_token(),
                      'type' => 'err_validation'
                  ];
                  echo json_encode($params);
                  exit;
                }

                $tipe_bukti = $input_post['tipe_bukti'];

                if($tipe_bukti == 'file'){
                    $upload_file = $this->app->upload_files($_FILES['bukti'], 'hki', './assets/upload/hki/');
                    $success_upload  = $upload_file['success_upload'];
                    $error_upload = $upload_file['error_upload'];

                    if(count($error_upload) > 0){
                        if(!empty($success_upload)){
                            foreach($success_upload as $su){
                                unlink('./assets/upload/hki/' . $su['file_name']);
                            }
                        }

                        $params = [
                            'status' => false,
                            'msg' => $error_upload,
                            'token' => get_token(),
                            'type' => 'err_upload'
                        ];
                        echo json_encode($params);
                        die;

                    } else {
                        $bukti = [
                            'type' => 'file',
                            'data' => $success_upload
                        ];
                    }

                } else {
                    $bukti = [
                        'type' => 'url',
                        'url' => $input_post['bukti_url']
                    ];
                }


                $new_id = time();
                $main_data_dosen = [
                  'id_user' => $user->id,
                  'id_hki' => $new_id
                ];

                if(isset($input_post['dosen'])){
                  $add_dosen = [];
                  $c_dosen = count($input_post['dosen']);

                  for ($i=0; $i < $c_dosen; $i++) {
                    $row = [
                      'id_user' => $input_post['dosen'][$i],
                      'id_hki' => $new_id
                    ];

                    $add_dosen[] = $row;
                  }

                  $add_dosen[] = $main_data_dosen;
                  $data_dosen = $add_dosen;
                } else {
                  $data_dosen = $main_data_dosen;
                }


                $data_insert = [
                        'id' => $new_id,
                        'id_user' => $user->id,
                        'judul' => $input_post['jurnal'],
                        'no_hki' => $input_post['no_hki'],
                        'tanggal' => $input_post['tanggal'],
                        'bukti' => json_encode($bukti),
                        'create_at' => date('Y-m-d H:i:s'),
                        'last_update' => date('Y-m-d H:i:s')
                ];

                $this->db->trans_begin();
                if(isset($input_post['dosen'])){
                  $this->db->insert_batch('dosen_hki', $data_dosen);
                } else {
                  $this->db->insert('dosen_hki', $data_dosen);
                }
                $this->db->insert('sh_hki', $data_insert);


                if ($this->db->trans_status() === FALSE)
                {
                      $this->db->trans_rollback();
                      $output = [
                           'status' => false,
                           'msg' => 'Data gagal disimpan',
                           'token' => get_token()
                      ];
                }
                else
                {
                      $this->db->trans_commit();
                      $output = [
                           'status' => true,
                           'msg' => 'Data berhasil disimpan',
                           'token' => get_token()
                      ];
                }

                json_output($output, 200);

                // $this->app->input_data('sh_pengelola_jurnal', $data_insert);
                break;
            case 'get-edit':
                $id = $input_post['id'];
                $get_data = $this->client->get_hki($id)->row();
                if($get_data){
                    $decode_bukti = json_decode($get_data->bukti);
                    $decode_dosen = json_decode($get_data->user_info);
                    $decode_id_dosen = json_decode($get_data->user_id_info);

                    $combine_user_info = [];

                    if(!empty($decode_id_dosen)){
                      foreach ($decode_id_dosen as $key => $value) {
                        $combine_user_info[] = [
                          'id' => $value,
                          'dosen' => $decode_dosen[$key]
                        ];
                      }
                    }



                    $data = [
                        'id' => $get_data->id_encode,
                        'judul' => $get_data->judul,
                        'no_hki' => $get_data->no_hki,
                        'tanggal' => $get_data->tanggal,
                        'bukti' => $decode_bukti,
                        'user_info' => $combine_user_info
                    ];

                    $output = [
                        'status' => true,
                        'data' => $data,
                        'token' => get_token()
                    ];
                } else {
                    $output = [
                        'status' => false,
                        'msg' => 'Data tidak ditemukan',
                        'token' => get_token()
                    ];
                }

                json_output($output, 200);
                break;
            case 'edit':
                $id = $input_post['id'];
                $get_data = $this->client->get_hki($id)->row();
                $check_no_hki = $this->db->get_where('sh_hki', [
                  'no_hki' => $input_post['no_hki'],
                  'sha1(id) !=' => $id
                ])->num_rows();


                if(!empty($get_data)){
                    if($check_no_hki > 0){
                      $params = [
                          'status' => false,
                          'msg' => 'No. HKI sudah terdaftar',
                          'token' => get_token(),
                          'type' => 'err_validation'
                      ];
                      echo json_encode($params);
                      exit;
                    }


                    $tipe_bukti = $input_post['tipe_bukti'];

                    if($tipe_bukti == 'file'){
                        if($_FILES['bukti']['name'][0] != ''){
                            $upload_file = $this->app->upload_files($_FILES['bukti'], 'hki', './assets/upload/hki/');
                            $success_upload  = $upload_file['success_upload'];
                            $error_upload = $upload_file['error_upload'];

                            if(count($error_upload) > 0){
                                if(!empty($success_upload)){
                                    foreach($success_upload as $su){
                                        unlink('./assets/upload/jurnal/' . $su['file_name']);
                                    }
                                }

                                $params = [
                                    'status' => false,
                                    'msg' => $error_upload,
                                    'token' => get_token(),
                                    'type' => 'err_upload'
                                ];
                                echo json_encode($params);
                                die;

                            } else {

                                if(!empty($input_post['doc_name'])){
                                    $old_file_user = $input_post['doc_name'];
                                    $old_file = json_decode($get_data->bukti);
                                    $filtered_array = $this->app->_diff_array_bukti_file($old_file_user, $old_file);

                                    $new_file = array_merge($filtered_array, $success_upload);
                                } else {
                                    $new_file = $success_upload;
                                }

                                $bukti = [
                                    'type' => 'file',
                                    'data' => $new_file
                                ];
                            }

                        } else {
                            if($input_post['doc_name']){
                                $old_file_user = $input_post['doc_name'];
                                $old_file = json_decode($get_data->bukti);
                                $filtered_array = $this->app->_diff_array_bukti_file($old_file_user, $old_file);

                                $new_file = $filtered_array;
                            } else {
                                $decode_bukti = json_decode($get_data->bukti);
                                $new_file = $decode_bukti->data;
                            }

                            $bukti = [
                                    'type' => 'file',
                                    'data' => $new_file
                                ];
                        }

                    } else {
                        $bukti = [
                            'type' => 'url',
                            'url' => $input_post['bukti_url']
                        ];
                    }

                    $data_update = [
                        'judul' => $input_post['jurnal'],
                        'no_hki' => $input_post['no_hki'],
                        'tanggal' => $input_post['tanggal'],
                        'bukti' => json_encode($bukti),
                        'last_update' => date('Y-m-d H:i:s')
                    ];
                    $main_data_dosen = [
                      'id_user' => $user->id,
                      'id_hki' => $get_data->id
                    ];

                    if(isset($input_post['dosen'])){
                      $add_dosen = [];
                      $c_dosen = count($input_post['dosen']);

                      for ($i=0; $i < $c_dosen; $i++) {
                        $row = [
                          'id_user' => $input_post['dosen'][$i],
                          'id_hki' => $get_data->id
                        ];

                        $add_dosen[] = $row;
                      }

                      $add_dosen[] = $main_data_dosen;
                      $data_dosen = $add_dosen;
                    } else {
                      $data_dosen = $main_data_dosen;
                    }


                    $this->db->trans_begin();
                    $this->db->delete('dosen_hki',['id_hki' => $get_data->id]);

                    if(isset($input_post['dosen'])){
                      $this->db->insert_batch('dosen_hki', $data_dosen);
                    } else {
                      $this->db->insert('dosen_hki', $data_dosen);
                    }
                    $this->db->where('id', $get_data->id)->update('sh_hki', $data_update);

                    if ($this->db->trans_status() === FALSE)
                    {
                          $this->db->trans_rollback();
                          $output = [
                               'status' => false,
                               'msg' => 'Data gagal diupdate',
                               'token' => get_token()
                          ];
                    }
                    else
                    {
                          $this->db->trans_commit();
                          $output = [
                               'status' => true,
                               'msg' => 'Data berhasil diupdate',
                               'token' => get_token()
                          ];
                    }

                    json_output($output, 200);


                } else {
                    $output = [
                        'status' => false,
                        'msg' => 'Data tidak ditemukan',
                        'token' => get_token(),
                        'type' => 'err_result'
                    ];
                }
                json_output($output, 200);

                break;
            case 'delete':
                $id = $input_post['id'];

                $this->db->trans_begin();

                $this->db->delete('sh_hki', ['sha1(id)' => $id]);
                $this->db->delete('dosen_hki', ['sha1(id_hki)' => $id]);


                if ($this->db->trans_status() === FALSE)
                {
                  $this->db->trans_rollback();
                  $output = [
                      'status' => false,
                      'msg' => 'Data gagal dihapus',
                      'token' => get_token()
                  ];
                }
                else
                {
                  $this->db->trans_commit();
                  $output = [
                      'status' => true,
                      'msg' => 'Data berhasil dihapus',
                      'token' => get_token()
                  ];
                }
                json_output($output, 200);
              break;
        }
    }

    public function list_dosen(){
      cek_ajax();
      $get_data = $this->get_data();
      $data = [];
      $no = 1;
      foreach ($get_data as $key) {
        $row = [];
        $row[] = $no++;
        $row[] = $key->nip;
        $row[] = $key->nama;
        $row[] = '<button type="button" data-name="'.$key->nama.'" data-nip="'.$key->nip.'" data-id="'.$key->id.'" class="btn btn-sm btn-warning btn-select-dosen"><i class="far fa-check-circle"></i></button>';

        $data[] = $row;
      }

      $output = [
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->cnt_all_data(),
            "recordsFiltered" => $this->cnt_filtered_data(),
            "data" => $data,
      ];
      json_output($output, 200);
    }

    private function q_list_dosen(){
      $selected = $this->input->post('selected');
      $user = get_user();
      $this->db->select('
        user.nip,
        user.nama,
        user.id
      ')
      ->from('user')
      ->where('user.id !=', $user->id);
      if ($selected) {
          $this->db->where_not_in('user.id', $selected);
      }
    }

    private function filter_list_dosen(){
      $search = ['nama', 'nip'];
      $this->q_list_dosen();
      $i = 0;
        foreach ($search as $item) {
            if ($_POST['search']['value']) {
                if ($i === 0) {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($search) - 1 == $i) {
                    $this->db->group_end();
                }
            }
            $i++;
        }

    }

    public function get_data(){
      $this->filter_list_dosen();
      if ($_POST['length'] != -1)
           $this->db->limit($_POST['length'], $_POST['start']);
      $query = $this->db->get();
      return $query->result();
    }

    public function cnt_all_data(){
      $this->q_list_dosen();
      return $this->db->count_all_results();
    }

    public function cnt_filtered_data(){
      $this->filter_list_dosen();
      $query = $this->db->get();
      return $query->num_rows();
    }
}
