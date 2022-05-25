 <?php 
 
  $link = g("link");
  
  
  if($link){
	 
     $query = $db->prepare("select * from sayfalar where sayfa_link=? and sayfa_durum=?");
     $query->execute(array($link,1));	 
	 $row = $query->fetch(PDO::FETCH_ASSOC);
     $kontrol = $query->rowCount();	 
	 
	 if($kontrol){
		 
		 ?>
		  <div class="icerikler"> 
	    
          <div class="baslik"> 
		  <h2><?php echo $row["sayfa_adi"];?></h2>
		  <span><?php echo $row["sayfa_bilgi"];?></span>
		  </div>		
	  <div class="aciklama"> 
	  
	   <img src="tema/default/images/firma.jpg" alt="" />
	     
	  <p> 
   <?php echo $row["sayfa_aciklama"];?>	  
	  </p>
	  
	  </div>
	   
	   </div>
		 <?php
		 
		 
	 }else {
		 
		 echo '404 sayfa bulunamadı...';
		 
	 }
	 
	  
  }else {
	  
	  $hata = " 404 ... sayfa degeri yok...";
	  include(tema."/hata.php");
	  
  }
 
 
 ?>
 
 
