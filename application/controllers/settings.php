<?php

class Settings extends CI_Controller {

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
        $this->load->view('navbar', $user_array);
        $this->load->view("settings_view");
    }

    public function change_password() {
        $user_id = $_SESSION['user_id'];
        $this->load->model('user_model');
        $data = $this->user_model->get_user($user_id);
        foreach ($data as $row) {
            $name = $row->name;
        }
        $user_array = array(
            'name' => $name,
        );
        $this->load->view('navbar', $user_array);
        $this->load->view("change_password_view");
        $this->load->view("footer");
    }

    public function check_password() {
        $user_id = $_SESSION['user_id'];

        $current_password = md5($this->input->post('current'));
        $new_password = md5($this->input->post('new'));

        $this->load->model("user_model");
        $reply = $this->user_model->verify_password($user_id, $current_password);
        if ($reply) {
            $this->user_model->update($user_id, $new_password);
            $user_id = $_SESSION['user_id'];
            $this->load->model('user_model');
            $data = $this->user_model->get_user($user_id);
            foreach ($data as $row) {
                $name = $row->name;
            }
            $user_array = array(
                'name' => $name,
            );
             $data_flag = new stdClass();
            $data_flag->success = true ;
            echo json_encode($data_flag);
           
        } else {
            $user_id = $_SESSION['user_id'];
            $this->load->model('user_model');
            $data = $this->user_model->get_user($user_id);
            foreach ($data as $row) {
                $name = $row->name;
            }
            $user_array = array(
                'name' => $name,
            );
            $data_flag = new stdClass();
            $data_flag->success = false ;
            echo json_encode($data_flag);
        }
    }

    public function deactivate_account() {

        $user_id = $_SESSION['user_id'];

        $this->load->model("deactivate_account_model");
        $this->deactivate_account_model->deactivate($user_id);
        if (isset($_SESSION))
            session_destroy();

        redirect(base_url('home'));
    }

}
