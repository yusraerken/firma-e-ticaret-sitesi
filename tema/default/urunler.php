 <?php 
 
  $link = g("link");
  
  
  if($link){
	 
     $query = $db->prepare("select * from urunler where urun_link=? and urun_durum=?");
     $query->execute(array($link,1));	 
	 $row = $query->fetch(PDO::FETCH_ASSOC);
     $kontrol = $query->rowCount();	 
	 
	 if($kontrol){
		 
		 ?>
		  <div class="icerikler"> 
	    
          <div class="baslik"> 
		  <h2><?php echo $row["urun_adı"];?></h2>
		  <span><?php echo $row["urun_bilgi"];?></span>
		  </div>		
	  <div class="acıklama"> 
	  
	   <?php 
	   
	  
	   
	   
	   ?>
	   
	  <p> 
   <?php echo $row["urun_full_acıklama"];?>	  
	  </p>
	  
	  </div>
	   
	   </div>
		 <?php
		 
		 
	 }else {
		 
		 echo '<div class="alert alert-warning">404 sayfa bulunamadı...</div>';
		 
	 }
	 
	  
  }else {
	  
	  $hata = " 404 ... sayfa degeri yok...";
	  include(tema."/hata.php");
	  
  }
 
 
 ?>
 
 
