<?php

class Teams_model extends CI_Model {

    public function getTeams($search, $limit, $offset, $filter){
        $this->db->select('user.*, anggota.*, divisi.id_divisi, divisi.nama AS nama_divisi');
        $this->db->join('anggota', 'anggota.id_anggota = user.id_anggota');
        $this->db->join('divisi', 'divisi.id_divisi = anggota.divisi');
        $this->db->where('anggota.verified', 1);
        $this->db->where('user.deleted', 0);
        $this->db->like('anggota.nama', $search);
        if ($filter != null) {
            $this->db->where('divisi.nama', $filter);
        }
        return $this->db->get('user', $limit, $offset)->result();
    }

    public function getTeamsById($id){
        $this->db->select('user.*, anggota.*, divisi.id_divisi, divisi.nama AS nama_divisi');
        $this->db->join('anggota', 'anggota.id_anggota = user.id_anggota');
        $this->db->join('divisi', 'divisi.id_divisi = anggota.divisi');
        $this->db->where('anggota.verified', 1);

        return $this->db->get_where('user', ['id_user' => $id])->row();
    }

    public function getTeamsOnly($search){
        if (!empty($search)) {
            $this->db->where($search);
        }
        return $this->db->get('anggota');
    }

    public function getTeamsFront(){
        $this->db->select('user.*, anggota.*, divisi.id_divisi, divisi.nama AS nama_divisi');
        $this->db->join('anggota', 'anggota.id_anggota = user.id_anggota');
        $this->db->join('divisi', 'divisi.id_divisi = anggota.divisi');
        $this->db->where('anggota.verified', 1);
        $this->db->limit(3);
        $this->db->order_by('user.created_at', 'DESC');
        return $this->db->get('user')->result();
    }

    public function getTeamsByVerified(){
         $this->db->select('anggota.*, divisi.id_divisi, divisi.nama AS nama_divisi');
        $this->db->join('divisi', 'divisi.id_divisi = anggota.divisi');
        return $this->db->get_where('anggota', ['verified' => 0])->result();
    }

    public function addTeams(){
        $post = $this->input->post();
        $data = [
            'nim' => $post['nim'], 
            'nama' => $post['nama'],
            'alamat' => $post['alamat'],
            'no_hp' => $post['no_hp'],
            'program_studi' => $post['program_studi'],
            'angkatan' => $post['angkatan'],
            'instagram' => $post['instagram'],
            'whatsapp' => $post['whatsapp'],
            'divisi' => $post['divisi'],
            'verified' => 1,
        ];
        
        $this->db->insert('anggota', $data);
        return $this->createUsers($this->db->insert_id());
    }

    public function addRegister(){
        $post = $this->input->post();
        $data = [
            'nim' => $post['nim'], 
            'nama' => $post['nama'],
            'alamat' => $post['alamat'],
            'alasan' => $post['alasan'],
            'program_studi' => $post['program_studi'],
            'angkatan' => $post['angkatan'],
            'divisi' => $post['divisi'],
            'no_hp' => $post['no_hp'],
            'verified' => 0,
        ];
        
        $this->db->insert('anggota', $data);
        return $this->createUsersRegister($this->db->insert_id());
    }

    public function createUsers($id_anggota){
        $data = [
            'id_anggota' => $id_anggota,
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password')),
        ];
        return $this->db->insert('user', $data);
    }

    public function createUsersRegister($id_anggota){
        $data = [
            'id_anggota' => $id_anggota,
            'username' => $this->input->post('nim'),
            'password' => md5($this->input->post('password')),
        ];
        return $this->db->insert('user', $data);
    }

    public function verifikasiTeams($id, $nim){
        $this->createUsersByVerified($id, $nim);
        return $this->db->update('anggota', ['verified' => 1], ['id_anggota' => $id]);
    }

    public function createUsersByVerified($id, $nim){
        $data = [
            'id_anggota' => $id,
            'username' => $nim,
            'password' => md5($nim)
        ];

        return $this->db->insert('user' ,$data);
    }

}