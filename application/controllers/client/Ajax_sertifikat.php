<?php
defined('BASEPATH')or exit('No direct script access allowed');
class Ajax_sertifikat extends CI_Controller {
    public function validation(){
        cek_ajax();
        $input_post = $this->input->post(null, true);
        $act = $this->input->post('act', true);
        $user = get_user();
        switch($act){
            case 'add':
                $tipe_bukti = $input_post['tipe_bukti'];
                

                if($tipe_bukti == 'file'){
                    $upload_file = $this->app->upload_files($_FILES['bukti'], 'sertifikat', './assets/upload/sertifikat/');
                    $success_upload  = $upload_file['success_upload'];
                    $error_upload = $upload_file['error_upload'];

                    if(count($error_upload) > 0){
                        if(!empty($success_upload)){
                            foreach($success_upload as $su){
                                unlink('./assets/upload/sertifikat/' . $su['file_name']);
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


                $data_insert = [
                        'id_user' => $user->id,
                        'jenis' => $input_post['jenis_sertifikat'],
                        'bidang' => $input_post['bidang'],
                        'level' => $input_post['level'],
                        'lembaga' => $input_post['lembaga'],
                        'tahun' => $input_post['year'],
                        'bukti' => json_encode($bukti),
                        'create_at' => date('Y-m-d H:i:s'),
                        'last_update' => date('Y-m-d H:i:s')
                ];
                
                $this->app->input_data('sh_sertifikat_kompetensi', $data_insert);

                break;
            case 'get-edit':
                $id = $input_post['id'];
                $get_data = $this->client->get_sertifikat($id)->row();
                if($get_data){
                    $decode_bukti = json_decode($get_data->bukti);

                    $data = [
                        'id' => $get_data->id_encode,
                        'jenis' => $get_data->jenis,
                        'bidang' => $get_data->bidang,
                        'level' => $get_data->level	,
                        'lembaga' => $get_data->lembaga,
                        'tahun' => $get_data->tahun,
                        'bukti' => $decode_bukti,
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
                $get_data = $this->client->get_sertifikat($id)->row();


                if(!empty($get_data)){
                    $tipe_bukti = $input_post['tipe_bukti'];
                    
                    if($tipe_bukti == 'file'){
                        if($_FILES['bukti']['name'][0] != ''){
                            $upload_file = $this->app->upload_files($_FILES['bukti'], 'sertifikat', './assets/upload/sertifikat/');
                            $success_upload  = $upload_file['success_upload'];
                            $error_upload = $upload_file['error_upload'];

                            if(count($error_upload) > 0){
                                if(!empty($success_upload)){
                                    foreach($success_upload as $su){
                                        unlink('./assets/upload/sertifikat/' . $su['file_name']);
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
                        'jenis' => $input_post['jenis_sertifikat'],
                        'bidang' => $input_post['bidang'],
                        'level' => $input_post['level'],
                        'lembaga' => $input_post['lembaga'],
                        'tahun' => $input_post['year'],
                        'bukti' => json_encode($bukti),
                        'last_update' => date('Y-m-d H:i:s')
                    ];
    
                    $this->db->where('sha1(id)', $id)->update('sh_sertifikat_kompetensi', $data_update);
                    if($this->db->affected_rows() > 0){
                        $output = [
                            'status' => true,
                            'msg' => 'Data berhasil update',
                            'token' => get_token()
                        ];
                    } else {
                        $output = [
                            'status' => false,
                            'msg' => 'Data gagal update',
                            'token' => get_token(),
                            'type' => 'err_result'
                        ];
                    }


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
                $this->app->delete_data('sh_sertifikat_kompetensi', 'sha1(id)', $id);
                break;
        }
    }
}