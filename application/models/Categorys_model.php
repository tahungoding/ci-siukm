<?php

class Categorys_model extends CI_Model {

    public function getCategorys(){
        return $this->db->get('kategori')->result();
    }

    public function addCategorys(){
        $post = $this->input->post();
        $data = [
            'nama' => $post['nama'], 
            'deskripsi' => $post['deskripsi']
        ];
        
        return $this->db->insert('kategori', $data);
    }

    public function editCategorys(){
        $post = $this->input->post();
        $data = [
            'nama' => $post['nama'], 
            'deskripsi' => $post['deskripsi']
        ];
        
        return $this->db->update('kategori', $data, ['id_kategori' => $this->input->post('id_kategori')]);
    }

    public function deleteCategorys(){
        $this->db->where('id_kategori', $this->input->post('id_kategori'));
        return $this->db->delete('kategori');
    }



}