<?php !defined("admin") ? die("hacking?") : null;?>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">slider</h1>
                </div>
                
            </div>
			
			<div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            slider duzenle bolumu
                        </div>
                        <div class="panel-body">
                        <?php 
						
						$id = g("id",true); 
						
						 $query = $db->prepare("select * from slider where slider_id=?");
						 $query->execute(array($id));
						 $row = $query->fetch(PDO::FETCH_ASSOC);	
						
						
						if($_POST){ 
							
						  $adi      = p("adi",true);
						  $aciklama = p("aciklama",true);
						  
						  
						  
						 if(!$adi || !$aciklama){ 
						 
						  echo '<div class="alert alert-warning">gerekli alanları doldurmanız gerekiyor...</div>';
						 
						 
						 }elseif(!$_FILES["resim"]["name"]) {
							 
							echo '<div class="alert alert-warning">resim alanı bos bırakılamaz..</div>'; 
							 
						 }else {
							 
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
										 
										 @unlink($row["slider_resim"]);
										
										$ok = move_uploaded_file($_FILES["resim"]["tmp_name"],$dosyaYolu);
										
										if($ok){
										
										$resim = $dosyaYolu;  
										
										 if(@!$resim){
								
							 $resim = $row["slider_resim"];	
								
							}
						  
							  
							  $update = $db->prepare("update slider set  
							  
							          slider_adi =?,
									  slider_aciklama=?,
									  slider_resim=?  where slider_id=?
									 
							  ");
							  
							$ok =  $update->execute(array($adi,$aciklama,$resim,$id)); 
							  
							  if($ok){
								  
			 echo '<div class="alert alert-success">slider basarıyla guncellendi...</div>'; 
			 
			 
								  
							  }else {
								  
								  echo '<div class="alert alert-danger">sayfa guncellenirken bir hata olustu..</div>';
								   
								   echo $resim;
								   
							  }
										
										
										
										
											
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
						  
						  
						  
							
						}else { 
						
						 
							?>
							<form action="" method="post" enctype="multipart/form-data">
							<div class="col-lg-8">
						<div class="form-group">
						<label>slider adi</label>
						<input name="adi" value="<?php echo $row["slider_adi"];?>" class="form-control">
						</div>
						
						<div class="form-group">
						<label>slider acıklaması</label>
						<textarea name="aciklama" rows="8" class="form-control" ><?php echo $row["slider_aciklama"];?></textarea>
						</div>
						<div class="form-group">
						<label>slider resim</label>
                           <input type="file" name="resim" />
						</div>
						
		
						<button type="submit" class="btn btn-primary">sliderı guncelle</button>
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