<h4>Nilai Mahasiswa : <?php echo $nama->nama_mahasiswa;?> </h4>
<br />
<hr />
<a href="<?php echo base_url().'admin/nilai/add/'.$nama->id_mahasiswa;?>"> Input Nilai</a>
<table width="617" border="0" cellspacing="0">
<th width="11">No</th>
<th width="101">Mata Kuliah</th>
<th width="57">Nilai Huruf</th>
<th width="57">Nilai Angka</th>
<th width="42">Aksi</th>
</tr>
<?php $no=1?>
<?php foreach ($query as $row){?>
<tr class="<?php if ($no %2 == 0) echo 'zebra';?>">
    <td><?php echo $no?></td>
    <td><?php echo $row['nama_matkul']?></td>
    <td><?php echo $row['nilai_huruf']?></td>
	<td><?php echo $row['nilai_angka']?></td>

	<td><a href="<?php echo base_url().'admin/nilai/edit/'.$row['id_nilai'].'/'.$nama->id_mahasiswa;?>">Edit</a>|
	<a href="<?php echo base_url().'admin/nilai/delete/'.$row['id_nilai'].'/'.$nama->id_mahasiswa;?>">Delete</a> </td></tr>
	<?php $no++;}?>
	</table>