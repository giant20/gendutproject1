<?php
class Home_model extends CI_Model {

		function __construct(){
		
			parent::__construct();
		}
		
		function getHome($query=FALSE,$id_konten=FALSE,$id_mhs=FALSE,$limit=FALSE,$offset=FALSE) {
				if ($query == 'list'):
					$this->db->where('id_konten',$id_konten);
					return $this->db->get('tb_konten')->row();
				
				elseif($query == 'by_mhs'):
					$this->db->limit($limit,$offset);					
					$this->db->join('tb_mahasiswa','tb_mahasiswa.id_mahasiswa=tb_kuliah.id_mahasiswa');
					$this->db->join('tb_matkul','tb_matkul.id_matkul=tb_kuliah.id_matkul');
					$this->db->join('tb_matkul','tb_matkul.id_matkul=tb_nilai.id_matkul');
					$this->db->where('tb_kuliah.id_mahasiswa',$id_mhs);
					return $this->db->get('tb_kuliah')->result_array();
				
				elseif($query == 'welcome'):
					$this->db->where('kast','weslcome');
					$this->limit($limit,$offset);
					return $this->db->get('tb_konten')->result_array();
				endif;
		}
					
		
		

}



?>