<?php
defined('BASEPATH') or exit('No direct script access allowed');

class RegisterUser extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function RegisterStudent(){
        $userData = [
            'name' => htmlspecialchars($this->input->post('name', true)),
            'gender_id' => $this->input->post('gender_id'),
            'is_admin' => 0,
        ];
        $user = $this->_createData('users', $userData);

        $studentData = [
            'user_id' => $user,
            'nim' => $this->input->post('nim'),
            'prodi' => $this->input->post('prodi'),
            'class' => $this->input->post('class'),
        ];
        $student = $this->_createData('students', $studentData);
        $this->session->set_flashdata('regiterMsg', 'Register Student Success');
        $this->session->set_userdata($studentData);
    }

    public function RegisterLecture(){
        $userData = [
            'name' => htmlspecialchars($this->input->post('name', true)),
            'gender_id' => $this->input->post('gender_id'),
            'is_admin' => 0,
        ];
        $user = $this->_createData('users', $userData);

        $lectureData = [
            'user_id' => $user,
            'prodi' => $this->input->post('prodi'),
            'time_teaching' => $this->input->post('time_teaching'),
        ];
        $lecture = $this->_createData('students', $lectureData);
        $this->session->set_flashdata('regiterMsg', 'Register Lecture Success');
        $this->session->set_userdata($lectureData);
    }

    private function _createData($table, $data){
        $query = $this->db->insert($table, $data);
        return $this->db->insert_id();
    }
}