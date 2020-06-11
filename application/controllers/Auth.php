<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * This controller can be accessed
 * for (all) non logged in users
 */
class Auth extends CI_Controller {

    public function logged_in_check()
    {
        if ($this->session->userdata("logged_in")) {
            redirect("welcome");
        }
    }

    public function index()
    {
        $this->logged_in_check();

        $this->load->library('form_validation');
        $this->form_validation->set_rules("user_email", "Email", "trim|required|valid_email");
        $this->form_validation->set_rules("password", "Password", "trim|required");
        if ($this->form_validation->run() == true)
        {
            $this->load->model('AuthModel', 'auth');
            // check the username & password of user
            $status = $this->auth->validate();
            if ($status == ERR_INVALID_USERNAME) {
                $this->session->set_flashdata("error", "Email is invalid");
            }
            elseif ($status == ERR_INVALID_PASSWORD) {
                $this->session->set_flashdata("error", "Password is invalid");
            }
            else
            {
                // success
                // store the user data to session
                $this->session->set_userdata($this->auth->get_data());
                $this->session->set_userdata("logged_in", true);
                // redirect to dashboard
                redirect("welcome");
            }
        }

        $this->load->view("header");
        $this->load->view("navbar");
        $this->load->view("auth");
        $this->load->view("footer");
    }

    public function logout()
    {
        $this->session->unset_userdata("logged_in");
        $this->session->sess_destroy();
        redirect("auth");
    }

}