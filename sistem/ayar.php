<?php 
  session_start();
 ob_start();
 
 $host   = "localhost";
 $dbname = "firma";
 $kadi   = "root";
 $sifre  = "";
  
  try {
	  
	 $db = new PDO("mysql:host={$host};dbname={$dbname};charset=utf8",$kadi,$sifre);
	  
  }catch(PDOEXception $mesaj){
	  
	  echo $mesaj->getmessage();
	  
	  
  }

    $row = $db->query("select * from ayarlar")->fetch(PDO::FETCH_ASSOC);//fetch assoc nedir araştır. Örnek gör
    
    echo $row["site_baslik"];
	
	 define("tema","./tema/".$row["site_tema"]);//define tanımlama işlemini yaptık.
     
  
  
        

?>