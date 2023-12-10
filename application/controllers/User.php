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
        $topicHeader = [];
        $data = [];

        $results = $this->Question_model->getChartValue();
        foreach ($results as $result){
            $jsonData = [
                $result['avg_value_1']*10,
                $result['avg_value_2']*10,
                $result['avg_value_3']*10,
                $result['avg_value_4']*10,
                $result['avg_value_5']*10,
            ];
            $labels = [
                ["Kemudahan", "untuk", "dipelajari"],
                ["Kemudahan", "untuk", "digunakan"],
                ["Jelas", "dan", "mudah", "dipahami"],
                ["Mudah", "hingga", "mahir"],
                ["xxx"]
            ];
            $chart_data = [
                'labels' => $labels,
                'datasets' => [
                    [
                        'label' => 'Average Answer',
                        'backgroundColor' => '#4e73df',
                        'hoverBackgroundColor' => '#2e59d9',
                        'borderColor' => '#4e73df',
                        'data' => $jsonData
                    ],
                ],
            ];

            $options = [
                'responsive' => true,
            ];
            $topicHeader[] = [
                'data' => json_encode($chart_data),
                'subTitle' => $result['topic_name'],
                "options" => json_encode($options)
            ];
        }

        
        $rows = $this->Answer_model->GetAnswerDetails();

        $groupedData = [];
        foreach ($rows as $row) {
            $userName = $row['user_name'];
            $topicTitle = $row['topic_title'];
            $questionText = $row['questioner_text'];
            $answerValue = $row['value'];

            $groupedData[$userName][$topicTitle][$questionText] = $answerValue;
        }

        $result = [];
        foreach ($groupedData as $userName => $topics) {
            $userRow = ['user_name' => $userName];

            foreach ($topics as $topicTitle => $questions) {
                $topicAbbreviation = '';
                foreach (explode(' ', $topicTitle) as $word) {
                    $topicAbbreviation .= strtoupper(substr($word, 0, 1));
                }

                $questionIndex = 1;
                foreach ($questions as $questionText => $answerValue) {
                    $columnName = $topicAbbreviation . ($questionIndex > 1 ? $questionIndex : '');
                    $userRow[$columnName] = $answerValue;
                    $questionIndex++;
                }
            }

            $result[] = $userRow;
        }

        // echo '<pre>';
        // highlight_string(var_export($result, true));
        // echo '</pre>';
        // die;
        $data['chart_data'] = $topicHeader;
        $data['title'] = 'Hasil Kuesioner';
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['result_tables'] = $result;
        $this->load->view('templates/admin-header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/hasil_kuesioner', $data);
        $this->load->view('templates/footer', $data);
    }

}