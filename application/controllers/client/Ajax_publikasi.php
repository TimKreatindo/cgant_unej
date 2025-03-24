<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
class Ajax_publikasi extends CI_Controller
{
    public function validation()
    {
        cek_ajax();
        $input_post = $this->input->post(null, true);
        $act = $this->input->post('act');
        $user = get_user();

        switch ($act) {
            case 'add':
                $tipe_bukti = $input_post['tipe_bukti'];

                if ($tipe_bukti == 'file') {
                    $upload_file = $this->app->upload_files($_FILES['bukti'], 'publikasi', './assets/upload/publikasi/');
                    $success_upload  = $upload_file['success_upload'];
                    $error_upload = $upload_file['error_upload'];

                    if (count($error_upload) > 0) {
                        if (!empty($success_upload)) {
                            foreach ($success_upload as $su) {
                                unlink('./assets/upload/publikasi/' . $su['file_name']);
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

                $data_indeks = [
                    'scopus' => $input_post['scopus'],
                    'wos' => $input_post['wos'],
                    'sinta' => $input_post['sinta']
                ];

                $data_insert = [
                    'id_user' => $user->id,
                    'judul' => $input_post['judul'],
                    'jurnal' => $input_post['jurnal'],
                    'tahun' => $input_post['year'],
                    'level' => $input_post['level'],
                    'indeks' => $input_post['indeks'],
                    'bukti' => json_encode($bukti),
                    'create_at' => date('Y-m-d H:i:s'),
                    'last_update' => date('Y-m-d H:i:s')
                ];

                $this->app->input_data('sh_publikasi', $data_insert);

                break;
            case 'get-edit':
                $id = $input_post['id'];
                $get_data = $this->client->get_publikasi($id)->row();
                if ($get_data) {
                    $decode_bukti = json_decode($get_data->bukti);

                    $data = [
                        'id' => $get_data->id_encode,
                        'judul' => $get_data->judul,
                        'jurnal' => $get_data->jurnal,
                        'tahun' => $get_data->tahun,
                        'level' => $get_data->level,
                        'indeks' => $get_data->indeks,
                        'bukti' => $decode_bukti
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
                $get_data = $this->client->get_publikasi($id)->row();


                if (!empty($get_data)) {
                    $tipe_bukti = $input_post['tipe_bukti'];

                    if ($tipe_bukti == 'file') {
                        if ($_FILES['bukti']['name'][0] != '') {
                            $upload_file = $this->app->upload_files($_FILES['bukti'], 'publikasi', './assets/upload/publikasi/');
                            $success_upload  = $upload_file['success_upload'];
                            $error_upload = $upload_file['error_upload'];

                            if (count($error_upload) > 0) {
                                if (!empty($success_upload)) {
                                    foreach ($success_upload as $su) {
                                        unlink('./assets/upload/publikasi/' . $su['file_name']);
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

                                if (!empty($input_post['doc_name'])) {
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
                            if ($input_post['doc_name']) {
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


                    $data_indeks = [
                        'scopus' => $input_post['scopus'],
                        'wos' => $input_post['wos'],
                        'sinta' => $input_post['sinta']
                    ];

                    $data_update = [
                        'judul' => $input_post['judul'],
                        'jurnal' => $input_post['jurnal'],
                        'tahun' => $input_post['year'],
                        'level' => $input_post['level'],
                        'indeks' => json_encode($data_indeks),
                        'bukti' => json_encode($bukti),
                        'last_update' => date('Y-m-d H:i:s')
                    ];



                    $this->db->where('sha1(id)', $id)->update('sh_publikasi', $data_update);
                    if ($this->db->affected_rows() > 0) {
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
                $this->app->delete_data('sh_publikasi', 'sha1(id)', $id);
                break;
        }
    }
}
