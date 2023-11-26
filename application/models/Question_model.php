<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Move to model folder
class Question_model extends CI_Model{
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
        $this->db->select('questioners.questioner_text, topics.title');
        $this->db->from('questioners');
        $this->db->join('topics', 'questioners.topic_id = topics.id');
        $query = $this->db->get();
        return $query->result();
    }
}