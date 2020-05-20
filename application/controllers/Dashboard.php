<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct(){
        parent::__construct();
        if (!$this->session->userdata('masuk')) {
            redirect(base_url('login'));
        }
        $this->load->model('Dashboard_model', 'dm');
        $this->load->model('Divisi_model', 'divm');
        $this->load->library('form_validation');
    }

	public function index()
	{
        
        $data = [
            'title' => 'Dashboard',
            'contents' => 'back/dashboard',
            'user' => $this->dm->getById($this->session->userdata('id_user')),
            'divisis' => $this->divm->getDivisis(),
            'pendaftar' => $this->dm->getRegistered(),
            'pendaftarBulanIni' => $this->dm->getRegisteredThisMonth(),
            'artikel' => $this->dm->getArticle(),
            'artikelBulanIni' => $this->dm->getArticleThisMonth(),
            'anggota' => $this->dm->getMember(),
            'anggotaBulanIni' => $this->dm->getMemberThisMonth(),
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
                redirect(base_url('dashboard'));
            }else{
                $this->session->set_flashdata('error', 'Data personal anda gagal diupdate');
            }
        }

        if (isset($_POST['levelUser'])) {
            if ($this->dm->updateLevelUserById($this->input->post('id'))) {
                $this->session->set_flashdata('successLevelUser', 'Data Level User anda berhasil diupdate');
                redirect(base_url('dashboard'));
            }else{
                $this->session->set_flashdata('errorLevelUser', 'Data Level User anda gagal diupdate');
            }
        }

        if (isset($_POST['updateCampus'])) {
            if ($this->dm->updateCampusById($this->input->post('id'))) {
                $this->session->set_flashdata('successCampus', 'Data campus anda berhasil diupdate');
                redirect(base_url('dashboard'));  
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
                    redirect(base_url('dashboard'));
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
                    redirect(base_url('dashboard'));
                }else{
                    $this->session->set_flashdata('errorPassword', 'Data Password anda gagal diupdate');
                }
            }

        }

        if (isset($_POST['deleteUser'])) {
            if ($this->dm->updateUserById($this->input->post('deleteUser'))) {
                $this->session->set_flashdata('msg', 'Data user anda sudah non aktif');
                redirect(base_url('login/logout'));
            }else{
                $this->session->set_flashdata('errorUser', 'Data User anda gagal diupdate');
            }
        }

        if (isset($_FILES['foto']['name'])) {
            if ($this->dm->updateFotoById($this->input->post('id_anggota'))) {
                $this->session->set_flashdata('successFoto', 'Foto berhasil diupdate');
                redirect(base_url('dashboard'));
            }else{
                $this->session->set_flashdata('errorFoto', 'Foto gagal diupdate');
            }
        }
        

		$this->load->view('back', $data);
	}
}
