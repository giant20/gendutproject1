
<a href="<?php echo base_url()?>home.php">Home | </a>
<a href="<?php echo base_url()?>home.php">Berita | </a>
<a href="<?php echo base_url()?>home.php">Info Kampus | </a>		
<!--hidden menu -->				
<a href="<?php echo base_url()?>mhs/khs.php"><?php if (isset($nama)) if (!empty($nama)) 
				echo "KHS|"; ?> </a>
<a href="<?php echo base_url()?>mhs/krs.php"><?php if (isset($nama)) if (!empty($nama)) 
				echo "KRS Reguler|"; ?> </a>
<a href="<?php echo base_url()?>mhs/jadwal.php"><?php if (isset($nama)) if (!empty($nama)) 
				echo "Jadwal Kuliah|"; ?> </a>