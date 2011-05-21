<h1>Data Mata Kuliah</h1>
<a href="<?php echo base_url().'admin/matkul/add'?>">Tambah</a><br />
<br />
<table width="500" border="1" cellpadding="1">
<tr><td>No</td><td>Kode Mata Kuliah</td><td>Nama Mata kuliah</td><td>Aksi</td></tr>
<?php $no=1+$urutan;?>
<?php foreach ($query as $row){?>

<tr>
	<td><?php echo $no?></td>
	<td><?php echo $row['kode_matkul']?></td>
	<td><?php echo $row['nama_matkul']?></td>

	<td><a href="<?php echo base_url().'admin/matkul/edit/'.$row['id_matkul'];?>">edit</a> |
	<a href="<?php echo base_url().'admin/matkul/delete/'.$row['id_matkul'];?>">delete</a> </td></tr>
	<?php $no++;}?>
	</table>
			<?php echo $this->pagination->create_links();?>