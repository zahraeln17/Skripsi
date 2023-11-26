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

    public function getAnswerId($id){
        $this->db->select('*');
        $this->db->from('answers');
        $this->db->where('user_id', $id);
        $query = $this->db->get();
        return $query->result();
    }

    public function checkUserAnswer($answerId){
        $this->db->select('*');
        $this->db->from('answer_details');
        $this->db->where('answer_id	', $answerId);
        $this->db->order_by('id', 'desc');
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->result();
    }

    public function countAnswered($answerId){
        $this->db->select('count(*) as count');
        $this->db->from('answer_details');
        $this->db->where('answer_id', $answerId);
        $query = $this->db->get();
        return $query->result();
    }

    public function getFirstQuestion() {
        $this->db->select('questioners.*, topics.title, topics.sub_title');
        $this->db->from('questioners');
        $this->db->join('topics', 'questioners.topic_id = topics.id');
        $this->db->order_by('questioners.id', 'asc');
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->row(); // Return the first row as an object
    }

     // Fetch the next question based on the last question ID
     public function getCurrentQuestion($lastQuestionId) {
        $this->db->select('questioners.*, topics.title, topics.sub_title');
        $this->db->from('questioners');
        $this->db->join('topics', 'questioners.topic_id = topics.id');
        $this->db->where('questioners.id >', $lastQuestionId); // Fetch next question after the last question ID
        $this->db->order_by('questioners.id', 'asc');
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->row(); // Return the next row as an object
    }
    
    public function getQuestionnaireWithAverage() {
        $this->db->select('questioners.id, questioners.questioner_text, COUNT(answer_details.questioners_id) AS answer_count, AVG(answer_details.value) AS average_value');
        $this->db->from('questioners');
        $this->db->join('answer_details', 'questioners.id = answer_details.questioners_id', 'left');
        $this->db->group_by('questioners.id, questioners.questioner_text');
        $query = $this->db->get();
        $results = $query->result();

        return $results;
    }
    private function _insertBatchQuestion($data){
        $this->db->insert_batch('questioners', $data);
    }

    private function _getQuestion(){
        $this->db->select('questioners.questioner_text, questioners.id, topics.title, topics.sub_title');
        $this->db->from('questioners');
        $this->db->join('topics', 'questioners.topic_id = topics.id');
        $query = $this->db->get();
        return $query->result();
    }
}