<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Datatable_model extends CI_Model
{
    private function query_kerjasama()
    {
        $this->db->select(
            'sh_kerjasama.*, sha1(sh_kerjasama.id) as id_encode'
        )
            ->from('sh_kerjasama');
    }

    private function filter_kerjasama()
    {
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

    public function get_kerjasama()
    {
        $this->filter_kerjasama();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    public function filtered_kerjasama()
    {
        $this->filter_kerjasama();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_kerjasama()
    {
        $this->query_kerjasama();
        return $this->db->count_all_results();
    }





    ///main datatable
    public function get_data($from)
    {
        $this->filter_data($from);
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    public function filtered_data($from)
    {
        $this->filter_data($from);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_data($from)
    {
        if ($from == 'tridharma') {
            $this->q_tridharma();
        } else if ($from === 'seminar') {
            $this->q_seminar();
        } else if ($from === 'rekognisi') {
            $this->q_rekognisi();
        }
        return $this->db->count_all_results();
    }

    private function filter_data($from)
    {
        if ($from === 'tridharma') {
            $this->q_tridharma();
            $search = ['nama', 'nip', 'tempat_kegiatan'];
        } else if ($from === 'seminar') {
            $this->q_seminar();
            $search = ['nama', 'nip', 'jenis_kegiatan', 'jenis_partisipasi', 'judul_kegiatan', 'penyelenggara'];
        } else if ($from === 'rekognisi') {
            $this->q_rekognisi();
            $search = ['nama', 'nip', 'jenis_rekognisi', 'jenis_kegiatan', 'level', 'penyelenggara', 'tahun'];
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



    //main query datatable tridhama menu
    private function q_tridharma()
    {
        $this->db->select('
        sh_kegiatan_tridharma.*,
        sha1(sh_kegiatan_tridharma.id) AS id_encode,
        user.nip,
        user.nama
        ')
            ->from('sh_kegiatan_tridharma')
            ->join('user', 'sh_kegiatan_tridharma.id_user = user.id')
            ->order_by('sh_kegiatan_tridharma.create_at', 'DESC');
    }

    //main query datatable seminar menu
    private function q_seminar()
    {
        $this->db->select('
        sh_seminar.*,
        sha1(sh_seminar.id) AS id_encode,
        user.nip,
        user.nama
        ')
            ->from('sh_seminar')
            ->join('user', 'sh_seminar.id_user = user.id')
            ->order_by('sh_seminar.create_at', 'DESC');
    }

    //main query datatable rekognisi menu
    private function q_rekognisi()
    {
        $this->db->select('
        sh_rekognisi.*,
        sha1(sh_rekognisi.id) AS id_encode,
        user.nip,
        user.nama
        ')
            ->from('sh_rekognisi')
            ->join('user', 'sh_rekognisi.id_user = user.id')
            ->order_by('sh_rekognisi.create_at', 'DESC');
    }

    //TAMBAHAN AGNA
    private function query_laboratorium()
    {
        $this->db->select(
            'sh_laboratorium.*, sha1(sh_laboratorium.id) as id_encode'
        )
            ->from('sh_laboratorium');
    }

    private function filter_laboratorium()
    {
        $this->query_laboratorium();
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

    public function get_laboratorium()
    {
        $this->filter_laboratorium();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    public function filtered_laboratorium()
    {
        $this->filter_laboratorium();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_laboratorium()
    {
        $this->query_laboratorium();
        return $this->db->count_all_results();
    }
}
