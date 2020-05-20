<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Profiles_model', 'pm');
        $this->load->model('Categorys_model', 'km');
        $this->load->model('Gallerys_model', 'gm');
    }

	public function index($slug='')
	{
        $profiles = $this->pm->getProfiles();
        $kategori = $this->km->getCategorys();
        if (!empty($slug)) {
            $album = $this->gm->getAlbumBySlug($slug);
            if (empty($album)) {
                show_404();die;
            }
            $data = [
                'title' => $profiles->webname. ' - GALLERY',
                'contents' => 'front/detail_gallery',
                'css_page' => '<link rel="stylesheet" href="'.base_url().'assets/front/css/lightgallery.min.css">',
                'js_page' => '
                    <script src="'.base_url().'assets/front/js/imagesloaded.pkgd.min.js"></script>
                    <script src="'.base_url().'assets/front/js/lightgallery.min.js"></script>
                    <script>
                        var $grid = $(\'.grid\').masonry({
                        itemSelector: \'.grid-item\',
                        percentPosition: true,
                        columnWidth: \'.grid-sizer\'
                        });
                        // layout Masonry after each image loads
                        $grid.imagesLoaded().progress( function() {
                        $grid.masonry();
                        });  
                        lightGallery(document.getElementById(\'aniimated-thumbnials\'), {
                            thumbnail:true
                        });
                    </script>',
                'profiles' => $profiles,
                'kategori' => $kategori,
                'detail' => $album,
                'galeri' => $this->gm->getGallerysByIdAlbum($album->id_album)
            ];
            if (isset($_POST['judul'])) {
                if ($this->gm->editJudul($slug)) {
                    $this->session->set_flashdata('sukses', 'Judul berhasil diubah');
                    redirect(base_url('gallery/'.slugify($_POST['judul'])),'refresh');
                }else{
                    $this->session->set_flashdata('gagal', 'Judul berhasil diubah');
                }
            }
        }else {
            if (isset($_GET['keyword'])) {
                $search = $this->input->get('keyword');
                $data['keyword'] = $search;
            }else{
                $search = null;
                $data['keyword'] = null;
            }

            $limit = 6;
            $offset = ($this->input->get('pages')) ? $this->input->get('pages') : 0 ;
            $data = [
                'title' => 'TAHU NGODING - GALLERY',
                'contents' => 'front/gallery',
                'profiles' => $profiles,
                'kategori' => $kategori,
                'galeri' => $this->gm->getAlbums($search, $limit, $offset),
            ];

            $total_rows = count($this->gm->getAlbums($search, null, null));

            $this->load->library('pagination');

            $config['base_url'] = base_url().'gallery';
            $config['total_rows'] = $total_rows;
            $config['per_page'] = $limit;
            $config['enable_query_strings'] = TRUE;
            $config['page_query_string'] = TRUE;
            $config['query_string_segment'] = 'pages';

            //Style
            $config['first_link']       = 'First';
            $config['last_link']        = 'Last';
            $config['next_link']        = 'Next';
            $config['prev_link']        = 'Prev';
            $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination pagination-split justify-content-center">';
            $config['full_tag_close']   = '</ul></nav></div>';
            $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
            $config['num_tag_close']    = '</span></li>';
            $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
            $config['cur_tag_close']    = '<span class="sr-only">Previous</span></span></li>';
            $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
            $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
            $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
            $config['prev_tagl_close']  = '</span>Next</li>';
            $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
            $config['first_tagl_close'] = '</span></li>';
            $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
            $config['last_tagl_close']  = '</span></li>';

            $this->pagination->initialize($config);

            $data['pagination'] = $this->pagination->create_links();
        }


		$this->load->view('front', $data);
	}
}
