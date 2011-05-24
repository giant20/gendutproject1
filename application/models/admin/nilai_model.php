<?php 
class Nilai_model extends CI_Model {

		function __construct() {

			parent::__construct();
			
			}
	
function getNilai($query=FALSE,$id_mhs=FALSE,$id_nilai=FALSE) {
		
			if($query == 'list') {
					$this->db->join('tb_mahasiswa','tb_mahasiswa.id_mahasiswa=tb_kuliah.id_mahasiswa');
					$this->db->join('tb_matkul','tb_matkul.id_matkul=tb_kuliah.id_matkul');
					return $this->db->get('tb_kuliah')->row();
			}
			if($query == 'by_id') {
				$this->db->join('tb_mahasiswa','tb_mahasiswa.id_mahasiswa=tb_kuliah.id_mahasiswa');
				$this->db->join('tb_matkul','tb_matkul.id_matkul=tb_kuliah.id_matkul');
				$this->db->where('id_kuliah',$id_nilai);
				return $this->db->get('tb_kuliah')->row();
				}
			
			elseif($query == 'by_mhs') {
				$this->db->join('tb_mahasiswa','tb_mahasiswa.id_mahasiswa=tb_kuliah.id_mahasiswa');
				$this->db->join('tb_matkul','tb_matkul.id_matkul=tb_kuliah.id_matkul');
				$this->db->where('tb_kuliah.id_mahasiswa',$id_mhs);
				return $this->db->get('tb_kuliah')->result_array();
		}
	}
	
	
		function addNilai($data) {
			$this->db->insert('tb_kuliah',$data);
			}
		function editNilai($id,$data) {
				$this->db->where('id_kuliah',$id);
				$this->db->update('tb_kuliah',$data);
			}
			
		function deleteNilai($id) {
				$this->db->where('id_kuliah',$id);
				$this->db->delete('tb_kuliah');
			}




}


?>