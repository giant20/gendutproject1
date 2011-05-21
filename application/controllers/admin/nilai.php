<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Nilai extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('admin/Nilai_model');
		$this->load->model('admin/Kuliah_model');
		$this->load->model('admin/Mahasiswa_model');
		$this->load->helper('bantuan_helper');
		
			if(!$this->session->userdata('status') && !$this->session->userdata('username') ){
			redirect('home');
		}
		
		
	}

	function index()
	{
		$data['title'] = 'GunungKidul';
		$data['query'] = $this->Mahasiswa_model->getMahasiswa('list',FALSE);
		$data['main_view'] = 'admin/nilai/index';
		$this->load->view('admin/index',$data);
	
	}

	
function view() {
							
			$id = $this->uri->segment(4);
			$data['title'] = 'Edit  Nilai';
			$data['main_view'] = 'admin/nilai/view';
			$data['id_mhs'] = $id;
			$data['nama'] = $this->Mahasiswa_model->getMahasiswa('by_id',$id);
			//$data['nama_mahasiswa'] = $nama->nama_mahasiswa;
			$data['query'] = $this->Nilai_model->getNilai('by_mhs',$id);
			$this->load->view('admin/index',$data);
			
					
}
function edit() {
			
						
			$this->form_validation->set_rules('id_matkul','id_matkul','required');
			$this->form_validation->set_rules('nilai_huruf','nilai_huruf','required');
			$this->form_validation->set_rules('nilai_angka','nilai_angka','required');
			if($this->form_validation->run()== FALSE) {
				$id_mahasiswa = $this->uri->segment(5);
				$id = $this->uri->segment(4);
				$data['title'] = 'Edit Nilai Mahasiswa';
				$data['main_view'] = 'admin/nilai/edit';
				$data['nama'] = $this->Mahasiswa_model->getMahasiswa('by_id',$id_mahasiswa);
				$data['row'] = $this->Nilai_model->getNilai('by_id',FALSE,$id);
				$this->load->view('admin/index',$data);
			}
			else {
				$id_mahasiswa = $this->uri->segment(5);
				$id = $this->uri->segment(4);
				$data=array('id_mahasiswa' =>$id_mahasiswa,
							'id_matkul'=> $this->input->post('id_matkul'),
							'nilai_huruf'=> $this->input->post('nilai_huruf'),
							'nilai_angka' => $this->input->post('nilai_angka'));
							
						$this->Nilai_model->editNilai($id,$data);
						redirect('admin/nilai/view/'.$id_mahasiswa);
				}
			}
			
		function add() {
						
			$this->form_validation->set_rules('id_matkul','id_matkul','required');
			$this->form_validation->set_rules('nilai_huruf','nilai_huruf','required');
			$this->form_validation->set_rules('nilai_angka','nilai_angka','required');

			if($this->form_validation->run()== FALSE) {
				$id = $this->uri->segment(4);
				$data['title'] = 'Edit Nilai';
				$data['main_view'] = 'admin/nilai/add';
				$data['nama'] = $this->Mahasiswa_model->getMahasiswa('by_id',$id);
				$data['row'] = $this->Nilai_model->getNilai('by_id',$id);
				$this->load->view('admin/index',$data);
			}
			else {
			
				$id = $this->uri->segment(4);
				$data=array('id_mahasiswa' =>$id,
							'id_matkul'=> $this->input->post('id_matkul'),
							'nilai_huruf'=> $this->input->post('nilai_huruf'),
							'nilai_angka' => $this->input->post('nilai_angka'));
							
							
						$this->Nilai_model->addNilai($data);
						redirect('admin/nilai/view/'.$id);
				}
			}
					
			
	
	function delete() {
	$id_mahasiswa = $this->uri->segment(5);
	$id = $this->uri->segment(4);
	$this->Nilai_model->deleteNilai($id);
	redirect('admin/nilai/view/'.$id_mahasiswa);
	}
					
}


?>