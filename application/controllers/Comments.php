<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comments extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("m_data");
    }

    public function index() {
        $this->load->view("home.php");
    }

    function ambil_data() {
        $response = $this->m_data->getComment();
        echo json_encode($response);
    }

    function tambah() {
        $response = $this->m_data->saveComment();
        echo json_encode($response);
    }
}
