<?php
						
			$data['status'] = $this->session->userdata('id_user');
			$data['username'] = $this->session->userdata('username');
			$data['id_mahasiswa'] = $this->session->userdata('id_mahasiswa');
			
					if (!empty($data['status']))
							{
			
							if ($data['username'] == $this->session->userdata('username'))
							//menampilkan user
							
							echo "Selamat datang <strong>$nama->nama_mahasiswa</strong>";
							
							
						}
						else
						//menampilkan halaman login
						echo "test";
						
	?>					
