<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categorys extends CI_Controller {

     public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('masuk')) {
            redirect(base_url('login'));
        }

        $this->load->model('Categorys_model', 'cm');
    }

	public function index()
	{
        $data = [
            'title' => 'Dashboard - Kategori',
            'contents' => 'back/categorys',
            'lists' => $this->cm->getCategorys()
        ];

        if (isset($_POST['addCategorys'])) {
           if ($this->cm->addCategorys()) {
               $this->session->set_flashdata('success', 'Data kategori berhasil ditambahkan');
               redirect(base_url('categorys'),'refresh');
           }else{
               $this->session->set_flashdata('error', 'Data kategori gagal ditambahkan');
           }
        }

        if (isset($_POST['editCategorys'])) {
           if ($this->cm->editCategorys()) {
               $this->session->set_flashdata('success', 'Data kategori berhasil diupdate');
               redirect(base_url('categorys'),'refresh');
           }else{
               $this->session->set_flashdata('error', 'Data kategori gagal diupdate');
           }
        }

        if (isset($_POST['deleteCategorys'])) {
           if ($this->cm->deleteCategorys()) {
               $this->session->set_flashdata('success', 'Data kategori berhasil dihapus');
               redirect(base_url('categorys'),'refresh');
           }else{
               $this->session->set_flashdata('error', 'Data kategori gagal dihapus');
           }
        }

		$this->load->view('back', $data);
	}
}
