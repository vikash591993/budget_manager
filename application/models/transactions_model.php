<?php

class Transactions_model extends CI_Model {

    public function add_transaction($user_id, $expense, $date, $peer_id, $notes) {

        if ($peer_id != 0) {

            $sql = "insert into transactions(user_id,expense,date,peer_id ,notes) values($user_id,$expense,'$date',$peer_id , '$notes')";
            $result = $this->db->query($sql);
            if ($result == null) {
                header("Location:base_url('index.php/error.php')");
                exit();
            }
        } else {
            $sql = "insert into transactions(user_id,expense,date ,notes) values($user_id,$expense,'$date' , '$notes')";
            $result = $this->db->query($sql);
        }


        $sql = "select * from transactions order by id desc limit 1";

        $query = $this->db->query($sql);

        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $trans_id = $row['id'];
            }

            return $trans_id;
        }
    }

    public function delete_transaction($user_id, $transaction_id) {
        $sql = "delete from transactions where user_id=$user_id and id=$transaction_id";
        $this->db->query($sql);
        return 1;
    }

    public function update_transaction_delete_peer($user_id, $peer_id) {
        $sql = "update transactions set peer_id=NULL where peer_id=$peer_id and user_id=$user_id";
        $this->db->query($sql);
        return 1;
    }

    public function get_expense_by_id($user_id, $transaction_id) {
        $sql = "select * from transactions where user_id=$user_id and id=$transaction_id ";
        $query = $this->db->query($sql);
        foreach ($query->result_array() as $row) {
            //echo $row['expense'];
            $expense = $row['expense'];
        }
        return $expense;
    }

    //vikash
    public function total_expense($user_id) {
        $query = $this->db->query("SELECT sum(expense) FROM transactions WHERE user_id=$user_id");
        foreach ($query->result_array() as $row) {
            $sum = $row['sum(expense)'];
        }
        return $sum;
    }

   
    public function yearly_transactions($present_year, $previous_year, $user_id) {
        $query = $this->db->query("SELECT sum(expense) FROM transactions WHERE date BETWEEN '$previous_year' AND '$present_year' AND user_id=$user_id");
        foreach ($query->result_array() as $row) {
            $sum = $row['sum(expense)'];
        }
        return $sum;
    }

    //vikash
    public function monthly_transactions($present_month, $previous_month, $user_id) {
        $query = $this->db->query("SELECT sum(expense) FROM transactions WHERE date BETWEEN '$previous_month' AND '$present_month' AND user_id=$user_id");
        foreach ($query->result_array() as $row) {
            $sum = $row['sum(expense)'];
        }
        return $sum;
    }
    //vikash
    public function top_5_expense($user_id)
    {
        $query = $this->db->query("select * from transactions where user_id='$user_id' order by date desc limit 5");
        return $query->result_array();
    }
}
