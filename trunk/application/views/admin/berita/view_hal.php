<script type="text/javascript">	//function untuk menampilkan pilihan and jika dipilih AND
	function tampil_tab(evt){
	evt = (evt) ? evt : event;
    var target = (evt.target) ? evt.target : evt.srcElement;
    var block1 = document.getElementById("tab_1");
	var block2 = document.getElementById("tab_2");
    if (target.id == "next1") 
		{
			block1.style.display = "none";
			block2.style.display = "block";
		} 
	else if (target.id == "back1") 
		{
			block1.style.display = "block";
			block2.style.display = "none";
		}
	}
	//function untuk menampilkan pilihan then jika dipilih then penyakit yang muncul blokpenyakit dan sebaliknya
</script>


<h2>Data Konten</h2>




<div class="entry">
			<div id="tab_1" style="display:block">
			<h3><a href="<?php echo site_url()?>backend/konten/hal"  id="back1" style="color:#504F4F" />Konten Halaman</a> | <a href="<?php echo site_url()?>backend/konten/berita"  id="next1" style="color:#BAB9B9" />Konten Berita</a></h3>
				<br />
				<table border="0" cellpadding="0" cellspacing="0">
					<tr class="zebra">
						<th>No</th>
						<th>Judul</th>
						<th>Url Page</th>
						<th>Aksi</th>
					</tr>

				<?php 
				$i = 1 + $urut ;
				foreach($query as $row):  ?>
					<tr class="<?php if ($i %2 == 0) echo 'zebra';?>"> 
						<td><?php echo $i?></td>
						<td><?php echo $row['title']; ?></td>
						<td><?php echo $row['page']; ?></td>
						<td><div class="action"><a class="update" href="<?php echo site_url().'backend/konten/edit/'.$row['id_konten'].'/'.$i?>">Edit</a> | 
						<a class="delete" href="#">Hapus</a></div></td>
					</tr>
				<?php 
				$i++;
				endforeach;?>
				</table>
			</div>
</div>