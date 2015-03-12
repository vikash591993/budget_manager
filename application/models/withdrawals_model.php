<?php

class Withdrawals_model extends CI_Model {

    public function add_withdrawal($user_id, $amount, $date) {

        $sql = "insert into withdrawal (amount,date ,user_id) values ($amount ,'$date',$user_id)";
        $query = $this->db->query($sql);

        if ($query == null) {
            $url = base_url('error');
            header("Location:$url");
            exit();
        } else {
            return 1;
        }
    }

    public function delete_withdrawal($user_id, $withdrawal_id) {
        $sql = "delete from withdrawal where user_id=$user_id id=$withdrawal_id";
        $this->db->query($sql);
        return 1;
    }

}
