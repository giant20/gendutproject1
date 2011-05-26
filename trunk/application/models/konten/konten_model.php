<?php
class Konten_model extends CI_Model {

		function __construct(){
			parent::__construct();
		
		}
	
		function getKonten ($query=FALSE,$info=FALSE,$limit=FALSE,$offset=FALSE){
			if ($query == 'list') {
				return $this->db->get('tb_konten')->result_array();
			}
			
			elseif ($query == 'info') {
				//$this->db->where('kat','info');
				return $this->db->get('tb_konten')->result_array();
				}
	}
}

?>