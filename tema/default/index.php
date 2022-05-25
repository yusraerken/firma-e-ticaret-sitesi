
<?php 

          $query = $db->prepare("select * from iletişim");
		  $query->execute(array());
		  $row = $query->fetch(PDO::FETCH_ASSOC);


?>




<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
	<!-- Start WOWSlider.com HEAD section --> <!-- add to the <head> of your page -->
	<link rel="stylesheet" type="text/css" href="<?php echo tema;?>/engine1/style.css" />
	<script type="text/javascript" src="<?php echo tema;?>/engine1/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section -->


	<link rel="stylesheet" href="<?php echo tema;?>/css/bootstrap-social.css" />	
	<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="<?php echo tema;?>/css/styles.css" />
	<link rel="stylesheet" href="<?php echo tema;?>/css/reset.css" />
	<script src="<?php echo tema;?>/js/jquery.bxslider.min.js"></script>
 <!-- bxSlider CSS file -->
   <link href="<?php echo tema;?>/css/jquery.bxslider.css" rel="stylesheet" />
	<script type="text/javascript"> 
	
		$(document).ready(function(){
		$('.slider6').bxSlider({
		slideWidth: 500,
		minSlides: 5,
		maxSlides: 3,
		startSlide: 2,
		slideMargin: 2
		});
		});
	
	
	
	</script>
</head>
<body>
	 
	 <header> 
	 <div class="logo"> 
	 <img src="<?php echo tema;?>/images/logo.png" width="65" height="65"   alt="" />
	 </div>
	 <ul> 
	<li><a href="/">Anasayfa</a></li>
	
	 <?php sayfa_menu();?>
	 <li><a href="">Referanslar</a></li>
	  <li><a href="?do=iletisim">iletisim</a></li>
	 </ul>
	 </ul>
	 
	 </header>
	 
	 
	 <div class="genel"> 
	 	 <?php sayfa_icerik();?>
	 
	 
	 </div>
	 
	 <footer> 
	 
	 <div class="footer"> 
	 
	 <nav> 
	 <ul> 
	 <li><a href="index.html">Anasayfa</a></li>
	 <li><a href="iletisim.html">iletisim</a></li>
	 <li><a href="">urunler</a></li>
	 <li><a href="">hakkımızda</a></li>
	 </ul>
	 </nav>
	 <div style="clear:both;"></div>
	 <hr />
	 <p> 
	
	<?php echo $row["adres"];?>
	 </p>
	 <hr />
	 
	 </div>
	 
	 <div class="sosyal"> 
     <h2>Bizi Takip Edin</h2>
		<a class="btn btn-social-icon btn-facebook" target="_blank" href="<?php echo $row["facebook"];?>">
		<span class="fa fa-facebook"></span>
		</a>
		<a class="btn btn-social-icon btn-twitter" target="_blank" href="<?php echo $row["twitter"];?>">
		<span class="fa fa-twitter"></span>
		</a>
		<a class="btn btn-social-icon btn-instagram" target="_blank" href="<?php echo $row["instagram"];?>">
		<span class="fa fa-instagram"></span>
		</a>
	 </div>
	
	 </footer>
	 
	 
	 <div style="margin-bottom:10px;"></div>
	 
	 
</body>
</html>





































