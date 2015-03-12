<?php

class Peers_model extends CI_Model {

    public function create_peer($user_id, $peer_name) {
        $sql = "insert into peers (name, user_id , balance ) values ('$peer_name' , $user_id , 0)";
        $query = $this->db->query($sql);
    }

    public function get_peer_id($user_id, $peer_name) {
        $sql = "select * from peers where name='$peer_name'and user_id=$user_id";
        $query = $this->db->query($sql);
        {
            if ($query->num_rows() > 0) {
                foreach ($query->result_array() as $row) {
                    $peer_id = $row['id'];
                }
                return $peer_id;
            } else {
                return 0;
            }
        }
    }

    public function update_peer($user_id, $peer_id, $expense) {
        //$peer_id = $this->get_peer_id($peer_name, $user_id);
        if ($peer_id == 0) {
            //$this->create_peer($peer_name, $user_id);
            //$peer_id = $this->get_peer_id($peer_name, $user_id);
        }
        $sql1 = "select * from peers where id=$peer_id";
        $query = $this->db->query($sql1);
        if ($query->num_rows() > 0) {

            foreach ($query->result_array() as $row) {
                $balance = $row['balance'];
            }
            $balance = $balance + $expense;
            $sql = "update peers set balance =$balance where id=$peer_id";
            $query = $this->db->query($sql);
            if ($query == null) {
                header("Location:base_url('index.php/error.php')");
                exit();
            } else {
                return 1;
            }
        } else {
            header("Location:base_url('index.php/error.php')");
            exit();
        }
    }

    public function delete_peer($user_id, $peer_id) {
        $sql = "delete from peers where user_id=$user_id and  id=$peer_id";
        $query = $this->db->query($sql);
        return 1;
    }
    
    public function peers_status($user_id)
    {
        $query = $this->db->query("select * from peers where user_id='$user_id'");
        return $query->result_array();
    }

}
