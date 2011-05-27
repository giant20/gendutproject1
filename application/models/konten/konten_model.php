<?php
class Konten_model extends CI_Model {

		function __construct(){
			parent::__construct();
		
		}
	
		function getKonten ($query=FALSE,$id_konten=FALSE,$limit=FALSE,$offset=FALSE){
			if (!$query){
			$this->db->where('id_konten',$id_konten);
			return $this->db->get('tb_konten')->row();
			}			
			elseif ($query == 'list') {
				return $this->db->get('tb_konten')->result_array();
			}
			
			elseif ($query == 'info') {
				$this->db->where('kat','info');
				return $this->db->get('tb_konten')->result_array();
				}
			elseif ($query == 'berita') {
				$this->db->where('kat','berita');
				return $this->db->get('tb_konten')->result_array();
			}
	}
}

?>