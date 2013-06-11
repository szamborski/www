<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class kontakt extends CI_Controller {
    public function index() {

        $config['base_url'] = base_url() . "kontakt/";
        $this->load->view('kontaktview.php');
    }

}