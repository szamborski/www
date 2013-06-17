<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Rejestracja extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("Usersq", "uq");
        $this->load->helper("file");
    }

    public function index() {
        $this->profile();
    }

    public function profile() {
        $data['profile'] = $this->uq->fetch_confirmed_user_profile_by_id($this->session->userdata('uid'));
        $this->load->view('admin/rejestracja_view', $data);
    }

    public function create_profile() {
        //Przypisanie wprowadzonych danych  do zmiennych
        $login = $this->input->post('login');
        $newpassword = $this->input->post('newpassword');
        // $newpassword_c = $this->input->post('$newpassword_c');
        $lastname = $this->input->post('lastname');
        $firstname = $this->input->post('firstname');
        $email = $this->input->post('email');
        $contact = $this->input->post('contact');
        $address = $this->input->post('address');

        //Funkcja hashujaca i tworzaca sól, najwiecej pitolenia z tym mialem....
        $this->load->library('Mlib_sec');
        
        //  $new_password = $this->input->post('newpassword');
        $hashed = $this->mlib_sec->create_hash($newpassword);
        $hashed_parts = explode(":", $hashed);


        $data = array(
            'username' => $login,
            'password' => $hashed_parts[3],
            //'password' => $newpassword,
            'salt' => $hashed_parts[2],
            'lastname' => $lastname,
            'firstname' => $firstname,
            'email' => $email,
            'contact' => $contact,
            'address' => $address,
        );

        //$this->db->where('id', $this->session->userdata('uid'));

        $this->db->insert('pre_users', $data);
    }

    /* Account Settings -- Password */

    public function account() {
        $this->load->view('admin/settings/account_view');
    }
}