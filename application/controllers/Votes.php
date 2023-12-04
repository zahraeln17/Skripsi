<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Votes extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        // $this->load->library('input');
        $this->load->model('Question_model');
        $this->load->model('Answer_model');
    }

    public function index(){
        $userId = $this->session->userdata('user_id');
        $data['userId'] =   $userId;
        $data['countAnswered'] = 0;
        $data['totalQuestions'] =  $this->Question_model->ViewQuestion() ?  count($this->Question_model->ViewQuestion()) : 0;
        if (!$userId){
            redirect('register-user');
        }
        $gestAnswerIdByUser = $this->Question_model->getAnswerId($userId);
        if (!$gestAnswerIdByUser){
            redirect('register-user');
        }else{
            foreach ($gestAnswerIdByUser as $gestAnswerId){
                $answerId =  $gestAnswerId->id;
                $data['status'] = $gestAnswerId->status;
            }
        }
        // check if user ada pernah menjawab ?
        $previousAnswer = $this->Question_model->checkUserAnswer($answerId);    
        if (!$gestAnswerIdByUser || count($previousAnswer) == 0){
            $data['questions'] = $this->Question_model->getFirstQuestion();
        }else{
            foreach ($previousAnswer as $previousAnswerId){
                $lastQuestionId =  $previousAnswerId->questioners_id;
            }        

            $question = $this->Question_model->getCurrentQuestion($lastQuestionId);
            if (!$question){
                $data['questions'] = $this->Question_model->getCurrentQuestion(1);
            }else{
                $data['questions'] =  $question;
            }
           
            $data['countAnswered'] = $this->Question_model->countAnswered($answerId);
        }    
        // var_dump( $data['questions']);
        // die;
        $data['title'] = 'Votes';
        $this->load->view('templates/header', $data);
        $this->load->view('votes/votes', $data);
        $this->load->view('templates/footer');
    }

    public function home(){
        $data['title'] = 'Votes Dashboard';

        $sql = "
            SELECT
                COUNT(CASE WHEN u.is_admin = 0 THEN 1 END) AS count_user,
                COUNT(CASE WHEN g.name = 'Laki-laki' THEN 1 END) AS count_male,
                COUNT(CASE WHEN g.name = 'Perempuan' THEN 1 END) AS count_female,
                COALESCE(SUM(CASE WHEN (l.prodi = 'pilkom' OR s.prodi = 'pilkom') THEN 1 ELSE 0 END), 0) AS program_studi_pilkom,
                COALESCE(SUM(CASE WHEN (l.prodi = 'ilkom' OR s.prodi = 'ilkom') THEN 1 ELSE 0 END), 0) AS program_studi_ilkom,
                COALESCE(SUM(CASE WHEN (s.class = '2019') THEN 1 ELSE 0 END), 0) AS angkatan_2019,
                COALESCE(SUM(CASE WHEN (s.class = '2020') THEN 1 ELSE 0 END), 0) AS angkatan_2020,
                COALESCE(SUM(CASE WHEN (s.class = '2021') THEN 1 ELSE 0 END), 0) AS angkatan_2021,
                COALESCE(SUM(CASE WHEN (s.class = '2022') THEN 1 ELSE 0 END), 0) AS angkatan_2022,

            FROM
                users u
            LEFT JOIN
                genders g ON u.gender_id = g.id
            LEFT JOIN
                lectures l ON u.id = l.user_id
            LEFT JOIN
                students s ON u.id = s.user_id;
        ";
        $query = $this->db->query($sql);
        $result = $query->result_array();

        foreach ($result as $row) {
            $data['user'] =  $row['count_user'];
            $data['laki'] =  $row['count_male'];
            $data['cewe'] = $row['count_female'];
            $data['ilkom'] = $row['program_studi_ilkom'];
            $data['pilkom'] = $row['program_studi_pilkom'];
            $data['a2019'] = $row['angkatan_2019'];
            $data['a2020'] = $row['angkatan_2020'];
            $data['a2021'] = $row['angkatan_2021'];
            $data['a2022'] = $row['angkatan_2022'];
        }


        $this->load->view('templates/header', $data);
        $this->load->view('votes/home', $data);
        $this->load->view('templates/footer');
    }

    public function storeQuestionAnswer(){
        
        if ($this->input->method() == 'post'){
            $this->handleStoreAnswer();
        }
        
        redirect('votes', 'refresh');
        
    }

    private function handleStoreAnswer(){
        $userId = $this->session->userdata('user_id');
        $answer = $this->input->post('answer');
        $question_id = $this->input->post('questioners_id');
        // var_dump($answer, $question_id);
        // die;
        $data['userId'] =   $userId;
        if (!$userId){
            redirect('register-user');
        }
        $gestAnswerIdByUser = $this->Question_model->getAnswerId($userId);
        // check is this the last question ?
    
        if (!$gestAnswerIdByUser){
            redirect('register-user');
        }else{
            foreach ($gestAnswerIdByUser as $gestAnswerId){
                $answerId =  $gestAnswerId->id;
            }
        }

        $data = [
            'questioners_id' => $question_id,
            'answer_id' => $answerId,
            'value' => $answer
        ];
        $this->Answer_model->CreateAnswerDetails($data);

        $checkLastQuestion = $this->Question_model->getCurrentQuestion($question_id);
        if (!$checkLastQuestion){
            $data = array(
                'status' => 'finish'
            );
            $affectedRows = $this->Answer_model->updateRecordById($answerId, $data, 'answers');
        }
    }

}