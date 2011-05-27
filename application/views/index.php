<html>
<head>
<title>Universitas Gunungkidul Sejahtera | <?php echo $title ?></title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/style.css" >
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery-1.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery-1.2.6.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery-easing-1.3.pack.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery-easing-compatibility.1.2.pack.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/coda-slider.1.1.1.pack.js"></script>
	
	<script type="text/javascript">
	
		var theInt = null;
		var $crosslink, $navthumb;
		var curclicked = 0;
		
		theInterval = function(cur){
			clearInterval(theInt);
			
			if( typeof cur != 'undefined' )
				curclicked = cur;
			
			$crosslink.removeClass("active-thumb");
			$navthumb.eq(curclicked).parent().addClass("active-thumb");
				$(".stripNav ul li a").eq(curclicked).trigger('click');
			
			theInt = setInterval(function(){
				$crosslink.removeClass("active-thumb");
				$navthumb.eq(curclicked).parent().addClass("active-thumb");
				$(".stripNav ul li a").eq(curclicked).trigger('click');
				curclicked++;
				if( 6 == curclicked )
					curclicked = 0;
				
			}, 3000);
		};
		
		$(function(){
			
			$("#main-photo-slider").codaSlider();
			
			$navthumb = $(".nav-thumb");
			$crosslink = $(".cross-link");
			
			$navthumb
			.click(function() {
				var $this = $(this);
				theInterval($this.parent().attr('href').slice(1) - 1);
				return false;
			});
			
			theInterval();
		});
	</script>
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
