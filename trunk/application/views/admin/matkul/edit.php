<form id="siswa" name="siswa" method="post" action="">
<table width="371" border="0">

  <tr>
    <td width="146">kode matakuliah</td>
    <td width="10">:</td>
    <td width="208"><?php echo form_error('kode_matkul'); ?> <input type="text" name="kode_matkul" id="kode_matkul" value="<?php echo $row->kode_matkul;?>" ></td>
  </tr>
  <tr>
    <td>Nama matakuliah </td>
    <td>:</td>
    <td><?php echo form_error('nama_matkul'); ?> <input type="text" name="nama_matkul" id="nama_matkul" value="<?php echo $row->nama_matkul;?>" ></td>
  </tr>
  <tr>

  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="simpan" id="simpan" value="simpan"></td>
  </tr>
</table>
</form>
