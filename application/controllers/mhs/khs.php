<?php
class Khs extends CI_Controller {

	function __construct(){
			parent::__construct();
				$this->load->model('Home_model');
				$this->load->helper('bantuan_helper');
				$this->load->model('mhs/Kuliah_model');
				$this->load->model('mhs/Matkul_model');
				$this->load->model('mhs/Khs_model');
	}

	function index(){
			$data['title'] = 'KHS Mahasiswa';
			$data['status'] = $this->session->userdata('id_mahasiswa');
			$data['username'] = $this->session->userdata('username');
			$data['id_mahasiswa'] = $this->session->userdata('id_mahasiswa');

				if (!empty($data['status']))
							{

							if ($data['username'] == $this->session->userdata('username'))
							//menampilkan user

							$data['slide_view'] = "mhs/user";


						}
						else
						//menampilkan halaman login
						$data['slide_view'] = "mhs/login.php";


				$tahun = $this->input->post('tahun');
				$semester = $this->input->post('semester');
				$id_mhs = $this->session->userdata('id_mahasiswa');

						$qr = $this->db->query("SELECT h.nilai_huruf, m.nama_matkul 
												FROM tb_matkul m 
												JOIN tb_khs h ON h.id_matkul = m.id_matkul 
												where h.id_semester='$semester' and h.id_mahasiswa='$id_mhs'");

			$data['query'] = $this->Kuliah_model->getKuliah('by_id',FALSE,$qr,FALSE,FALSE);

				$usernama = $this->session->userdata('id_mahasiswa');
			$data['nama'] = $this->session->userdata('nama_mahasiswa');
			$data['img'] = $this->session->userdata('gambar');


			$data['copy'] = 'Copyright &copy; 2011 by genduty.blogspot.com. All Rights Reserved.';
			$data['link_copy'] = 'www.genduty.blogspot.com';
			$data['main_view'] = 'mhs/khs';
				$this->load->view('index',$data);

	}



			function search()
				{
			$data['title'] = 'KHS Mahasiswa';
			$data['status'] = $this->session->userdata('id_mahasiswa');
			$data['username'] = $this->session->userdata('username');

			$data['id_mahasiswa'] = $this->session->userdata('id_mahasiswa');

					if (!empty($data['status']))
							{

							if ($data['username'] == $this->session->userdata('username'))
							//menampilkan user

							$data['slide_view'] = "mhs/user";


						}
						else
						//menampilkan halaman login
						$data['slide_view'] = "mhs/login.php";

						
						$semester = $this->uri->segment(4);
						$id_mhs = $this->session->userdata('id_mahasiswa');
						$qr = $this->db->query("SELECT h.nilai_huruf, m.nama_matkul 
												FROM tb_matkul m 
												JOIN tb_khs h ON h.id_matkul = m.id_matkul 
												where h.id_semester='$semester' and h.id_mahasiswa='$id_mhs'");

			$data['query'] = $qr->result_array();
			$data['nama'] = $this->session->userdata('nama_mahasiswa');
			$data['img'] = $this->session->userdata('gambar');
			$data['copy'] = 'Copyright &copy; 2011 by genduty.blogspot.com. All Rights Reserved.';
			$data['link_copy'] = 'www.genduty.blogspot.com';
			$data['main_view'] = 'mhs/khs';
			$this->load->view('index',$data);



			}




}


?>