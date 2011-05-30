<div id="kabar">
<div id="kabar_atas">Kabar IT </div>
<div id="kabar_isi">
<ul>
<?php foreach ($query5 as $row) { ?>
<li>

<a href="<?php echo base_url().'konten/konten/detail_info/'.$row['id_konten'] ?>"><?php echo $row['title']?></a></li>
<?php } ?>
<ul>

</div>
<div id="kabar_ba"></div>

</div>