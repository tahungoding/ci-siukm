<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profiles extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('masuk')) {
            redirect(base_url('login'));die;
        }elseif ($this->session->userdata('status') == 'anggota') {
            redirect(base_url('dashboard'));die;
        }

        $this->load->model('Profiles_model', 'pm');
        $this->load->model('Teams_model', 'tm');
    }

	public function index()
	{
        $data = [
            'title' => 'Dashboard - Profile Web',
            'contents' => 'back/profiles',
            'profiles' => $this->pm->getProfiles(),
            'teams' => $this->tm->getTeams(null, null, null, null),
            'css_page' => '
                 <!-- Summernote css -->
                <link href="'.base_url().'assets/back/assets/libs/summernote/summernote-bs4.css" rel="stylesheet" type="text/css" />
                <link href="'.base_url().'assets/back/assets/libs/dropify/dropify.min.css" rel="stylesheet" type="text/css" />
                <link href="'.base_url().'assets/back/assets/libs/select2/select2.min.css" rel="stylesheet"
                	type="text/css" />
            ',
            'js_page' => '
                <!-- Summernote js -->
                <script src="'.base_url().'assets/back/assets/libs/summernote/summernote-bs4.min.js"></script>

                <!-- Dropify js-->
                <script src="'.base_url().'assets/back/assets/libs/dropify/dropify.min.js"></script>
                <script src="'.base_url().'assets/back/assets/libs/dropify/dropify.js"></script>

                <!-- Select 2 -->
                <script src="'.base_url().'assets/back/assets/libs/select2/select2.min.js"></script>
                <script src="'.base_url().'assets/back/assets/libs/jquery-mockjax/jquery.mockjax.min.js"></script>
                <script src="'.base_url().'assets/back/assets/libs/autocomplete/jquery.autocomplete.min.js"></script>

                <!--Bootstrap maxlength-->
                <script src="'.base_url().'assets/back/assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>

                <!--Parsley-->
                <script src="'.base_url().'assets/back/assets/libs/parsleyjs/parsley.min.js"></script>

                <!-- Init js -->
                <script src="'.base_url().'assets/back/assets/js/pages/form-summernote.init.js"></script>
                <script src="'.base_url().'assets/back/assets/js/pages/form-advanced.init.js"></script>
                <script src="'.base_url().'assets/back/assets/js/pages/form-validation.init.js"></script>
                
            '
        ];

        if(isset($_POST['profilesSubmit'])){
            if($this->pm->setProfiles()){
                $this->session->set_flashdata('success', 'Data berhasil diupdate');
                redirect(base_url('profiles'));
            }else{
                $this->session->set_flashdata('success', 'Data gagal diupdate');
            }
        }

		$this->load->view('back', $data);
	}
}
