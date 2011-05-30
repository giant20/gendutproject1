<?php
class Krs extends CI_Controller {

		function __construct() {
			parent::__construct();
				$this->load->model('Home_model');
				$this->load->helper('bantuan_helper');
				$this->load->model('mhs/Kuliah_model');
				$this->load->model('admin/Matkul_model');
				$this->load->model('mhs/Khs_model');
				$this->load->model('konten/Konten_model');
		}
	function index(){
		$data['title'] = 'KHS Mahasiswa';
			$data['status'] = $this->session->userdata('id_mahasiswa');
			$data['username'] = $this->session->userdata('username');
			$data['id_mahasiswa'] = $this->session->userdata('id_mahasiswa');
			
				//$id = $this->uri->segment(4);
				$tahun = $this->input->post('tahun');
				$semester = $this->input->post('semester');
				$id_mhs = $this->session->userdata('id_mahasiswa');

						$qr = $this->db->query("SELECT h.nilai_huruf, m.nama_matkul 
												FROM tb_matkul m 
												JOIN tb_khs h ON h.id_matkul = m.id_matkul 
												where h.id_semester='$semester' and h.id_mahasiswa='$id_mhs'");

			$data['query'] = $this->Kuliah_model->getKuliah('by_id',FALSE,$qr,FALSE,FALSE);
			$data['query2'] = $this->Konten_model->getKonten('info',FALSE);
			$data['query3'] = $this->Khs_model->getKhs('by_sem',FALSE,$id_mhs,FALSE,FALSE);
			$data['query4'] = $this->Konten_model->getKonten('berita_it',FALSE);
			$data['query5'] = $this->Konten_model->getKonten('kabar_it',FALSE);
			$data['query7'] = $this->Matkul_model->getMatkul('list',FALSE,FALSE,FALSE);
			$data['row2'] = $this->Kuliah_model->getKuliah('by_id',FALSE,$qr,FALSE,FALSE);
			$usernama = $this->session->userdata('id_mahasiswa');
			$data['nama'] = $this->session->userdata('nama_mahasiswa');
			$data['img'] = $this->session->userdata('gambar');


			$data['copy'] = 'Copyright &copy; 2011 by genduty.blogspot.com. All Rights Reserved.';
			$data['link_copy'] = 'www.genduty.blogspot.com';
			
			

						if ($data['username'] == $this->session->userdata('username')){
							//menampilkan user
							$data['navigasi'] = 'navigasi_user';
							$data['slide_view'] = "mhs/user";
							$data['main_view'] = 'mhs/krs';
							$this->load->view('index',$data);
							}

						
						else{
						//menampilkan halaman login
						$data['navigasi'] = 'navigasi';
						$data['slide_view'] = "mhs/login.php";
						$data['main_view'] = 'mhs/krs';
						$this->load->view('index',$data);
						}
	
	
	}
	
function add() {
				
						
				$this->form_validation->set_rules('kode','kode','required');
				$this->form_validation->set_rules('nama_mahasiswa','nama_mahasiswa','required');
				if($this->form_validation->run()== FALSE) {
				$id = $this->uri->segment(4);
				$data['title'] = 'Edit Mahasiswa';
				$data['main_view'] = 'mhs/krs/add';
				$data['query'] = $this->Matkul_model->getMatkul('list',$id);
				$this->load->view('index',$data);
			}
			else {
					$id = $this->uri->segment(4);
					foreach ($this->input->post('kode') as $row) { 
					/* if (!$this->input->post('kelas'.$row) && !$row==''){	
					//$this->session->set_flashdata('item', 'data kosong');
						redirect('admin/kuliah/add/'.$id);		
					}*/
				//else {
					$kelas = $this->input->post('kelas'.$row);
									$id = $this->uri->segment(4);							
				$data=array('id_mahasiswa'=> $id,
								'id_matkul'=> $row,
							'kelas'=> $kelas);
												
					//	echo $this->input->post('kode');
						$this->Kuliah_model->addKuliah($data);

						
				}
				
			
				
				redirect('home'.$id);
				//}
				}
	}	
	


}

?>