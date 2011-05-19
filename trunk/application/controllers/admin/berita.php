<?php
class Berita extends CI_Controller {
	
	function __construct() {
	
		parent::__construct();
			$this->load->model('admin/Berita_model');
					if(!$this->session->userdata('status') && !$this->session->userdata('username') ){
			redirect('home');
		}
	}
	
			
		function index()
	{
		$id = $this->uri->segment(3);
		$data['title'] = 'GunungKidul';
		$data['query'] = $this->Berita_model->getKonten('berita',FALSE,FALSE,FALSE);
		$data['main_view'] = 'admin/berita/index';
		$this->load->view('admin/index',$data);
	
	}
	function add_berita()
	{
		$this->form_validation->set_rules('title', 'Judul','required');
		$this->form_validation->set_rules('konten', 'Isi Konten','required');
		
		if($this->form_validation->run() == FALSE)
		{
			$id_konten = $this->uri->segment(4);
			$data['menu'] = 'konten';
			$data['title'] = 'Tambah Konten Berita';
			$data['query'] = $this->Berita_model->getKonten(FALSE,$id_konten,FALSE,FALSE);
			$data['main_view'] = 'admin/berita/add_berita';
			$this->load->view('admin/index',$data);
		}
		else
		{
			$data = array(
					'title'=>$this->input->post('title'),
					'konten' =>$this->input->post('konten'),
					'kat' =>'berita',
					'page' =>'berita',
					'image'=>''
					);
			$this->Berita_model->addKonten($data);
			redirect('admin/berita');
		}
	}
	
	



}

?>