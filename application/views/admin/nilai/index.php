<h1>Data Nilai Mahasiswa</h1>
<br /><br />

<table width="500" border="0" cellpadding="0" cellspacing="0">
<tr><th>No</th><th>No Mahasiswa</th><th>Nama Siswa</th>
<th>Aksi</th></tr>
<?php $no=1?>
<?php foreach ($query as $row){?>
<tr class="<?php if ($no %2 == 0) echo 'zebra';?>">
	<td><?php echo $no?></td>
	<td><?php echo $row['no_mahasiswa']?></td>
	<td><?php echo $row['nama_mahasiswa']?></td>

	<td><a href="<?php echo base_url().'admin/nilai/view/'.$row['id_mahasiswa'];?>">view</a></td>
</tr>
	<?php $no++;}?>
</table>