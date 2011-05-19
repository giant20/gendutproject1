<?php
class Kuliah_model extends CI_Model {
		
		function __construct() {
		
			parent::__construct();
			}
			
		function getKuliah($query=FALSE,$id_kuliah=FALSE,$id_mhs=FALSE,$limit=FALSE,$offset=FALSE) {
		
			if($query == 'list') {
					$this->db->limit($limit,$offset);
					$this->db->join('tb_mahasiswa','tb_mahasiswa.id_mahasiswa=tb_kuliah.id_mahasiswa');
					$this->db->join('tb_matkul','tb_matkul.id_matkul=tb_kuliah.id_matkul');
					return $this->db->get('tb_kuliah')->result_array();
			}
			
			if($query == 'by_id') {
				$this->db->limit($limit,$offset);
				$this->db->join('tb_matkul','tb_matkul.id_matkul=tb_kuliah.id_matkul');
				$this->db->join('tb_mahasiswa','tb_mahasiswa.id_mahasiswa=tb_kuliah.id_mahasiswa');
				$this->db->where('id_kuliah',$id_kuliah);
				return $this->db->get('tb_kuliah')->row();
				}
			
			elseif($query == 'by_mhs') {
				$this->db->limit($limit,$offset);
				$this->db->join('tb_mahasiswa','tb_mahasiswa.id_mahasiswa=tb_kuliah.id_mahasiswa');
				$this->db->join('tb_matkul','tb_matkul.id_matkul=tb_kuliah.id_matkul');
				$this->db->where('tb_kuliah.id_mahasiswa',$id_mhs);
				return $this->db->get('tb_kuliah')->result_array();
		}
	}
	
	
		function addKuliah($data) {
			$this->db->insert('tb_kuliah',$data);
			}
		function editKuliah($id,$data) {
				$this->db->where('id_kuliah',$id);
				$this->db->update('tb_kuliah',$data);
			}
			
		function deleteKuliah($id) {
				$this->db->where('id_kuliah',$id);
				$this->db->delete('tb_kuliah');
			}
	}
?>