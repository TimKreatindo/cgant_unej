<?php
function cek_ajax(){
    $t = get_instance();
    if(!$t->input->is_ajax_request()){
        exit('No direct script access allowed');
    }
}

function json_output($data, $status){
    $t = get_instance();
    $t->output->set_content_type('application/json');
    $t->output->set_status_header($status);
    $t->output->set_output(json_encode($data));
}

function get_token(){
    $t = get_instance();
    $token = $t->security->get_csrf_hash();
    return $token;
}

function get_user(){
    $t = get_instance();
    $nip = $t->session->userdata('nip');

    $get_user = $t->db->select('
        user.id,
        sha1(user.id) AS encode_id,
        user.nip,
        user.nama,
        user.image,
        jurusan.nama_jurusan,
        user_role.nama_role
    ')
    ->from('user')
    ->join('jurusan', 'user.id_jurusan = jurusan.id')
    ->join('user_role', 'user.id_role = user_role.id')
    ->where('user.nip', $nip)
    ->get()->row();
    return $get_user;
}

function check_is_admin(){
    $t = get_instance();
    $nip = $t->session->userdata('nip');
    $get_user = $t->db->get_where('user', ['nip' => $nip])->row();

    if($nip == null || $nip == '' || empty($get_user)){
        redirect('login/logout');
    } else if($get_user->id_role != 1){
        redirect('welcome');
    }
}

function check_is_client(){
    $t = get_instance();
    $nip = $t->session->userdata('nip');
    $get_user = $t->db->get_where('user', ['nip' => $nip])->row();

    if($nip == null || $nip == '' || empty($get_user)){
        redirect('login/logout');
    } else if($get_user->id_role == 1){
        redirect('welcome');
    }
}

function check_is_login(){
    $t = get_instance();
    $nip = $t->session->userdata('nip');
    $role = $t->session->userdata('role');

    if($nip){
        if($role == 1){
            redirect('admin');
        } else {
            redirect('client');
        }
    } 
}