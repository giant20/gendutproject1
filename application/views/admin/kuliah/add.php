<form id="siswa" name="siswa" method="post" action="">
<table width="526" border="0">

  <tr>
    <td width="187">Nomer Mahasiswa</td>
    <td width="10">:</td>
    <td width="315"> <?php echo $row->no_mahasiswa;?></td>
  </tr>
  <tr>
    <td>Nama Mahasiswa</td>
    <td>:</td>
	<?php echo form_error('nama_mahasiswa'); ?>
    <td> <?php echo $row->nama_mahasiswa;?></td>
	<input type="hidden" name="nama_mahasiswa" value="<?php echo $row->nama_mahasiswa;?>" >
  </tr>
  <tr><?php $i=1;?>
  <?php foreach ($query as $row){?>
  <tr>
    <td width=187>Mata Kuliah</td>
    <td>&nbsp;</td>
    <td>
<?php echo form_error('kode'); ?>
	<input type="checkbox" name="kode[]" value="<?php echo $row['id_matkul']?>"><?php echo $row['nama_matkul']?><br>
	

      </td>
  </tr>
  <tr>
    <td>Kelas</td>
    <td>&nbsp;</td>
    <td>
      <input type="text" name="kelas<?php echo $row['id_matkul']?>" id="kelas" value="<?php echo set_value('kelas');?>" /></td>
  </tr>
  <?php $i++; ?>
  <?php } ?>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><label>
      <input type="submit" name="submit" id="submit" value="Submit" />
    </label></td>
  </tr>
</table>
</form>
