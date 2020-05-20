<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Login_model', 'lm');
		$this->load->model('Profiles_model', 'pm');
	}

	public function index()
	{
		if (isset($_POST['masuk'])) {
			$username = $this->input->post('username');

			$check = $this->lm->get($username);
			// print_r($check);
			// die;
			if (!empty($check)) {
				if ($check->password == md5($this->input->post('password'))) {
					if ($check->deleted == 1) {
						$this->session->set_flashdata('msg', 'User yang anda gunakan sudah tidak aktif/dihapus');
					}else{
						if ($check->level_user == 1) {
							$this->session->set_userdata('status', 'ketua');
						}elseif ($check->level_user == 2) {
							$this->session->set_userdata('status', 'wakil ketua');
						}elseif ($check->level_user == 3) {
							$this->session->set_userdata('status', 'sekretaris');
						}else{
							$this->session->set_userdata('status', 'anggota');
						}
						$this->session->set_userdata('masuk', true);
						$this->session->set_userdata('id_user', $check->id_user);
						redirect(base_url('dashboard'));
					}
				}else{
					$this->session->set_flashdata('msg', 'Maaf password yang anda masukan salah');
				}
			}else{
				$this->session->set_flashdata('msg', 'Maaf username yang anda masukan tidak terdaftar');
			}
		}

		$data['profiles'] = $this->pm->getProfiles();

		$this->load->view('back/login', $data);
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
}
