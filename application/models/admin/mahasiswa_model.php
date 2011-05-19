<?php
class Mahasiswa_model extends CI_Model {
	function __construct()
	{
		parent::__construct();
		$this->load->library('pagination');
	}
	
		function getMahasiswa($query=FALSE,$id=FALSE,$limit=FALSE,$offset=FALSE) {
	
				


			if($query== 'list'){
	
				$this->db->limit($limit,$offset);
				return $this->db->get('tb_mahasiswa')->result_array();
							}
							
				elseif($query == 'by_id') {
				//$this->db->limit($config['per_page']);
						$this->db->where('id_mahasiswa',$id);
						return $this->db->get('tb_mahasiswa')->row();
					}
		}
		function addMahasiswa($data) {
			$this->db->insert('tb_mahasiswa',$data);
		}
		function editMahasiswa($id,$data) {
			$this->db->where('id_mahasiswa',$id);
			$this->db->update('tb_mahasiswa',$data);
		}
		function deleteMahasiswa($id) {
			$this->db->where('id_mahasiswa',$id);
			$this->db->delete('tb_mahasiswa');
		}
	}
?>