<?php

class Categories_model extends CI_Model {

    public function create_category($category_name, $user_id) {
        $insert_query = "insert into categories(name ,user_id) values ('$category_name',$user_id)";
        $this->db->query($insert_query);
        $select_query = "select * from categories where name='$category_name' and user_id=$user_id";
        $result = $this->db->query($select_query);
        foreach ($result->result_array() as $row) {
            $category_id = $row['id'];
        }
        return $category_id;
    }

    public function get_category_id($category, $user_id) {

        $select_query = "select * from categories where name='$category' and user_id='$user_id' ";
        $query = $this->db->query($select_query);
        if ($query->num_rows() == 0) {
            return 0;
        } else {
            foreach ($query->result_array() as $row) {
                $category_id = $row['id'];
                return $category_id;
            }
        }
    }

    public function delete_category($user_id, $category_id) {
        $delete_query = "delete from categories where id=$category_id  and user_id=$user_id ";
        $this->db->query($delete_query);
        return 1;
    }
}
