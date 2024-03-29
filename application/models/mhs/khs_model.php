<?php
class Khs_model extends CI_Model {
		
		function __construct() {
		
			parent::__construct();
			}
			
		function getKhs($query=FALSE,$id_kuliah=FALSE,$id_mhs=FALSE,$limit=FALSE,$offset=FALSE) {
		
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
				$this->db->join('tb_mahasiswa','tb_mahasiswa.id_mahasiswa=tb_khs.id_mahasiswa');
				$this->db->join('tb_matkul','tb_matkul.id_matkul=tb_khs.id_matkul');
				//$this->db->join('tb_nilai','tb_nilai.id_matkul=tb_khs.id_matkul');
				$this->db->where('tb_khs.id_mahasiswa',$id_mhs);
					return $this->db->get('tb_khs')->result_array();
		}
			elseif($query == 'by_sem') {
				return	$this->db->query('select s.nama_semester, m.id_semester FROM tb_semester s JOIN tb_khs m ON m.id_semester = s.id_semester group by m.id_semester')->result_array();
									
						//return $this->db->get('tb_khs')->result_array();
			}

		
	}
	
	
		function addKhs($data) {
			$this->db->insert('tb_khs',$data);
			}
		function editKhs($id,$data) {
				$this->db->where('id_khs',$id);
				$this->db->update('tb_kuliah',$data);
			}
			
		function deleteKhs($id) {
				$this->db->where('id_khs',$id);
				$this->db->delete('tb_khs');
			}
	}
?>