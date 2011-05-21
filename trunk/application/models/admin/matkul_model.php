<?php 
class Matkul_model extends CI_Model {
	
	function __construct() {
		parent::__construct();
		}
	
	
	function getMatkul($query=FALSE,$id=FALSE,$limit=FALSE,$offset=FALSE) {
		if($query == 'list') {
						$this->db->limit($limit,$offset);
				return $this->db->get('tb_matkul')->result_array();
				}
			elseif($query == 'by_id')
			{
				$this->db->where('id_matkul',$id);
				return $this->db->get('tb_matkul')->row();
			}
		}
	function addMatkul($data) {
			$this->db->insert('tb_matkul',$data);
		}
	
	function editMatkul($id,$data) {
		$this->db->where('id_matkul',$id);
		$this->db->update('tb_matkul',$data);
	}
	
	function deleteMatkul($id) {
		$this->db->where('id_matkul',$id);
		$this->db->delete('tb_matkul');
		}
	}

?>