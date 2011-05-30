<div id="depan">
<div id="depan_atas">
<div class="depan_atas">Berita Terbaru</div>
</div>

<div id="depan_isi">
<div class="depan_isi">
<div id="page-wrap">
											
	<div class="slider-wrap">
		<div id="main-photo-slider" class="csw">
			<div class="panelContainer">
			
<?php $i=1; ?>
<?php foreach ($query3 as $row) { ?>
<a href= "<?php echo base_url().'konten/konten/detail_berita/'.$row['id_konten'] ?>">
				<div class="panel" title="<?php echo $row['title'] ?>">
					<div class="wrapper">
						<img src="<?php echo base_url()?>assets/images/<?php echo $row['image'] ?>" alt="temp" width="470" height="200" />
						<div class="photo-meta-data">
							<?php echo $row['title'] ?><br />
							<span>
						<?php 	$string =$row['konten'];
								$string = character_limiter($string, 100); ?>
								<?php echo $string ?>
								</span>
						</div>
					</div>
				</div></a>
			
<?php $i++; } ?>
			

			</div>
		</div>
<div class="menu_berita">


		<div id="movers-row">
<?php $i=1; ?>
<?php foreach ($query3 as $row ) { ?>			
			<div>
			<a href="#<?php echo $i; ?>" class="cross-link active-thumb">
			<img src="<?php echo base_url()?>assets/images/<?php echo $row['image'] ?>" width="60" height="40" class="nav-thumb" alt="temp-thumb" /></a>
			</div>
<?php $i++; } ?>			
		</div></div>
</div>
	</div>
	
</div>
</div>
<div id="depan_bawah"></div>

</div>		

<div id="elearning">
<div id="elearning_banner"><img src="<?php echo base_url().'assets/images/r.gif' ?>"><span class="elearning_banner">E-Learning</span></div>
<div id="elearning_isi">isi</div>
<div id="elearning_footer"></div>




</div>

<div id="research">
<div id="elearning_banner"><img src="<?php echo base_url().'assets/images/e.gif' ?>"><span class="research_banner">Research</span></div>
<div id="research_isi">isi</div>
<div id="research_footer"></div>


</div>