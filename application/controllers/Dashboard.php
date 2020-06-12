<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * This controller can be accessed
 * for admin only
 */
class Dashboard extends CI_Controller {

    public function index():void
    {
        //if user logged in
        if (!$this->session->userdata("logged_in")) {
            redirect("auth");
        }
        //if user is not admin kick out from dashboard
        if ($this->session->userdata("logged_in") && !$this->session->userData('role')=='Admin') {
            redirect("hobbies");
        }
        $this->load->model('HobbiesModel', 'hobMod');
        $data['users']=$this->hobMod->get_users();
        $data['subHobby']=$this->hobMod->get_subhobbies();
        $data['uCount']=$this->hobMod->get_count();
        $this->load->view('header');
        $this->load->view('navbar');
        $this->load->view('dashboard',$data);
        $this->load->view('footer');
    }

}