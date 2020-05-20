<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Divisis extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('masuk')) {
            redirect(base_url('login'));
        }

        $this->load->model('Divisi_model', 'divm');
    }

	public function index()
	{
        $data = [
            'title' => 'Dashboard - Divisi',
            'contents' => 'back/divisis',
            'lists' => $this->divm->getDivisis()
        ];

        if (isset($_POST['addDivisi'])) {
           if ($this->divm->addDivisi()) {
               $this->session->set_flashdata('success', 'Data divisi berhasil ditambahkan');
               redirect(base_url('divisis'),'refresh');
           }else{
               $this->session->set_flashdata('error', 'Data divisi gagal ditambahkan');
           }
        }

        if (isset($_POST['editDivisi'])) {
           if ($this->divm->editDivisi()) {
               $this->session->set_flashdata('success', 'Data divisi berhasil diupdate');
               redirect(base_url('divisis'),'refresh');
           }else{
               $this->session->set_flashdata('error', 'Data divisi gagal diupdate');
           }
        }

        if (isset($_POST['deleteDivisi'])) {
           if ($this->divm->deleteDivisi()) {
               $this->session->set_flashdata('success', 'Data divisi berhasil dihapus');
               redirect(base_url('divisis'),'refresh');
           }else{
               $this->session->set_flashdata('error', 'Data divisi gagal dihapus');
           }
        }

		$this->load->view('back', $data);
	}
}
