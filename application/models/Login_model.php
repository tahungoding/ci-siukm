<?php

class Login_model extends CI_Model {

    public function get($username){
        $this->db->where('username', $username);
        return $this->db->get('user')->row();
    }

}