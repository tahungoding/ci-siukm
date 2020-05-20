<?php

class Dashboard_model extends CI_Model {

    public function getByUsername($username){
        $this->db->join('anggota', 'anggota.id_anggota = user.id_anggota');
        $this->db->where('username', $username);
        return $this->db->get('user')->row();
    }

    public function getById($id){
        $this->db->join('anggota', 'anggota.id_anggota = user.id_anggota');
        $this->db->where('id_user', $id);
        return $this->db->get('user')->row();
    }

    public function updatePersonalById($id){

        $post = $this->input->post();
        $data = [
            'nama' => $post['nama'],
            'alamat' => $post['alamat'],
            'no_hp' => $post['no_hp'],
            'instagram' => $post['instagram'],
            'whatsapp' => $post['whatsapp']
        ];

        return $this->db->update('anggota', $data, ['id_anggota' => $id] );

    }

    public function updateCampusById($id){

        $post = $this->input->post();
        $data = [
            'nim' => $post['nim'],
            'divisi' => $post['divisi'],
            'program_studi' => $post['program_studi'],
            'angkatan' => $post['angkatan']
        ];

        return $this->db->update('anggota', $data, ['id_anggota' => $id] );

    }

    public function updateUsernameById($id){
        return $this->db->update('user', ['username' => $this->input->post('username')], ['id_user' => $id] );
    }

    public function updatePasswordById($id){
        return $this->db->update('user', ['password' => md5($this->input->post('new_password'))], ['id_user' => $id] );
    }

    public function updateUserById($id){
        return $this->db->update('user', ['deleted' => '1' ], ['id_user' => $id] );
    }

    public function updateLevelUserById($id){
        return $this->db->update('user', ['level_user' => $this->input->post('levelUser') ], ['id_user' => $id] );
    }

    public function updateFotoById($id){
        return $this->db->update('anggota', ['gambar' => $this->updateFoto() ], ['id_anggota' => $id] );
    }

    public function updateFoto(){

        $config['upload_path']          = './assets/data/users/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = "2048";
        $config['encrypt_name']         = true;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('foto'))
        {
                $error = array('error' => $this->upload->display_errors());

                $this->session->set_flashdata('errorFoto', $error['error']);
        }
        else
        {
                // $data = array('upload_data' => $this->upload->data());

                return $this->upload->data('file_name');
        }
    }

    public function getRegistered(){
        return $this->db->get_where('anggota', ['verified' => 0])->num_rows();
    }

    public function getRegisteredThisMonth(){
        $this->db->where("MONTH(created_at)", date("m"));
        $this->db->where("YEAR(created_at)", date("Y"));
        return $this->db->get_where('anggota', ['verified' => 0])->num_rows();
    }
    
    public function getArticle(){
        return $this->db->get('artikel')->num_rows();
    }

    public function getArticleThisMonth(){
        $this->db->where("MONTH(created_at)", date("m"));
        $this->db->where("YEAR(created_at)", date("Y"));
        return $this->db->get('artikel')->num_rows();
    }

    public function getMember(){
        return $this->db->get('anggota')->num_rows();
    }

    public function getMemberThisMonth(){
        $this->db->where("MONTH(created_at)", date("m"));
        $this->db->where("YEAR(created_at)", date("Y"));
        return $this->db->get_where('anggota', ['verified' => 1])->num_rows();
    }
    

}