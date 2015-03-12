<?php

class Deactivate_account_model extends CI_Model {

    function deactivate($user_id) {

        $sql1 = "DELETE FROM transactions WHERE user_id= $user_id";
        $this->db->query("$sql1");

        $sql2 = "DELETE FROM peers WHERE user_id= $user_id";
        $this->db->query("$sql2");

        $sql3 = "DELETE FROM categories WHERE user_id= $user_id";
        $this->db->query("$sql3");

        $sql4 = "DELETE FROM users WHERE id= $user_id";
        $this->db->query("$sql4");
    }

}
