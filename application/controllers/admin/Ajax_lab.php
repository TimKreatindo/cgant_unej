<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
class Ajax_lab extends CI_Controller
{
    public function validation()
    {
        cek_ajax();
        $input_post = $this->input->post(null, true);
        $act = $this->input->post('act', true);

        switch ($act) {
            case 'add':
                $data_insert = [
                    'nama' => $input_post['nama'],
                    'merk' => $input_post['merk'],
                    'spesifikasi' => $input_post['spesifikasi'],
                    'kategori' => $input_post['kategori'],
                    'volume' => $input_post['volume'],
                    'jumlah' => $input_post['jumlah'],
                    'satuan' => $input_post['satuan'],
                ];
                $this->app->input_data('sh_laboratorium', $data_insert);
                break;
            case 'detail':
                $id = $input_post['id'];
                $get_data = $this->app->get_where_data('sh_laboratorium', 'id', $id)->row();
                $data = [];
                if ($get_data) {
                    $data = [
                        'nama' => $get_data->nama,
                        'merk' => $get_data->merk,
                        'spesifikasi' => $get_data->spesifikasi,
                        'kategori' => $get_data->kategori,
                        'volume' => $get_data->volume,
                        'jumlah' => $get_data->jumlah,
                        'satuan' => $get_data->satuan,
                    ];
                }

                $output = [
                    'data' => $data,
                    'token' => get_token()
                ];
                json_output($output, 200);
                break;
            case 'get-edit':
                $id = $input_post['id'];
                $get_data = $this->app->get_where_data('sh_laboratorium', 'id', $id)->row();
                if ($get_data) {
                    $data = [
                        'id' => $get_data->id,
                        'nama' => $get_data->nama,
                        'merk' => $get_data->merk,
                        'spesifikasi' => $get_data->spesifikasi,
                        'kategori' => $get_data->kategori,
                        'volume' => $get_data->volume,
                        'jumlah' => $get_data->jumlah,
                        'satuan' => $get_data->satuan,
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
                $get_data = $this->app->get_where_data('sh_laboratorium', 'id', $id)->row();

                if (!empty($get_data)) {
                    $data_update = [
                        'nama' => $input_post['nama'],
                        'merk' => $input_post['merk'],
                        'spesifikasi' => $input_post['spesifikasi'],
                        'kategori' => $input_post['kategori'],
                        'volume' => $input_post['volume'],
                        'jumlah' => $input_post['jumlah'],
                        'satuan' => $input_post['satuan'],
                    ];

                    $this->db->where('id', $id)->update('sh_laboratorium', $data_update);
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
                $this->app->delete_data('sh_laboratorium', 'id', $id);
                break;
        }
    }
}
