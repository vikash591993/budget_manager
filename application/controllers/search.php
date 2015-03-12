<?php

class Search extends CI_Controller {

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
        $this->load->model('user_model');
        $user_id = $_SESSION['user_id'];
        $user = $this->user_model->get_user($user_id);
        $name = $user->name;

        $user_data = array(
            'name' => $name,
        );

        $this->load->view('navbar', $user_data);
        $this->load->view("search_view");
        $this->load->view("footer");
    }

    public function search() {
        $this->load->model('user_model');
        $this->load->model("search_model");
        $user_id = $_SESSION['user_id'];
        $post_input = $this->input->post();
        $peer = $post_input['by_peer'];
        $start_date = $post_input['by_date1'];
        $end_date = $post_input['by_date2'];
        $category = $post_input['by_category'];
        $min_expense = $post_input['by_expense1'];
        $max_expense = $post_input['by_expense2'];

        if ($peer == NULL && $start_date == NULL && $end_date == NULL && $category == NULL && $min_expense == NULL && $max_expense == NULL) {
            $url = base_url('search');
            header("Location:$url");
        } else {
            if ($peer == NULL) {
                $peer_query = " ";
            } else {
                $peer_query = "peers.name='$peer' and ";
            }

            if ($start_date == NULL || $end_date == NULL) {
                if ($start_date == NULL && $end_date == NULL) {
                    $date_query = " ";
                } else {
                    if ($end_date == NULL) {
                        $date_query = "transactions.date ='$start_date 'and ";
                    } else {
                        $date_query = "transactions.date ='$end_date 'and ";
                    }
                }
            } else {
                $date_query = "transactions.date between '$start_date' and '$end_date' and ";
            }
            if ($category == NULL) {
                $category_query = " ";
            } else {
                $category_query = "categories.name= '$category' and ";
            }

            if ($min_expense == NULL || $max_expense == NULL) {
                if ($min_expense == NULL && $max_expense == NULL) {
                    $expense_query = " ";
                } else {
                    if ($max_expense == NULL) {
                        $expense_query = "transactions.expense ='$min_expense 'and ";
                    } else {
                        $expense_query = "transactions.expense ='$max_expense 'and ";
                    }
                }
            } else {
                $expense_query = "transactions.expense between '$min_expense' and '$max_expense' and ";
            }

            $search_data['list'] = $this->search_model->complete_search($user_id, $expense_query, $peer_query, $category_query, $date_query);


            if (!$search_data['list']) {
                $user = $this->user_model->get_user($user_id);
                $name = $user->name;
                $user_data = array(
                    'name' => $name,
                );
                $this->load->view('navbar', $user_data);
                $this->load->view("search_failed");
            } else {
                $user = $this->user_model->get_user($user_id);
                $name = $user->name;
                $user_data = array(
                    'name' => $name,
                );
                $this->load->view('navbar', $user_data);
                $this->load->view("search_output_view", $search_data);
                $this->load->view('footer');
            }
        }
    }

    public function delete() {
        $this->load->model('user_model');
        $this->load->model('transactions_model');
        $this->load->model('transactions_categories_model');
        $user_id = $_SESSION['user_id'];
        $count = $this->input->post('count');
        $flag = 0;

        for ($count; $count >= 1; $count--) {
            $varname1 = "delete" . $count;
            $varname2 = "permanent" . $count;
            $varname3 = "hand" . $count;

            $transaction_id = $this->input->post($varname1);
            $permanent = $this->input->post($varname2);
            $hand = $this->input->post($varname3);



            if ($transaction_id != NULL && $permanent != 1) {
                $flag = 1;
                $this->transactions_categories_model->delete_transactions_categories($transaction_id);
                $this->transactions_model->delete_transaction($user_id, $transaction_id);
            }
            if ($transaction_id != NULL && $permanent == 1) {
                $flag = 1;
                $expense = $this->transactions_model->get_expense_by_id($user_id, $transaction_id);
                $this->transactions_categories_model->delete_transactions_categories($transaction_id);
                $this->transactions_model->delete_transaction($user_id, $transaction_id);


                if ($hand == 1) {
                    $this->user_model->update_user_hand($user_id, -$expense);
                }
                if ($hand == 0) {
                    $this->user_model->update_user_bank($user_id, -$expense);
                }
            }
        }
        if ($flag == 1) {

            $data = new stdClass();
            $data->success = true;
            echo json_encode($data);
        } else {
            $data = new stdClass();
            $data->success = false;
            echo json_encode($data);
        }
    }

}
