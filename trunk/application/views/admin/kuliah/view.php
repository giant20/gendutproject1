<h4>Nama :<?php echo $nama->nama_mahasiswa;?> </h4>
<br /><br />
<a href="<?php echo base_url().'admin/kuliah/add/'.$id_mhs;?>">Tambah</a><br />

<hr />
<table width="617" border="0" cellpadding="0" cellspacing="0">
<th width="11">No</th>
<th width="101">Mata Kuliah</th>
<th width="57">Kelas</th>
<th width="42">Aksi</th>
</tr>
<?php $no=1?>
<?php foreach ($query as $row){?>
<tr class="<?php if ($no %2 == 0) echo 'zebra';?>">
    <td><?php echo $no?></td>
    <td><?php echo $row['nama_matkul']?></td>
    <td><?php echo $row['kelas']?></td>

        <td><a href="<?php echo base_url().'admin/kuliah/edit/'.$row['id_kuliah'].'/'.$nama->id_mahasiswa;?>">Edit</a> | 
        <a href="<?php echo base_url().'admin/kuliah/delete/'.$row['id_kuliah'].'/'.$nama->id_mahasiswa;?>">Delete</a></td></tr>
        <?php $no++;}?>
        </table>
                        