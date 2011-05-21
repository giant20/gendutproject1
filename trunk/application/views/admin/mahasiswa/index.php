<h1>Data Mahasiswa</h1>

<a href="<?php echo base_url().'admin/mahasiswa/add'?>">Tambah</a><br />
<br />
<table width="800" border="0" cellpadding="0" cellspacing="0">
<tr><th width="20">No</th><th width="100">No Mahasiswa</th><th width="100" >Nama Siswa</th><th>Username</th><th width="100">Tanggal Lahir</th><th width="200">Alamat</th><th width="100">Status</th><th width="100">Aksi</th></tr>
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