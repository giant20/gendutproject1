<?php

class Account extends Controller {

	function __construct()
	{
		parent::Controller();
		$this->load->model('Member_model');
		$this->load->model('Order_model');
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->helper('bantuan_helper');
	}

	function add()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('jenkel', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('password',  'Password',  'trim|required|alpha_numeric|min_length[6]|xss_clean');
		$this->form_validation->set_rules('repassword',  'Retype password',  'trim|required|alpha_numeric|min_length[6]|matches[password]|xss_clean');
		$this->form_validation->set_rules('telp', 'Telepon', 'required');
		$this->form_validation->set_rules('hp', 'Mobile Phone / HP', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('province_id', 'Propinsi', 'required');
		$this->form_validation->set_rules('kab_id', 'Kabupaten', 'required');
		$this->form_validation->set_rules('kota', 'Kota', 'required');
		$this->form_validation->set_rules('kodepos', 'Kode Pos', 'required');
		$this->form_validation->set_rules('terms', 'Terms and Condition', 'required');
		$this->form_validation->set_rules('number', 'Captcha Number', 'required');

		if ($this->form_validation->run() == FALSE):
			$data['ses_id'] = $this->session->userdata('session_id');
			$data['title'] = 'Registrasi';
			$data['wrong_chapta'] = '';
			$data['no_email'] = '';
			$data['main_view'] = 'account/add_account';
			$this->load->view('index',$data);
		else:
			$this->db->where('email',$this->input->post('email'));
			$qrCek = $this->db->get('tb_member');
			if($qrCek->num_rows() !=0):
				$data['ses_id'] = $this->session->userdata('session_id');
				$data['title'] = 'Registrasi';
				$data['wrong_chapta'] = '';
				$data['no_email'] = '<div class="error">Email Not Available</div>';
				$data['main_view'] = 'account/add_account';
				$this->load->view('index',$data);
			else:
				session_start();
				$key=substr($_SESSION['key'],0,6);
				$number = $this->input->post('number');
				if($number!=$key):
					$data['ses_id'] = $this->session->userdata('session_id');
					$data['title'] = 'Registrasi';
					$data['no_email'] = '';
					$data['wrong_chapta'] = '<div class="error">Kode tidak sesuai</div>';
					$data['main_view'] = 'account/add_account';
					$this->load->view('index',$data);
				else:
					$data = array('nama' => $this->input->post('nama'),
								  'jenkel' => $this->input->post('jenkel'),
								  'email' => $this->input->post('email'),
								  'password' => md5($this->input->post('password')),
								  'telp' => $this->input->post('telp'),
								  'hp' => $this->input->post('hp'),
								  'alamat' => $this->input->post('alamat'),
								  'mem_prov_id' => $this->input->post('province_id'),
								  'mem_kab_id' => $this->input->post('kab_id'),
								  'kota' => $this->input->post('kota'),
								  'kodepos' => $this->input->post('kodepos'),
								  'date' => date('Y-m-d')
								  );  
					
					$this->Member_model->addMember($data);
					
					$data['ses_id'] = $this->session->userdata('session_id');
					$data['title'] = 'Registrasi Selesai';
					$data['main_view'] = 'account/reg_finish';
					$this->load->view('index',$data);
				endif;
			endif;
		endif;
	}
	
	function edit()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('jenkel', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('telp', 'Telepon', 'required');
		$this->form_validation->set_rules('hp', 'Mobile Phone / HP', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('province_id', 'Propinsi', 'required');
		$this->form_validation->set_rules('kab_id', 'Kabupaten', 'required');
		$this->form_validation->set_rules('kota', 'Kota', 'required');
		$this->form_validation->set_rules('kodepos', 'Kode Pos', 'required');
		
		if ($this->form_validation->run() == FALSE):
			$data['ses_id'] = $this->session->userdata('session_id');
			$session_id = $this->session->userdata('session_id');
			// query on controller
			$this->db->where('session_id',$session_id);
			$query = $this->db->get('tb_temp_login');
			$temp = $query->row();
			
			$temp_num = $query->num_rows();

			if ($temp_num > 0):
				$cust_id = $temp->temp_mem_id;
				$data['mem_id'] = $temp->temp_mem_id;
				$data['acc'] = $this->Member_model->getDataLogin($session_id,$cust_id);
				$data['res'] = $this->Order_model->getOrderById('member_id',FALSE,$cust_id);
				$data['res2'] = $this->Order_model->getOrderById('mem_to_detail',FALSE,$cust_id);
				$data['title'] = 'Edit Akun';
				$data['main_view'] = 'account/edit_account';
				$this->load->view('index',$data);
			else:
				redirect('produk');
			endif;
		else:
			$id = $this->session->userdata('member_id');
			$data = array('nama' => $this->input->post('nama'),
							  'jenkel' => $this->input->post('jenkel'),
							  'email' => $this->input->post('email'),
							  'password' => md5($this->input->post('password')),
							  'telp' => $this->input->post('telp'),
							  'hp' => $this->input->post('hp'),
							  'alamat' => $this->input->post('alamat'),
							  'mem_prov_id' => $this->input->post('province_id'),
							  'mem_kab_id' => $this->input->post('kab_id'),
							  'kota' => $this->input->post('kota'),
							  'kodepos' => $this->input->post('kodepos'),
							  'date' => date('Y-m-d')
							  );  
			$this->Member_model->editMember($id,$data);

			$this->session->set_flashdata('message_type', 'Terima kasih atas partisipasi anda');
			redirect('account/edit');
		endif;
	}
	function edit_pass()
	{
		$this->form_validation->set_rules('old_pass', 'Pasword Lama', 'required');
		$this->form_validation->set_rules('new_pass', 'Password', 'trim|required|matches[new_pass_conf]|md5');
		$this->form_validation->set_rules('new_pass_conf', 'Password Confirmation', 'trim|required');
		
		if ($this->form_validation->run() == FALSE):
			$data['ses_id'] = $this->session->userdata('session_id');
			$session_id = $this->session->userdata('session_id');
			
			// query on controller cek pake temporary dg akses ke db
			$this->db->where('session_id',$session_id);
			$query = $this->db->get('tb_temp_login');
			$temp = $query->row();
			
			$temp_num = $query->num_rows();

			if ($temp_num > 0):
				$cust_id = $temp->temp_mem_id;
				$data['acc'] = $this->Member_model->getDataLogin($session_id,$cust_id);
				$data['title'] = 'Edit Akun';
				$data['main_view'] = 'account/edit_account';
				$this->load->view('index',$data);
			else:
				redirect('produk');
			endif;
			
		else:
			$data['ses_id'] = $this->session->userdata('session_id');
			$session_id = $this->session->userdata('session_id');
			$mem_id = $this->session->userdata('member_id');
			$old_pass = md5($this->input->post('old_pass'));
			// cek pass lama
			$this->db->where('password',$old_pass);
			$this->db->where('member_id',$mem_id);
			$query = $this->db->get('tb_member');
			if ($query->num_rows() > 0):
				$id = $this->session->userdata('member_id');
				$data = array('password' => $this->input->post('new_pass'));  
				$this->Member_model->editMember($id,$data);
				
				$data['ses_id'] = $this->session->userdata('session_id');
				$data['acc'] = $this->Member_model->getDataLogin($session_id,$mem_id);
				$data['title'] = 'Edit Password Sukses';
				$data['main_view'] = 'account/edit_pass_succes';
				$this->load->view('index',$data);
			else:
				$data['acc'] = $this->Member_model->getDataLogin($session_id,$mem_id);
				$data['title'] = 'Edit Password Gagal';
				$data['main_view'] = 'account/edit_pass_fail';
				$this->load->view('index',$data);
			endif;
		endif;
			
	
	}
	function ajax_showKab()
	{
		$idProv=$this->uri->segment(3);
		$res = $this->Member_model->get_KabByProv($idProv);
		
		
		$output = "<select class='contact_input' name='kab_id' id='kab_id'>";
        foreach ($res as $kab):
             $output .= "<option  value='".$kab['kab_id']."'>".$kab['kab_name']."</option>";
        endforeach;
		
		
		echo $output;
	}

}