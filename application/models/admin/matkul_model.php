<?php 
class Matkul_model extends CI_Model {
	
	function __construct() {
		parent::__construct();
		}
	
	
	function getMatkul($query=FALSE,$id=FALSE,$limit=FALSE,$offset=FALSE) {
		if($query == 'list') {
				$this->db->limit($limit,$offset);
				$this->db->join('tb_semester','tb_semester.id_semester=tb_matkul.id_semester');
				return $this->db->get('tb_matkul')->result_array();
				}
			elseif($query == 'by_id')
			{	$this->db->join('tb_semester','tb_semester.id_semester=tb_matkul.id_semester');
				$this->db->where('id_matkul',$id);
				return $this->db->get('tb_matkul')->row();
			}
			elseif($query == 'by_sem')
			{	
				return $this->db->get('tb_semester')->result_array();
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