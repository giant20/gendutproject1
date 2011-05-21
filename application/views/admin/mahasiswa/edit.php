<form id="siswa" name="siswa" method="post" action="">
<table width="505" border="0">


	<tr>
    <td width="154">Username </td>
    <td width="20">:</td>
    <td width="287"><?php echo form_error('username'); ?> <input type="text" name="username" id="username" value="<?php echo $row->username;?>" >	</td>
  </tr>
  <tr>
    <td width="154">Password </td>
    <td width="20">:</td>
    <td width="287"> <input type="password" name="pass1" id="pass1" value="<?php echo set_value('pass1');?>" >	</td>
  </tr>
  
  <tr>
    <td width="154">Nama </td>
    <td width="20">:</td>
    <td width="287"><?php echo form_error('nama'); ?> <input type="text" name="nama" id="kode" value="<?php echo $row->nama_mahasiswa;?>" ></td>
  </tr>
  <tr>
    <td>No Mahasiswa </td>
    <td>:</td>
    <td><?php echo form_error('no_mahasiswa'); ?> <input type="text" name="no_mahasiswa" id="no_mahasiswa" value="<?php echo $row->no_mahasiswa;?>" ></td>
  </tr>
  <tr>
    <td>tgl lahir </td>
    <td>:</td>
    <td><?php echo form_error('tgl_lahir'); ?> <input type="text" name="tgl_lahir" id="nama" value="<?php echo $row->tgl_lahir;?>" ></td>
  </tr>
  <tr>
    <td>Alamat </td>
    <td>:</td>
    <td><?php echo form_error('alamat'); ?>
      <textarea name="alamat" id="alamat" cols="45" rows="5"><?php echo $row->alamat;?></textarea>
  </tr>
  <tr>
    <td>Status </td>
    <td>:</td>
    <td><?php echo form_error('status'); ?>
	<?php echo statusDropdown($row->status); ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>	
    <td>&nbsp;</td>
    <td><input type="submit" name="simpan" id="simpan" value="simpan"></td>
  </tr>
</table>
</form>
