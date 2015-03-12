<?php

class Error extends CI_Controller {

    public function __construct() {
        parent::__construct();
        session_start();
        if (!isset($_SESSION['user_id'])) {
            $url = base_url('home');
            header("Location:$url");
        }
        $this->load->database();
    }

    public function index() {
        $user_id = $_SESSION['user_id'];
            $this->load->model('user_model');
            $data = $this->user_model->get_user($user_id);
            foreach ($data as $row) {
                $name = $row->name;
            }
            $user_array = array(
                'name' => $name,
                
            );
        $this->load->view('navbar',$user_array);
        $this->load->view('error');
    }
}
