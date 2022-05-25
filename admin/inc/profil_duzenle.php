<?php !defined("admin") ? die("hacking?") : null;?>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">profil</h1>
                </div>
                
            </div>
			
			<div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            profil duzenle
                        </div>
                        <div class="panel-body">
                        <?php 
						$id = g("id",true);
						
						
						
						if($_SESSION["id"] == $id){ 
						
						 $query = $db->prepare("select * from uyeler where uye_id=?");
						 $query->execute(array($id));
						 $row = $query->fetch(PDO::FETCH_ASSOC);
						
							
							if($_POST){
							
							$isim  = p("isim",true);
							$sifre = p("sifre",true);
							$email = p("email",true);
							
							if(!$isim || !$email){
								
								echo '<div class="alert alert-warning">gerekli alanları doldurmanız gerekiyor...</div>';
								
							}else {
								
							if(!$sifre){
								
								$sifre = $row["uye_sifre"];
								
							}else {
								
								$sifre = md5($sifre);
								
								
							}
                             
							$update = $db->prepare("update uyeler set 
							
							          uye_adi=?,
									  uye_sifre=?,
									  uye_eposta=? where uye_id=?
							
							
							");
								
							$ok = $update->execute(array($isim,$sifre,$email,$id));	
							
							if($ok){
								
						echo '<div class="alert alert-success">profil basarıyla guncellendi...</div>';
	
								
							}else {
								
								echo '<div class="alert alert-danger">profil guncellenirken bir hata olustu...</div>';
								
								
							}
							
								
							}
							
							
						}else { 
						
							
							?>
							<form action="" method="post">
							<div class="col-lg-6">
						<div class="form-group">
						<label>uye adı</label>
						<input name="isim" value="<?php echo $row["uye_adi"];?>" class="form-control">
						</div>
						<div class="form-group">
						<label>uye sifre</label>
						<input name="sifre"  placeholder="yeni sifrenizi girin..." class="form-control">
						</div>
						<div class="form-group">
						<label>uye eposta</label>
						<input type="email" name="email" value="<?php echo $row["uye_eposta"];?>" class="form-control">
						</div>
						
						
						
						<button type="submit" class="btn btn-primary">profili guncelle</button>
						</div>
						</form>
							<?php
							
						}
							
							
							
						}else {
							
							echo '<div class="alert alert-danger">yanlıs bir yere girdin.. gule gule</div>';
							die();
							
						}
						
						
						
						
						?>

					  
					   </div>
                        <div class="panel-footer">
                            kolay video dersleri footer
                        </div>
                    </div>
                </div>
			
			</div>