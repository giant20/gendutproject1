<h1>Data Berita</h1>
<br /><br />
<a href="<?php echo base_url().'berita/add_berita'?>">Input Berita</a>
<table width="500" border="1" cellpadding="1">
<tr><td>No</td><td>judul</td><td>tanggal Posting</td>
<td>Aksi</td></tr>
<?php $no=1?>
<?php foreach ($query as $row){?>
<tr>
	<td><?php echo $no?></td>
	<td><?php echo $row['title']?></td>
	<td><?php echo $row['posting']?></td>
	<td>Edit | Delete</td>


</tr>
	<?php $no++;}?>
</table>