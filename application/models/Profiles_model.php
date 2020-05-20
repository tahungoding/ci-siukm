<?php

class Profiles_model extends CI_Model {

    public function getProfiles(){
        return $this->db->get_where('profile', ['id_profile' => 1])->row();
    }

    public function setProfiles(){
        $post = $this->input->post();
        $data = [
            'webname' => $post['webname'], 
            'pembuka' => $post['pembuka'], 
            'visi' => $post['visi'], 
            'misi' => $post['misi'], 
            'bio' => $post['bio'], 
            'ketua' => $post['ketua'],
            'wakil_ketua' => $post['wakil_ketua'],
            'sekretaris' => $post['sekretaris'],
            'email' => $post['email'], 
            'telp' => $post['telp'], 
            'alamat' => $post['alamat'], 
            'facebook' => $post['facebook'], 
            'twitter' => $post['twitter'], 
            'instagram' => $post['instagram'],
        ];

        if ($_FILES['favicon']['name']) {
            $data['favicon'] = $this->uploadFavicon();
            $this->deleteFavicon();
        }

        if ($_FILES['logo']['name']) {
            $data['logo'] = $this->uploadLogo();
            $this->deleteLogo();
        }

        if ($_FILES['gambar']['name']) {
            $data['gambar'] = $this->uploadGambar();
            $this->deleteGambar();
        }
        
        $this->db->where('id_profile', 1);
        return $this->db->update('profile', $data);
    }

    private function uploadFavicon(){
        
        $config['upload_path']          = './assets/data/profiles/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = "2048";
        // $config['encrypt_name']         = true;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('favicon'))
        {
                $error = array('error' => $this->upload->display_errors());

                $this->session->set_flashdata('error', $error['error']);
        }
        else
        {
                return $this->upload->data('file_name');
        }
    }

    private function uploadLogo(){
        
        $config['upload_path']          = './assets/data/profiles/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = "2048";
        // $config['encrypt_name']         = true;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('logo'))
        {
                $error = array('error' => $this->upload->display_errors());

                $this->session->set_flashdata('error', $error['error']);
        }
        else
        {
                return $this->upload->data('file_name');
        }
    }

    private function uploadGambar(){
        
        $config['upload_path']          = './assets/data/profiles/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = "2048";
        // $config['encrypt_name']         = true;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('gambar'))
        {
                $error = array('error' => $this->upload->display_errors());

                $this->session->set_flashdata('error', $error['error']);
        }
        else
        {
                return $this->upload->data('file_name');
        }
    }

    private function deleteFavicon(){
        $profiles = $this->getProfiles();
        if (!empty($profiles)) {
            if ($profiles->favicon != null) {
                unlink( FCPATH . "assets/data/profiles/".$profiles->favicon);
            }
        }
    }

    private function deleteLogo(){
        $profiles = $this->getProfiles();
        if (!empty($profiles)) {
            if ($profiles->logo != null) {
                unlink( FCPATH . "assets/data/profiles/".$profiles->logo);
            }
        }
    }

    private function deleteGambar(){
        $profiles = $this->getProfiles();
        if (!empty($profiles)) {
            if ($profiles->gambar != null) {
                unlink( FCPATH . "assets/data/profiles/".$profiles->gambar);
            }
        }
    }

    public function setBuka(){
        return $this->db->update('profile', ['pendaftaran' => 1], ['id_profile' => 1]);
    }

    public function setTutup(){
        return $this->db->update('profile', ['pendaftaran' => 0], ['id_profile' => 1]);
    }

}