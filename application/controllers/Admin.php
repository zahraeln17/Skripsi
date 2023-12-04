<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        // $this->load->library('input');
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
}