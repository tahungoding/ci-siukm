<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallerys extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('masuk')) {
            redirect(base_url('login'));
        }

        $this->load->model('Gallerys_model', 'gm');
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

        $limit = 6;
        $offset = ($this->input->get('pages')) ? $this->input->get('pages') : 0 ;

        $data = [
            'title' => 'Dashboard - Galeri',
            'contents' => 'back/gallerys',
            'lists' => $this->gm->getAlbums($search, $limit, $offset),
            'css_page' => '
                <link href="'.base_url().'assets/back/assets/libs/dropify/dropify.min.css" rel="stylesheet" type="text/css" />
                <link href="'.base_url().'assets/back/assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet"
                	type="text/css" />
                ',
            'js_page' => '
                <script src="'.base_url().'assets/back/assets/libs/dropify/dropify.min.js"></script>
                <script src="'.base_url().'assets/back/assets/libs/dropify/dropify.js"></script>

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
            'keyword' => $keyword
        ];

        $total_rows = count($this->gm->getAlbums($search, null, null));

        $this->load->library('pagination');

        $config['base_url'] = base_url().'gallerys?keyword='.$keyword;
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

        if(isset($_POST['addAlbum'])){
            if($this->gm->addAlbum()){
                $this->session->set_flashdata('success', 'Data berhasil ditambahkan');
                redirect('gallerys','refresh');
            }else{
                $this->session->set_flashdata('error', 'Data gagal ditambahkan');
            }
        }

        if(isset($_POST['editAlbum'])){
            if($this->gm->editAlbum($this->input->post('id_album'))){
                $this->session->set_flashdata('success', 'Data berhasil diupdate');
                redirect('gallerys','refresh');
            }else{
                $this->session->set_flashdata('error', 'Data gagal diupdate');
            }
        }

        if(isset($_POST['deleteAlbum'])){
            if($this->gm->deleteAlbum($this->input->post('id_album'))){
                $this->session->set_flashdata('success', 'Data berhasil dihapus');
                redirect('gallerys','refresh');
            }else{
                $this->session->set_flashdata('error', 'Data gagal dihapus');
            }
        }

		$this->load->view('back', $data);
    }
    
    public function menej($slug=""){

        $cekCreator = $this->gm->getAlbumBySlug($slug);
        if ($cekCreator->id_user == $this->session->userdata('id_user') || $this->session->userdata('status') == 'ketua') {
            null;
        }else{
            show_404();
        }

        if (!empty($slug)) {
            $data = [
                'title' => 'Dashboard - Tambah Galeri',
                'contents' => 'back/add_gallerys',
                'albums' => $this->gm->getAlbumBySlug($this->uri->segment(3)),
                'css_page' => '
                    <!-- Plugins css -->
                    <link href="'.base_url().'assets/back/assets/libs/dropzone/dropzone.min.css" rel="stylesheet" type="text/css" />
                    <style>
                    .dz-message{
                        text-align: center;
                        font-size: 28px;
                        }

                        .dz-preview .dz-image img{
                        width: 100% !important;
                        height: 100% !important;
                        object-fit: cover;
                        }
                    </style>
                ',
                'js_page' => '
                    <!-- Plugins js -->
                    <script src="'.base_url().'assets/back/assets/libs/dropzone/dropzone.min.js"></script>
                    <script>
                    Dropzone.autoDiscover = false;
                        $(".dropzone").dropzone({
                        maxFilesize: 2,
                        acceptedFiles:"image/*",
                        dictInvalidFileType:"Type file ini tidak dizinkan",
                        addRemoveLinks:true,

                        init: function() { 
                            myDropzone = this;
                            $.ajax({
                            url: \''.base_url().'gallerys/addG/'.$this->uri->segment(3).'\',
                            type: \'post\',
                            data: {request: 2},
                            dataType: \'json\',
                            success: function(response){
                                console.log(response);
                                $.each(response, function(key,value) {
                                var mockFile = { name: value.path, size: value.size };
                                console.log(\''.base_url().'assets/data/album/gallerys/\'+value.path);
                                myDropzone.emit("addedfile", mockFile);
                                myDropzone.emit("thumbnail", mockFile, \''.base_url().'assets/data/album/gallerys/\'+value.path);
                                myDropzone.emit("complete", mockFile);

                                });

                            }
                            });
                            myDropzone.on("removedfile",function(a){
                            var token=a.name;
                            $.ajax({
                                type:\'post\',
                                data:{token:token},
                                url:\''.base_url().'gallerys/removeG/'.$this->uri->segment(3).'\',
                                cache:false,
                                dataType: \'json\',
                                success: function(){
                                    console.log("Foto terhapus");
                                },
                                error: function(){
                                    console.log("Error");

                                }
                            });
                        });
                        }
                        });

                    </script>
                '
            ];
        }else{
            redirect(base_url('gallerys'));die;
        }

        if (isset($_FILES['file']['name'])) {
            if ($this->gm->addGallerys()) {
                $this->session->set_flashdata('success', 'Data berhasil ditambahkan');
            }else{
                $this->session->set_flashdata('error', 'Data gagal ditambahkan');
            }
        }

		$this->load->view('back', $data);
    }

    public function edit($id=''){

        if (!empty($id)) {
            $data = [
                'title' => 'Dashboard - Edit Galeri',
                'contents' => 'back/edit_gallerys',
                'css_page' => '
                    <!-- Plugins css -->
                    <link href="'.base_url().'assets/back/assets/libs/dropzone/dropzone.min.css" rel="stylesheet" type="text/css" />
                ',
                'js_page' => '
                    <!-- Plugins js -->
                    <script src="'.base_url().'assets/back/assets/libs/dropzone/dropzone.min.js"></script>
                '
            ];
        }else{
            redirect(base_url('gallerys'));
        }

		$this->load->view('back', $data);
    }

    public function addG($slug=""){
        if (!empty($slug)) {
            $albums = $this->gm->getAlbumBySlug($slug);
            $album = $this->gm->getGallerysByIdAlbum($albums->id_album);
            echo json_encode($album);die;
        }
    }

    public function removeG($slug=''){
        if (!empty($slug)) {
            if ($this->gm->deleteGallerys($this->input->post('token'))) {
                echo "{}";
            }
        }

    }

}
