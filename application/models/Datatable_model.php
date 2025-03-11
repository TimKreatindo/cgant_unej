<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Datatable_model extends CI_Model {
    private function query_kerjasama(){
        $this->db->select(
            'sh_kerjasama.*, sha1(sh_kerjasama.id) as id_encode'
        )
        ->from('sh_kerjasama');
    }

    private function filter_kerjasama(){
        $this->query_kerjasama();
        $search = ['judul', 'nama_mitra', 'level_mitra'];
        $i = 0;
        foreach ($search as $item) {
            if ($_POST['search']['value']) {
                if ($i === 0) {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($search) - 1 == $i) {
                    $this->db->group_end();
                }
            }
            $i++;
        }
    }

    public function get_kerjasama(){
        $this->filter_kerjasama();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    public function filtered_kerjasama(){
        $this->filter_kerjasama();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_kerjasama(){
        $this->query_kerjasama();
        return $this->db->count_all_results();
    }





    ///main datatable


    public function get_data($from){
        $this->filter_data($from);
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    public function filtered_data($from){
        $this->filter_data($from);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_data($from){
        if($from == 'tridharma'){
            $this->q_tridharma();
        }
        return $this->db->count_all_results();
    }

    private function filter_data($from){
        if($from==='tridharma'){
            $this->q_tridharma();
            $search = ['nama', 'nip', 'tempat_kegiatan'];
        }
        
        $i = 0;
        foreach ($search as $item) {
            if ($_POST['search']['value']) {
                if ($i === 0) {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($search) - 1 == $i) {
                    $this->db->group_end();
                }
            }
            $i++;
        }
    }



    //main query
    private function q_tridharma(){
        $this->db->select('
        sh_kegiatan_tridharma.*,
        sha1(sh_kegiatan_tridharma.id) AS id_encode,
        user.nip,
        user.nama
        ')
        ->from('sh_kegiatan_tridharma')
        ->join('user', 'sh_kegiatan_tridharma.id_user = user.id')
        ->order_by('sh_kegiatan_tridharma.create_at' , 'DESC');
    }
}