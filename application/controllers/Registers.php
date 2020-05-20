<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registers extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('masuk')) {
            redirect(base_url('login'));
        }elseif ($this->session->userdata('status') == 'anggota') {
            redirect(base_url('dashboard'));
        }

        $this->load->model('Teams_model', 'tm');
        $this->load->model('Profiles_model', 'pm');
    }

	public function index()
	{
        $data = [
            'title' => 'Dashboard - Pendaftaran',
            'contents' => 'back/registers',
            'status' => $this->pm->getProfiles(),
            'registers' => $this->tm->getTeamsByVerified(),
            'css_page' => '
                <!-- Footable css -->
                <link href="'.base_url().'assets/back/assets/libs/footable/footable.core.min.css" rel="stylesheet" type="text/css" />
                <link href="'.base_url().'assets/back/assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet"
                	type="text/css" />
            ',
            'js_page' => '
                <!-- Footable js -->
                <script src="'.base_url().'assets/back/assets/libs/footable/footable.all.min.js"></script>

                <!-- Vendor js -->

                <script src="'.base_url().'assets/back/assets/libs/sweetalert2/sweetalert2.min.js"></script>

                <script src="'.base_url().'assets/back/assets/js/pages/sweet-alerts.init.js"></script>

                <script type="text/javascript">
                    function confirmDelete(indeks, e) {
                        e.preventDefault();
                        var formname = "form" + indeks;
                        Swal.fire({
                            title: "Apakah anda yakin?",
                            text: "Untuk meverifikasi data ini!",
                            type: "warning",
                            showCancelButton: !0,
                            confirmButtonColor: "#3085d6",
                            cancelButtonColor: "#d33",
                            confirmButtonText: "Ya, Verifikasi!"
                        }).then((result) => {
                            if (result.value) {
                                result.value && Swal.fire("Berhasil!", "Data sudah diverifikasi.",
                                    "success")
                                document.forms[formname].submit();
                            }
                        })

                    }
                </script>

                <!-- Init js -->
                <script src="'.base_url().'assets/back/assets/js/pages/foo-tables.init.js"></script>
            '
        ];

        if(isset($_POST['verifikasi'])){
            if($this->tm->verifikasiTeams($this->input->post('id_anggota'), $this->input->post('nim'))){
                $this->session->set_flashdata('success', 'Data berhasil diverifikasi');
                redirect(base_url('registers'));
            }else{
                $this->session->set_flashdata('error', 'Data gagal diverifikasi');
            }
        }

        if(isset($_POST['buka'])){
            if($this->pm->setBuka()){
                $this->session->set_flashdata('success', 'Pendaftara berhasil dibuka');
                redirect(base_url('registers'));
            }else{
                $this->session->set_flashdata('error', 'Pendaftara gaagl dibuka');
            }
        }

        if(isset($_POST['tutup'])){
            if($this->pm->setTutup()){
                $this->session->set_flashdata('success', 'Pendaftara berhasil ditutup');
                redirect(base_url('registers'));
            }else{
                $this->session->set_flashdata('error', 'Pendaftara gagal ditutup');
            }
        }

		$this->load->view('back', $data);
	}
}
