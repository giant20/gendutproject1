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
<?php foreach ($query3 as $row){ ?>
<a href ="<?php echo base_url() ?>mhs/khs/search/<?php echo $row['id_semester'] ?>"> <?php echo $row['nama_semester'] ?></a><br>

<?php } ?>