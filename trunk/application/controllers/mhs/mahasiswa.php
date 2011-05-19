<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Mahasiswa_model');
			if(!$this->session->userdata('id_user') && !$this->session->userdata('user_display') ){
			redirect('home');
		}
		
	}

	function index()
	{
		
		$config['base_url'] = $this->config->site_url().'/mahasiswa/index';
		$config['total_rows'] = $this->db->count_all('tb_mahasiswa');
		$config['per_page'] = 2;
			$offset = $this->uri->segment(3);
		

		
		$data['urutan'] = $this->uri->segment(3);	
		$data['title'] = 'GunungKidul';
		$data['query'] = $this->Mahasiswa_model->getMahasiswa('list',FALSE,$config['per_page'],$offset,FALSE);
		$data['main_view'] = 'mahasiswa/index';
		$this->pagination->initialize($config);
		$this->load->view('index',$data);
	
	}
	function add() {
		$this->form_validation->set_rules('nama','kode','required');
		$this->form_validation->set_rules('no_mahasiswa','No Mhs','required');
		$this->form_validation->set_rules('tgl_lahir','Tanggal Lahir','required');
		$this->form_validation->set_rules('alamat','Alamat','required');
			
			if($this->form_validation->run()== FALSE) {
				
				$data['title'] = 'Tambah Mahasiswa';
				$data['main_view'] = 'mahasiswa/add';
				$this->load->view('index',$data);
			}
			else {
			
				$data=array('nama_mahasiswa'=> $this->input->post('nama'),
							'no_mahasiswa'=> $this->input->post('no_mahasiswa'),
							'tgl_lahir'=> $this->input->post('tgl_lahir'),
							'alamat'=> $this->input->post('alamat'));
							
							$this->Mahasiswa_model->addMahasiswa($data);
							redirect('mahasiswa');
				}
			}
			
		function edit() {
				$this->form_validation->set_rules('nama','kode','required');
				$this->form_validation->set_rules('no_mahasiswa','No Mhs','required');
				$this->form_validation->set_rules('tgl_lahir','Tanggal Lahir','required');
				$this->form_validation->set_rules('alamat','Alamat','required');
			
			if($this->form_validation->run()== FALSE) {
			$id = $this->uri->segment(3);
			$data['title'] = 'Edit Mahasiswa';
			$data['main_view'] = 'mahasiswa/edit';
			$data['row'] = $this->Mahasiswa_model->getMahasiswa('by_id',$id);
			$this->load->view('index',$data);
			}
			else {
				$id = $this->uri->segment(3);
				$data=array('nama_mahasiswa'=> $this->input->post('nama'),
							'no_mahasiswa'=> $this->input->post('no_mahasiswa'),
							'tgl_lahir'=> $this->input->post('tgl_lahir'),
							'alamat'=> $this->input->post('alamat'));
							
							$this->Mahasiswa_model->editMahasiswa($id,$data);
							redirect('mahasiswa');
				}
			}
	function delete() {
	$id = $this->uri->segment(3);
	$this->Mahasiswa_model->deleteMahasiswa($id);
	redirect('mahasiswa');
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */?>