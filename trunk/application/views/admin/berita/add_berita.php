
	<h2>Tambah Konten Berita</h2>
		<div class="form_daftar">
		<form  method="post" id="contoh" action="" enctype="multipart/form-data">
			<div class="bag">
			
				<?php echo form_error('title', '<br /><div class="error">', '</div>'); ?>
				<div class="form_row_konten">
					<label class="field_konten">Judul</label>
					<input type="text" name="title" id="title" class="konten" value="<?php echo set_value('title'); ?>" />
				</div> 
				
				<?php echo form_error('konten', '<br /><div class="error">', '</div>'); ?>
				<div class="form_row_konten">
					<label class="field_konten">Konten (mak 25 kata):</label>
					<textarea name="konten" id="konten" class="konten" value=""><?php echo set_value('konten'); ?></textarea>
				</div> 
				
				
			<div class="tombol_bawah">
				<a href="<?php echo site_url('backend/konten/berita/')?>"><button class="submit" >Batal</button></a>
				<input name="simpan" class="submit" value="Simpan" type="submit">
			</div>
		</form> 
		<br />
	</div>          