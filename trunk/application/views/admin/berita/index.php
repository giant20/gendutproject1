<h1>Data Berita</h1>
<br /><br />
<a href="<?php echo base_url().'berita/add_berita'?>">Input Berita</a>
<table width="500" border="0" cellpadding="0" cellspacing="0">
<tr><th>No</th><th>judul</th><th>tanggal Posting</th>
<th>Aksi</th></tr>
<?php $no=1?>
<?php foreach ($query as $row){?>
<tr class="<?php if ($no %2 == 0) echo 'zebra';?>">
	<td><?php echo $no?></td>
	<td><?php echo $row['title']?></td>
	<td><?php echo $row['posting']?></td>
	<td>Edit | Delete</td>


</tr>
	<?php $no++;}?>
</table>