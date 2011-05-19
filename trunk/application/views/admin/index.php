<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Univesitas <?php if(isset($title)): echo $title; else: echo'SISTEM KRS';endif;?></title>
<link rel="stylesheet" type="text/css" href=" <?php echo base_url()?>assets/css/backend.css"/>
<link rel="shortcut icon" href="<?php echo base_url().'images/fav_icon.png';?>" />
<link rel="stylesheet" type="text/css" href=" <?php echo base_url()?>assets/css/login.css"/>
<link rel="stylesheet" type="text/css" href=" <?php echo base_url()?>assets/css/reset.css"/>
</head>

<body>
<div id="masthead"></div>
<div id="navigation"> 
<ul id="menu_tab">	
<li id="tab_dashboard"><?php echo anchor('admin/berita', 'Berita');?></li>
	<li id="tab_dashboard"><?php echo anchor('admin/matkul', 'Mata Kuliah');?></li>
	<li id="tab_daftar"><?php echo anchor('admin/mahasiswa', 'Mahasiswa');?></li>
	<li id="tab_cetak"><?php echo anchor('admin/kuliah', 'Kuliah');?></li>
	<li id="tab_konten"><?php echo anchor('admin/nilai', 'Nilai');?></li>
		<li id="tab_logout"><?php echo anchor('home/doLogout', 'Logout');?></li>

</ul>
</div>

<div  id="main">
<?php $this->load->view($main_view)?>
</div>
<div id="footer">

</div>


</body>
</html>
