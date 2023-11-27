<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Answer extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function CreateAnswers(){
        // Question must be array
        $data = array(
            'questioners_id' => $this->input->post('question_id'),
            'value' => $this->input->post('value'),
        );

        $user_answers[] = $data;
        $this->session->set_userdata('answerdata', $user_answers);
    }
    
    public function SaveAnswersData(){
        $userData = [
            'user_id' => $this->session->userdata('user_id'),
        ];
        $answerId = $this->_createData('answers', $userData);

        $data = $this->session->userdata('answerdata');
        $this->_insertBatchAnswers($data);
    }

    private function _insertBatchAnswers($data){
        $this->db->insert_batch('answer_details', $data);
    }
    
    private function _createData($table, $data){
        $query = $this->db->insert($table, $data);
        return $this->db->insert_id();
    }
}