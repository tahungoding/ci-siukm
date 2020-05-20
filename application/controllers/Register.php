<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Profiles_model', 'pm');
        $this->load->model('Categorys_model', 'km');
        $this->load->model('Divisi_model', 'dm');
        $this->load->model('Teams_model', 'tm');
    }

	public function index()
	{
        $profiles = $this->pm->getProfiles();
        $kategori = $this->km->getCategorys();
        $divisi = $this->dm->getDivisis();
        $team = $this->dm->getDivisis();
        $data = [
            'title' => $profiles->webname. ' - PENDAFTARAN',
            'contents' => 'front/register',
            'css_page' => '<link rel="stylesheet" href="'.base_url().'assets/front/css/nice-select.css">',
            'js_page' => '<script src="'.base_url().'assets/front/js/jquery.nice-select.min.js"></script>',
            'profiles' => $profiles,
            'kategori' => $kategori,
            'divisi' => $divisi
        ];

        if ($this->input->post()) {
            $search = ['nim' => $this->input->post('nim'), 'program_studi' => $this->input->post];
            $cek = $this->tm->getTeamsOnly($search);

            $hasil = $this->input->post('hasil');
            $nilai = $this->input->post('nilai1') + $this->input->post('nilai2');

            if ($cek->num_rows > 0) {
                $this->session->set_flashdata('error', 'Nim atau Program Studi yang dipilih tidak tersedia');
                redirect(base_url('register'),'refresh');
            }elseif ($hasil == $nilai) {
                $this->tm->addRegister();
                $this->session->set_flashdata('success', 'Pendaftaran berhasil dibuat, tunggu informasi selanjutnya');
                redirect(base_url('register'),'refresh');
            }else{
                $this->session->set_flashdata('error', 'Penjumlahan anda salah !');
                redirect(base_url('register'),'refresh');
            }
        }

		$this->load->view('front', $data);
	}
}
