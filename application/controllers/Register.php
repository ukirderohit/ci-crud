<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * This controller can be used
 * for (all) non logged in users
 * to register for first time
 */
class Register extends CI_Controller {

    public function index()
    {
        $this->load->view("header");
        $this->load->view("navbar");
        $this->load->view("register");
        $this->load->view("footer");
    }

    /**
     * Check for valid data and insert
     * email and password using password hash
     */
    public function validation() {
        $this->load->library('form_validation');
        $this->load->model('registerModel', 'regMod');
        $this->form_validation->set_rules('user_email', 'Email Address', 'required|trim|valid_email|is_unique[user.username]');
        $this->form_validation->set_rules('user_password', 'Password', 'required');
        $this->form_validation->set_message('is_unique', 'Oops this email is already used');
        if($this->form_validation->run())
        {
            $encrypted_password = password_hash($this->input->post('user_password'), PASSWORD_DEFAULT);
            $data = array(
                'username'  => $this->input->post('user_email'),
                'password' => $encrypted_password
            );
            $id = $this->regMod->insert($data);
            if($id > 0)
            {
                redirect('dashboard');
            }
        }
        else
        {
            $this->index();
        }
    }

    /**
     * Logout and destroy session
     */
    public function logout()
    {
        $this->session->unset_userdata("logged_in");
        $this->session->sess_destroy();
        redirect("auth");
    }

}