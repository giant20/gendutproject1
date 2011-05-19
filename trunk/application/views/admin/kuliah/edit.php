<form id="siswa" name="siswa" method="post" action="">
<table width="371" border="0">

  <tr>
    <td width="146">Nomer Mahasiswa</td>
    <td width="10">:</td>
    <td width="208"> <?php echo $row->no_mahasiswa;?></td>
  </tr>
  <tr>
    <td>Nama Mahasiswa</td>
    <td>:</td>
    <td> <?php echo $row->nama_mahasiswa;?></td>
  </tr>
  <tr>
  <tr>
    <td>Mata Kuliah</td>
    <td>&nbsp;</td>
    <td>
<?php foreach ($query as $row){?>
	<input type="checkbox" name="kode[]" value="<?php echo $row['id_matkul']?>"><?php echo $row['nama_matkul']?><br>
<?php } ?>
      </td>
  </tr>
  <tr>
    <td>Kelas</td>
    <td>&nbsp;</td>
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
