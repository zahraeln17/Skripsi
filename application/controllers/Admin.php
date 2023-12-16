<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        // $this->load->library('input');
        $this->load->model('Question_model');
        $this->load->model('Answer_model');
    }

    public function dashboard(){
        if ($this->input->method() == 'get'){
            $this->dashboardHandler();
        }
    }

    private function dashboardHandler(){
        $data['title'] = 'Dashboard';

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
                COALESCE(SUM(CASE WHEN (s.class = '2022') THEN 1 ELSE 0 END), 0) AS angkatan_2022
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


        $this->load->view('templates/admin-header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
        
    }

    public function CreateQuestion(){
        $data['title'] = 'Tambah Kuesioner';
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['topics'] = $this->Question_model->getTopics();
        $this->load->view('templates/admin-header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/createQuestion', $data);
        $this->load->view('templates/footer');
    }

    public function save_question() {
        $data = array(
            'topic_id' => $this->input->post('topicTitle'),
            'indicator' => $this->input->post('indicator'),
            'questioner_text' => $this->input->post('questionText')
        );
       
        $save = $this->Question_model->save_question($data);
        redirect('user/draft_kuesioner', 'refresh');
        // if ($save) {
        //     redirect('user/draft_kuesioner', 'refresh');
        // }else{
        //     redirect('admin/create_question', 'refresh');
        // }
        // Redirect or show success message
    }

    public function edit_question($id) {
        $data['title'] = 'Edit Kuesioner';
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['topics'] = $this->Question_model->getTopics();
        // Load question data by ID using your Question_model
        $data['question'] = $this->Question_model->get_question_by_id($id);

        //  echo '<pre>';
        // highlight_string(var_export( $data, true));
        // echo '</pre>';
        // die;
        $this->load->view('templates/admin-header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/editQuestion', $data);
        $this->load->view('templates/footer');
    }

    public function update_question() {
        // Get form data from POST request
        $id = $this->input->post('question_id');
        $data = array(
            'topic_id' => $this->input->post('topicTitle'),
            'indicator' => $this->input->post('indicator'),
            'questioner_text' => $this->input->post('questionText')
        );

        // Update question data using Question_model
        $save = $this->Question_model->update_question($id, $data);
        redirect('user/draft_kuesioner', 'refresh');
 
    }

    public function delete_question($id) {
        // Delete question by ID using your Question_model
        $this->Question_model->delete_question($id);
        redirect('user/draft_kuesioner', 'refresh');
        // Redirect or show success message
    }
    
    public function topic_index()
    {
        $data['title'] = 'Topics';
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['topics'] = $this->Question_model->getTopics();
        $this->load->view('templates/admin-header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/topic_index', $data);
        $this->load->view('templates/footer');
    }

    public function create_topic(){
        $data['title'] = 'New Topics';
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/admin-header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/topic_new', $data);
        $this->load->view('templates/footer');
    }

    public function save_topic() {
        $data = array(
            'title' => $this->input->post('topicTitle'),
            'sub_title' => $this->input->post('topicSubtitle')
        );
       
        $save = $this->Question_model->save_topic($data);
        redirect('admin/topic_index', 'refresh');
    }

    public function edit_topic($id) {
        $data['title'] = 'Edit Topic';
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        // Load question data by ID using your Question_model
        $data['topic'] = $this->Question_model->get_topic_by_id($id);

        //  echo '<pre>';
        // highlight_string(var_export( $data, true));
        // echo '</pre>';
        // die;
        $this->load->view('templates/admin-header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/topic_edit', $data);
        $this->load->view('templates/footer');
    }

    public function update_topic() {
        // Get form data from POST request
        $id = $this->input->post('topic_id');
        $data = array(
            'title' => $this->input->post('topicTitle'),
            'sub_title' => $this->input->post('topicSubtitle')
        );

        // Update question data using Question_model
        $save = $this->Question_model->update_topic($id, $data);
        redirect('admin/topic_index', 'refresh');
 
    }

    public function delete_topic($id) {
        // Delete question by ID using your Question_model
        $this->Question_model->delete_topic($id);
        redirect('admin/topic_index', 'refresh');
        // Redirect or show success message
    }

}