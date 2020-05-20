<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Front extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Profiles_model', 'pm');
        $this->load->model('Blogs_model', 'bm');
        $this->load->model('Teams_model', 'tm');
        $this->load->model('Categorys_model', 'km');
    }

	public function index()
	{
        $profiles = $this->pm->getProfiles();
        $blogs = $this->bm->getBlogsFront();
        $teams = $this->tm->getTeamsFront();
        $kategori = $this->km->getCategorys();
        $data = [
            'title' => $profiles->webname,
            'home_menu' => 'home_menu',
            'contents' => 'front/index',
            'profiles' => $profiles,
            'blogs' => $blogs ,
            'teams' => $teams ,
            'kategori' => $kategori,
            'ketua' => $this->tm->getTeamsById($profiles->ketua),
            'wakil_ketua' => $this->tm->getTeamsById($profiles->wakil_ketua),
            'sekretaris' => $this->tm->getTeamsById($profiles->sekretaris),
        ];

		$this->load->view('front', $data);
	}
}
