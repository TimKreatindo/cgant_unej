<?php
defined('BASEPATH')or exit('No direct script access allowed');
class Ajax_master_jurusan extends CI_Controller {
    public function validasi_jurusan(){
        cek_ajax();

        
        $act = $this->input->post('act', true);
        if($act == 'add'){
            $this->form_validation->set_rules('jurusan', 'Nama Jurusan', 'required|trim|min_length[3]|is_unique[jurusan.nama_jurusan]',[
                'required' => '%s harap di isi',
                'min_length' => '%s min 3 karakter',
                'is_unique' => '%s sudah terdaftar'
            ]);
        } else if($act == 'edit'){
            $this->form_validation->set_rules('jurusan', 'Nama Jurusan', 'required|trim|min_length[3]|callback_check_jurusan',[
                'required' => '%s harap di isi',
                'min_length' => '%s min 3 karakter',
            ]);
        }


        if($this->form_validation->run() == false){
            $data = [
                'type' => 'validation',
                'err_jurusan' => form_error('jurusan'),
                'token' => $this->security->get_csrf_hash()
            ];
            json_output($data, 200);
        } else {
            $this->_act_form_jurusan();
        }

    }

    public function check_jurusan($str){
        $id = $this->input->post('id', true);
        $check_available = $this->db->get_where('jurusan', [
            'nama_jurusan' => $str,
            'sha1(id) != ' => $id
        ])->num_rows();

            if($check_available > 0){
                $this->form_validation->set_message('check_jurusan', '{field} sudah terdaftar');
                return FALSE;
            } else {
                 return TRUE;
            }
    }

    private function _act_form_jurusan(){
        $input_post = $this->input->post(null, true);
        $act = $input_post['act'];
        $id = $input_post['id'];
        $jurusan = $input_post['jurusan'];


        switch($act){
            case 'add':
                $data = [
                    'nama_jurusan' => $jurusan
                ];

                $this->db->insert('jurusan',$data);
                if($this->db->affected_rows() > 0){
                    $output = [
                        'type' => 'result',
                        'status' => true,
                        'msg' => 'Jurusan barhasil di tambahkan',
                        'token' => $this->security->get_csrf_hash()
                    ];
                } else {
                    $output = [
                        'type' => 'result',
                        'status' => false,
                        'msg' => 'Jurusan gagal di tambahkan',
                        'token' => $this->security->get_csrf_hash()
                    ];
                }
                json_output($output, 200);
                
                break;
            case 'edit':
                $data = [
                    'nama_jurusan' => $jurusan
                ];

                $this->db->where('sha1(id)', $id)->update('jurusan',$data);
                if($this->db->affected_rows() > 0){
                    $output = [
                        'type' => 'result',
                        'status' => true,
                        'msg' => 'Jurusan barhasil di update',
                        'token' => $this->security->get_csrf_hash()
                    ];
                } else {
                    $output = [
                        'type' => 'result',
                        'status' => false,
                        'msg' => 'Jurusan gagal di update',
                        'token' => $this->security->get_csrf_hash()
                    ];
                }
                json_output($output, 200);
                break;
        }

    }

    public function delete_jurusan(){
        cek_ajax();

        $id = $this->input->post('id',true);
        $this->db->where('sha1(id)', $id)->delete('jurusan');
        if($this->db->affected_rows()>0){
            $params = [
                'status' => true,
                'msg' => 'Jurusan berhasil di hapus',
                'token'=>$this->security->get_csrf_hash()
            ];
        } else {
            $params = [
                'status' => false,
                'msg' => 'Jurusan gagal di hapus',
                'token'=>$this->security->get_csrf_hash()
            ];
        }
        json_output($params, 200);
    }
}