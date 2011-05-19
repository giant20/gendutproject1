<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kuliah extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('admin/Kuliah_model');
		$this->load->model('admin/Mahasiswa_model');
		$this->load->model('admin/Matkul_model');
		$this->load->helper('bantuan_helper');

		if(!$this->session->userdata('status') && !$this->session->userdata('username') ){
			redirect('home');
		}
		
		
	}

	function index()
	{	$config['base_url'] = $this->config->site_url().'/admin/kuliah/index';
		$config['total_rows'] = $this->db->count_all('tb_mahasiswa');
		$per_page = $config['per_page'] = 2;
		$offset = $this->uri->segment(4);
			
		$data['urutan'] = $this->uri->segment(3);		
		$data['title'] = 'GunungKidul';
		$data['query'] = $this->Mahasiswa_model->getMahasiswa('list',FALSE,$per_page,$offset);
		$data['main_view'] = 'admin/kuliah/index';
		$this->pagination->initialize($config);
		$this->load->view('admin/index',$data);
	
	}

	
function view() {
			
			$id = $this->uri->segment(4);
			
			$data['title'] = 'Edit  Kuliah';
			$data['main_view'] = 'admin/kuliah/view';
			$data['id_mhs'] = $id;
			$data['nama'] = $this->Mahasiswa_model->getMahasiswa('by_id',$id);
			//$data['nama_mahasiswa'] = $nama->nama_mahasiswa;
			$data['query'] = $this->Kuliah_model->getKuliah('by_mhs',FALSE,$id);

			$this->load->view('admin/index',$data);
			
					
}
function edit() {
			
						
			$this->form_validation->set_rules('id_matkul','kode','required');
			$this->form_validation->set_rules('kelas','kelas','required');

			if($this->form_validation->run()== FALSE) {
				$id = $this->uri->segment(4);
				$data['title'] = 'Edit Mahasiswa';
				$data['main_view'] = 'admin/kuliah/edit';
				$data['query'] = $this->Matkul_model->getMatkul('list',$id);
				$data['row'] = $this->Kuliah_model->getKuliah('by_id',$id,FALSE);
				$this->load->view('admin/index',$data);
			}
			else {
			
				$id = $this->uri->segment(5);
				$data=array('id_matkul'=> $this->input->post('id_matkul'),
							'kelas'=> $this->input->post('kelas'));
							
						$this->Kuliah_model->editKuliah($id,$data);
						redirect('admin/kuliah/view/'.$id);
				}
			}
			
function add() {
				
						
				$this->form_validation->set_rules('kode','kode','required');
				$this->form_validation->set_rules('nama_mahasiswa','nama_mahasiswa','required');
				if($this->form_validation->run()== FALSE) {
				$id = $this->uri->segment(4);
				$data['title'] = 'Edit Mahasiswa';
				$data['main_view'] = 'admin/kuliah/add';
				$data['query'] = $this->Matkul_model->getMatkul('list',$id);
				$data['row'] = $this->Mahasiswa_model->getMahasiswa('by_id',$id);
				$this->load->view('admin/index',$data);
			}
			else {

					foreach ($this->input->post('kode') as $row) { 
					if (!$this->input->post('admin/kelas'.$row) && !$row==''){	
					echo error;
					
					}
				else {
					$kelas = $this->input->post('kelas'.$row);
									$id = $this->uri->segment(5);							
				$data=array('id_mahasiswa'=> $id,
								'id_matkul'=> $row,
							'kelas'=> $kelas);
												
					//	echo $this->input->post('kode');
						$this->Kuliah_model->addKuliah($data);

						
				}
				
			
				
				redirect('admin/kuliah/view/'.$id);
				}}
			}
					
}


?>