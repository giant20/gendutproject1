<div id="info">
<div id="info_atas">Info Kampus </div>
<div id="info_isi">
<ul>
<?php foreach ($query2 as $row) { ?>
<li><a href="<?php echo base_url().'konten/konten/detail_info/'.$row['id_konten'] ?>"><?php echo $row['title']?></a></li>
<?php } ?>
<ul>

</div>
<div id="info_ba"></div>

</div>