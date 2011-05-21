<h1>Data Mahasiswa</h1>

<a href="<?php echo base_url().'admin/mahasiswa/add'?>">Tambah</a><br />
<br />
<table width="800" border="1" cellpadding="1">
<tr><td width="20">No</td><td width="100">No Mahasiswa</td><td width="100" >Nama Siswa</td><td>Username</td><td width="100">Tanggal Lahir</td><td width="200">Alamat</td><td width="100">Status</td><td width="100">Aksi</td></tr>
<?php $no=1+$urutan;?>
<?php foreach ($query as $row){?>

<tr class="<?php if ($no %2 == 0) echo 'zebra';?>">
	<td><?php echo $no?></td>
	<td><?php echo $row['no_mahasiswa']?></td>
	<td><?php echo $row['nama_mahasiswa']?></td>
	<td><?php echo $row['username']?></td>
	<td><?php echo $row['tgl_lahir']?></td>
	<td><?php echo $row['alamat']?></td>
	<td><?php echo $row['status']?></td>

	<td><a href="<?php echo base_url().'admin/mahasiswa/edit/'.$row['id_mahasiswa'];?>">edit</a> |
	<a href="<?php echo base_url().'admin/mahasiswa/delete/'.$row['id_mahasiswa'];?>">delete</a> </td></tr>
	<?php $no++;}?>
	</table>
			<?php echo $this->pagination->create_links();?>