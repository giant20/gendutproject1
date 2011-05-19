<form id="siswa" name="siswa" method="post" action="">
<table width="434" border="0">

  <tr>
    <td width="152">Kode Mata Kuliah</td>
    <td width="10">:</td>
    <td width="265"><?php echo form_error('kode_matkul'); ?> <input type="text" name="kode_matkul" id="kode_matkul" value="<?php echo set_value('kode_matkul');?>" ></td>
  </tr>
  <tr>
    <td>Nama Mata Kuliah</td>
    <td>:</td>
    <td><?php echo form_error('nama_matkul'); ?> <input type="text" name="nama_matkul" id="nama_matkul" value="<?php echo set_value('nama_matkul');?>" ></td>
  </tr>

  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="simpan" id="simpan" value="simpan"></td>
  </tr>
</table>
</form>
