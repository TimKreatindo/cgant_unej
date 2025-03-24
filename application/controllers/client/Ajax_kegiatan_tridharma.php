<?php
defined('BASEPATH') or exit ('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
class Ajax_kegiatan_tridharma extends CI_Controller {
    public function validation(){
        cek_ajax();
        $input_post = $this->input->post(null, true);
        $act = $this->input->post('act');
        $user = get_user();

        switch($act){
            case 'add':
                $tipe_bukti = $input_post['tipe_bukti'];

                if($tipe_bukti == 'file'){
                    $upload_file = $this->app->upload_files($_FILES['bukti'], 'kegiatan-tridharma', './assets/upload/kegiatan-tridharma/');
                    $success_upload  = $upload_file['success_upload'];
                    $error_upload = $upload_file['error_upload'];

                    if(count($error_upload) > 0){
                        if(!empty($success_upload)){
                            foreach($success_upload as $su){
                                unlink('./assets/upload/kegiatan-tridharma/' . $su['file_name']);
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

                $tanggal = [
                    'start' => $input_post['start_date'],
                    'end' => $input_post['end_date']
                ];

                $data_insert = [
                        'id_user' => $user->id,
                        'tanggal_kegiatan' => json_encode($tanggal),
                        'jenis_kegiatan' => $input_post['jenis_kegiatan'],
                        'tempat_kegiatan' => $input_post['tempat_kegiatan'],
                        'bukti' => json_encode($bukti),
                        'create_at' => date('Y-m-d H:i:s'),
                        'last_update' => date('Y-m-d H:i:s')
                ];
                
                $this->app->input_data('sh_kegiatan_tridharma', $data_insert);
                break;
            case 'get_edit':
                $id = $input_post['id'];
                $get_data = $this->client->get_kegiatan_tridharma($id)->row();
                $data = [];
                if($get_data){
                    $decode_date = json_decode($get_data->tanggal_kegiatan);
                    $decode_bukti = json_decode($get_data->bukti);

                    $data = [
                        'id' => $get_data->id_encode,
                        'start_date' => $decode_date->start,
                        'end_date' => $decode_date->end,
                        'jenis_kegiatan' => $get_data->jenis_kegiatan,
                        'tempat_kegiatan' => $get_data->tempat_kegiatan,
                        'bukti' => $decode_bukti,
                    ];
                }

                $output = [
                    'data' => $data,
                    'token' => get_token()
                ];
                json_output($output, 200);
                
                break;
            case 'edit':
                $id = $input_post['id'];
                $get_data = $this->client->get_kegiatan_tridharma($id)->row();


                if(!empty($get_data)){
                    $tipe_bukti = $input_post['tipe_bukti'];
                    
                    if($tipe_bukti == 'file'){
                        if($_FILES['bukti']['name'][0] != ''){
                            $upload_file = $this->app->upload_files($_FILES['bukti'], 'kegiatan-tridharma', './assets/upload/kegiatan-tridharma/');
                            $success_upload  = $upload_file['success_upload'];
                            $error_upload = $upload_file['error_upload'];

                            if(count($error_upload) > 0){
                                if(!empty($success_upload)){
                                    foreach($success_upload as $su){
                                        unlink('./assets/upload/kegiatan-tridharma/' . $su['file_name']);
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

                    $tanggal_kegiatan = [
                        'start' => $input_post['start_date'],
                        'end' => $input_post['end_date']
                    ];
    
                    $data_update = [
                        'tanggal_kegiatan' => json_encode($tanggal_kegiatan),
                        'jenis_kegiatan' => $input_post['jenis_kegiatan'],
                        'tempat_kegiatan' => $input_post['tempat_kegiatan'],
                        'bukti' => json_encode($bukti),
                        'last_update' => date('Y-m-d H:i:s')
                    ];
    
                    $this->db->where('sha1(id)', $id)->update('sh_kegiatan_tridharma', $data_update);
                    if($this->db->affected_rows() > 0){
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
                $id = $input_post['id'];
                $this->app->delete_data('sh_kegiatan_tridharma', 'sha1(id)', $id);
                break;
        }
    }
}