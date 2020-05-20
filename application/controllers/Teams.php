<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teams extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('masuk')) {
            redirect(base_url('login'));
        }

        $this->load->model('Dashboard_model', 'dm');
        $this->load->model('Teams_model', 'tm');
        $this->load->model('Divisi_model', 'divm');
        $this->load->library('form_validation');
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

        if (isset($_GET['divisi'])) {
            $filter = $this->input->get('divisi');
        }else{
            $filter = null;
        }

        $limit = 8;
        $offset = ($this->input->get('pages')) ? $this->input->get('pages') : 0 ;

        $data = [
            'title' => 'Dashboard - Teams',
            'contents' => 'back/teams',
            'js_page' => '
                <!--venobox lightbox-->
                <script src="'.base_url().'assets/back/assets/libs/magnific-popup/jquery.magnific-popup.min.js"></script>

                <!-- Gallery Init-->
                <script src="'.base_url().'assets/back/assets/js/pages/gallery.init.js"></script>
            ',
            'teams' => $this->tm->getTeams($search, $limit, $offset, $filter),
            'divisis' => $this->divm->getDivisis(),
            'keyword' => $keyword
        ];

        $total_rows = count($this->tm->getTeams($search, null, null, $filter));

        $this->load->library('pagination');

        $config['base_url'] = base_url().'teams?keyword='.$keyword.'&divisi='.$filter;
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

		$this->load->view('back', $data);
    }
    
    public function add(){
        if ($this->session->userdata('status') == 'anggota') {
            redirect(base_url('teams'));
        }
        $data = [
            'title' => 'Dashboard - Tambah Teams',
            'contents' => 'back/add_teams',
            'css_page' => '<link href="'.base_url().'assets/back/assets/libs/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" type="text/css" />',
            'js_page' => '
                <!--Form Wizard-->
                <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
                <script src="'.base_url().'assets/back/assets/libs/jquery-steps/jquery.steps.min.js"></script>
                <script src="'.base_url().'assets/back/assets/js/pages/wizard-init.js"></script>
            ',
            'divisis' => $this->divm->getDivisis()
        ];

        if (!empty($_POST)) {
            $this->form_validation->set_rules('Username', 'required|is_unique[user.username]', ['is_unique' => 'Username yang anda masukan sudah ada yang memakai']);

            if ($this->form_validation->run() == false) {
                $this->session->set_flashdata('error', 'Data yang anda masukan gagal ditambahkan.');
            }else{
                if ($this->tm->addTeams()) {
                    $this->session->set_flashdata('success', 'Data yang anda masukan berhasil ditambahkan');
                    redirect(base_url('teams/add'));
                }else{
                    $this->session->set_flashdata('error', 'Data yang anda masukan gagal ditambahkan !');
                }
            }
        }


		$this->load->view('back', $data);
    }

    public function detail($id=''){

        if (!empty($id)) {
            $data = [
                'title' => 'Dashboard - Detail Teams',
                'contents' => 'back/detail_teams',
                'user' => $this->dm->getById($id),
                'divisis' => $this->divm->getDivisis(),
                'css_page' => '
                    <link href="'.base_url().'assets/back/assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet"
                        type="text/css" />
                ',
                'js_page' => '
                    <!-- Vendor js -->
                    <script src="'.base_url().'assets/back/assets/libs/sweetalert2/sweetalert2.min.js">
                    </script>
                    <script src="'.base_url().'assets/back/assets/js/pages/sweet-alerts.init.js"></script>
                '
            ];
            
            if (isset($_POST['updatePersonal'])) {
                if ($this->dm->updatePersonalById($this->input->post('id'))) {
                    $this->session->set_flashdata('success', 'Data personal anda berhasil diupdate');
                    redirect($this->uri->uri_string());
                }else{
                    $this->session->set_flashdata('error', 'Data personal anda gagal diupdate');
                }
            }

            if (isset($_POST['levelUser'])) {
                if ($this->dm->updateLevelUserById($this->input->post('id'))) {
                    $this->session->set_flashdata('successLevelUseu', 'Data Level User anda berhasil diupdate');
                    redirect($this->uri->uri_string());
                }else{
                    $this->session->set_flashdata('errorLevelUseu', 'Data Level User anda gagal diupdate');
                }
            }

            if (isset($_POST['updateCampus'])) {
                if ($this->dm->updateCampusById($this->input->post('id'))) {
                    $this->session->set_flashdata('successCampus', 'Data campus anda berhasil diupdate');
                    redirect($this->uri->uri_string());
                }else{
                    $this->session->set_flashdata('errorCampus', 'Data campus anda gagal diupdate');
                }
            }

            if (isset($_POST['updateUsername'])) {

                $user = $this->dm->getById($this->input->post('id'));

                if ($user->username != $this->input->post('username')) {
                    $this->form_validation->set_rules('username', 'Username', 'required|is_unique[user.username]', ['is_unique' => 'Username yang anda masukan sudah ada yang memakai']);
                }else{
                    $this->form_validation->set_rules('username', 'Username', 'required');
                }

                if ($this->form_validation->run() == false) {
                    $this->session->set_flashdata('errorUsername', 'Username gagal diupdate');
                }else{
                    if ($this->dm->updateUsernameById($this->input->post('id'))) {
                        $this->session->set_flashdata('successUsername', 'Data Username anda berhasil diupdate');
                        redirect($this->uri->uri_string());
                    }else{
                        $this->session->set_flashdata('errorUsername', 'Data Username anda gagal diupdate');
                    }
                }
            }

            if (isset($_POST['updatePassword'])) {

                $user = $this->dm->getById($this->input->post('id'));

                if ($user->password != md5($this->input->post('old_password'))) {
                    $this->session->set_flashdata('errorPassword', 'Password Lama anda salah !');
                }else{
                    if ($this->dm->updatePasswordById($this->input->post('id'))) {
                        $this->session->set_flashdata('successPassword', 'Data Password anda berhasil diupdate');
                        redirect($this->uri->uri_string());
                    }else{
                        $this->session->set_flashdata('errorPassword', 'Data Password anda gagal diupdate');
                    }
                }

            }

            if (isset($_POST['deleteUser'])) {
                if ($this->dm->updateUserById($this->input->post('deleteUser'))) {
                    $this->session->set_flashdata('msg', 'Data user anda sudah dihapus');
                    redirect(base_url('teams'));
                }else{
                    $this->session->set_flashdata('errorUser', 'Data User anda gagal diupdate');
                }
            }

            if (isset($_FILES['foto']['name'])) {
                if ($this->dm->updateFotoById($this->input->post('id_anggota'))) {
                    $this->session->set_flashdata('successFoto', 'Foto berhasil diupdate');
                    redirect($this->uri->uri_string());
                }else{
                    $this->session->set_flashdata('errorFoto', 'Foto gagal diupdate');
                }
            }
        }else{
            redirect(base_url('teams'));
        }



		$this->load->view('back', $data);
    }

}
