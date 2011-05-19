<h4>Nama Mahasiswa : <?php echo $nama->nama_mahasiswa;?> </h4>
<form id="siswa" name="siswa" method="post" action="">
<table width="371" border="0">
  <tr>
    <td>Mata Kuliah</td>
    <td>:</td>
    <td><?php echo form_error('id_matkul'); ?>
	<?php echo nilaiMatKulDropdown(FALSE,$nama->id_mahasiswa); ?></td>
  </tr>
    
  <tr>
    <td>Nilai Huruf</td>
    <td>:</td>
    <td><?php echo form_error('nilai_huruf'); ?>
      <input type="text" name="nilai_huruf" id="nilai_huruf" value="<?php echo set_value('nilai_huruf');?>" /></td>
  </tr>
    <tr>
    <td>Nilai Angka</td>
    <td>:</td>
    <td><?php echo form_error('nilai_angka'); ?>
      <input type="text" name="nilai_angka" id="nilai_angka" value="<?php echo set_value('nilai_angka');?>" /></td>
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
