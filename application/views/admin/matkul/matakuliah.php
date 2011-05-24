<h1>Data Mata Kuliah</h1>
<a href="<?php echo base_url().'admin/matkul/add'?>">Tambah</a><br />
<br />
<table width="600" border="0" cellpadding="0" cellspacing="0">
<tr><th>No</th><th>Kode Mata Kuliah</th><th>Nama Mata kuliah</th><th>Semester</th><th>Tahun</th><th>Aksi</th></tr>
<?php $no=1+$urutan;?>
<?php foreach ($query as $row){?>

<tr class="<?php if ($no %2 == 0) echo 'zebra';?>">
	<td><?php echo $no?></td>
	<td><?php echo $row['kode_matkul']?></td>
	<td><?php echo $row['nama_matkul']?></td>
	<td><?php echo $row['semester']?></td>
	<td><?php echo $row['tahun']?></td>

	<td><a href="<?php echo base_url().'admin/matkul/edit/'.$row['id_matkul'];?>">edit</a> |
	<a href="<?php echo base_url().'admin/matkul/delete/'.$row['id_matkul'];?>">delete</a> </td></tr>
	<?php $no++;}?>
	</table>
			<?php echo $this->pagination->create_links();?>