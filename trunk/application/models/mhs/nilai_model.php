<?php 
class Nilai_model extends CI_Model {

		function __construct() {

			parent::__construct();
			
			}
	
function getNilai($query=FALSE,$id_mhs=FALSE,$id_nilai=FALSE) {
		
			if($query == 'list') {
					$this->db->join('tb_mahasiswa','tb_mahasiswa.id_mahasiswa=tb_nilai.id_mahasiswa');
					$this->db->join('tb_matkul','tb_matkul.id_matkul=tb_nilai.id_matkul');
					return $this->db->get('tb_nilai')->row();
			}
			if($query == 'by_id') {
				$this->db->join('tb_mahasiswa','tb_mahasiswa.id_mahasiswa=tb_nilai.id_mahasiswa');
				$this->db->join('tb_matkul','tb_matkul.id_matkul=tb_nilai.id_matkul');
				$this->db->where('id_nilai',$id_nilai);
				return $this->db->get('tb_nilai')->row();
				}
			
			elseif($query == 'by_mhs') {
				$this->db->join('tb_mahasiswa','tb_mahasiswa.id_mahasiswa=tb_nilai.id_mahasiswa');
				$this->db->join('tb_matkul','tb_matkul.id_matkul=tb_nilai.id_matkul');
				$this->db->where('tb_nilai.id_mahasiswa',$id_mhs);
				return $this->db->get('tb_nilai')->result_array();
		}
	}
	
	
		function addNilai($data) {
			$this->db->insert('tb_nilai',$data);
			}
		function editNilai($id,$data) {
				$this->db->where('id_nilai',$id);
				$this->db->update('tb_nilai',$data);
			}
			
		function deleteNilai($id) {
				$this->db->where('id_nilai',$id);
				$this->db->delete('tb_nilai');
			}




}


?>