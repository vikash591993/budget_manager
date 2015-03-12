<?php

class Deletions extends CI_Controller {

    public function __construct() {
        parent::__construct();
        session_start();
        if (!isset($_SESSION['user_id'])) {
            $url = base_url('home');
            header("Location:$url");
        }
        $this->load->database();       
    }

    public function delete_peer() {
        $this->load->model('peers_model');
        $this->load->model('transactions_model');
        $data = new stdClass();
        $user_id = $_SESSION['user_id'];
        $peer_name = $this->input->post('peer_name');

        $peer_id = $this->peers_model->get_peer_id($user_id, $peer_name);
        $this->transactions_model->update_transaction_delete_peer($user_id, $peer_id);
        $this->peers_model->delete_peer($user_id, $peer_id);
        if ($peer_id == 0) {
            $data->success = false;
            echo json_encode($data);
        } else {
            $data->success = true;
            echo json_encode($data);
        }
    }

    public function delete_category() {
        $this->load->model('categories_model');
        $this->load->model('transactions_categories_model');
        $data = new stdClass();
        $user_id = $_SESSION['user_id'];
        $category_name = $this->input->post('category_name');

        $category_id = $this->categories_model->get_category_id($category_name, $user_id);
        $this->transactions_categories_model->delete_transactions_categories_by_category($category_id);
        $this->categories_model->delete_category($user_id, $category_id);
        
        if ($category_id == 0) {
            $data->success = false;
            echo json_encode($data);
        } else {
            $data->success = true;
            echo json_encode($data);
        }
    }
}
