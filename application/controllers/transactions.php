<?php

class Transactions extends CI_Controller {

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
        $this->load->view('transactions_view');
        $this->load->view('footer');
    }

    public function initial_submit() {

        $user_id = $_SESSION['user_id'];

        $this->load->model('transactions_model');
        $this->load->model('peers_model');
        $this->load->model('user_model');
        $this->load->model('categories_model');
        $this->load->model('transactions_categories_model');
        $expenditure = $this->input->post('expenditure');
        $date = $this->input->post('date');
        $transaction_notes = $this->input->post('transaction_notes');
        $money_deduct = $this->input->post('money_deduct');
        if ($money_deduct == 0) {
            $expenditure = -$expenditure;
        }
        $num_categories = $this->input->post('num_categories');

        $peer = $this->input->post('peer');
        if ($peer == 0) {
            $peer_id = 0;
        } else {
            $peer_name = $this->input->post('peer_name');
            $peer_id = $this->peers_model->get_peer_id($user_id, $peer_name);
            if ($peer_id == 0) {
                $this->peers_model->create_peer($user_id, $peer_name);
                $peer_id = $this->peers_model->get_peer_id($user_id, $peer_name);
            }
        }

        $hand = $this->input->post('hand');

        if ($peer_id != 0) {
            $this->peers_model->update_peer($user_id, $peer_id, $expenditure);
        }
        $transaction_id = $this->transactions_model->add_transaction($user_id, $expenditure, $date, $peer_id, $transaction_notes);
        if ($hand == 1) {
            $this->user_model->update_user_hand($user_id, $expenditure);
        }

        if ($hand == 0) {
            $this->user_model->update_user_bank($user_id, $expenditure);
        }

        for ($i = 1; $i <= $num_categories; $i++) {
            $varname = "category" . $i;

            $category = $this->input->post($varname);

            $category_id = $this->categories_model->get_category_id($category, $user_id);
            if ($category_id == 0) {
                $category_id = $this->categories_model->create_category($category, $user_id);
            } {
                $this->transactions_categories_model->add_transactions_categories($transaction_id, $category_id);
            }
        }
        
       $data = new stdClass();
       $data->success =true ;
       echo json_encode($data);
    }

    public function withdrawal() {

        $user_id = $_SESSION['user_id'];

        $this->load->model('transactions_model');
        $this->load->model('withdrawals_model');
        $this->load->model('user_model');
        $withdrawal_amount = $this->input->post('withdrawal_amount');
        $withdrawal_date = $this->input->post('withdrawal_date');
        $withdrawal_flag = $this->input->post('withdrawal_flag');

        if ($withdrawal_flag == 0) {
            $withdrawal_amount = -$withdrawal_amount;
        }
        $this->transactions_model->add_transaction($user_id, $withdrawal_amount, $withdrawal_date, 0, 'transaction involving withdrawal');
        $this->transactions_model->add_transaction($user_id, -$withdrawal_amount, $withdrawal_date, 0, 'transaction involving withdrawal');

        $this->user_model->update_user_hand($user_id, -$withdrawal_amount, $withdrawal_date);
        $this->user_model->update_user_bank($user_id, $withdrawal_amount, $withdrawal_date);

        $this->withdrawals_model->add_withdrawal($user_id, $withdrawal_amount, $withdrawal_date);
         $data = new stdClass();
       $data->success =true ;
       echo json_encode($data);
        
    }

    public function credit() {

        $user_id = $_SESSION['user_id'];

        $this->load->model('transactions_model');
        $this->load->model('peers_model');
        $credit_amount = $this->input->post('credit_amount');
        $credit_date = $this->input->post('credit_date');
        $credit_name = $this->input->post('credit_name');
        $credit_flag = $this->input->post('credit_flag');
        $hand = $this->input->post('hand');
        if ($credit_flag == 0) {
            $credit_amount = -$credit_amount;
        }
        if ($credit_amount >= 0) {
            $credit_message = "recieved money from";
        } else {
            $credit_message = "given money to ";
        }
        $transaction_note = $credit_message . " " . $credit_name;

        $peer_id = $this->peers_model->get_peer_id($user_id, $credit_name);
        $this->transactions_model->add_transaction($user_id, $credit_amount, $credit_date, $peer_id, $transaction_note);

        $this->peers_model->update_peer($peer_id, $user_id, -$credit_amount);
        $data = new stdClass();
       $data->success =true ;
       echo json_encode($data);
    }

}
