<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Matkul extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('admin/Matkul_model');
		
			if(!$this->session->userdata('status') && !$this->session->userdata('username') ){
			redirect('home');
		}
			
	}

	function index()
	{
		$data['title'] = 'GunungKidul';
		$data['query'] = $this->Matkul_model->getMatkul('list',FALSE);
		$data['main_view'] = 'admin/matkul/matakuliah';
		$this->load->view('admin/index',$data);
	
	}
	function add() {
		$this->form_validation->set_rules('kode_matkul','kode','required');
		$this->form_validation->set_rules('nama_matkul','nama matkul','required');

			
			if($this->form_validation->run()== FALSE) {
				
				$data['title'] = 'Tambah Mata Kuliah';
				$data['main_view'] = 'admin/matkul/add';
				$this->load->view('admin/index',$data);
			}
			else {
			
				$data=array('kode_matkul'=> $this->input->post('kode_matkul'),
							'nama_matkul'=> $this->input->post('nama_matkul'));
							
							$this->Matkul_model->addMatkul($data);
							redirect('admin/matkul');
				}
			}
			
		function edit() {
				$this->form_validation->set_rules('kode_matkul','kode','required');
				$this->form_validation->set_rules('nama_matkul','nama matkul','required');

			
			if($this->form_validation->run()== FALSE) {
			$id = $this->uri->segment(4);
			$data['title'] = 'Edit Mata Kuliah';
			$data['main_view'] = 'admin/matkul/edit';
			$data['row'] = $this->Matkul_model->getMatkul('by_id',$id);
			$this->load->view('admin/index',$data);
			}
			else {
				$id = $this->uri->segment(4);
				$data=array('kode_matkul'=> $this->input->post('kode_matkul'),
							'nama_matkul'=> $this->input->post('nama_matkul'));
							
							$this->Matkul_model->editMatkul($id,$data);
							redirect('admin/matkul');
				}
			}
	function delete() {
	$id = $this->uri->segment(4);
	$this->Matkul_model->deleteMatkul($id);
	redirect('admin/matkul');
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
?>