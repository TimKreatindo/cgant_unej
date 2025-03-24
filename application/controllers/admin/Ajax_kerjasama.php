<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
class Ajax_kerjasama extends CI_Controller
{
    public function validasi_kerjasama()
    {
        cek_ajax();


        $input_post = $this->input->post(null, true);
        $act = $this->input->post('act', true);
        $user = get_user();

        switch ($act) {
            case 'add':
                $tipe_bukti = $input_post['tipe_bukti'];

                if ($tipe_bukti == 'file') {
                    $upload_file = $this->app->upload_files($_FILES['bukti'], 'bukti-kerjasama', './assets/upload/kerjasama/');
                    $success_upload  = $upload_file['success_upload'];
                    $error_upload = $upload_file['error_upload'];

                    if (count($error_upload) > 0) {
                        if (!empty($success_upload)) {
                            foreach ($success_upload as $su) {
                                unlink('./assets/upload/kerjasama/' . $su['file_name']);
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

                $jangka_waktu = [
                    'start' => $input_post['start_date'],
                    'end' => $input_post['end_date']
                ];

                $data_insert = [
                    'id_user' => $user->id,
                    'judul' => $input_post['title'],
                    'nama_mitra' => $input_post['mitra'],
                    'level_mitra' => $input_post['level'],
                    'jangka_waktu' => json_encode($jangka_waktu),
                    'bukti' => json_encode($bukti),
                    'create_at' => date('Y-m-d H:i:s'),
                    'last_update' => date('Y-m-d H:i:s')
                ];

                $this->db->insert('sh_kerjasama', $data_insert);
                if ($this->db->affected_rows() > 0) {
                    $output = [
                        'status' => true,
                        'msg' => 'Data kerjasama berhasil ditambahkan',
                        'token' => get_token()
                    ];
                } else {
                    $output = [
                        'status' => false,
                        'msg' => 'Data kerjasama gagal ditambahkan',
                        'token' => get_token(),
                        'type' => 'err_result'
                    ];
                }

                json_output($output, 200);
                break;
            case 'edit':
                $id = $input_post['id'];
                $get_data = $this->db->where('sha1(sh_kerjasama.id)', $id)->get('sh_kerjasama')->row();


                if (!empty($get_data)) {
                    $tipe_bukti = $input_post['tipe_bukti'];



                    if ($tipe_bukti == 'file') {
                        if ($_FILES['bukti']['name'][0] != '') {
                            $upload_file = $this->app->upload_files($_FILES['bukti'], 'bukti-kerjasama', './assets/upload/kerjasama/');
                            $success_upload  = $upload_file['success_upload'];
                            $error_upload = $upload_file['error_upload'];

                            if (count($error_upload) > 0) {
                                if (!empty($success_upload)) {
                                    foreach ($success_upload as $su) {
                                        unlink('./assets/upload/kerjasama/' . $su['file_name']);
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

                                if ($input_post['doc_name']) {
                                    $old_file_user = $input_post['doc_name'];
                                    $old_file = json_decode($get_data->bukti);
                                    $filtered_array = $this->_diff_array_bukti_file($old_file_user, $old_file);

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
                            if ($input_post['doc_name']) {
                                $old_file_user = $input_post['doc_name'];
                                $old_file = json_decode($get_data->bukti);
                                $filtered_array = $this->_diff_array_bukti_file($old_file_user, $old_file);

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


                    $jangka_waktu = [
                        'start' => $input_post['start_date'],
                        'end' => $input_post['end_date']
                    ];

                    $data_update = [
                        'judul' => $input_post['title'],
                        'nama_mitra' => $input_post['mitra'],
                        'level_mitra' => $input_post['level'],
                        'jangka_waktu' => json_encode($jangka_waktu),
                        'bukti' => json_encode($bukti),
                        'last_update' => date('Y-m-d H:i:s')
                    ];

                    $this->db->where('sha1(id)', $id)->update('sh_kerjasama', $data_update);
                    if ($this->db->affected_rows() > 0) {
                        $output = [
                            'status' => true,
                            'msg' => 'Data kerjasama berhasil update',
                            'token' => get_token()
                        ];
                    } else {
                        $output = [
                            'status' => false,
                            'msg' => 'Data kerjasama gagal update',
                            'token' => get_token(),
                            'type' => 'err_result'
                        ];
                    }
                } else {
                    $output = [
                        'status' => false,
                        'msg' => 'Data kerjasama tidak ditemukan',
                        'token' => get_token(),
                        'type' => 'err_result'
                    ];
                }


                json_output($output, 200);




                break;
            case 'delete':
                $this->db->where('sha1(sh_kerjasama.id)', $input_post['id'])->delete('sh_kerjasama');
                if ($this->db->affected_rows() > 0) {
                    $output = [
                        'status' => true,
                        'msg' => 'Data kerjasama berhasil dihapus',
                        'token' => get_token()
                    ];
                } else {
                    $output = [
                        'status' => false,
                        'msg' => 'Data kerjasama gagal dihapus',
                        'token' => get_token(),
                        'type' => 'err_result'
                    ];
                }
                json_output($output, 200);
                break;
        }
    }

    public function datatable_kerjasama()
    {
        cek_ajax();

        $get_data = $this->datatable->get_kerjasama();
        $data = [];
        $i = 1;
        foreach ($get_data as $gd) {
            $encode_date = json_decode($gd->jangka_waktu);
            $encode_bukti = json_decode($gd->bukti);

            $start_date = date_create($encode_date->start);
            $end_date = date_create($encode_date->end);
            $bukti = '';

            if ($encode_bukti->type == 'file') {
                $list_bukti = '';
                foreach ($encode_bukti->data as $eb) {
                    $list_bukti .= '<li>
                        <a href="' . base_url('assets/upload/kerjasama/' . $eb->file_name) . '" target="_blank">' . $eb->ori_name . '</a>
                    </li>';
                }
                $bukti = '<ul>' . $list_bukti . '</ul>';
            } else if ($encode_bukti->type == 'url') {
                $bukti = '<a href="' . $encode_bukti->url . '" target="_blank">Link</a>';
            }

            $row = [];

            $row[] = $i++;
            $row[] = $gd->nama_mitra;
            $row[] = $gd->level_mitra;
            $row[] = $gd->judul;
            $row[] = date_format($start_date, 'd/m/Y') . ' - ' . date_format($end_date, 'd/m/Y');
            $row[] = $bukti;
            $row[] =
                form_open('admin/validasi_kerjasama', 'id="form-action"') .
                '   
                    <input type="hidden" name="id" value="' . $gd->id_encode . '">
                    <input type="hidden" name="act" value="delete">
                    <button type="button" class="btn btn-sm btn-primary w-100 my-1" onclick="edit_data(\'' . $gd->id_encode . '\')"><i class="fas fa-edit"></i></button>
                    <button type="submit" class="btn btn-sm btn-danger w-100 my-1"><i class="fas fa-trash-alt"></i></button>
                ' .
                form_close();

            $data[] = $row;
        }


        $output = [
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->datatable->filtered_kerjasama(),
            "recordsFiltered" => $this->datatable->count_kerjasama(),
            "data" => $data,
        ];
        json_output($output, 200);
    }

    public function get_kerjasama_row()
    {
        cek_ajax();
        $id = $this->input->post('id', true);
        $get_data = $this->db->where('sha1(sh_kerjasama.id)', $id)->get('sh_kerjasama')->row();
        $decode_date = json_decode($get_data->jangka_waktu);
        $decode_bukti = json_decode($get_data->bukti);



        $data = [
            'start_date' => $decode_date->start,
            'end_date' => $decode_date->end,
            'title' => $get_data->judul,
            'mitra' => $get_data->nama_mitra,
            'level' => $get_data->level_mitra,
            'bukti' => $decode_bukti
        ];
        $output = [
            'token' => get_token(),
            'data' => $data
        ];
        json_output($output, 200);
    }

    private function _diff_array_bukti_file($old_file_user, $old_file)
    {
        //get filename from new file
        $ofu = [];
        $a = 0;
        for ($i = 0; $i < count($old_file_user); $i++) {
            $ofu[] = $old_file_user[$i];
        }


        //get filename from old file
        $filtered_array = [];
        foreach ($old_file->data as $of) {
            foreach ($ofu as $ou) {
                if ($of->file_name == $ou) {
                    $filtered_array[] = $of;
                }
            }
        }

        return $filtered_array;
    }
}
