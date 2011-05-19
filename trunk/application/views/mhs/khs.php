<form  method="post" id="contoh" action="<?php echo site_url()?>mhs/khs/search" enctype="multipart/form-data">
Pilih Tahun<?php echo tahunDropdown();?> Pilih Semester<?php echo semDropdown();?>
 <input name="simpan" class="submit" value="Cari" type="submit" >
</form>

<table border="0" width="500" >
<tr><td width="30"> No</td><td width="390">Mata Kuliah</td><td width="80">Nilai</td></tr>


<?php 
foreach($query as $row):  ?>
	<tr class="zebra"> 


		<td></td>
		<td><?php echo $row['nama_matkul']; ?></td>
		
		<td><?php echo $row['nilai_huruf']; ?></td>
	
	</tr>
<?php 
endforeach;?>
</table>