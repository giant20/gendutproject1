<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		//$this->load->library('session');
		$this->load->model('Home_model');
		$this->load->model('mhs/Mahasiswa_model');
		$this->load->model('mhs/Khs_model');
	}
	
	

	function index() // login
	{
			$data['title'] = 'Home';
			$data['nama'] = $this->session->userdata('nama_mahasiswa');
			$data['img'] = $this->session->userdata('gambar');
			
			$data['copy'] = 'Copyright &copy; 2011 by genduty.blogspot.com. All Rights Reserved.';
			$data['link_copy'] = 'www.genduty.blogspot.com';
			
			$data['status'] = $this->session->userdata('status');
			$data['username'] = $this->session->userdata('username');
			$data['id_mahasiswa'] = $this->session->userdata('id_mahasiswa');
				
			if (!empty($data['status']))
							{
			
							$data['username'] = $this->session->userdata('username');
							//menampilkan user
								
								$data['slide_view'] = "mhs/user";
								$data['main_view'] = 'mhs/profil';
								$this->load->view('index',$data);

						}
						else {
						//menampilkan halaman login
						$data['slide_view'] = "mhs/login.php";
						$data['main_view'] = 'mhs/profil';
						$this->load->view('index',$data);

						}
			

			
	}

	function login_process()
	{
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == FALSE){
			$data['title'] = 'Login';
			$data['copy'] = 'Copyright &copy; 2011 by genduty.blogspot.com. All Rights Reserved.';
			$data['slide_view'] = "mhs/login.php";
			$data['nama'] = $this->Khs_model->getKhs('by_mhs',FALSE,$usernama,FALSE,FALSE);
			$data['main_view'] = 'mhs/profil';
			$this->load->view('index',$data);
			}
		else{
			$username = $this->input->post('username');
			$password = md5($this->input->post('password'));
			$this->db->where('username',$username);
			$this->db->where('password',$password);
			$res = $this->db->get('tb_mahasiswa')->result();

			if (count($res) > 0){
				$this->session->set_userdata('id_mahasiswa',$res[0]->id_mahasiswa );
				$this->session->set_userdata('nama_mahasiswa',$res[0]->nama_mahasiswa );
				$this->session->set_userdata('gambar',$res[0]->gambar );
				$this->session->set_userdata('status',$res[0]->status );
				
				if ($this->session->userdata('status') == 'admin'){
								redirect('admin/mahasiswa');
								///echo 'admin' ;

								}
				elseif ($this->session->userdata('status') == 'user') 
												redirect('index');


				}
			else{
				$thx='<div id="pesan">Maaf Username atau password anda salah</div>';
				$this->session->set_flashdata('message_type',$thx);
				redirect('index','refresh');
				}
			}
			}
			
		function doLogout(){
		$this->session->unset_userdata('status');
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('nama_mahasiswa');
		$this->session->unset_userdata('gambar');
		$this->session->unset_userdata('id_mahasiswa');
		//$this->session->sess_destroy();
		redirect('index','refresh');
	}


}

?>