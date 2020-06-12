<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * This controller is the main page
 * for adding hobbies and sub hobbies
 * all the crud operations
 */

class Hobbies extends CI_Controller {

    public function __construct() {
        //load database in autoload libraries
        parent::__construct();
        $this->load->model('HobbiesModel', 'hobMod');
    }

    /**
     * index page for the controller
     */
    public function index():void
    {
        if (!$this->session->userdata("logged_in")) {
            redirect("auth");
        }
        $data['data']=$this->hobMod->get_hobbies();
        $data['subHobby']=$this->hobMod->get_subhobbies();
        $this->load->view('header');
        $this->load->view('navbar');
        $this->load->view('hobbies/list',$data);
        $this->load->view('footer');
    }

    /**
     * Create a hobby
     */
    public function create():void
    {
        $this->load->view('header');
        $this->load->view('navbar');
        if (!$this->session->userdata("logged_in")) {
            redirect("welcome");
        } else {
            $this->load->view('hobbies/create');
        }
        $this->load->view('footer');
    }

    /**
     * Store Data for Hobby.
     */
    public function store():void
    {
        $this->hobMod->insert_hobbies();
        redirect(base_url('hobbies'));
    }

    /**
     * Store Data for SubHobby.
     * @param $id string 'this will be the hobbyid'
     */
    public function storeSubHobby(string $id):void
    {
        $this->hobMod->insertSubHobby($id);
        redirect(base_url('hobbies'));
    }

    /**
     * Adding SubHobby.
     * @param $id string 'this will be hobby id'
     */
    public function addSubHobbies(string $id):void
    {
        $this->load->view('header');
        $this->load->view('navbar');
        if (!$this->session->userdata("logged_in")) {
            redirect("welcome");
        } else {
            $hobby = $this->db->get_where('hobby', array('id' => $id))->row();
            $this->load->view('hobbies/addSubHobby', array('hobby' => $hobby));
        }
        $this->load->view('footer');
    }

    /**
     * Edit Data from this method.
     * @param $id string 'this id will be hobby id'
     */
    public function edit(string $id):void
    {
        $this->load->view('header');
        $this->load->view('navbar');
        if (!$this->session->userdata("logged_in")) {
            redirect("welcome");
        } else {
            $hobby = $this->db->get_where('hobby', array('id' => $id))->row();
            $subhobby = $this->hobMod->get_subhobbies($id);
            $this->load->view('hobbies/edit',array('hobby'=>$hobby, 'subhobby' => $subhobby));
        }
        $this->load->view('footer');
    }

    /**
     * Update Data from this method.
     * @param $id string 'hobby id'
     **/
    public function update(string $id):void
    {
        $this->load->view('header');
        $this->load->view('navbar');
        if (!$this->session->userdata("logged_in")) {
            redirect("welcome");
        } else {
            $this->hobMod->update_hobbies($id);
            redirect(base_url('hobbies'));
        }
        $this->load->view('footer');
    }

    /**
     * Delete Data from this method for hobby.
     * @param $id string 'hobby id'
     */
    public function delete(string $id):void
    {
        if (!$this->session->userdata("logged_in")) {
            redirect("welcome");
        } else {
            $this->db->where('hid', $id);
            $this->db->delete('userhobby');
            $this->db->where('id', $id);
            $this->db->delete('hobby');
            redirect(base_url('hobbies'));
        }
    }
    /**
     * Delete Data from this method for sub hobby.
     * @param $id string 'this will be sub-hobby id'
     */
    public function deleteSubHobby(string $id):void
    {
        if (!$this->session->userdata("logged_in")) {
            redirect("welcome");
        } else {
            $this->db->where('id', $id);
            $this->db->delete('subhobby');
            redirect(base_url('hobbies'));
        }
    }
}