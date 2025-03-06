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