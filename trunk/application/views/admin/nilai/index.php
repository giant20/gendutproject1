<h1>Data Nilai Mahasiswa</h1>
<br /><br />

<table width="500" border="1" cellpadding="1">
<tr><td>No</td><td>No Mahasiswa</td><td>Nama Siswa</td>
<td>Aksi</td></tr>
<?php $no=1?>
<?php foreach ($query as $row){?>
<tr>
	<td><?php echo $no?></td>
	<td><?php echo $row['no_mahasiswa']?></td>
	<td><?php echo $row['nama_mahasiswa']?></td>

	<td><a href="<?php echo base_url().'admin/nilai/view/'.$row['id_mahasiswa'];?>">view</a></td>
</tr>
	<?php $no++;}?>
</table>