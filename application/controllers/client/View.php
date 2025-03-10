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
            'user' => get_user()
        ];
        $this->load->view('client/template', $data);
    }
}