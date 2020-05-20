<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blogs extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('masuk')) {
            redirect(base_url('login'));
        }

        $this->load->model('Blogs_model', 'bm');
        $this->load->model('Categorys_model', 'cm');
    }
    

	public function index()
	{

        if (isset($_GET['keyword'])) {
            $search = $this->input->get('keyword');
            $keyword = $search;
        }else{
            $search = null;
            $keyword = null;
        }
        if (isset($_GET['kategori'])) {
            $filter = $this->input->get('kategori');
        }else{
            $filter = null;
        }

        $limit = 6;
        $offset = ($this->input->get('pages')) ? $this->input->get('pages') : 0 ;
    
        $data = [
            'title' => 'Dashboard - Blogs',
            'contents' => 'back/blogs',
            'css_page' => '
                <link href="'.base_url().'assets/back/assets/css/custom.css" rel="stylesheet" type="text/css" />
                <link href="'.base_url().'assets/back/assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet"
                	type="text/css" />
            ',
            'js_page' => '
                <!--venobox lightbox-->
                <script src="'.base_url().'assets/back/assets/libs/magnific-popup/jquery.magnific-popup.min.js"></script>

                <!-- Gallery Init-->
                <script src="'.base_url().'assets/back/assets/js/pages/gallery.init.js"></script>

                <!-- Vendor js -->
                <script src="'.base_url().'assets/back/assets/libs/sweetalert2/sweetalert2.min.js">
                </script>
                <script src="'.base_url().'assets/back/assets/js/pages/sweet-alerts.init.js"></script>
                <script type="text/javascript">
                    function confirmDelete(indeks, e) {
                        e.preventDefault();
                        var formname = "form" + indeks;
                        Swal.fire({
                            title: "Apakah anda yakin?",
                            text: "Untuk menghapus data ini!",
                            type: "warning",
                            showCancelButton: !0,
                            confirmButtonColor: "#3085d6",
                            cancelButtonColor: "#d33",
                            confirmButtonText: "Ya, Hapus!"
                        }).then((result) => {
                            if (result.value) {
                                result.value && Swal.fire("Berhasil!", "Data sudah dihapus.",
                                    "success")
                                document.forms[formname].submit();
                            }
                        })

                    }
                </script>
            ',
            'lists' => $this->bm->getBlogs($search, $limit, $offset, $filter),
            'categorys' => $this->cm->getCategorys(),
            'keyword' => $keyword
        ];

        $total_rows = count($this->bm->getBlogs($search, null, null, $filter));

        $this->load->library('pagination');

        $config['base_url'] = base_url().'blogs?keyword='.$keyword.'&kategori='.$filter;
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

        if (isset($_POST['deleteBlogs'])) {
            if ($this->bm->deleteBlogs($this->input->post('id_artikel'))) {
                $this->session->set_flashdata('success', 'Artikel berhasil dihapus');
                
                redirect(base_url('blogs'),'refresh');
                
            }else{
                $this->session->set_flashdata('error', 'Artikel gagal dihapus');
            }
        }

		$this->load->view('back', $data);
    }
    
    public function add(){
        $data = [
            'title' => 'Dashboard - Tambah Blogs',
            'contents' => 'back/add_blogs',
            'css_page' => '
                <!-- Summernote css -->
                <link href="'.base_url().'assets/back/assets/libs/summernote/summernote-bs4.css" rel="stylesheet" type="text/css" />
                <link href="'.base_url().'assets/back/assets/libs/dropify/dropify.min.css" rel="stylesheet" type="text/css" />
            ',
            'js_page' => '
                <!-- Summernote js -->
                <script src="'.base_url().'assets/back/assets/libs/summernote/summernote-bs4.min.js"></script>

                <!-- Dropify js-->
                <script src="'.base_url().'assets/back/assets/libs/dropify/dropify.min.js"></script>
                <script src="'.base_url().'assets/back/assets/libs/dropify/dropify.js"></script>

                <!-- Init js -->
                <script src="'.base_url().'assets/back/assets/js/pages/form-summernote.init.js"></script>
            ',
            'categorys' => $this->cm->getCategorys()
        ];

        if (isset($_POST['addBlogs'])) {
            if ($this->bm->addBlogs()) {
                $this->session->set_flashdata('success', 'Artikel berhasil ditambahkan');
            }else{
                $this->session->set_flashdata('error', 'Artikel gagal ditambahkan');
            }
        }

		$this->load->view('back', $data);
    }

    public function edit($id = null){
        
        $cekCreator = $this->bm->getArtikelById($id);
        if ($cekCreator->id_user == $this->session->userdata('id_user') || $this->session->userdata('status') == 'ketua') {
            null;
        }else{
            show_404();
        }

        if (!empty($id)) {
            $data = [
                'title' => 'Dashboard - Edit Blogs',
                'contents' => 'back/edit_blogs',
                'css_page' => '
                    <!-- Summernote css -->
                    <link href="'.base_url().'assets/back/assets/libs/summernote/summernote-bs4.css" rel="stylesheet" type="text/css" />
                    <link href="'.base_url().'assets/back/assets/libs/dropify/dropify.min.css" rel="stylesheet" type="text/css" />
                ',
                'js_page' => '
                    <!-- Summernote js -->
                    <script src="'.base_url().'assets/back/assets/libs/summernote/summernote-bs4.min.js"></script>

                    <!-- Dropify js-->
                    <script src="'.base_url().'assets/back/assets/libs/dropify/dropify.min.js"></script>
                    <script src="'.base_url().'assets/back/assets/libs/dropify/dropify.js"></script>

                    <!-- Init js -->
                    <script src="'.base_url().'assets/back/assets/js/pages/form-summernote.init.js"></script>
                ',
                'artikel' => $this->bm->getArtikelById($id),
                'categorys' => $this->cm->getCategorys()
            ];


        if (isset($_POST['editBlogs'])) {
            if ($this->bm->editBlogs($data['artikel']->id_artikel)) {
                $slug = $data['artikel']->slug;
                $this->session->set_flashdata('success', 'Artikel berhasil diupdate <a
                	href="'.base_url('blog/'.$slug).'" target="_blank">Lihat</a>');
                redirect('blogs/edit/'.$data['artikel']->id_artikel,'refresh');
            }else{
                $this->session->set_flashdata('error', 'Artikel gagal diupdate');
            }
        }

        }else{
            redirect(base_url('blogs'));
        }

		$this->load->view('back', $data);
    }

}
