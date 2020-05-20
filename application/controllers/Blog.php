<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Profiles_model', 'pm');
        $this->load->model('Categorys_model', 'km');
        $this->load->model('Blogs_model', 'bm');
    }

	public function index($slug='')
	{
        $profiles = $this->pm->getProfiles();
        $kategori = $this->km->getCategorys();
        if (!empty($slug)) {
            $data = [
                'title' => $profiles->webname. ' - DETAIL BLOG',
                'contents' => 'front/detail_blog',
                'artikel' => $this->bm->getArtikelBySlug($this->uri->segment(2)),
                'profiles' => $profiles,
                'kategori' => $kategori,
                'pengunjung' => $this->bm->getTopViews()
            ];
            $data['next'] = $this->bm->getNextPost($data['artikel']->id_artikel);
            $data['prev'] = $this->bm->getPrevPost($data['artikel']->id_artikel);
            $this->bm->addViews($data['artikel']->id_artikel, $data['artikel']->pengunjung);

        }else{
            if (isset($_GET['keyword'])) {
                $search = $this->input->get('keyword');
                $data['keyword'] = $search;
            }else{
                $search = null;
                $data['keyword'] = null;
            }
            if (isset($_GET['kategori'])) {
                $filter = $this->input->get('kategori');
            }else{
                $filter = null;
            }
            $whereKategori = $this->input->get('kategori');
            $limit = 5;
            $offset = ($this->input->get('pages')) ? $this->input->get('pages') : 0 ;
            $data = [
                'title' => 'TAHU NGODING - BLOG',
                'contents' => 'front/blog',
                'profiles' => $profiles,
                'kategori' => $kategori,
                'artikel' => $this->bm->getBlogs($search, $limit, $offset, $filter),
                'pengunjung' => $this->bm->getTopViews($whereKategori)
            ];

            $total_rows = count($this->bm->getBlogs($search, null, null, $filter));

            $this->load->library('pagination');

            $config['base_url'] = base_url().'blog';
            $config['total_rows'] = $total_rows;
            $config['per_page'] = $limit;
            $config['enable_query_strings'] = TRUE;
            $config['page_query_string'] = TRUE;
            $config['query_string_segment'] = 'pages';

            //Style
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = '<i class="ti-angle-right"></i>';
        $config['prev_link']        = '<i class="ti-angle-left"></i>';
        $config['full_tag_open']    = '<div class="pagging text-center" ><nav  class="blog-pagination justify-content-center d-flex"><ul class="pagination">';
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
