<?php !defined("admin") ? die("hacking?") : null;?>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">slider ekle</h1>
                </div>
                
            </div>
			
			<div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            slider ekleme bolumu
                        </div>
                        <div class="panel-body">
                        <?php 
						
						
						
						
						
						
						if($_POST){ 
						$adi      = p("adi",true);	
							
						$query = $db->prepare("select * from slider where slider_adi=?");
						$query->execute(array($adi));
                        $query->fetch(PDO::FETCH_ASSOC);
						$kontrol = $query->rowCount(); 
						
						if($kontrol){
							
						echo '<div class="alert alert-warning"> <span style="color: red">'.$adi.'</span> böle bir slider daha once acılmıs baska bir tane deneyin... </div>';	
							
						}else {
							
							  $adi      = p("adi",true);
							 
							 
							  $aciklama = p("aciklama",true);
							  
						  
						  
						 if(!$adi || !$aciklama){ 
						 
			   echo '<div class="alert alert-warning">gerekli alanları doldurmanız gerekiyor....</div>';

						 
						 
						 }elseif(!$_FILES["resim"]["name"]){
							 
			 echo '<div class="alert alert-warning"> resim alanı bos bırakılamaz...</div>';
	
							 
						 }else{
							 
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
										
										
										// veritabanı yukleme
										 if(@!$resim){
								
							        $resim = "";	
								
							}
						  
							  
							  $update = $db->prepare("insert into slider set  
							  
							          slider_adi =?,
									  slider_aciklama=?,
									  slider_resim=?
									  
									 
							  ");
							  
							$ok =  $update->execute(array($adi,$aciklama,$resim)); 
							  
							  if($ok){
								  
			 echo '<div class="alert alert-success">slider basarıyla eklendi yonlendiriliyorsunuz...</div>';
				  
								  
							  }else {
								  
								  echo '<div class="alert alert-danger">slider guncellenirken bir hata olustu..</div>';
								   
								 
								   
							  }
										
										// veritabanı yukleme bitis
										
										
										
										
											
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
							
							 
						  
						  
						  
						  
						  
						  
						
							  
							
							  
						
						  
						   
							  
							  
						  
						  
							
							
							
							
							
							
						}
						
						
						}else { 
						
						 
							?>
							<form action="" method="post" enctype="multipart/form-data">
							<div class="col-lg-8">
						<div class="form-group">
						<label>slider adi</label>
						<input name="adi"  class="form-control">
						</div>
					
						<div class="form-group">
						<label>slider acıklaması</label>
						<textarea name="aciklama" rows="8" class="form-control" ></textarea>
						</div>
						<div class="form-group">
						<label>slider resim</label>
                           <input type="file" name="resim" />
						</div>
						
						<button type="submit" class="btn btn-primary">slider ekle</button>
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