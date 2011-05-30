<?php
class Konten extends CI_Controller {
		
		function __construct() {
			parent::__construct();
			$this->load->model('konten/Konten_model');
			$this->load->model('admin/Mahasiswa_model');
		}
		
	
	function detail_info() {
			$id_konten = $this->uri->segment(4);	
			$data['title'] = 'Home';
			$data['nama'] = $this->session->userdata('nama_mahasiswa');
			$data['img'] = $this->session->userdata('gambar');
			
			$data['copy'] = 'Copyright &copy; 2011 by genduty.blogspot.com. All Rights Reserved.';
			$data['link_copy'] = 'www.genduty.blogspot.com';
			$data['query2'] = $this->Konten_model->getKonten('info',FALSE,$id_konten);
			$data['query4'] = $this->Konten_model->getKonten('berita_it',FALSE);
			$data['query5'] = $this->Konten_model->getKonten('kabar_it',FALSE);
			//$data['title2'] = $query2->title;
			$data['row']=$this->Konten_model->getKonten(FALSE,$id_konten,FALSE,FALSE);
			$data['status'] = $this->session->userdata('status');
			$data['username'] = $this->session->userdata('username');
			$data['id_mahasiswa'] = $this->session->userdata('id_mahasiswa');
					
			if (!empty($data['status']))
							{
			
							$data['username'] = $this->session->userdata('username');
							//menampilkan user
								$data['navigasi'] = 'navigasi_user';
								$data['slide_view'] = "mhs/user";
								$data['main_view'] = 'detail_info';
								$this->load->view('index',$data);

						}
						else {
						//menampilkan halaman login
						$data['navigasi'] = 'navigasi';
						$data['slide_view'] = "mhs/login.php";
						$data['main_view'] = 'detail_info';
						$this->load->view('index',$data);

						}
							
	
	}
	
	
	function detail_berita() {
			$id_konten = $this->uri->segment(4);	
			$data['title'] = 'Home';
			$data['nama'] = $this->session->userdata('nama_mahasiswa');
			$data['img'] = $this->session->userdata('gambar');
			
			$data['copy'] = 'Copyright &copy; 2011 by genduty.blogspot.com. All Rights Reserved.';
			$data['link_copy'] = 'www.genduty.blogspot.com';
			$data['query2'] = $this->Konten_model->getKonten('info',FALSE,$id_konten);
			$data['query4'] = $this->Konten_model->getKonten('berita_it',FALSE);
			$data['query5'] = $this->Konten_model->getKonten('kabar_it',FALSE);
			//$data['title2'] = $query2->title;
			$data['row']=$this->Konten_model->getKonten(FALSE,$id_konten,FALSE,FALSE);
			$data['status'] = $this->session->userdata('status');
			$data['username'] = $this->session->userdata('username');
			$data['id_mahasiswa'] = $this->session->userdata('id_mahasiswa');
					
			if (!empty($data['status']))
							{
			
							$data['username'] = $this->session->userdata('username');
							//menampilkan user
								$data['navigasi'] = 'navigasi_user';
								$data['slide_view'] = "mhs/user";
								$data['main_view'] = 'konten/detail_berita';
								$this->load->view('index',$data);

						}
						else {
						//menampilkan halaman login
						$data['navigasi'] = 'navigasi';
						$data['slide_view'] = "mhs/login.php";
						$data['main_view'] = 'konten/detail_berita';
						$this->load->view('index',$data);

						}
							
	
	}

}