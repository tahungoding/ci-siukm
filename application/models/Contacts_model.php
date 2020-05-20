<?php

class Contacts_model extends CI_Model {

    public function getContacts(){
        return $this->db->get('saran')->result();
    }

    public function deleteContacts($id){
        return $this->db->delete('saran', ['id_saran' => $id]);
    }

    public function addContacts(){
        $post = $this->input->post();
        $data = [
            'nama' => $post['nama'],
            'subjek' => $post['subjek'],
            'isi' => $post['isi'],
            'email' => $post['email'],
        ];
        return $this->db->insert('saran', $data);
    }

}