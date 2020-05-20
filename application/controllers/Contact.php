<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Profiles_model', 'pm');
        $this->load->model('Categorys_model', 'km');
        $this->load->model('Contacts_model', 'cm');
    }

	public function index()
	{
        $profiles = $this->pm->getProfiles();
        $kategori = $this->km->getCategorys();
        $data = [
            'title' => $profiles->webname. ' - CONTACT',
            'contents' => 'front/contact',
            'js_page' => '
                <!-- particles js -->
                <script src="js/contact.js"></script>
                <!-- ajaxchimp js -->
                <script src="js/jquery.ajaxchimp.min.js"></script>
                <!-- validate js -->
                <script src="js/jquery.validate.min.js"></script>
                <!-- form js -->
                <script src="js/jquery.form.js"></script>
            ',
            'profiles' => $profiles,
            'kategori' => $kategori
        ];

        if(isset($_POST['addIdea'])){
            $nilai = $this->input->post('nilai1') + $this->input->post('nilai2');
            $hasil = $this->input->post('hasil');
            if($nilai == $hasil){
                $this->cm->addContacts();
                $this->session->set_flashdata('success', 'Saran anda berhasil dikirim !');
                redirect(base_url('contact'), 'refresh');
            }else{
                $this->session->set_flashdata('error', 'Saran anda gagal dikirim ! <br> periksa nilai dari penjumlahan.');
                redirect(base_url('contact'), 'refresh');
            }
        }

		$this->load->view('front', $data);
	}
}
