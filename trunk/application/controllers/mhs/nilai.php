<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Nilai extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Nilai_model');
		$this->load->model('Mahasiswa_model');
		$this->load->helper('bantuan_helper');
		
			if(!$this->session->userdata('id_user') && !$this->session->userdata('user_display') ){
			redirect('home');
		}
		
		
	}

	function index()
	{
		$data['title'] = 'GunungKidul';
		$data['query'] = $this->Mahasiswa_model->getMahasiswa('list',FALSE);
		$data['main_view'] = 'nilai/index';
		$this->load->view('index',$data);
	
	}

	
function view() {
							
			$id = $this->uri->segment(3);
			$data['title'] = 'Edit  Nilai';
			$data['main_view'] = 'nilai/view';
			$data['id_mhs'] = $id;
			$data['nama'] = $this->Mahasiswa_model->getMahasiswa('by_id',$id);
			//$data['nama_mahasiswa'] = $nama->nama_mahasiswa;
			$data['query'] = $this->Nilai_model->getNilai('by_mhs',$id);
			$this->load->view('index',$data);
			
					
}
function edit() {
			
						
			$this->form_validation->set_rules('id_matkul','id_matkul','required');
			$this->form_validation->set_rules('nilai_huruf','nilai_huruf','required');
			$this->form_validation->set_rules('nilai_angka','nilai_angka','required');
			if($this->form_validation->run()== FALSE) {
				$id_mahasiswa = $this->uri->segment(4);
				$id = $this->uri->segment(3);
				$data['title'] = 'Edit Nilai Mahasiswa';
				$data['main_view'] = 'nilai/edit';
				$data['nama'] = $this->Mahasiswa_model->getMahasiswa('by_id',$id_mahasiswa);
				$data['row'] = $this->Nilai_model->getNilai('by_id',FALSE,$id);
				$this->load->view('index',$data);
			}
			else {
				$id_mahasiswa = $this->uri->segment(4);
				$id = $this->uri->segment(3);
				$data=array('id_mahasiswa' =>$id,
							'id_matkul'=> $this->input->post('id_matkul'),
							'nilai_huruf'=> $this->input->post('nilai_huruf'),
							'nilai_angka' => $this->input->post('nilai_angka'));
							
						$this->Nilai_model->editNilai($id,$data);
						redirect('nilai/view/'.$id_mahasiswa);
				}
			}
			
		function add() {
						
			$this->form_validation->set_rules('id_matkul','id_matkul','required');
			$this->form_validation->set_rules('nilai_huruf','nilai_huruf','required');
			$this->form_validation->set_rules('nilai_angka','nilai_angka','required');

			if($this->form_validation->run()== FALSE) {
				$id = $this->uri->segment(3);
				$data['title'] = 'Edit Nilai';
				$data['main_view'] = 'nilai/add';
				$data['nama'] = $this->Mahasiswa_model->getMahasiswa('by_id',$id);
				$data['row'] = $this->Nilai_model->getNilai('by_id',$id);
				$this->load->view('index',$data);
			}
			else {
			
				$id = $this->uri->segment(3);
				$data=array('id_mahasiswa' =>$id,
							'id_matkul'=> $this->input->post('id_matkul'),
							'nilai_huruf'=> $this->input->post('nilai_huruf'),
							'nilai_angka' => $this->input->post('nilai_angka'));
							
							
						$this->Nilai_model->addNilai($data);
						redirect('nilai/view/'.$id);
				}
			}
					
			
	
	function delete() {
	$id_mahasiswa = $this->uri->segment(4);
	$id = $this->uri->segment(3);
	$this->Nilai_model->deleteNilai($id);
	redirect('nilai/view/'.$id_mahasiswa);
	}
					
}


?>