<div id="depan">
<div id="depan_atas">
<div class="depan_atas">Berita Terbaru</div>
</div>
<div id="depan_isi">
<div class="depan_isi">
<span class="judul"><?php echo $row->title;?></span><br>
<span class="date">:: <?php echo $row->date;?></span><br><br>
<span class="img"><img src="<?php echo base_url() ?>assets/images/<?php echo $row->image; ?> " width="200" height="150"></span><?php echo $row->konten;?></div>
</div>
<div id="depan_bawah"></div>

</div>		
