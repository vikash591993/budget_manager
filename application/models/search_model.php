<?php

class Search_model extends CI_Model {

    public function complete_search($user_id, $expense_query, $peer_query, $category_query, $date_query) {

        $sql = "SELECT * ,categories.name FROM transactions left JOIN transactions_categories 
                ON transactions.id = transactions_categories.transaction_id left JOIN categories
                ON transactions_categories.category_id = categories.id LEFT JOIN 
                peers ON peers.id = transactions.peer_id and transactions.user_id = peers.user_id WHERE " . $expense_query . $peer_query . $category_query . $date_query . " categories.user_id= $user_id";


        $query = $this->db->query("$sql");
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $data[] = $row;
            }
            return $data;
        } else {
            return false;
        }
    }

}
