<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Client_model extends CI_Model
{
    protected $user;
    public function __construct()
    {
        parent::__construct();
        $this->user = get_user();
    }

    public function get_kegiatan_tridharma($id = null)
    {
        $this->db->select('sh_kegiatan_tridharma.*, sha1(sh_kegiatan_tridharma.id) as id_encode')
            ->from('sh_kegiatan_tridharma')
            ->where('id_user', $this->user->id);

        if ($id) {
            $this->db->where('sha1(sh_kegiatan_tridharma.id)', $id);
        }
        $this->db->order_by('sh_kegiatan_tridharma.create_at', 'desc');

        return $this->db->get();
    }

    public function get_seminar($id = null)
    {
        $this->db->select('sh_seminar.*, sha1(sh_seminar.id) as id_encode')
            ->from('sh_seminar')
            ->where('id_user', $this->user->id);

        if ($id) {
            $this->db->where('sha1(sh_seminar.id)', $id);
        }
        $this->db->order_by('sh_seminar.create_at', 'desc');

        return $this->db->get();
    }

    public function get_rekognisi($id = null)
    {
        $this->db->select('sh_rekognisi.*, sha1(sh_rekognisi.id) as id_encode')
            ->from('sh_rekognisi')
            ->where('id_user', $this->user->id);

        if ($id) {
            $this->db->where('sha1(sh_rekognisi.id)', $id);
        }
        $this->db->order_by('sh_rekognisi.create_at', 'desc');

        return $this->db->get();
    }

    public function get_sertifikat($id = null)
    {
        $this->db->select('sh_sertifikat_kompetensi.*, sha1(sh_sertifikat_kompetensi.id) as id_encode')
            ->from('sh_sertifikat_kompetensi')
            ->where('id_user', $this->user->id);

        if ($id) {
            $this->db->where('sha1(sh_sertifikat_kompetensi.id)', $id);
        }
        $this->db->order_by('sh_sertifikat_kompetensi.create_at', 'desc');

        return $this->db->get();
    }

    public function get_publikasi($id = null)
    {
        $this->db->select('sh_publikasi.*, sha1(sh_publikasi.id) as id_encode')
            ->from('sh_publikasi')
            ->where('id_user', $this->user->id);

        if ($id) {
            $this->db->where('sha1(sh_publikasi.id)', $id);
        }
        $this->db->order_by('sh_publikasi.create_at', 'desc');

        return $this->db->get();
    }

    public function get_jurnal($id = null)
    {
        $this->db->select('sh_pengelola_jurnal.*, sha1(sh_pengelola_jurnal.id) as id_encode')
            ->from('sh_pengelola_jurnal')
            ->where('id_user', $this->user->id);

        if ($id) {
            $this->db->where('sha1(sh_pengelola_jurnal.id)', $id);
        }
        $this->db->order_by('sh_pengelola_jurnal.create_at', 'desc');

        return $this->db->get();
    }

    public function get_organisasi($id = null)
    {
        $this->db->select('sh_organisasi.*, sha1(sh_organisasi.id) as id_encode')
            ->from('sh_organisasi')
            ->where('id_user', $this->user->id);

        if ($id) {
            $this->db->where('sha1(sh_organisasi.id)', $id);
        }
        $this->db->order_by('sh_organisasi.create_at', 'desc');

        return $this->db->get();
    }
}
