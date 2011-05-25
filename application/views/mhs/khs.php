<table border="0" width="500" >
<tr><td width="30"> No</td><td width="390">Mata Kuliah</td><td width="80">Nilai</td></tr>


<?php
$i=1; 
foreach($query as $row):  ?>
	<tr class="zebra"> 


		<td><?php echo $i; ?></td>
		<td><?php echo $row['nama_matkul']; ?></td>
		
		<td><?php echo $row['nilai_huruf']; ?></td>
	
	</tr>
<?php 
$i++;
endforeach;?>
</table><hr>
<a href ="<?php echo base_url() ?>mhs/khs/search/<?php echo '1'; ?>"> Semester I</a><br>
<a href ="<?php echo base_url() ?>mhs/khs/search/<?php echo '2'; ?>"> Semester II</a><br>
<a href ="<?php echo base_url() ?>mhs/khs/search/<?php echo '3'; ?>"> Semester III</a><br>
<a href ="<?php echo base_url() ?>mhs/khs/search/<?php echo '4'; ?>"> Semester IV</a><br>