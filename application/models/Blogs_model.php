<?php

class Blogs_model extends CI_Model {

    public function getBlogs($search, $limit, $offset, $filter){
        $this->db->select('artikel.*, kategori.id_kategori, kategori.nama AS nama_kategori, user.id_user, user.id_anggota, anggota.id_anggota, anggota.nama AS penulis');
        $this->db->join('user', 'user.id_user = artikel.id_user');
        $this->db->join('anggota', 'anggota.id_anggota = user.id_anggota');
        $this->db->join('kategori', 'kategori.id_kategori = artikel.id_kategori');
        if (!empty($filter)) {
            $this->db->where('kategori.nama', $filter);
        }
        $this->db->like('judul', $search);
        $this->db->order_by('artikel.created_at', 'desc');
        return $this->db->get('artikel', $limit, $offset)->result();
    }

    public function getNextPost($id){
        $id = $id+1;
        $this->db->limit(1);
        return $this->db->get_where('artikel', ['id_artikel' => $id])->row();
    }

    public function getPrevPost($id){
        $id = $id-1;
        $this->db->limit(1);
        return $this->db->get_where('artikel', ['id_artikel' => $id])->row();
    }

    public function getBlogsFront(){
        $this->db->select('artikel.*, kategori.id_kategori, kategori.nama AS nama_kategori, user.id_user, user.id_anggota, anggota.id_anggota, anggota.nama AS penulis');
        $this->db->join('user', 'user.id_user = artikel.id_user');
        $this->db->join('anggota', 'anggota.id_anggota = user.id_anggota');
        $this->db->join('kategori', 'kategori.id_kategori = artikel.id_kategori');
        $this->db->limit(3);
        $this->db->order_by('artikel.created_at', 'DESC');
        return $this->db->get('artikel')->result();
    }

    public function addViews($id, $pengunjung){
        $pengunjung = $pengunjung+1;
        $this->db->where('id_artikel', $id);
        return $this->db->update('artikel', ['pengunjung' => $pengunjung]);
    }

    public function addBlogs(){
        $post = $this->input->post();

        $sameJudul = $this->sameJudul($post['judul']);
        $slug = slugify($post['judul']);
        if ($sameJudul > 0) {
            $slug = slugify($post['judul']) . rand(1,100);
        }
        $data = [
            'judul' => $post['judul'], 
            'slug' => $slug,
            'thumbnail' => $this->uploadThumbnail(),
            'isi' => $post['isi'],
            'id_kategori' => $post['id_kategori'],
            'id_user' => $post['id_user']
        ];
        
        return $this->db->insert('artikel', $data);
    }

    public function editBlogs($id){
        $post = $this->input->post();

        $slug = slugify($post['judul']);
        $sameJudul = $this->sameJudul($post['judul']);
        if ($sameJudul > 0) {
           $slug = slugify($post['judul']) . rand(1,100);
        }

        $data = [
            'judul' => $post['judul'] ?? null, 
            'slug' => $slug,
            'isi' => $post['isi'],
            'id_kategori' => $post['id_kategori'],
            'id_user' => $post['id_user']
        ];

        if ($_FILES['thumbnail']['name']) {
            $data['thumbnail'] = $this->uploadThumbnail();
            $this->deleteThumbnail($id);
        }
        
        $this->db->where('id_artikel', $id);
        return $this->db->update('artikel', $data);
    }

    public function deleteBlogs($id){
        $this->deleteThumbnail($id);
        $this->db->where('id_artikel', $id);
        return $this->db->delete('artikel');
    }

    private function uploadThumbnail(){

        $config['upload_path']          = './assets/data/artikel/';
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
        $artikel = $this->getArtikelById($id);
        if (!empty($artikel)) {
            if ($artikel->thumbnail != null) {
                unlink( FCPATH . "assets/data/artikel/".$artikel->thumbnail);
            }
        }
    }

    public function getArtikelBySlug($slug){
        $this->db->select('user.id_user, artikel.id_artikel, artikel.pengunjung, user.level_user, user.id_anggota, anggota.nama AS penulis, anggota.id_anggota, anggota.gambar, kategori.id_kategori, kategori.nama AS kategori, artikel.id_user, artikel.id_kategori, artikel.judul, artikel.slug, artikel.thumbnail, artikel.isi, artikel.created_at');
        $this->db->join('user', 'user.id_user = artikel.id_user');
        $this->db->join('anggota', 'anggota.id_anggota = user.id_anggota');
        $this->db->join('kategori', 'kategori.id_kategori = artikel.id_kategori');
        return $this->db->get_where('artikel', ['slug' => $slug])->row();
    }

    public function getArtikelById($id){
        $this->db->select('user.id_user, artikel.id_artikel, user.level_user, user.id_anggota, anggota.nama AS penulis, anggota.id_anggota, anggota.gambar, kategori.id_kategori, kategori.nama AS kategori, artikel.id_user, artikel.id_kategori, artikel.judul, artikel.slug, artikel.thumbnail, artikel.isi, artikel.created_at');
        $this->db->join('user', 'user.id_user = artikel.id_user');
        $this->db->join('anggota', 'anggota.id_anggota = user.id_anggota');
        $this->db->join('kategori', 'kategori.id_kategori = artikel.id_kategori');
        return $this->db->get_where('artikel', ['id_artikel' => $id])->row();
    }

    public function getArtikelByCategoryNumRows($category){
        return $this->db->get_where('artikel', ['id_kategori' => $category])->num_rows();
    }

    public function getTopViews($whereKategori=null){
        $this->db->select('artikel.*, kategori.id_kategori, kategori.nama');
        $this->db->join('kategori', 'kategori.id_kategori = artikel.id_kategori');
        if($whereKategori != null){
            $this->db->where('kategori.nama', $whereKategori);
        }
        $this->db->limit(4);
        $this->db->order_by('artikel.pengunjung', 'DESC');
        return $this->db->get('artikel')->result();
    }

    public function sameJudul($judul){
        return $this->db->get_where('artikel', ['judul' => $judul])->num_rows();
    }

}