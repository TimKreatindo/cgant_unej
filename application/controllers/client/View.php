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
            'data' => $this->client->get_kegiatan_tridharma()->result(),
            'kegiatan' => $this->app->get_json_file('kegiatan_tridharma.json')
        ];
        $this->load->view('client/template', $data);
    }

    public function seminar(){
        $data = [
            'title' => 'Seminar/Webinar',
            'user' => get_user(),
            'view' => 'client/seminar',
            'js' => ['seminar.js'],
            'data' => $this->client->get_seminar()->result(),
            'kegiatan' => $this->app->get_json_file('kegiatan_seminar.json'),
            'partisipasi' => $this->app->get_json_file('partisipasi_seminar.json')
        ];
        $this->load->view('client/template', $data);
    }

    public function rekognisi(){
        $data = [
            'title' => 'Rekognisi',
            'user' => get_user(),
            'view' => 'client/rekognisi',
            'js' => ['rekognisi.js'],
            'data' => $this->client->get_rekognisi()->result(),
            'kegiatan' => $this->app->get_json_file('kegiatan_rekognisi.json'),
            'rekognisi' => $this->app->get_json_file('jenis_rekognisi.json')

        ];
        $this->load->view('client/template', $data);
    }

    public function sertifikat_kompetensi(){
        $data = [
            'title' => 'Sertifikat Kompetensi',
            'user' => get_user(),
            'view' => 'client/sertifikat_kompetensi',
            'js' => ['sertifikat_kompetensi.js'],
            'jenis_sertifikat' => $this->app->get_json_file('jenis_sertifikat.json'),
            'data' => $this->client->get_sertifikat()->result()
        ];
        $this->load->view('client/template', $data);
    }

    public function publikasi(){
        $data = [
            'title' => 'Publikasi',
            'user' => get_user(),
            'view' => 'client/publikasi',
            'js' => ['publikasi.js'],
            'data' => $this->client->get_publikasi()->result(),
            'indeks' => $this->app->get_json_file('index_publikasi.json')
        ];
        $this->load->view('client/template', $data);
    }

    public function jurnal(){
        $role = [
            'Editor in Chief', 'Managing Editor', 'Layouting Editor', 'Associate Editors', 'Reviewer'
        ];
        $data = [
            'title' => 'Pengelola Jurnal',
            'user' => get_user(),
            'view' => 'client/jurnal',
            'js' => ['jurnal.js'],
            'role' => $this->app->get_json_file('jabatan_jurnal.json'),
            'data' => $this->client->get_jurnal()->result()
        ];
        $this->load->view('client/template', $data);
    }

    public function organisasi(){
        $data = [
            'title' => 'Organisasi',
            'user' => get_user(),
            'view' => 'client/organisasi',
            'js' => ['organisasi.js'],
            'organisasi' => $this->app->get_json_file('organisasi.json'),
            'data' => $this->client->get_organisasi()->result()
        ];
        $this->load->view('client/template', $data);
    }

    public function hki(){
        $user = get_user();
        $data = [
            'title' => 'HKI',
            'user' => $user,
            'view' => 'client/hki',
            'js' => ['hki.js'],
            'data' => $this->client->get_hki(null, $user->id)->result()
        ];
        $this->load->view('client/template', $data);
    }
}
