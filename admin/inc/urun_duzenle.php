<?php !defined("admin") ? die("hacking?") : null;?>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">urunler</h1>
                </div>
                
            </div>
			
			<div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            urun duzenle
                        </div>
                        <div class="panel-body">
                        <?php 
						
						$id = g("id",true); 
						
						 $query = $db->prepare("select * from urunler where urun_id=?");
						 $query->execute(array($id));
						 $row = $query->fetch(PDO::FETCH_ASSOC);	
						
						
						if($_POST){ 
							
						  $adı      = p("adı",true);
						  $link     = seflink($adı);
						  $bilgi    = p("bilgi",true);
						  $acıklama = p("acıklama",true);
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
						  
						  
						  
						  
						  
						  if(!$adi || !$bilgi  || !$aciklama || !$full || !$durum){
							  
							  echo '<div class="alert alert-warning">gerekli alanları doldurmanız gerekiyor..</div>';
							  
						  }else { 
						  
						    if(@!$resim){
								
							 $resim = $row["urun_resim"];	
								
							}
						  
							  
							  $update = $db->prepare("update urunler set  
							  
							          urun_adı=?,
									  urun_link=?,
									  urun_bilgi=?,
									  urun_anasayfa_acıklama=?,
									  urun_full_aciklama=?,
									  urun_resim=?,
									  urun_durum=? where urun_id=?
									  
									 
							  ");
							  
							$ok =  $update->execute(array($adi,$link,$bilgi,$aciklama,$full,$resim,$durum,$id)); 
							  
							  if($ok){
								  
			 echo '<div class="alert alert-success">urun basarıyla guncellendi...</div>';
				  
								  
							  }else {
								  
								  echo '<div class="alert alert-danger">urun guncellenirken bir hata olustu..</div>';
								   
								  
								   
							  }
							  
							  
						  }
						  
							
						}else { 
						
						 
							?>
							<form action="" method="post" enctype="multipart/form-data">
							<div class="col-lg-8">
						<div class="form-group">
						<label>urun baslık</label>
						<input name="adi" value="<?php echo $row["urun_adı"];?>" class="form-control">
						</div>
						<div class="form-group">
						<label>urun bilgi</label>
						<input type="text" name="bilgi" value="<?php echo $row["urun_bilgi"];?>" class="form-control" />
						</div>
						<div class="form-group">
						<label>urun anasayfa acıklama</label>
						<textarea name="aciklama" rows="8" class="form-control" ><?php echo $row["urun_anasayfa_acıklama"];?></textarea>
						</div>
						<div class="form-group">
						<label>urun full acıklama</label>
						<textarea name="full" rows="8" class="form-control" ><?php echo $row["urun_full_acıklama"];?></textarea>
						</div>
						<div class="form-group">
						<label>urun resim</label>
                           <input type="file" name="resim" />
						</div>
						
						<div class="form-group">
						<label>urun durum</label>
						<select class="form-control" name="durum" > 
						<option  value="1"<?php echo $row["urun_durum"] == 1 ? ' selected ' : null;?>>onaylı</option>
						<option  value="2" <?php echo $row["urun_durum"] == 2 ? ' selected ' : null;?>>onaylı deyil</option>
						</select>
						</div>
						<button type="submit" class="btn btn-primary">urunleri guncelle</button>
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