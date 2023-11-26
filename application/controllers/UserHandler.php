<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserHandler extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        // $this->load->library('input');
    }

    public function index(){
        if ($this->input->method() == 'post'){
            $user_type = $this->input->post('user-type');
            if ($user_type == 'dosen'){
                $this->handleDosenRegisterRequest();
            }else if ($user_type == 'mhs'){
                $this->handleMhsRegisterRequest();
            }
            redirect('votes', 'refresh');
        }else{
            // Handle post request
            $this->handleVoteWithGetRequest();
        }
    }

    private function handleVoteWithGetRequest(){
        $data['title'] = 'User Register';
        $this->load->view('templates/auth-header', $data);
        $this->load->view('votes/index');
        $this->load->view('templates/auth-footer');
    }

    private function handleDosenRegisterRequest(){
        $userData = [
            'name' => htmlspecialchars($this->input->post('dosen-name', true)),
            'gender_id' => $this->input->post('jenis-kelamin'),
            'is_admin' => 0,
        ];
        $user = $this->_createData('users', $userData);

        $lectureData = [
            'user_id' => $user,
            'prodi' => $this->input->post('porgram-studi'),
            'time_teaching' => $this->input->post('time-teaching'),
        ];
        $lecture = $this->_createData('lectures', $lectureData);
        $this->session->set_flashdata('regiterMsg', 'Register Lecture Success');
        $this->session->set_userdata($lectureData);
    }

    private function handleMhsRegisterRequest(){
        $userData = [
            'name' => htmlspecialchars($this->input->post('student-name', true)),
            'gender_id' => $this->input->post('jenis-kelamin'),
            'is_admin' => 0,
        ];
        $user = $this->_createData('users', $userData);

        $studentData = [
            'user_id' => $user,
            'nim' => $this->input->post('student-nim'),
            'prodi' => $this->input->post('program-studi'),
            'class' => $this->input->post('angkatan'),
        ];
        $student = $this->_createData('students', $studentData);
        $this->session->set_flashdata('regiterMsg', 'Register Student Success');
        $this->session->set_userdata($studentData);
    }

    private function _createData($table, $data){
        $query = $this->db->insert($table, $data);
        return $this->db->insert_id();
    }
}