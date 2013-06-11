<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class about extends CI_Controller {
    public function index() {

        $config['base_url'] = base_url() . "about/";
        $this->load->view('aboutview.php');

    }

}