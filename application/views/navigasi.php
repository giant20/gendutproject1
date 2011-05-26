
<div id="menu"><ul>
<li><a href="<?php echo base_url()?>home.php">Home</a></li>
<li><a href="<?php echo base_url()?>home.php">Berita</a></li>
<li><a href="<?php echo base_url()?>home.php">Info Kampus</a></li>		
<!--hidden menu -->		
<li><a href="<?php echo base_url()?>mhs/khs.php"><?php if (isset($nama)) if (!empty($nama)) 
				echo "KHS"; ?> </a></li>
<li><a href="<?php echo base_url()?>mhs/krs.php"><?php if (isset($nama)) if (!empty($nama)) 
				echo "KRS Reguler"; ?> </a></li>
<li><a href="<?php echo base_url()?>mhs/jadwal.php"><?php if (isset($nama)) if (!empty($nama)) 
				echo "Jadwal Kuliah"; ?> </a>   <li><ul>
</div>