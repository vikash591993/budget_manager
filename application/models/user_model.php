<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_model extends CI_Model {

    public function get_user($user_id) {
        $query = $this->db->query("select * from users where id='$user_id'");
        return $query->result();
    }

    public function verify_user($email, $password) {
        $query = $this->db->query("select * from users where email='$email' and password='$password'");
        return $query->result();
    }

    public function verify_registration($data) {
        $email = $data['email'];
        $sql = "select * from users where email= '$email' ";
        $query = $this->db->query("$sql");

        if ($query->num_rows() == 0)
            return FALSE;
        else
            return TRUE;
    }

    public function insert($data) {
        $query = $this->db->insert('users', $data);
    }

    public function update_user_hand($user_id, $expense) {
        $sql = "update users set cash_in_hand = cash_in_hand - '$expense' where id ='$user_id' ";
        $this->db->query($sql);
    }

    public function update_user_bank($user_id, $expense) {
        $sql = "update users set cash_in_bank = cash_in_bank - '$expense' where id='$user_id' ";
        $this->db->query($sql);
    }

    public function user_withdrawal() {
        $sql = "update users set cash_in_hand = cash_in_hand + $amount where id=$user_id ";
        $this->db->query($sql);
        $sql = "update users set cash_in_bank = cash_in_bank - $amount where id=$user_id";
        $this->db->query($sql);
    }

    public function delete_user($user_id) {
        $sql = "delete from users where id=$user_id";
        $this->db->query($sql);
        return 1;
    }

    public function verify_password($user_id, $current_password) {
        $sql = "SELECT * from users where id='$user_id' and password='$current_password' ";
        $query = $this->db->query("$sql");
        if ($query->num_rows() == 0)
            return false;
        else
            return true;
    }

    function update($user_id, $new_password) {
        $pwd_changed = "UPDATE users SET password= '$new_password' WHERE id='$user_id'";
        $this->db->query("$pwd_changed");
    }
     public function save_notes($important_notes,$user_id)
    {
        $query = $this->db->query("update users set important_notes = '$important_notes' where id = '$user_id'");
        
    }
}
