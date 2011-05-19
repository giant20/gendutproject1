<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Matkul extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Matkul_model');
		
			if(!$this->session->userdata('id_user') && !$this->session->userdata('user_display') ){
			redirect('home');
		}
			
	}

	function index()
	{
		$data['title'] = 'GunungKidul';
		$data['query'] = $this->Matkul_model->getMatkul('list',FALSE);
		$data['main_view'] = 'matkul/matakuliah';
		$this->load->view('index',$data);
	
	}
	function add() {
		$this->form_validation->set_rules('kode_matkul','kode','required');
		$this->form_validation->set_rules('nama_matkul','nama matkul','required');

			
			if($this->form_validation->run()== FALSE) {
				
				$data['title'] = 'Tambah Mata Kuliah';
				$data['main_view'] = 'matkul/add';
				$this->load->view('index',$data);
			}
			else {
			
				$data=array('kode_matkul'=> $this->input->post('kode_matkul'),
							'nama_matkul'=> $this->input->post('nama_matkul'));
							
							$this->Matkul_model->addMatkul($data);
							redirect('matkul');
				}
			}
			
		function edit() {
				$this->form_validation->set_rules('kode_matkul','kode','required');
				$this->form_validation->set_rules('nama_matkul','nama matkul','required');

			
			if($this->form_validation->run()== FALSE) {
			$id = $this->uri->segment(3);
			$data['title'] = 'Edit Mata Kuliah';
			$data['main_view'] = 'matkul/edit';
			$data['row'] = $this->Matkul_model->getMatkul('by_id',$id);
			$this->load->view('index',$data);
			}
			else {
				$id = $this->uri->segment(3);
				$data=array('kode_matkul'=> $this->input->post('kode_matkul'),
							'nama_matkul'=> $this->input->post('nama_matkul'));
							
							$this->Matkul_model->editMatkul($id,$data);
							redirect('matkul');
				}
			}
	function delete() {
	$id = $this->uri->segment(3);
	$this->Matkul_model->deleteMatkul($id);
	redirect('matkul');
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
?>