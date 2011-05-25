<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Khs extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('admin/Kuliah_model');
		$this->load->model('admin/Khs_model');
		$this->load->model('admin/Mahasiswa_model');
		$this->load->model('admin/Matkul_model');
		$this->load->helper('bantuan_helper');
		if(!$this->session->userdata('status') && !$this->session->userdata('username') ){
			redirect('home');
		}
	}

	function index()
	{	$config['base_url'] = $this->config->site_url().'/admin/khs/index';
		$config['total_rows'] = $this->db->count_all('tb_mahasiswa');
		$per_page = $config['per_page'] = 10;
		$offset = $this->uri->segment(4);
		$config['uri_segment'] = '4';	
		$data['urutan'] = $this->uri->segment(4);		
		$data['title'] = 'GunungKidul';
					
				/*	
					
					if($data['status']=='1')	{
			
								$data['input'] = '' ;

						}
						else {
						$data['input'] = 'input';

						}
				*/
		$data['query'] = $this->Mahasiswa_model->getMahasiswa('list',FALSE,$per_page,$offset);
		$data['main_view'] = 'admin/khs/index';
		$this->pagination->initialize($config);
		$this->load->view('admin/index',$data);
	}

	
function view() {
			
			$id = $this->uri->segment(4);
			
			$data['title'] = 'Edit  Kuliah';
			$data['main_view'] = 'admin/khs/view';
			$data['id_mhs'] = $id;
			$data['nama'] = $this->Mahasiswa_model->getMahasiswa('by_id',$id);

			$tahun = $this->input->post('tahun');
				$semester = $this->input->post('semester');
				$id_mhs = $this->session->userdata('id_mahasiswa');

				$qr = $this->db->query("SELECT m.nama_matkul FROM tb_matkul m 
												JOIN tb_kuliah k ON k.id_matkul = m.id_matkul 
												WHERE m.tahun='$tahun' AND m.semester='$semester' AND k.id_mahasiswa='$id_mhs'");

			$data['query'] = $qr->result_array();
			$this->load->view('admin/index',$data);
			
					
}

					
function search()
				{
				
				
						
						$id_mhs = $this->input->post('id_mhs');
						$tahun = $this->input->post('tahun');
						$semester = $this->input->post('semester');
					
						$qr = $this->db->query("SELECT m.nama_matkul, k.nilai_huruf, k.nilai_angka, k.id_kuliah
												FROM tb_kuliah k 
												JOIN tb_matkul m ON m.id_matkul = k.id_matkul 
												WHERE m.tahun='$tahun' AND m.semester='$semester' AND k.id_mahasiswa='$id_mhs'");

			$data['query'] = $qr->result_array();
			$data['title'] = 'Edit  Kuliah';
			$data['main_view'] = 'admin/khs/view';
			$data['id_mahasiswa'] = $id_mhs;
			$data['nama'] = $this->Mahasiswa_model->getMahasiswa('by_id',$id_mhs);
			
				$this->load->view('admin/index',$data);


			}


					
function input_khs()
				{
				$id_kuliah= $this->uri->segment(4);
					$qr = $this->db->query("select k.id_mahasiswa, k.id_matkul, k.nilai_angka, k.nilai_huruf, m.semester, m.tahun
											from tb_kuliah k 
											JOIN tb_matkul m ON m.id_matkul = k.id_matkul
											where k.id_kuliah='$id_kuliah' "); 
											
				$row= $qr->row();		
						$id_mhs = $row->id_mahasiswa;
						$status = 1;
					
				$data=array('id_mahasiswa'=> $row->id_mahasiswa,
							'id_matkul'=> $row->id_matkul,
							'nilai_angka'=> $row->nilai_angka,
							'nilai_huruf'=> $row->nilai_huruf,
							'semester'=> $row->semester,
							'tahun'=> $row->tahun,
							'status'=> $status);
						
		
			
			$this->Khs_model->addKhs($data);
			redirect('admin/khs/view/'.$id_mhs);


			}
		
			
			
			
					
		function delete() {
				$id_mhs = $this->uri->segment(5);
				$id = $this->uri->segment(4);
				$this->Kuliah_model->deleteKuliah($id);
				redirect('admin/khs/view/'.$id_mhs);
	}
					
					
}


?>