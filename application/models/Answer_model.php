<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Move to model folder

class Answer_model extends CI_Model{
    public function CreateAnswer($answers){
        $userId = $this->session->userdata('user_id');
        $userData = [
            'user_id' => $userId,
        ];

        $answerId = $this->insertUserIdToAnswer($userData);
        $this->insertBatchAnswer($answers);
    }

    private function insertBatchAnswer($data){
        $this->db->insert_batch('answer_details', $data);
    }

    private function insertUserIdToAnswer($userId){
        $this->db->insert('answers', $userId);
        return $this->db->insert_id();
    }
}