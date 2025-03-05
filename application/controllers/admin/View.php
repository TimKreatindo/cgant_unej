<?php
defined('BASEPATH') or exit ('No direct script access allowed');
class View extends CI_Controller {
    
    public function index(){
        $data = [
            'title' => 'Dashboard',
            'view' => 'admin/dashboard'
        ];
        $this->load->view('admin/template', $data);
    }

    public function master_jurusan(){
        $data = [
            'title' => 'Master Jurusan',
            'view' => 'admin/master_jurusan',
            'data' => $this->db->get('jurusan')->result(),
            'js' => ['master_jurusan.js'],
        ];
        $this->load->view('admin/template', $data);
    }

    public function master_user(){
        $data = [
            'title' => 'Master User',
            'view' => 'admin/master_user',
            'data' => $this->db->get('jurusan')->result(),
            'js' => ['master_user.js'],
        ];
        $this->load->view('admin/template', $data);
    }
}