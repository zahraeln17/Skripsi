<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Votes extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        // $this->load->library('input');
    }

    public function index(){
        $this->load->model('Question_model');
        $data['questions'] = $this->Question_model->ViewQuestion();

        $data['title'] = 'Votes';
        $this->load->view('templates/header', $data);
        $this->load->view('votes/votes', $data);
        $this->load->view('templates/footer');
    }

}