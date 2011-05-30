<form action="<?php echo base_url().'mhs/krs/add'?>" name="krs" method="post">
<table width="462" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <th width="20">No</th>
    <th width="170">ID matakuliah</th>
    <th width="215">Nama Matakuliah</th>
    <th width="29">Pilih</th>
  </tr>
  <?php $i=1; ?>
  <?php foreach ($query7 as $row) { ?>
  <tr class="<?php if ($i %2 == 0) echo 'zebra';?>">
    <td><?php echo $i; ?></td>
    <td><?php echo $row['id_matkul']?></td>
    <td><?php echo $row['nama_matkul']?></td>
    <td><input type="checkbox" name="kode[]" value="<?php echo $row['id_matkul']?>"></td>
  </tr>
  <?php $i++;
  }
  ?>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="submit" id="submit" value="Simpan" /> <input type="reset" name="reset" id="reset" value="Reset" /> </td>
    <td>&nbsp;</td>
  </tr>
</table>
</form>