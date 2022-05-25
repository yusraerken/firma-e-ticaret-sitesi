<?php !defined("admin") ? die("hacking?") : null;?>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">urun ekle</h1>
                </div>
                
            </div>
			
			<div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            urun ekleme bolumu
                        </div>
                        <div class="panel-body">
                        <?php 
						
						
						
						
						
						
						if($_POST){ 
						$adi      = p("adi",true);	
							
						$query = $db->prepare("select * from urunler where urun_adi=?");
						$query->execute(array($adi));
                        $query->fetch(PDO::FETCH_ASSOC);
						$kontrol = $query->rowCount(); 
						
						if($kontrol){
							
						echo '<div class="alert alert-warning"> <span style="color: red">'.$adi.'</span> böle bir urun daha once acılmıs baska bir tane deneyin... </div>';	
							
						}else {
							
							  $adi      = p("adi",true);
							  $link     = seflink($adi);
							  $bilgi    = p("bilgi",true);
							  $aciklama = p("aciklama",true);
							  $full = strip_tags(p("full"),"<img></img>");
							  $durum    = p("durum",true); 
						  
						  
						 if($_FILES["resim"]["name"]){
							 
							$maxSize = 7000000;
							$dosyaUzantisi = substr($_FILES["resim"]["name"],-4,4);
                            $dosyaAdi      = rand(0,999999).$dosyaUzantisi;
                            $dosyaYolu     = "..".tema."/dosya/".$dosyaAdi;  
                        				  
							
							if($_FILES["resim"]["size"]> $maxSize){
								
	            echo '<div class="alert alert-warning">dosya boyutu 700 kb dan buyuk olamaz..</div>';
	
								
							}else {
								
								$dosya = $_FILES["resim"]["type"];
								
								
								if($dosya == "image/jpeg" || $dosya == "image/png" || $dosya == "image/gif"){
									
									
									if(is_uploaded_file($_FILES["resim"]["tmp_name"])){
										 
										 
										
										$ok = move_uploaded_file($_FILES["resim"]["tmp_name"],$dosyaYolu);
										
										if($ok){
										
										$resim = $dosyaYolu;
											
										}else {
											
			          echo '<div class="alert alert-warning">dosya tasınamadı...</div>';

											
										}
										
										
									}else {
										
										
			       echo '<div class="alert alert-warning">dosya yuklenemedi..</div>';

										
									}
									
									
								}else {
									
									echo '<div class="alert alert-warning">dosya formati sadece resim olmalıdır...</div>';
									
								}
								
								
								
							}
							
							
							
							 
						 } 
						  
						  
						  
						  
						  
						  if(!$adi || !$bilgi  || !$aciklama || !$full || !$durum){
							  
							  echo '<div class="alert alert-warning">gerekli alanları doldurmanız gerekiyor..</div>';
							  
						  }else { 
						  
						    if(@!$resim){
								
							 $resim = "";	
								
							}
						  
							  
							  $update = $db->prepare("insert into urunler set  
							  
							          urun_adi=?,
									  urun_link=?,
									  urun_bilgi=?,
									  urun_anasayfa_aciklama=?,
									  urun_full_aciklama=?,
									  urun_resim=?,
									  urun_durum=?
									 
							  ");
							  
							$ok =  $update->execute(array($adi,$link,$bilgi,$aciklama,$full,$resim,$durum)); 
							  
							  if($ok){
								  
			 echo '<div class="alert alert-success">urun basarıyla eklendi yonlendiriliyorsunuz...</div>';
				      
					  
					   header("refresh: 2; url=?do=urunler");
								  
							  }else {
								  
								  echo '<div class="alert alert-danger">urun eklenirken bir hata olustu..</div>';
								   
								 
								   
							  }
							  
							  
						  }
						  
							
							
							
							
							
							
						}
						
						
						}else { 
						
						 
							?>
							<form action="" method="post" enctype="multipart/form-data">
							<div class="col-lg-8">
						<div class="form-group">
						<label>sayfa adi</label>
						<input name="adi"  class="form-control">
						</div>
						<div class="form-group">
						<label>sayfa bilgi</label>
						<input type="text" name="bilgi" class="form-control" />
						</div>
						<div class="form-group">
						<label>urun anasayfa acıklaması</label>
						<textarea name="aciklama" rows="8" class="form-control" ></textarea>
						</div>
						<div class="form-group">
						<label>urun full acıklaması</label>
						<textarea name="full" rows="8" class="form-control" ></textarea>
						</div>
						<div class="form-group">
						<label>sayfa resim</label>
                           <input type="file" name="resim" />
						</div>
						
						<div class="form-group">
						<label>site durum</label>
						<select class="form-control" name="durum" > 
						<option  value="1">onaylı</option>
						<option  value="2">onaylı deyil</option>
						</select>
						</div>
						<button type="submit" class="btn btn-primary">sayfa ekle</button>
						</div>
						</form>
							<?php
							
						}
						
						
						?>

					  
					   </div>
                        <div class="panel-footer">
                            kolay video dersleri footer
                        </div>
                    </div>
                </div>
			
			</div>