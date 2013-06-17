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
        $aff_rows = $this->db->affected_rows();

        if ($aff_rows > 0) {
            $this->output->set_output(json_encode(array("status" => 1, "message" => "Profile successfuly updated.")));
        } else {
            $this->output->set_output(json_encode(array("status" => 0, "message" => "Failed to update profile information.")));
        }
    }

    /* Account Settings -- Password */

    public function account() {
        $this->load->view('admin/settings/account_view');
    }

    public function change_password() {

        $this->load->library('Mlib_sec');

        $old_password = $this->input->post('oldpassword');
        $new_password = $this->input->post('newpassword');

//            $attempts = 3;

        $this->db->select('salt,password');
        $sql = $this->db->get_where('pre_users', array('id' => $this->session->userdata('uid')));
        $result = $sql->result();

        $format = PBKDF2_HASH_ALGORITHM . ":" . PBKDF2_ITERATIONS . ":" . $result[0]->salt . ":" . $result[0]->password;
        $is_valid = $this->mlib_sec->validate_password($old_password, $format);

        if ($is_valid === TRUE) {

            $hashed = $this->mlib_sec->create_hash($new_password);
            $hashed_parts = explode(":", $hashed);

            $array = array(
                'password' => $hashed_parts[3],
                'salt' => $hashed_parts[2]
            );

            $this->db->where('id', $this->session->userdata('uid'));
            $this->db->update('pre_users', $array);
            $aff_rows = $this->db->affected_rows();

            if ($aff_rows == 1) {
                $this->output->set_output(json_encode(array("status" => 1, "message" => "New password saved.")));
            } else {
                $this->output->set_output(json_encode(array("status" => 0, "message" => "Unable to update account information.  Please try again later.")));
            }
        } else {
            $this->output->set_output(json_encode(array("status" => 0, "message" => "Wrong information provided.")));
        }
    }

}