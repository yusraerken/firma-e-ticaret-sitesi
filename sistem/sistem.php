<?php 

  include("fonksiyon.php"); 

  function sayfa_menu() {
	  
	  global $db;
	  
	  $query = $db->prepare("select * from sayfalar where sayfa_durum=?");
	  $query->execute(array(1));
	  $liste =$query->fetchAll(PDO::FETCH_ASSOC);
	  $kontrol = $query->rowcount();
	  
	  if($kontrol){
		  
		 foreach($liste as $row) {
			 
			 echo '<li><a href="?do=sayfa&link'.$row["sayfa_link"].'.html">'.$row["sayfa_adi"].'</a></li>'; 
			 
			 
		 }
		  
	  }else {
		  
		  return false;
		  
	  }
	  
  }  

 
  function sayfa_icerik(){
	  
	  global $db;
	  
	  $do = @g("do");
	  
	  switch($do){
		  
		  
		  case "sayfa":
		  include(tema."/sayfalar.php");
		  break; 
		  
		  case "urunler":
		  include(tema."/urunler.php");
		  break;
		  
		  case "iletisim": 
		  
		  $query = $db->prepare("select * from iletişim");
		  $query->execute(array());
		  $row = $query->fetch(PDO::FETCH_ASSOC);
		  
		  $email = $row["email"];
		  $site = $row["site"];
		  $telefon = $row["telefon"];
		  $ilce = $row["ilce"];
		  
		  
		  include(tema."/iletişim.php");
		  break;
		  
		  default:
		  include(tema."/default.php");
		  break;
		  
		  
		  
	  }
	  
	  
	  
  }
   
   
   function iletisim(){
	    
		global $db; 
		
		
	   
	   if($_POST){ 
	     
		  $query = $db->prepare("select * from iletişim");
		  $query->execute(array());
		  $row = $query->fetch(PDO::FETCH_ASSOC);
	   
		 
		  $isim   = p("isim",true);
		  $email  = p("email",true);
		  $baslik = p("baslik",true);
		  $mesaj  = p("mesaj",true);  
		  
		  if(!$isim || !$email || !$baslik || !$mesaj){
			  
			  echo '<div class="alert alert-warning col-md-6">gerekli alanları doldurmanız gerekiyor...</div>';
			  
		  }elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
			  
    echo '<div class="alert alert-danger col-md-6">email adresiniz yanlıs gozukuyor..</div>';

			  
		  }else {
			  
			include("mail/PHPMailerAutoload.php");
			
            $mail = new PHPMailer;            
 			
			$mail->IsSMTP();
			//$mail->SMTPDebug = 1; // hata ayiklama: 1 = hata ve mesaj, 2 = sadece mesaj
			$mail->SMTPAuth = true;
			$mail->SMTPSecure = 'tls'; // Güvenli baglanti icin ssl normal baglanti icin tls
			$mail->Host = "smtp.yandex.com"; // Mail sunucusuna ismi
			$mail->Port = 587; // Gucenli baglanti icin 465 Normal baglanti icin 587
			$mail->IsHTML(true);
			$mail->SetLanguage("tr", "phpmailer/language");
			$mail->CharSet  ="utf-8";
			$mail->Username = "nuralpmehmet@yandex.com"; // Mail adresimizin kullanicı adi
			$mail->Password = "deneme123"; // Mail adresimizin sifresi
			$mail->SetFrom("nuralpmehmet@yandex.com",$isim); // Mail attigimizda gorulecek ismimiz
			$mail->AddAddress($row["email"]); // Maili gonderecegimiz kisi yani alici
			$mail->addReplyTo($email, $isim);
			$mail->Subject = $baslik; // Konu basligi
			$mail->Body = "<div style='background:#eee;padding:5px;margin:5px;width:300px;'>gonderen : ".$isim." </div><div style='background:#eee;padding:5px;margin:5px;width:300px;'> eposta : ".$email."</div> <br /> mesaj : <br />".$mesaj; // Mailin icerigi
			if(!$mail->Send()){
				
				
				
				
				echo '<div class="alert alert-danger col-md-6">mesajınız gonderilirken bir hata olustu...</div>';
				
				//echo "Mailer Error: ".$mail->ErrorInfo;
			} else { 
			
			   $insert = $db->prepare("insert into mesajlar set  
			   
			               mesaj_gonderen=?,
						   mesaj_baslik=?,
						   mesaj_eposta=?,
						   mesaj_aciklama=?
			   
			   
			   "); 
			   
			   $ok = $insert->execute(array($isim,$baslik,$email,$mesaj)); 
			   
			   if($ok){
				   
				   
			 
			
				echo '<div class="alert alert-success col-md-6">mesajınız basarıyla gonderildi...</div>';
			   
			   }else {
				   
				  echo '<div class="alert alert-danger col-md-6">mesajınız veritabanına kaydedilirken bir hata olustu..</div>'; 
				   
			   }
			  
			}
			  
			  
			  
			  
			  
		  }
		 
		 
		 
	 }
	   
	   
	   
   }
  
  
  function slider() {
	  
	  global $db;
	  
	  $query = $db->prepare("select * from slider order by slider_id desc");
		$query->execute(array());
		$liste = $query->fetchAll(PDO::FETCH_ASSOC);
		$kontrol = $query->rowCount(); 
		
		if($kontrol){
			
			foreach($liste as $row) {
				
				?>
				<li><img src="<?php echo $row["slider_resim"];?>" alt="<?php echo $row["slider_aciklama"];?>" title="<?php echo $row["slider_aciklama"];?>" /></li>
				<?php
				
			}
			
		}else {
			
			?>
			<li><img src="<?php echo tema;?>/data1/images/lighthouse.jpg" alt="Lighthouse" title="Lighthouse" id="wows1_2"/></li>
			<?php
			
		}
		
	  
	  
	  
  }
  
  
  
 

?>