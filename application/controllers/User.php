<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        // $this->load->library('input');
        $this->load->model('Question_model');
        $this->load->model('Answer_model');
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('users', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }

    public function profile()
    {
        $data['title1'] = 'Profile';
        $data['user'] = $this->db->get_where('users', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->view('templates/admin-header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/profile', $data);
        $this->load->view('templates/footer');
    }

    public function draft_kuesioner()
    {
        $data['title'] = 'Kuesioner';
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['questions'] = $this->Question_model->ViewQuestion();
        $this->load->view('templates/admin-header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/draft_kuesioner', $data);
        $this->load->view('templates/footer');
    }

    public function hasil_kuesioner()
    {
        $labels = [];
        $data = [];
        $topicHeader = [];
        $questions = [];
        // $dataChartBar =  $this->Question_model->getQuestionnaireWithAverage();
        $topics =  $this->Question_model->getAllTopic();
        // getQuestionnaireWithAverageByTopicId
        
        foreach ($topics as $topic) {
            $dataChartBar = $this->Question_model->getQuestionnaireWithAverageByTopicId( $topic->id );
            foreach ($dataChartBar as $row) {
                $labels[] = $row->id; // Assuming 'question_title' holds the title of questions
                $data[] =  ($row->average_value / 5) * 100 ;
                $questions[] = [ 'id' =>  $row->id,
                                    'question' => $row->questioner_text ];// Assuming 'average_value' holds the average value
            }
    
            $chart_data = [
                'labels' => $labels,
                'datasets' => [
                    [
                        'label' => 'Average Answer',
                        'backgroundColor' => '#4e73df',
                        'hoverBackgroundColor' => '#2e59d9',
                        'borderColor' => '#4e73df',
                        'data' => $data,
                    ],
                ],
            ];

            $topicHeader[] = [
                'subTitle' =>  $topic->sub_title,
                'list_questions' => $questions,
                'data' => json_encode($chart_data)
            ];

        }

        // echo '<pre>';
        // highlight_string(var_export($topicHeader, true));
        // echo '</pre>';
        // die;

       

        $data['chart_data'] = $topicHeader;
        $data['title'] = 'Hasil Kuesioner';
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['questions'] = $this->Question_model->getQuestionnaireWithAverage();

        $this->load->view('templates/admin-header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/hasil_kuesioner', $data);
        $this->load->view('templates/footer', $data);
    }
}
