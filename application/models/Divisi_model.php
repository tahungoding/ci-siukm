<?php

class Divisi_model extends CI_Model {

    public function getDivisis(){
        return $this->db->get('divisi')->result();
    }

    public function addDivisi(){
        $post = $this->input->post();
        $data = [
            'nama' => $post['nama'], 
            'deskripsi' => $post['deskripsi']
        ];
        
        return $this->db->insert('divisi', $data);
    }

    public function editDivisi(){
        $post = $this->input->post();
        $data = [
            'nama' => $post['nama'], 
            'deskripsi' => $post['deskripsi']
        ];
        
        return $this->db->update('divisi', $data, ['id_divisi' => $this->input->post('id_divisi')]);
    }

    public function deleteDivisi(){
        $this->db->where('id_divisi', $this->input->post('id_divisi'));
        return $this->db->delete('divisi');
    }



}