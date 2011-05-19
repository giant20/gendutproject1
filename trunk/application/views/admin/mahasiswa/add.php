<form id="siswa" name="siswa" method="post" action="">
<table width="305" border="0">

  <tr>
    <td width="154">Nama</td>
    <td width="20">:</td>
    <td width="287"><?php echo form_error('nama'); ?> <input type="text" name="nama" id="kode" value="<?php echo set_value('nama');?>" ></td>
  </tr>
  <tr>
    <td>No Mahasiswa </td>
    <td>:</td>
    <td><?php echo form_error('no_mahasiswa'); ?> <input type="text" name="no_mahasiswa" id="no_mahasiswa" value="<?php echo set_value('no_mahasiswa');?>" ></td>
  </tr>
  <tr>
    <td>tgl lahir </td>
    <td>:</td>
    <td><?php echo form_error('tgl_lahir'); ?> <input type="text" name="tgl_lahir" id="nama" value="<?php echo set_value('tgl_lahir');?>" ></td>
  </tr>
  <tr>
    <td>Alamat</td>
    <td>:</td>
    <td><?php echo form_error('alamat'); ?>
      <textarea name="alamat" id="alamat" cols="45" rows="5"><?php echo set_value('alamat');?></textarea>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="simpan" id="simpan" value="simpan"></td>
  </tr>
</table>
</form>
