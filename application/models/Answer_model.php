<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Move to model folder

class Answer_model extends CI_Model{
    // public function CreateAnswer($answers){
    //     $userId = $this->session->userdata('user_id');
    //     $userData = [
    //         'user_id' => $userId,
    //     ];
    //     $answerId = $this->insertUserIdToAnswer($userData);
    //     $this->insertBatchAnswer($answers);
    // }

    // public function CreateAnswer($answer){
    //     $userId = $this->session->userdata('user_id');
    //     $userData = [
    //         'user_id' => $userId,
    //     ];
        
    // }
    public function isDataExists($criteria) {
        $this->db->where($criteria);
        $query = $this->db->get('answer_details');

        return array_column($query->result(), 'id');
    }


    public function CreateAnswer($data) {
        $answer = $this->isDataExists(['user_id' => $data['user_id']]);
        if (empty($answer)) {
            $this->db->insert('answer_details', $data);
            return $this->db->result_id(); // Successfully inserted
        } else {
            return $answer['id']; // Data already exists
        }
    }

    public function updateRecordById($id, $data, $tableName) {
        $this->db->where('id', $id);
        $this->db->update($tableName, $data);
        return $this->db->affected_rows(); // Return the number of affected rows
    }
    
    public function CreateAnswerDetails($answer){
        $this->db->insert('answer_details', $answer);
    }

    public function GetAnswerDetails(){
        $sql = "
        SELECT
            u.id AS user_id,
            u.name AS user_name,
            t.title AS topic_title,
            q.questioner_text,
            a.id AS answer_id,
            ad.value
        FROM
            users u
        JOIN
            answers a ON u.id = a.user_id
        JOIN
            answer_details ad ON a.id = ad.answer_id
        JOIN
            questioners q ON q.id = ad.questioners_id
        JOIN
            topics t ON t.id = q.topic_id
        ORDER BY
            u.id;
    
        ";
        $query = $this->db->query($sql);
        $result = $query->result_array();

        return $result;
    }

    private function insertBatchAnswer($data){
        $this->db->insert_batch('answer_details', $data);
    }

    private function insertUserIdToAnswer($userId){
        $this->db->insert('answers', $userId);
        return $this->db->insert_id();
    }
}