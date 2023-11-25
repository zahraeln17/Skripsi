<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Question extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function CreateQuestion(){
        // Question must be array
        $questions = $this->input->post('questions');
        $data = array();
        foreach($questions as $question){
            $data[] = array(
                'question_text' => $question,
            );
        }
        $this->_insertBatchQuestion($data);
    }

    public function ViewQuestion(){
        $question = $this->_getQuestion();
        return $question;
    }

    private function _insertBatchQuestion($data){
        $this->db->insert_batch('questioners', $data);
    }

    private function _getQuestion(){
        $query = $this->db->get('questioners');
        return $query->result();
    }
}