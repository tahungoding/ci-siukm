<?php

class Gallerys_model extends CI_Model {

    public function getAlbums($search, $limit, $offset){
        $this->db->like('judul', $search);
        return $this->db->get('album', $limit, $offset)->result();
    }

    public function addAlbum(){
        $post = $this->input->post();

        $sameJudul = $this->sameJudul($post['judul']);
        $slug = slugify($post['judul']);
        if ($sameJudul > 0) {
            $slug = slugify($post['judul']) . rand(1,100);
        }
        
        $data = [
            'judul' => $post['judul'], 
            'slug' => $slug,
            'id_user' => $this->session->userdata('id_user'),
            'thumbnail' => $this->uploadThumbnail()
        ];
        
        return $this->db->insert('album', $data);
    }

    public function editAlbum($id){
        $post = $this->input->post();
        
        $sameJudul = $this->sameJudul($post['judul']);
        $slug = slugify($post['judul']);
        if ($sameJudul > 0) {
        $slug = slugify($post['judul']) . rand(1,100);
        }

        $data = [
            'judul' => $post['judul'], 
            'slug' => $slug
        ];

        if ($_FILES['thumbnail']['name']) {
            $data['thumbnail'] = $this->uploadThumbnail();
            $this->deleteThumbnail($id);
        }
        
        $this->db->where('id_album', $id);
        return $this->db->update('album', $data);
    }

    public function deleteAlbum($id){
        $this->deleteThumbnail($id);
        $this->db->where('id_album', $id);
        return $this->db->delete('album');
    }

    private function uploadThumbnail(){

        $config['upload_path']          = './assets/data/album/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = "2048";
        $config['encrypt_name']         = true;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('thumbnail'))
        {
                $error = array('error' => $this->upload->display_errors());

                $this->session->set_flashdata('error', $error['error']);
        }
        else
        {
                return $this->upload->data('file_name');
        }
    }

    private function deleteThumbnail($id){
        $artikel = $this->getAlbumById($id);
        if (!empty($artikel)) {
            if ($artikel->thumbnail != null) {
                unlink( FCPATH . "assets/data/album/".$artikel->thumbnail);
            }
        }
    }


    public function getAlbumById($id){
        return $this->db->get_where('album', ['id_album' => $id])->row();
    }

    public function getAlbumBySlug($slug){
        return $this->db->get_where('album', ['slug' => $slug])->row();
    }

    public function getGallerysByIdAlbum($id_album){
        return $this->db->get_where('gallery', ['id_album' => $id_album])->result();
    }

    public function addGallerys(){
        $data = [
            'id_album' => $this->input->post('id_album'),
            'path' => $this->uploadGallery(),
            'size' => $_FILES['file']['size']
        ];

        return $this->db->insert('gallery', $data);
    }

    private function uploadGallery(){
        
        $config['upload_path']          = './assets/data/album/gallerys';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = "2048";
        // $config['encrypt_name']         = true;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('file'))
        {
                $error = array('error' => $this->upload->display_errors());

                $this->session->set_flashdata('error', $error['error']);
        }
        else
        {
                return $this->upload->data('file_name');
        }
    }

    public function deleteGallerys($filename){
        $gallery = $this->db->get_where('gallery', ['path' => $filename]);
        if (!empty($gallery)) {
            $gallerys = $gallery->row();
            if ($gallerys->path != null) {
                unlink( FCPATH . "assets/data/album/gallerys/".$gallerys->path);
            }
            return $this->db->delete('gallery', ['path' => $filename]);
        }
    
    }

    public function editJudul($slug){
        $post = $this->input->post();

        $sameJudul = $this->sameJudul($post['judul']);
        $slugNew = slugify($post['judul']);
        if ($sameJudul > 0) {
            $slugNew = slugify($post['judul']) . rand(1,100);
        }

        $data = [
            'judul' => $post['judul'],
            'slug' => $slugNew
        ];

        $this->db->where('slug', $slug);
        return $this->db->update('album', $data);
    }

    public function sameJudul($judul){
        return $this->db->get_where('album', ['judul' => $judul])->num_rows();
    }

}