<?php
defined('BASEPATH')or exit('No direct script access allowed');
class ajax_client extends CI_Controller {
    public function datatable_tridharma(){
        cek_ajax();
        $get_data = $this->datatable->get_data('tridharma');
        $data = [];

        $no = 1;
        foreach($get_data as $gd){
            $decode_date = json_decode($gd->tanggal_kegiatan);
            if($decode_date->start == $decode_date->end){
                $c_date = date_create($decode_date->start);
                $shown_date = date_format($c_date, ' d F Y');
            } else {
                $c_start = date_create($decode_date->start);
                $c_end = date_create($decode_date->end);

                $shown_date = date_format($c_start, 'd F Y') . ' - ' . date_format($c_end, 'd F Y');
            }


            $row = [];

            $row[] = $no++;
            $row[] = $gd->nama;
            $row[] = $gd->jenis_kegiatan;
            $row[] = $shown_date;
            $row[] = $gd->tempat_kegiatan;
            $row[] = 
                form_open('admin/detail-tridharma', 'class="action-tridharma"').
                '<input type="hidden" name="id" value="'.$gd->id_encode.'">
                <button class="btn btn-sm btn-secondary w-100" type="submit"><i class="fas fa-search"></i></button>'.
                form_close()
            ;

            $data[] = $row;
        }



        $output = [
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->datatable->count_all_data('tridharma'),
            "recordsFiltered" => $this->datatable->filtered_data('tridharma'),
            "data" => $data,
        ];
        json_output($output, 200);
    }

    public function detail_tridharma(){
        cek_ajax();
        $id = $this->input->post('id', true);
        $data = $this->app->get_where_data('sh_kegiatan_tridharma', 'sha1(id)', $id)->row();

        if($data){
            $decode_date = json_decode($data->tanggal_kegiatan);
            $decode_bukti = json_decode($data->bukti);


            if($decode_date->start == $decode_date->end){
                $c_date = date_create($decode_date->start);
                $shown_date = date_format($c_date, ' d F Y');
            } else {
                $c_start = date_create($decode_date->start);
                $c_end = date_create($decode_date->end);
                $shown_date = date_format($c_start, 'd F Y') . ' - ' . date_format($c_end, 'd F Y');
            }

            $c_create = date_create($data->create_at);
            $c_update = date_create($data->last_update);


            $shown_data = [
                'jenis_kegiatan' => $data->jenis_kegiatan,
                'tempat_kegiatan' => $data->tempat_kegiatan,
                'date' => $shown_date,
                'bukti' => $decode_bukti,
                'create_at' => date_format($c_create, 'd F Y H:i:s'),
                'last_update' => date_format($c_update, 'd F Y H:i:s'),
            ];

            $output = [
                'status' => true,
                'data' => $shown_data,
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
    }
}