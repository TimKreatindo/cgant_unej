<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
class Ajax_user extends CI_Controller
{
    public function change_profile()
    {
        cek_ajax();
        $file = $_FILES['image'];
        $id = $this->input->post('id');

        if ($id) {
            $old_data = $this->db->where('id', $id)->get('user')->row();
            $old_image = $old_data->image;

            if ($file) {
                $config['upload_path']          = './assets/img/profile/';
                $config['allowed_types']        = 'jpg|jpeg|png';
                $config['max_size']             = 2000;

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if ($this->upload->do_upload('image')) {
                    if ($old_image != 'default.png') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }
                    $uploaded_file = $this->upload->data('file_name');
                } else {
                    $uploaded_file = $old_image;
                }
            } else {
                $uploaded_file = $old_image;
            }
        } else {
            $params = [
                'status' => false,
                'msg' => 'Harap isi semua inputan'
            ];
            echo json_encode($params);
            die;
        }

        $this->action_change_profile($uploaded_file);
    }
    private function action_change_profile($uploaded_file)
    {
        $input_post = $this->input->post(null, true);

        $data = [
            'nama' => $input_post['nama'],
            'nip' => $input_post['nip'],
            'image' => $uploaded_file,
        ];

        $this->db->where('id', $input_post['id'])->update('user', $data);
        if ($this->db->affected_rows() > 0) {
            $params = [
                'status' => true,
                'msg' => 'User berhasil di update',
                'redirect' => base_url('admin/profile')
            ];
        } else {
            $params = [
                'status' => false,
                'msg' => 'User gagal di update'
            ];
        }

        json_output($params, 200);
    }

    public function validation_pass()
    {
        cek_ajax();
        $this->form_validation->set_rules('old_pass', 'Old Password', 'required|trim');
        $this->form_validation->set_rules('new_pass', 'New Password', 'required|trim|min_length[5]|matches[repeat_new_pass]');
        $this->form_validation->set_rules('repeat_new_pass', 'Repeat New Password', 'required|trim|matches[new_pass]');

        if ($this->form_validation->run() == false) {
            $params = [
                'type' => 'validation',
                'err_old_pass' => form_error('old_pass'),
                'err_new_pass' => form_error('new_pass'),
                'err_repeat_new_pass' => form_error('repeat_new_pass'),
                'token' => $this->security->get_csrf_hash()
            ];
            json_output($params, 200);
        } else {
            $user = get_user();
            $user_pass = $user->password;
            $old_pass = $this->input->post('old_pass', true);
            $new_pass = $this->input->post('new_pass', true);


            if (password_verify($user_pass, PASSWORD_DEFAULT) == password_verify($old_pass, PASSWORD_DEFAULT)) {
                if ($old_pass != $new_pass) {
                    $this->to_change_password();
                } else {
                    $params = [
                        'type' => 'validation',
                        'err_new_pass' => 'The new password cannot be the same as the old password',
                        'token' => $this->security->get_csrf_hash()
                    ];
                    json_output($params, 200);
                }
            } else {
                $params = [
                    'type' => 'validation',
                    'err_old_pass' => 'Wrong Old Password',
                    'token' => $this->security->get_csrf_hash()
                ];
                json_output($params, 200);
            }
        }
    }

    private function to_change_password()
    {
        $id_pass = $this->input->post('id_pass');
        $user_new_pass = $_POST['new_pass'];
        $new_pass = password_hash($user_new_pass, PASSWORD_DEFAULT);
        $this->db->set('password', $new_pass)->where('id', $id_pass)->update('user');
        if ($this->db->affected_rows() > 0) {
            $params = [
                'type' => 'result',
                'status' => true,
                'msg' => 'Password berhasil di perbarui',
                'token' => $this->security->get_csrf_hash(),
                'redirect' => base_url('admin/profile')
            ];
        } else {
            $params = [
                'type' => 'result',
                'status' => false,
                'msg' => 'Password gagal di perbarui',
                'token' => $this->security->get_csrf_hash()
            ];
        }
        json_output($params, 200);
    }
}
