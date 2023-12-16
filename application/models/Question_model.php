<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Move to model folder
class Question_model extends CI_Model
{
    public function CreateQuestion()
    {
        // Question must be array
        $questions = $this->input->post('questions');
        $data = array();
        foreach ($questions as $question) {
            $data[] = array(
                'question_text' => $question,
            );
        }
        $this->_insertBatchQuestion($data);
    }

    public function ViewQuestion()
    {
        $question = $this->_getQuestion();
        return $question;
    }

    public function getAnswerId($id)
    {
        $this->db->select('*');
        $this->db->from('answers');
        $this->db->where('user_id', $id);
        $query = $this->db->get();
        return $query->result();
    }

    public function checkUserAnswer($answerId)
    {
        $this->db->select('*');
        $this->db->from('answer_details');
        $this->db->where('answer_id	', $answerId);
        $this->db->order_by('id', 'desc');
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->result();
    }

    public function countAnswered($answerId)
    {
        $this->db->select('count(*) as count');
        $this->db->from('answer_details');
        $this->db->where('answer_id', $answerId);
        $query = $this->db->get();
        return $query->result();
    }

    public function getFirstQuestion()
    {
        $this->db->select('questioners.*, topics.title, topics.sub_title');
        $this->db->from('questioners');
        $this->db->join('topics', 'questioners.topic_id = topics.id');
        $this->db->order_by('questioners.id', 'asc');
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->row(); // Return the first row as an object
    }

    // Fetch the next question based on the last question ID
    public function getCurrentQuestion($lastQuestionId)
    {
        $this->db->select('questioners.*, topics.title, topics.sub_title');
        $this->db->from('questioners');
        $this->db->join('topics', 'questioners.topic_id = topics.id');
        $this->db->where('questioners.id >', $lastQuestionId); // Fetch next question after the last question ID
        $this->db->order_by('questioners.id', 'asc');
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->row(); // Return the next row as an object
    }

    public function getQuestionnaireWithAverage()
    {
        $this->db->select('questioners.id, questioners.questioner_text, COUNT(answer_details.questioners_id) AS answer_count, AVG(answer_details.value) AS average_value');
        $this->db->from('questioners');
        $this->db->join('answer_details', 'questioners.id = answer_details.questioners_id', 'left');
        $this->db->group_by('questioners.id, questioners.questioner_text');
        $query = $this->db->get();
        $results = $query->result();

        return $results;
    }

    public function getQuestionnaireWithAverageByTopicId($topics)
    {
        $this->db->select('questioners.id, questioners.questioner_text, COUNT(answer_details.questioners_id) AS answer_count, AVG(answer_details.value) AS average_value');
        $this->db->from('questioners');
        $this->db->join('answer_details', 'questioners.id = answer_details.questioners_id', 'left');
        $this->db->where('topic_id', $topics);
        $this->db->group_by('questioners.id, questioners.questioner_text');
        $query = $this->db->get();
        $results = $query->result();

        return $results;
    }
    public function getAllTopic(){
        $this->db->select('topics.*');
        $this->db->from('topics');
        $this->db->join('questioners', 'questioners.topic_id = topics.id');
        $this->db->group_by('topics.id');
        $query = $this->db->get();
        $results = $query->result();

        return $results;
    }
    public function getAvfByTopic()
    {
        $query = $this->db->select('questioners.id, questioners.questioner_text AS question_title, COUNT(answer_details.questioners_id) AS answer_count, AVG(answer_details.value) AS average_value')
            ->from('questioners')
            ->join('answer_details', 'questioners.id = answer_details.questioners_id', 'left')
            ->group_by('questioners.id, questioners.questioner_text')
            ->get();

        $result = $query->result_array();
    }
    public function getChartValue(){
        $sql = "
                SELECT
                t.sub_title AS topic_title,
                q.questioner_text,
                ad.value AS answer_value
            FROM
                topics t
            JOIN
                questioners q ON t.id = q.topic_id
            LEFT JOIN
                answer_details ad ON q.id = ad.questioners_id
            LEFT JOIN
                answers a ON ad.answer_id = a.id;
        ";
        $query = $this->db->query($sql);
        $result = $query->result_array();

        $splitResults = [];
        $data = [];

        foreach ($result as $row) {
            $topicTitle = $row['topic_title'];
            $questionerText = $row['questioner_text'];

            // Check if the topic title key exists
            if (!isset($splitResults[$topicTitle])) {
                $splitResults[$topicTitle] = [];
            }

            // Check if the questioner text key exists for the current topic
            if (!isset($splitResults[$topicTitle][$questionerText])) {
                $splitResults[$topicTitle][$questionerText] = [
                    'answer_counts' => [],
                    'total' => 0
                ];
            }
            $splitResults[$topicTitle][$questionerText]['total']++;

            // Count the occurrences of each answer value
            if (!isset($splitResults[$topicTitle][$questionerText]['answer_counts'][$row['answer_value']])) {
                $splitResults[$topicTitle][$questionerText]['answer_counts'][$row['answer_value']] = 1;
            } else {
                $splitResults[$topicTitle][$questionerText]['answer_counts'][$row['answer_value']]++;
            }
        }

        $newData = [];
        foreach ($splitResults as $topicTitle => $questions) {
            foreach ($questions as $questionerText => $data) {
                foreach ($data['answer_counts'] as $answer => $count) {
                    $average = $count / $data['total'];
                    $splitResults[$topicTitle][$questionerText]['averages'][$answer] = $average;
                }
            }
        }
     
        return $splitResults;
    }
    
    public function getTopics(){
        $this->db->select('*');
        $this->db->from('topics');
        $query = $this->db->get();
        return $query->result();
    }

    public function save_question($data) {
        // Insert question data into the database
        $this->db->insert('questioners', $data);
    }

    public function get_question_by_id($id) {
        // Get question by ID from the database
        $this->db->where('id', $id);
        return $this->db->get('questioners')->row();
    }

    public function update_question($id, $data) {
        // Update question by ID in the database
        $this->db->where('id', $id);
        $this->db->update('questioners', $data);
    }

    public function delete_question($id) {
        // Delete question by ID from the database
        $this->db->where('id', $id);
        $this->db->delete('questioners');
    }

    public function save_topic($data) {
        // Insert topic data into the database
        $this->db->insert('topics', $data);
    }

    public function get_topic_by_id($id) {
        // Get topic by ID from the database
        $this->db->where('id', $id);
        return $this->db->get('topics')->row();
    }

    public function update_topic($id, $data) {
        // Update topic by ID in the database
        $this->db->where('id', $id);
        $this->db->update('topics', $data);
    }

    public function delete_topic($id) {
        // Delete question by ID from the database
        $this->db->where('id', $id);
        $this->db->delete('topics');
    }
    

    private function _insertBatchQuestion($data)
    {
        $this->db->insert_batch('questioners', $data);
    }

    private function _getQuestion()
    {
        $this->db->select('questioners.questioner_text, questioners.id,questioners.indicator, topics.title, topics.sub_title');
        $this->db->from('questioners');
        $this->db->join('topics', 'questioners.topic_id = topics.id');
        $this->db->order_by('questioners.id', 'asc');
        $this->db->order_by('questioners.id', 'asc');
        $query = $this->db->get();
        return $query->result();
    }




}
