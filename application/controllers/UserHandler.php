<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserHandler extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index(){
        if ($this->input->method() == 'post'){
        }else{
            // Handle post request
            $this->handleVoteWithGetRequest();
        }
    }

    private function handleVoteWithGetRequest(){
        $this->load->view('votes/index');
    }
}