<h4>Nama :<?php echo $nama->nama_mahasiswa;?> </h4>
<br />
<table width="434" border="0">
<form  method="post" id="contoh" action="<?php echo site_url()?>admin/khs/search" enctype="multipart/form-data">
<tr>
    <td>Semester</td>
    <td>:</td>
    <td><?php echo form_error('nama_matkul'); ?><?php echo namaSemDropdown(); ?></td>
  </tr>

  <tr>
    <td>Tahun</td>
    <td>:</td>
    <td><?php echo form_error('nama_matkul'); ?> <?php echo tahunDropdown(); ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
	<input type="hidden" name="id_mhs" value="<?php echo $nama->id_mahasiswa;?>">
    <td><input type="submit" name="simpan" id="simpan" value="Cari"></td>
  </tr>
  </form>
</table>

<hr />
<table width="617" border="0" cellpadding="0" cellspacing="0">
<th width="11">No</th>
<th width="101">Mata Kuliah</th>
<th width="57">Nilai Huruf</th>
<th width="57">Nilai Angka</th>
<th width="42">Aksi</th>
</tr>
<?php $no=1?>
<?php foreach ($query as $row){?>
<tr class="<?php //if ($no %2 == 0) echo 'zebra';?>">
    <td><?php echo $no;?></td>
    <td><?php echo $row['nama_matkul']?></td>
    <td><?php echo $row['nilai_huruf']?></td>
    <td><?php echo $row['nilai_angka']?></td>
	<td><a href="<?php echo base_url()?>admin/khs/input_khs/<?php echo $row['id_kuliah']?>"> Input</a></td>
</tr>
<?php 
$no++;
} 
?>

	</table>
			