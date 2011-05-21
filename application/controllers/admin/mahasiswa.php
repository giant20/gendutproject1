<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper('bantuan_helper');
		$this->load->model('admin/Mahasiswa_model');
		//$this->load->model('admin/Kuliah_model');
		if(!$this->session->userdata('status') && !$this->session->userdata('username') ){
			redirect('home');
		}
		
	}

	function index()
	{
		//$this->load->library('pagination');
		
				$offset = $this->uri->segment(4);
		$config['base_url'] = $this->config->site_url().'/admin/mahasiswa/index';
		$config['total_rows'] = $this->db->count_all('tb_mahasiswa');
		$config['per_page'] = 10;
		$config['uri_segment'] = '4';
		

		
		$data['urutan'] = $this->uri->segment(4);	
		$data['title'] = 'GunungKidul';
		$data['query'] = $this->Mahasiswa_model->getMahasiswa('list',FALSE,$config['per_page'],$offset,FALSE);
		$data['main_view'] = 'admin/mahasiswa/index';
		$this->pagination->initialize($config);
		$this->load->view('admin/index',$data);
	
	}
	function add() {
		$this->form_validation->set_rules('pass1','Password','trim|required|alpha_numeric|min_length[6]|xss_clean');
		$this->form_validation->set_rules('pass2','Retype Password','trim|required|alpha_numeric|min_length[6]|matches[pass1]|xss_clean');
		$this->form_validation->set_rules('username','username','required');
		$this->form_validation->set_rules('nama','kode','required');
		$this->form_validation->set_rules('no_mahasiswa','No Mhs','required');
		$this->form_validation->set_rules('tgl_lahir','Tanggal Lahir','required');
		$this->form_validation->set_rules('alamat','Alamat','required');
			
			if($this->form_validation->run()== FALSE) {
				
				$data['title'] = 'Tambah Mahasiswa';
				$data['main_view'] = 'admin/mahasiswa/add';
				$this->load->view('admin/index',$data);
			}
			else {
			
				$data=array('username'=> $this->input->post('username'),
							'password'=>  md5($this->input->post('pass1')),
							'nama_mahasiswa'=> $this->input->post('nama'),
							'no_mahasiswa'=> $this->input->post('no_mahasiswa'),
							'tgl_lahir'=> $this->input->post('tgl_lahir'),
							'alamat'=> $this->input->post('alamat'));
							
							$this->Mahasiswa_model->addMahasiswa($data);
							redirect('admin/mahasiswa');
				}
			}
			
		function edit() {
				//$this->form_validation->set_rules('pass1','Password','trim|required|alpha_numeric|min_length[6]|xss_clean');
				//$this->form_validation->set_rules('pass2','Retype Password',				'trim|required|alpha_numeric|min_length[6]|matches[pass1]|xss_clean');
				$this->form_validation->set_rules('username','username','required');
				$this->form_validation->set_rules('nama','kode','required');
				$this->form_validation->set_rules('no_mahasiswa','No Mhs','required');
				$this->form_validation->set_rules('tgl_lahir','Tanggal Lahir','required');
				$this->form_validation->set_rules('alamat','Alamat','required');
			
			if($this->form_validation->run()== FALSE) {
			$id = $this->uri->segment(4);
			$data['title'] = 'Edit Mahasiswa';
			$data['main_view'] = 'admin/mahasiswa/edit';
			$id_mahasiswa = $this->uri->segment(5);
			$data['nama'] = $this->Mahasiswa_model->getMahasiswa('by_id',$id_mahasiswa);
			$data['row'] = $this->Mahasiswa_model->getMahasiswa('by_id',$id);
			$this->load->view('admin/index',$data);
			}
			else {
			//password kosong
			if ($this->input->post('pass1') ==''){
				$id = $this->uri->segment(4);
				$data=array('username'=> $this->input->post('username'),
							'nama_mahasiswa'=> $this->input->post('nama'),
							'no_mahasiswa'=> $this->input->post('no_mahasiswa'),
							'tgl_lahir'=> $this->input->post('tgl_lahir'),
							'alamat'=> $this->input->post('alamat'));
							
							$this->Mahasiswa_model->editMahasiswa($id,$data);
							redirect('admin/mahasiswa');
			//password isi
			}
			else
			{
				$id = $this->uri->segment(4);
				$data=array('username'=> $this->input->post('username'),
							'password'=>  md5($this->input->post('pass1')),
							'nama_mahasiswa'=> $this->input->post('nama'),
							'no_mahasiswa'=> $this->input->post('no_mahasiswa'),
							'tgl_lahir'=> $this->input->post('tgl_lahir'),
							'alamat'=> $this->input->post('alamat'),
							'status'=> $this->input->post('status'));
							
							$this->Mahasiswa_model->editMahasiswa($id,$data);
							redirect('admin/mahasiswa');
				}
				}
			}
	function delete() {
	$id = $this->uri->segment(4);
	$this->Mahasiswa_model->deleteMahasiswa($id);
	redirect('admin/mahasiswa');
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */?>