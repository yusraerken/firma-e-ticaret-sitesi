<?php !defined("admin") ? die("hacking?") : null;?>
 
  
 

<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">mesajlar</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			
			<div class="col-lg-8">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            mesaj oku
                        </div>
                        <div class="panel-body">
                      	<?php 
                       $id = g("id",true);
					   
					   if($id){
						   
                        $query = $db->prepare("select * from mesajlar where mesaj_id=? ");
                        $query->execute(array($id));						
						$row = $query->fetch(PDO::FETCH_ASSOC);
                       $kontrol =  $query->rowcount();	

                        
						if($kontrol){
							
							?>
							<div class="col-md-8">
                            <span style="background:#eee;display:block;padding:10px;margin-bottom:10px;border-radius:5px;">gonderen : <i>
							<?php echo $row["mesaj_gonderen"];?></i> <i style="float:right;">tarih : <?php echo $tarih[0];?></i></span>							
							<p> 
							<?php echo $row["mesaj_aciklama"];?>
							</p>
							</div>
							<?php
							
						}else {
							
						 echo '<div class="alert alert-danger">mesaj bulunamadı silinmis olabilir...</div>';	
							
						}
					   
						   
					   }else {
						   
						   echo '<div class="alert alert-danger">id bulunamadı..</div>';
						   
					   }
					   
					  

                            ?>
                  
						
					   </div>
                        <div class="panel-footer">
                        kolay video dersleri footer
                        </div>
                    </div>
                </div>
			
			</div>