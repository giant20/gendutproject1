<h4>Nama Mahasiswa : <?php echo $nama->nama_mahasiswa;?> </h4>
<form id="siswa" name="siswa" method="post" action="">
<table width="371" border="0">
  <tr>
    <td>Mata Kuliah</td>
    <td>:</td>
    <td><?php echo form_error('id_matkul'); ?>
	<?php echo nilaiMatKulDropdown($row->id_matkul,$nama->id_mahasiswa); ?></td>
  </tr>

   <tr>
    <td>Kelas</td>
    <td>:</td>
    <td><?php echo form_error('kelas'); ?>
      <input type="text" name="kelas" id="kelas" value="<?php echo $row->kelas;?>" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><label>
      <input type="submit" name="submit" id="submit" value="Submit" />
    </label></td>
  </tr>
</table>
</form>
