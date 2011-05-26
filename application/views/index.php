<html>
<head>
<title>Universitas Gunungkidul Sejahtera | <?php echo $title ?></title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/style.css" >
</head>
<body>
<div id="layout">
<div id="header">
<div id="navigasi"><?php $this->load->view('navigasi')?></div></div>
<div id="conten">
<div id="conten_right">
<?php $this->view('nav_right')?>


</div>
<div id="conten_center">
<?php $this->load->view($main_view)?>
</div>
<div id="conten_left">
<?php $this->load->view($slide_view)?>	
</div>
</div>
<div id="footer">
<span class="copy"><?php echo $copy ?></span>

</div>

</div>


</body>
</html>