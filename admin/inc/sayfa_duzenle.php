<?php !defined("admin") ? die("hacking?") : null;?>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">ayarlar</h1>
                </div>
                
            </div>
			
			<div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            ayarlar bolumu
                        </div>
                        <div class="panel-body">
                        <?php 
						
						$id = g("id",true); 
						
						 $query = $db->prepare("select * from sayfalar where sayfa_id=?");
						 $query->execute(array($id));
						 $row = $query->fetch(PDO::FETCH_ASSOC);	
						
						
						if($_POST){ 
							
						  $adi      = p("adi",true);
						  $link     = seflink($adi);
						  $bilgi    = p("bilgi",true);
						  $aciklama = p("aciklama",true);
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
										 
										 @unlink($row["sayfa_resim"]);
										
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
						  
						  
						  
						  
						  
						  if(!$adi || !$bilgi  || !$aciklama || !$durum){
							  
							  echo '<div class="alert alert-warning">gerekli alanları doldurmanız gerekiyor..</div>';
							  
						  }else { 
						  
						    if(@!$resim){
								
							 $resim = $row["sayfa_resim"];	
								
							}
						  
							  
							  $update = $db->prepare("update sayfalar set  
							  
							          sayfa_adi =?,
									  sayfa_link=?,
									  sayfa_bilgi=?,
									  sayfa_aciklama=?,
									  sayfa_resim=?,
									  sayfa_durum=? where sayfa_id=?
									 
							  ");
							  
							$ok =  $update->execute(array($adi,$link,$bilgi,$aciklama,$resim,$durum,$id)); 
							  
							  if($ok){
								  
			 echo '<div class="alert alert-success">sayfa basarıyla guncellendi...</div>';
				  
								  
							  }else {
								  
								  echo '<div class="alert alert-danger">sayfa guncellenirken bir hata olustu..</div>';
								   
								   echo $resim;
								   
							  }
							  
							  
						  }
						  
							
						}else { 
						
						 
							?>
							<form action="" method="post" enctype="multipart/form-data">
							<div class="col-lg-8">
						<div class="form-group">
						<label>site baslık</label>
						<input name="adi" value="<?php echo $row["sayfa_adi"];?>" class="form-control">
						</div>
						<div class="form-group">
						<label>sayfa bilgi</label>
						<input type="text" name="bilgi" value="<?php echo $row["sayfa_bilgi"];?>" class="form-control" />
						</div>
						<div class="form-group">
						<label>sayfa acıklaması</label>
						<textarea name="aciklama" rows="8" class="form-control" ><?php echo $row["sayfa_aciklama"];?></textarea>
						</div>
						<div class="form-group">
						<label>sayfa resim</label>
                           <input type="file" name="resim" />
						</div>
						
						<div class="form-group">
						<label>site durum</label>
						<select class="form-control" name="durum" > 
						<option  value="1"<?php echo $row["sayfa_durum"] == 1 ? ' selected ' : null;?>>onaylı</option>
						<option  value="2" <?php echo $row["sayfa_durum"] == 2 ? ' selected ' : null;?>>onaylı deyil</option>
						</select>
						</div>
						<button type="submit" class="btn btn-primary">ayarları guncelle</button>
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