<h4>Nama :<?php echo $nama->nama_mahasiswa;?> </h4>
<br /><br />
<a href="<?php echo base_url().'kuliah/add/'.$id_mhs;?>">Tambah</a><br />

<hr />
<table width="617" border="1" cellpadding="1">
<td width="11">No</td>
<td width="101">Mata Kuliah</td>
<td width="57">Kelas</td>
<td width="42">Aksi</td>
</tr>
<?php $no=1?>
<?php foreach ($query as $row){?>
<tr>
    <td><?php echo $no?></td>
    <td><?php echo $row['nama_matkul']?></td>
    <td><?php echo $row['kelas']?></td>

	<td><a href="<?php echo base_url().'kuliah/edit/'.$row['id_kuliah']?>">Edit</a></td></tr>
	<?php $no++;}?>
	</table>