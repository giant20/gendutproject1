<h4>Nama :<?php echo $nama->nama_mahasiswa;?> </h4>
<br />
<table width="434" border="0">
<tr>
    <td>Nama Semester</td>
    <td>:</td>
    <td><?php echo form_error('nama_matkul'); ?><?php echo namaSemDropdown(); ?></td>
  </tr>
  <tr>
    <td>Semester</td>
    <td>:</td>
    <td><?php echo form_error('nama_matkul'); ?> <?php echo semDropdown(); ?></td>
  </tr>
  <tr>
    <td>Tahun</td>
    <td>:</td>
    <td><?php echo form_error('nama_matkul'); ?> <?php echo tahunDropdown(); ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="simpan" id="simpan" value="Cari"></td>
  </tr>
</table>

<hr />
<table width="617" border="0" cellpadding="0" cellspacing="0">
<th width="11">No</th>
<th width="101">Mata Kuliah</th>
<th width="57">Nilai Huruf</th>
<th width="57">Nilai Angka</th>
<th width="42">Aksi</th>
</tr>

<tr class="<?php //if ($no %2 == 0) echo 'zebra';?>">
    <td><?php echo '1';?></td>
    <td><?php echo 'PPKn';?></td>
    <td><?php echo 'A';?></td>
    <td><?php echo '4';?></td>
	<td><a href="<?php echo base_url().'admin/khs/#';?>">Input</a></td>
</tr>

	</table>
			