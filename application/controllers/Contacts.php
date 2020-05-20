<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contacts extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('masuk')) {
            redirect(base_url('login'));
        }elseif ($this->session->userdata('status') == 'anggota') {
            redirect(base_url('dashboard'));
        }

        $this->load->model('Contacts_model', 'cm');
    }

	public function index()
	{
        $data = [
            'title' => 'Dashboard - Kotak Masukan',
            'contents' => 'back/contacts',
            'contacts' => $this->cm->getContacts(),
            'css_page' => '
                <!-- Footable css -->
                <link href="'.base_url().'assets/back/assets/libs/footable/footable.core.min.css" rel="stylesheet" type="text/css" />
                <link href="'.base_url().'assets/back/assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet"
                	type="text/css" />
            ',
            'js_page' => '
                <!-- Footable js -->
                <script src="'.base_url().'assets/back/assets/libs/footable/footable.all.min.js"></script>

                <!-- Init js -->
                <script src="'.base_url().'assets/back/assets/js/pages/foo-tables.init.js"></script>

                <!-- Vendor js -->
                <script src="'.base_url().'assets/back/assets/libs/sweetalert2/sweetalert2.min.js">
                </script>
                <script src="'.base_url().'assets/back/assets/js/pages/sweet-alerts.init.js"></script>
                <script type="text/javascript"> 
                function confirmDelete(indeks, e){
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
                        result.value && Swal.fire("Berhasil!", "Data sudah dihapus.", "success")
                        document.forms[formname].submit();
                        }
                        })

                }
                </script>
            '
        ];

        if (isset($_POST['deleteContacts'])) {
            if ($this->cm->deleteContacts($this->input->post('id_saran'))) {
                $this->session->set_flashdata('success', 'Data berhasil dihapus');
                redirect(base_url('contacts'), 'refresh');
            }else{
                $this->session->set_flashdata('success', 'Data gagal dihapus');
            }
        }

		$this->load->view('back', $data);
	}
}
