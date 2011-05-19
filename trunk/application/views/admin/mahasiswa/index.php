<h1>Data Mahasiswa</h1>

<a href="<?php echo base_url().'admin/mahasiswa/add'?>">Tambah</a><br />
<br />
<table width="500" border="1" cellpadding="1">
<tr><td>No</td><td>No Mahasiswa</td><td>Nama Siswa</td><td>Tanggal Lahir</td><td>Alamat</td><td>Aksi</td></tr>
<?php $no=1+$urutan;?>
<?php foreach ($query as $row){?>

<tr class="<?php if ($no %2 == 0) echo 'zebra';?>">
	<td><?php echo $no?></td>
	<td><?php echo $row['no_mahasiswa']?></td>
	<td><?php echo $row['nama_mahasiswa']?></td>
	<td><?php echo $row['tgl_lahir']?></td>
	<td><?php echo $row['alamat']?></td>

	<td><a href="<?php echo base_url().'admin/mahasiswa/edit/'.$row['id_mahasiswa'];?>">edit</a> |
	<a href="<?php echo base_url().'admin/mahasiswa/delete/'.$row['id_mahasiswa'];?>">delete</a> </td></tr>
	<?php $no++;}?>
	</table>
			<?php echo $this->pagination->create_links();?>