<h4>Nilai Mahasiswa : <?php echo $nama->nama_mahasiswa;?> </h4>
<br />
<hr />
<a href="<?php echo base_url().'admin/nilai/add/'.$nama->id_mahasiswa;?>"> Input Nilai</a>
<table width="617" border="1" cellpadding="1">
<td width="11">No</td>
<td width="101">Mata Kuliah</td>
<td width="57">Nilai Huruf</td>
<td width="57">Nilai Angka</td>
<td width="42">Aksi</td>
</tr>
<?php $no=1?>
<?php foreach ($query as $row){?>
<tr>
    <td><?php echo $no?></td>
    <td><?php echo $row['nama_matkul']?></td>
    <td><?php echo $row['nilai_huruf']?></td>
	<td><?php echo $row['nilai_angka']?></td>

	<td><a href="<?php echo base_url().'admin/nilai/edit/'.$row['id_nilai'].'/'.$nama->id_mahasiswa;?>">Edit</a>|
	<a href="<?php echo base_url().'admin/nilai/delete/'.$row['id_nilai'].'/'.$nama->id_mahasiswa;?>">Delete</a> </td></tr>
	<?php $no++;}?>
	</table>