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

				$qr = $this->db->query("SELECT * FROM tb_khs WHERE tahun='$tahun' AND semester='$semester' AND id_mahasiswa='$id_mhs'");

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

						$tahun = $this->input->post('tahun');
						$semester = $this->input->post('semester');
						$id_mhs = $this->session->userdata('id_mahasiswa');
						$qr = $this->db->query("SELECT m.nama_matkul, n.nilai_huruf
												FROM tb_khs k
												JOIN tb_matkul m ON m.id_matkul = k.id_matkul
												JOIN tb_nilai n ON n.id_matkul = m.id_matkul
												WHERE k.tahun='$tahun' AND k.semester='$semester' AND k.id_mahasiswa='$id_mhs'");

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