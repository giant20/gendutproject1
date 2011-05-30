Kartu Hasil Studi
Berikut ini Kartu Hasil Studi tiap Semester dan Tahun Ajaran, Untuk nilai yang belum keluar Defaultnya E atau kosong

<table border="0" width="500" cellspacing="0" >
<tr><th width="30"> No</th><th width="390">Mata Kuliah</th><th width="80">Nilai</th></tr>


<?php
$i=1; 
foreach($query as $row):  ?>
	<tr class="<?php if ($i %2 == 0) echo 'zebra';?>"> 


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