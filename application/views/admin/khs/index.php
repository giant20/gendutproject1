<h1>Data KHS</h1>
<br /><br />
<table width="500" border="0" cellpadding="0" cellspacing="0">
<tr><th>No</th><th>No Mahasiswa</th><th>Nama Siswa</th>
<th>Aksi</th></tr>
<?php $no=1+$urutan;?>
<?php foreach ($query as $row){?>
<?php if ($no %2 == 0)?>
<tr class="<?php if ($no %2 == 0) echo 'zebra';?>">
	<td><?php echo $no?></td>
	<td><?php echo $row['no_mahasiswa']?></td>
	<td><?php echo $row['nama_mahasiswa']?></td>

	<td><a href="<?php echo base_url().'admin/khs/view/'.$row['id_mahasiswa'];?>">Lihat</a></td>
</tr>
	<?php $no++;}?>
</table>
			<?php echo $this->pagination->create_links();?>