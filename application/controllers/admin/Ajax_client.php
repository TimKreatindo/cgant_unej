<?php
defined('BASEPATH')or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
class ajax_client extends CI_Controller {

    //ajax master universal
    public function add_master_universal(){
        cek_ajax();
        $act = $this->input->post('act');
        $input_post = $this->input->post(null, true);
        

        switch($act){
            case 'kegiatan-tridharma':
                if(!empty($input_post['kegiatan'])){
                    $kegiatan = $input_post['kegiatan'];
                    $c_kegiatan = count($kegiatan);

                    $data_kegiatan = [];
                    for($i = 0; $i < $c_kegiatan; $i++){
                        $data_kegiatan[] = $kegiatan[$i];
                    }

                    $this->app->change_json_file('kegiatan_tridharma.json', $data_kegiatan);

                } else {
                    $params = [
                        'status' => false,
                        'msg' => 'Data harap di isi',
                        'token' => get_token()
                    ];
                    echo json_encode($params);
                }
                break;
            case 'kegiatan-seminar':
                if(!empty($input_post['kegiatan'])){
                    $kegiatan = $input_post['kegiatan'];
                    $c_kegiatan = count($kegiatan);

                    $data_kegiatan = [];
                    for($i = 0; $i < $c_kegiatan; $i++){
                        $data_kegiatan[] = $kegiatan[$i];
                    }

                    $this->app->change_json_file('kegiatan_seminar.json', $data_kegiatan);

                } else {
                    $params = [
                        'status' => false,
                        'msg' => 'Data harap di isi',
                        'token' => get_token()
                    ];
                    echo json_encode($params);
                }
                break;
            case 'partisipasi-seminar':
                if(!empty($input_post['partisipasi'])){
                    $kegiatan = $input_post['partisipasi'];
                    $c_kegiatan = count($kegiatan);

                    $data_kegiatan = [];
                    for($i = 0; $i < $c_kegiatan; $i++){
                        $data_kegiatan[] = $kegiatan[$i];
                    }

                    $this->app->change_json_file('partisipasi_seminar.json', $data_kegiatan);

                } else {
                    $params = [
                        'status' => false,
                        'msg' => 'Data harap di isi',
                        'token' => get_token()
                    ];
                    echo json_encode($params);
                }
                break;
            case 'kegiatan-rekognisi':
                if(!empty($input_post['kegiatan'])){
                    $kegiatan = $input_post['kegiatan'];
                    $c_kegiatan = count($kegiatan);

                    $data_kegiatan = [];
                    for($i = 0; $i < $c_kegiatan; $i++){
                        $data_kegiatan[] = $kegiatan[$i];
                    }

                    $this->app->change_json_file('kegiatan_rekognisi.json', $data_kegiatan);

                } else {
                    $params = [
                        'status' => false,
                        'msg' => 'Data harap di isi',
                        'token' => get_token()
                    ];
                    echo json_encode($params);
                }
                break;
            case 'jenis-rekognisi':
                if(!empty($input_post['rekognisi'])){
                    $kegiatan = $input_post['rekognisi'];
                    $c_kegiatan = count($kegiatan);

                    $data_kegiatan = [];
                    for($i = 0; $i < $c_kegiatan; $i++){
                        $data_kegiatan[] = $kegiatan[$i];
                    }

                    $this->app->change_json_file('jenis_rekognisi.json', $data_kegiatan);

                } else {
                    $params = [
                        'status' => false,
                        'msg' => 'Data harap di isi',
                        'token' => get_token()
                    ];
                    echo json_encode($params);
                }
                break;
            case 'jenis-sertifikat':
                if(!empty($input_post['sertifikat'])){
                    $kegiatan = $input_post['sertifikat'];
                    $c_kegiatan = count($kegiatan);

                    $data_kegiatan = [];
                    for($i = 0; $i < $c_kegiatan; $i++){
                        $data_kegiatan[] = $kegiatan[$i];
                    }

                    $this->app->change_json_file('jenis_sertifikat.json', $data_kegiatan);

                } else {
                    $params = [
                        'status' => false,
                        'msg' => 'Data harap di isi',
                        'token' => get_token()
                    ];
                    echo json_encode($params);
                }
                break;
            case 'index-publikasi':
                if(!empty($input_post['level'])){
                    $level = $input_post['level'];
                    $indeks = $input_post['indeks'];
                    
                    $c_level = count($level);

                    $data = [];
                    for($i = 0; $i < $c_level; $i++){
                        $row = [
                            'level' => $level[$i],
                            'indeks' => $indeks[$i]
                        ];
                        $data[] = $row;
                    }

                    $this->app->change_json_file('index_publikasi.json', $data);

                } else {
                    $params = [
                        'status' => false,
                        'msg' => 'Data harap di isi',
                        'token' => get_token()
                    ];
                    echo json_encode($params);
                }
                break;
            case 'jabatan-jurnal':
                if(!empty($input_post['jabatan'])){
                    $kegiatan = $input_post['jabatan'];
                    $c_kegiatan = count($kegiatan);

                    $data_kegiatan = [];
                    for($i = 0; $i < $c_kegiatan; $i++){
                        $data_kegiatan[] = $kegiatan[$i];
                    }

                    $this->app->change_json_file('jabatan_jurnal.json', $data_kegiatan);

                } else {
                    $params = [
                        'status' => false,
                        'msg' => 'Data harap di isi',
                        'token' => get_token()
                    ];
                    echo json_encode($params);
                }
                break;
            case 'organisasi':
                if(!empty($input_post['organisasi'])){
                    $kegiatan = $input_post['organisasi'];
                    $c_kegiatan = count($kegiatan);

                    $data_kegiatan = [];
                    for($i = 0; $i < $c_kegiatan; $i++){
                        $data_kegiatan[] = $kegiatan[$i];
                    }

                    $this->app->change_json_file('organisasi.json', $data_kegiatan);

                } else {
                    $params = [
                        'status' => false,
                        'msg' => 'Data harap di isi',
                        'token' => get_token()
                    ];
                    echo json_encode($params);
                }
                break;
        }
    }

    public function get_master_universal(){
        cek_ajax();
        $act = $this->input->post('act');
        $input_post = $this->input->post(null, true);
        

        switch($act){
            case 'kegiatan-tridharma':
                $data = $this->app->get_json_file('kegiatan_tridharma.json');

                $params = [
                    'status' => true,
                    'token'=> get_token(),
                    'data' => $data
                ];

                json_output($params, 200);
                break;
            
            case 'kegiatan-seminar':
                $data = $this->app->get_json_file('kegiatan_seminar.json');

                $params = [
                    'status' => true,
                    'token'=> get_token(),
                    'data' => $data
                ];

                json_output($params, 200);
                break;
            case 'partisipasi-seminar':
                $data = $this->app->get_json_file('partisipasi_seminar.json');

                $params = [
                    'status' => true,
                    'token'=> get_token(),
                    'data' => $data
                ];

                json_output($params, 200);
                break;
            case 'kegiatan-rekognisi':
                $data = $this->app->get_json_file('kegiatan_rekognisi.json');

                $params = [
                    'status' => true,
                    'token'=> get_token(),
                    'data' => $data
                ];

                json_output($params, 200);
                break;
            case 'jenis-rekognisi':
                $data = $this->app->get_json_file('jenis_rekognisi.json');

                $params = [
                    'status' => true,
                    'token'=> get_token(),
                    'data' => $data
                ];

                json_output($params, 200);
                break;
            case 'jenis-sertifikat':
                $data = $this->app->get_json_file('jenis_sertifikat.json');

                $params = [
                    'status' => true,
                    'token'=> get_token(),
                    'data' => $data
                ];

                json_output($params, 200);
                break;
            case 'index-publikasi':
                $data = $this->app->get_json_file('index_publikasi.json');

                $params = [
                    'status' => true,
                    'token'=> get_token(),
                    'data' => $data
                ];

                json_output($params, 200);
                break;
            case 'jabatan-jurnal':
                $data = $this->app->get_json_file('jabatan_jurnal.json');

                $params = [
                    'status' => true,
                    'token'=> get_token(),
                    'data' => $data
                ];

                json_output($params, 200);
                break;
            case 'organisasi':
                $data = $this->app->get_json_file('organisasi.json');

                $params = [
                    'status' => true,
                    'token'=> get_token(),
                    'data' => $data
                ];

                json_output($params, 200);
                break;
        }
    }


    //ajax tridharma
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


    //ajax seminar
    public function datatable_seminar(){
        cek_ajax();
        $get_data = $this->datatable->get_data('seminar');
        $data = [];

        $no = 1;
        foreach($get_data as $gd){
            $row = [];

            $row[] = $no++;
            $row[] = $gd->nip;
            $row[] = $gd->nama;
            $row[] = $gd->jenis_kegiatan;
            $row[] = $gd->jenis_partisipasi;
            $row[] = $gd->judul_kegiatan;
            $row[] = 
                form_open('admin/detail-seminar', 'class="action"').
                '<input type="hidden" name="id" value="'.$gd->id_encode.'">
                <button class="btn btn-sm btn-secondary w-100" type="submit"><i class="fas fa-search"></i></button>'.
                form_close()
            ;

            $data[] = $row;
        }



        $output = [
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->datatable->count_all_data('seminar'),
            "recordsFiltered" => $this->datatable->filtered_data('seminar'),
            "data" => $data,
        ];
        json_output($output, 200);
    }

    public function detail_seminar(){
        cek_ajax();
        $id = $this->input->post('id', true);
        $data = $this->app->get_where_data('sh_seminar', 'sha1(id)', $id)->row();

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
                'jenis_partisipasi' => $data->jenis_partisipasi,
                'judul_kegiatan' => $data->judul_kegiatan,
                'tingkat' => $data->tingkat,
                'penyelenggara' => $data->penyelenggara,


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



    //ajax rekognisi
    public function datatable_rekognisi(){
        cek_ajax();
        $get_data = $this->datatable->get_data('rekognisi');
        $data = [];

        $no = 1;
        foreach($get_data as $gd){
            $row = [];

            $row[] = $no++;
            $row[] = $gd->nip;
            $row[] = $gd->nama;
            $row[] = $gd->tahun;
            $row[] = $gd->penyelenggara;
            $row[] = 
                form_open('admin/detail-rekognisi', 'class="action"').
                '<input type="hidden" name="id" value="'.$gd->id_encode.'">
                <button class="btn btn-sm btn-secondary w-100" type="submit"><i class="fas fa-search"></i></button>'.
                form_close()
            ;

            $data[] = $row;
        }



        $output = [
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->datatable->count_all_data('rekognisi'),
            "recordsFiltered" => $this->datatable->filtered_data('rekognisi'),
            "data" => $data,
        ];
        json_output($output, 200);
    }

    public function detail_rekognisi(){
        cek_ajax();
        $id = $this->input->post('id', true);
        $data = $this->app->get_where_data('sh_rekognisi', 'sha1(id)', $id)->row();

        if($data){
            $decode_bukti = json_decode($data->bukti);

            $c_create = date_create($data->create_at);
            $c_update = date_create($data->last_update);


            $shown_data = [
                'tahun' => $data->tahun,
                'jenis_rekognisi' => $data->jenis_rekognisi,
                'jenis_kegiatan' => $data->jenis_kegiatan,
                'level' => $data->level,
                'penyelenggara' => $data->penyelenggara,

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



    //ajax sertifikat
    public function datatable_sertifikat(){
        cek_ajax();
        $get_data = $this->datatable->get_data('sertifikat');
        $data = [];

        $no = 1;
        foreach($get_data as $gd){
            $row = [];

            $row[] = $no++;
            $row[] = $gd->nip;
            $row[] = $gd->nama;
            $row[] = $gd->jenis;
            $row[] = $gd->level;
            $row[] = 
                form_open('admin/detail-sertifikat', 'class="action"').
                '<input type="hidden" name="id" value="'.$gd->id_encode.'">
                <button class="btn btn-sm btn-secondary w-100" type="submit"><i class="fas fa-search"></i></button>'.
                form_close()
            ;

            $data[] = $row;
        }



        $output = [
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->datatable->count_all_data('sertifikat'),
            "recordsFiltered" => $this->datatable->filtered_data('sertifikat'),
            "data" => $data,
        ];
        json_output($output, 200);
    }

    public function detail_sertifikat(){
        cek_ajax();
        $id = $this->input->post('id', true);
        $data = $this->app->get_where_data('sh_sertifikat_kompetensi', 'sha1(id)', $id)->row();

        if($data){
            $decode_bukti = json_decode($data->bukti);

            $c_create = date_create($data->create_at);
            $c_update = date_create($data->last_update);


            $shown_data = [
                'tahun' => $data->tahun,
                'jenis' => $data->jenis,
                'bidang' => $data->bidang,
                'level' => $data->level,
                'lembaga' => $data->lembaga,

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


    //ajax publikasi
    public function datatable_publikasi(){
        cek_ajax();
        $get_data = $this->datatable->get_data('publikasi');
        $data = [];

        $no = 1;
        foreach($get_data as $gd){
            $row = [];

            $row[] = $no++;
            $row[] = $gd->nip;
            $row[] = $gd->nama;
            $row[] = $gd->indeks;
            $row[] = $gd->tahun;
            $row[] = 
                form_open('admin/detail-publikasi', 'class="action"').
                '<input type="hidden" name="id" value="'.$gd->id_encode.'">
                <button class="btn btn-sm btn-secondary w-100" type="submit"><i class="fas fa-search"></i></button>'.
                form_close()
            ;

            $data[] = $row;
        }



        $output = [
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->datatable->count_all_data('publikasi'),
            "recordsFiltered" => $this->datatable->filtered_data('publikasi'),
            "data" => $data,
        ];
        json_output($output, 200);
    }

    public function detail_publikasi(){
        cek_ajax();
        $id = $this->input->post('id', true);
        $data = $this->app->get_where_data('sh_publikasi', 'sha1(id)', $id)->row();

        if($data){
            $decode_bukti = json_decode($data->bukti);

            $c_create = date_create($data->create_at);
            $c_update = date_create($data->last_update);


            $shown_data = [
                'judul' => $data->judul,
                'jurnal' => $data->jurnal,
                'indeks' => $data->indeks,
                'tahun' => $data->tahun,
                'level' => $data->level,

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


     //ajax Pengelola jurnal
     public function datatable_jurnal(){
        cek_ajax();
        $get_data = $this->datatable->get_data('jurnal');
        $data = [];

        $no = 1;
        foreach($get_data as $gd){
            $row = [];

            $row[] = $no++;
            $row[] = $gd->nip;
            $row[] = $gd->nama;
            $row[] = $gd->jurnal;
            $row[] = $gd->role;
            $row[] = 
                form_open('admin/detail-jurnal', 'class="action"').
                '<input type="hidden" name="id" value="'.$gd->id_encode.'">
                <button class="btn btn-sm btn-secondary w-100" type="submit"><i class="fas fa-search"></i></button>'.
                form_close()
            ;

            $data[] = $row;
        }



        $output = [
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->datatable->count_all_data('jurnal'),
            "recordsFiltered" => $this->datatable->filtered_data('jurnal'),
            "data" => $data,
        ];
        json_output($output, 200);
    }

    public function detail_jurnal(){
        cek_ajax();
        $id = $this->input->post('id', true);
        $data = $this->app->get_where_data('sh_pengelola_jurnal', 'sha1(id)', $id)->row();

        if($data){
            $decode_bukti = json_decode($data->bukti);

            $c_create = date_create($data->create_at);
            $c_update = date_create($data->last_update);


            $shown_data = [
                'jurnal' => $data->jurnal,
                'role' => $data->role,
                'tahun' => $data->tahun,
                'level' => $data->level,

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



     //ajax organisasi
     public function datatable_organisasi(){
        cek_ajax();
        $get_data = $this->datatable->get_data('organisasi');
        $data = [];

        $no = 1;
        foreach($get_data as $gd){
            $row = [];

            $row[] = $no++;
            $row[] = $gd->nip;
            $row[] = $gd->nama;
            $row[] = $gd->tahun;
            $row[] = $gd->organisasi;
            $row[] = 
                form_open('admin/detail-organisasi', 'class="action"').
                '<input type="hidden" name="id" value="'.$gd->id_encode.'">
                <button class="btn btn-sm btn-secondary w-100" type="submit"><i class="fas fa-search"></i></button>'.
                form_close()
            ;

            $data[] = $row;
        }



        $output = [
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->datatable->count_all_data('organisasi'),
            "recordsFiltered" => $this->datatable->filtered_data('organisasi'),
            "data" => $data,
        ];
        json_output($output, 200);
    }

    public function detail_organisasi(){
        cek_ajax();
        $id = $this->input->post('id', true);
        $data = $this->app->get_where_data('sh_organisasi', 'sha1(id)', $id)->row();

        if($data){
            $decode_bukti = json_decode($data->bukti);

            $c_create = date_create($data->create_at);
            $c_update = date_create($data->last_update);


            $shown_data = [
                'organisasi' => $data->organisasi,
                'level' => $data->level,
                'tahun' => $data->tahun,

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




     //ajax HKI
     public function datatable_hki(){
        cek_ajax();
        $get_data = $this->datatable->get_data('hki');
        $data = [];

        $no = 1;
        foreach($get_data as $gd){
            $list_dosen = '';
            $dosen_contribute = json_decode($gd->user_info);
            if(!empty($dosen_contribute)){
                foreach($dosen_contribute as $dc){
                    $list_dosen .= '<li>'.$dc.'</li>';
                }
            }
            $list = '<ul><li>'.$gd->user_create.' ('.$gd->user_nip.')</li> '.$list_dosen.'<ul>';


            $row = [];

            $row[] = $no++;
            $row[] = $list;
            $row[] = $gd->judul;
            $row[] = $gd->no_hki;
            $row[] = 
                form_open('admin/detail-hki', 'class="action"').
                '<input type="hidden" name="id" value="'.$gd->id_encode.'">
                <button class="btn btn-sm btn-secondary w-100" type="submit"><i class="fas fa-search"></i></button>'.
                form_close()
            ;

            $data[] = $row;
        }



        $output = [
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->datatable->count_all_data('hki'),
            "recordsFiltered" => $this->datatable->filtered_data('hki'),
            "data" => $data,
        ];
        json_output($output, 200);
    }

    public function detail_hki(){
        cek_ajax();
        $id = $this->input->post('id', true);
        $data = $this->client->get_hki($id)->row();


        if($data){
            $decode_bukti = json_decode($data->bukti);
            $decode_dosen = json_decode($data->user_info);

            $c_tanggal = date_create($data->tanggal);
            $c_create = date_create($data->create_at);
            $c_update = date_create($data->last_update);


            $shown_data = [
                'dosen_contribute' => $decode_dosen,
                'dosen_create' => [
                    'name' => $data->user_create,
                    'nip' => $data->user_nip
                ],
                
                'judul' => $data->judul,
                'no_hki' => $data->no_hki,
                'terbit' => date_format($c_tanggal, 'd F Y'),

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