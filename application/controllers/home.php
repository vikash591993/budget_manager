<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!isset($_SESSION['user_id'])) {
            session_start();
        }
        $this->load->database();
    }

    public function index() {
        if (!isset($_SESSION['user_id'])) {
            $this->load->view('login_view');
        } else {
            $this->load->model('user_model');
            $this->load->model('transactions_model');
            $this->load->model('peers_model');
            $flag = 0;
            $present_month_date = date("Y-m-d");
            $previous_month_date = date('Y-m-d', strtotime(' -1 month'));
            $present_year_date = date("Y-m-d");
            $previous_year_date = date("Y-m-d", strtotime('-1 year'));
            $user_id = $_SESSION['user_id'];

            $user = $this->user_model->get_user($user_id);

            $name = $user->name;
            $money_in_bank = $user->cash_in_bank;
            $money_in_hand = $user->cash_in_hand;
            $notes = $user->important_notes;

            $yearly_total = $this->transactions_model->yearly_transactions($present_year_date, $previous_year_date, $user_id);
            $monthly_total = $this->transactions_model->monthly_transactions($present_month_date, $previous_month_date, $user_id);
            $total_expense = $this->transactions_model->total_expense($user_id);
            $money_left = $money_in_hand + $money_in_bank;
            $overall_money = $money_left + $total_expense;

            if (($money_in_hand < 0) || ($money_in_bank < 0)) {
                $flag = 1;
            }
            $approx_progress_value = ($total_expense / $overall_money) * 100;
            $progress_value = round($approx_progress_value);

            $top_expense['list'] = $this->transactions_model->top_5_expense($user_id);
            $peers_balance['list'] = $this->peers_model->peers_status($user_id);
            $user_data = array(
                'name' => $name,
                'cash_in_bank' => $money_in_bank,
                'cash_in_hand' => $money_in_hand,
                'starting_balance' => $money_in_bank + $money_in_hand,
                'monthly_sum' => $monthly_total,
                'yearly_sum' => $yearly_total,
                'total_expense' => $total_expense,
                'progress_value' => $progress_value,
                'flag' => $flag,
                'expense' => $top_expense['list'],
                'important_notes' => $notes,
                'peers_balance' => $peers_balance['list']
            );
            $this->load->view('navbar', $user_data);
            $this->load->view('home_view', $user_data);
            $this->load->view("footer");
        }
    }

    public function login_submit() {
        $this->load->model('user_model');
        $post_input = $this->input->post();
        $post_email = $post_input['email'];
        $post_password = md5($post_input['password']);

        $login_submit_response = $this->user_model->verify_user($post_email, $post_password);
        if (!$login_submit_response) {
            $data = new stdClass();
            $data->success = false;
            echo json_encode($data);
            exit();
        }

        $user_id = $login_submit_response->id;
        $_SESSION['user_id'] = $user_id;
        $data = new stdClass();
        $data->success = true;
        echo json_encode($data);
        exit();
    }

    public function register() {
        $this->load->view('register_view');
    }

    public function register_submit() {
        $this->load->model('user_model');
        $data = new stdClass();
        $name_error = $email_error = "";
        $post_input = $this->input->post();
        $starting_date = date("Y-m-d");
        $input_data = array(
            'name' => $post_input['name'],
            'email' => $post_input['email'],
            'password' => md5($post_input['password']),
            'starting_balance' => $post_input['cash_in_hand'] + $post_input['cash_in_bank'],
            'starting_date' => $starting_date,
            'cash_in_hand' => $post_input['cash_in_hand'],
            'cash_in_bank' => $post_input['cash_in_bank']
        );
        $name = $post_input['name'];
        $email = $post_input['email'];
        if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
            $name_error = "Only letters and white space allowed";
        }

        if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email)) {
            $email_error = "Invalid email format";
        }

        if ($name_error != "" || $email_error != "") {
            $data->success = false;
            echo json_encode($data);
        } else {
            $registration_submit_response = $this->user_model->verify_registration($input_data);
            if (!$registration_submit_response) {
                $this->user_model->insert($input_data);
                $data->success = true;
                echo json_encode($data);
            } else {
                $data->success = false;
                echo json_encode($data);
            }
        }
    }

    public function logout() {
        session_destroy();
        $url = base_url('home/index');
        header("Location:$url");
    }

    public function about_us() {
        $this->load->model('user_model');
        $user_id = $_SESSION['user_id'];

        $user = $this->user_model->get_user($user_id);

        $user_data = array(
            'name' => $user->name,
        );

        $this->load->view('navbar', $user_data);
        $this->load->view('about_us_view');
        $this->load->view('footer');
    }

    public function notes() {
        $this->load->model('user_model');
        $user_id = $_SESSION['user_id'];
        $data = new stdClass();
        $post_input = $this->input->post();
        $important_notes = $post_input['notes'];

        $this->user_model->save_notes($important_notes, $user_id);
        $data->success = true;
        echo json_encode($data);
    }

    public function help() {
        $this->load->model('user_model');
        $user_id = $_SESSION['user_id'];
        $user = $this->user_model->get_user($user_id);
        $name = $user->name;

        $user_data = array(
            'name' => $name,
        );
        $this->load->view('navbar', $user_data);
        $this->load->view('help');
        $this->load->view('footer');
    }

}
