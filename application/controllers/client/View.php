<?php
defined('BASEPATH') or exit ('No direct script access allowed');
class View extends CI_Controller {

    public function __construct(){
        parent::__construct();
        check_is_client();
    }

    public function index(){
        $data = [
            'title' => 'Dashboard',
            'user' => get_user(),
            'view' => 'client/dashboard'
        ];
        $this->load->view('client/template', $data);
    }


    public function kegiatan_tridharma(){
        $data = [
            'title' => 'Kegiatan Tridharma',
            'user' => get_user(),
            'view' => 'client/kegiatan_tridharma',
            'js' => ['kegiatan_tridharma.js'],
            'data' => $this->client->get_kegiatan_tridharma()->result()
        ];
        $this->load->view('client/template', $data);
    }

    public function seminar(){
        $data = [
            'title' => 'Seminar/Webinar',
            'user' => get_user(),
            'view' => 'client/seminar',
            'js' => ['seminar.js'],
            'data' => $this->client->get_seminar()->result()
        ];
        $this->load->view('client/template', $data);
    }

    public function rekognisi(){
        $jenis_rekognisi = [
            'Reviewer', 'Pembicara', 'Editor', 'Juri', 'Penghargaan'
        ];
        $jenis_kegiatan = ['Seminar', 'Lomba Ilmiah', 'Presentasi Ilmiah', 'Jurnal'];

        
        $data = [
            'title' => 'Rekognisi',
            'user' => get_user(),
            'view' => 'client/rekognisi',
            'js' => ['rekognisi.js'],
            'data' => $this->client->get_rekognisi()->result(),
            'rekognisi' => $jenis_rekognisi,
            'kegiatan' => $jenis_kegiatan
        ];
        $this->load->view('client/template', $data);
    }

    public function sertifikat_kompetensi(){
        $jenis_sertifikat = [
            'Sertifikat Kompetensi IT', 'Sertifikat Profesional', 'Sertifikat Industri'
        ];
        $data = [
            'title' => 'Sertifikat Kompetensi',
            'user' => get_user(),
            'view' => 'client/sertifikat_kompetensi',
            'js' => ['sertifikat_kompetensi.js'],
            'jenis_sertifikat' => $jenis_sertifikat,
            'data' => $this->client->get_sertifikat()->result()
        ];
        $this->load->view('client/template', $data);
    }
}