<?php
require_once 'listaBack.php';
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
<title>NEXTPARTY - Lista atrasada</title>
<!-- custom-theme -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Musicality Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //custom-theme -->
<link href="css/cssUser/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!-- gallery -->
<link rel="stylesheet" href="css/cssUser/css/lightGallery.css" type="text/css" media="all" />
<!-- //gallery -->
<link rel="stylesheet" href="css/cssUser/css/flexslider.css" type="text/css" media="screen" property="" />

<link href="css/cssUser/css/style7.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/cssUser/css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- font-awesome-icons -->
<link href="css/cssUser/css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome-icons -->
<link href="//fonts.googleapis.com/css?family=Arsenal:400,400i,700,700i" rel="stylesheet">
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
</head>
<body>
<!-- banner -->
<div class="banner_top" id="home">
	<div class="banner_agile_top">
			<div class="w3_agile_header">
						<div class="w3_agileits_logo">
								<h1><a href="index.html">NEXTPARTY <span>Fortalecenco o rolê </span></a></h1>
							</div>
							

					<div class="clearfix"></div>
			    </div>
				<!-- banner-text -->
				<div class="agileits-banner-info">
											<p class="w3_text"><br><br></p>
												<h3 class="w3ls_agile"> 
												Não colocou nome na lista? Não se preocupe</h3>

											
				</div>
				<!--banner Slider starts Here-->
		</div>
</div>
<!-- //banner -->
<!--/welcome >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>-->
<!-- TIL HERE -->

	<div id="contact" class="contact">
		<div class="container">
			<h3 class="wthree_head">Nome na lista atrasado?? <span>Seu nome vai direto para lista da festa que você selecionar! </span></h3>

			<div class="w3layouts_mail_grids">
				<div class="w3layouts_mail_grid_right">
					<form  method="post">
						<div class="col-md-6 wthree_contact_left_grid">
							<div class='form-group'>
							<label for="qualFesta">Festas disponíveis no momento:</label><br>
							<select id="qualFesta" name="qualFesta" class="form-control">
								<?php
								while($event = $getEvent->fetch_assoc()){
									echo "<option value='".$event['event_id']."'>".$event['event_name']."</option>";
									}?>
								
							</select>
							</div>
							<input type="text" name="nome" placeholder="Nome" required="">
							<input type="text" name="sobrenome" placeholder="Sobrenome" required="">
						</div>
						<div class="clearfix"> </div>
						<input type="submit" name="enviarNome" value="Colocar nome na lista">
					</form>
				</div>
			</div>
		</div>
	</div>

<!-- //contact -->
<!-- footer -->
	<div class="footer">
		<div class="container">
			<div class="agileits_w3layouts_footer_grids">
				<div class="col-md-4 agileits_w3layouts_footer_grid">
					<h3>Contato:</h3>
					<ul>
						<li><a href="https://www.facebook.com/nxtparty"><img src="css/cssUser/images/face.png" width="125"></a></li>&nbsp&nbsp&nbsp&nbsp
						<li><a href=""><img src="css/cssUser/images/insta.png" width="125"></a></li>
						
					</ul>
				</div>
				
				<div class="clearfix"> </div>
			</div>
			
		</div>
	</div>
	
<!-- //footer -->

	<!-- js -->
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<!-- //js -->
<script src="js/modernizr-2.6.2.min.js"></script>
<script src="js/classie.js"></script>
<!-- text-effect -->
		<script type="text/javascript" src="js/jquery.transit.js"></script> 
		<script type="text/javascript" src="js/jquery.textFx.js"></script> 
		<script type="text/javascript">
			$(document).ready(function() {
					$('.w3ls_agile').textFx({
						type: 'fadeIn',
						iChar: 100,
						iAnim: 1000
					});
			});
		</script>
		<script type="text/javascript">
			$(document).ready(function() {
					$('.w3_text').textFx({
						type: 'fadeIn',
						iChar: 100,
						iAnim: 1000
					});
			});
		</script>


<script src="js/demo1.js"></script>
<!-- start-smooth-scrolling -->
	<script src="js/lightGallery.js"></script>
	<script>
    	 $(document).ready(function() {
			$("#lightGallery").lightGallery({
				mode:"fade",
				speed:800,
				caption:true,
				desc:true,
				mobileSrc:true
			});
		});
    </script>
<!-- //gallery -->
	<!-- flexSlider -->
					<script defer src="js/jquery.flexslider.js"></script>
					<script type="text/javascript">
					$(window).load(function(){
					  $('.flexslider').flexslider({
						animation: "slide",
						start: function(slider){
						  $('body').removeClass('loading');
						}
					  });
					});
				  </script>
				<!-- //flexSlider -->

<!-- //for bootstrap working -->
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->
<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>

<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
<!-- //here ends scrolling icon -->

<script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>


</body>
</html>