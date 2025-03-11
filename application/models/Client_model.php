<?php
defined('BASEPATH') or exit ('No direct script access allowed');
class Client_model extends CI_Model {
    protected $user;
    public function __construct(){
        parent::__construct();
        $this->user = get_user();
    }

    public function get_kegiatan_tridharma($id = null){
        $this->db->select('sh_kegiatan_tridharma.*, sha1(sh_kegiatan_tridharma.id) as id_encode')
        ->from('sh_kegiatan_tridharma')
        ->where('id_user', $this->user->id);

        if($id){
            $this->db->where('sha1(sh_kegiatan_tridharma.id)', $id);
        }
        $this->db->order_by('sh_kegiatan_tridharma.create_at', 'desc');

        return $this->db->get();
    }
}