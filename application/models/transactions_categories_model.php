<?php

class Transactions_categories_model extends CI_Model {

    public function add_transactions_categories($trans_id, $category_id) {

        $sql = "insert into transactions_categories (transaction_id , category_id) values ($trans_id , $category_id)";
        $query = $this->db->query($sql);
        if ($query == null) {
            header("Location:base_url('index.php/error.php')");
            exit();
        } else
            return 1;
    }

    public function delete_transactions_categories($transaction_id) {
        $sql = "delete from transactions_categories where transaction_id = $transaction_id";
        $this->db->query($sql);
        return 1;
    }

    public function delete_transactions_categories_by_category($category_id) {
        //echo $category_id ;
        $sql = " delete from transactions_categories where category_id = $category_id";
        $this->db->query($sql);
        return 1;
    }

}
