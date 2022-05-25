<?php !defined("admin") ? die("hacking?") : null;?>


<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">urun silme</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			
			<div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           urun silme işlemi
                        </div>
                        <div class="panel-body">
                        <?php 
                      
					  $id = g("id");   
					    $query = $db->prepare("select * from urunler where urun_id=?");
						$query->execute(array($id));
						$row = $query->fetch(PDO::FETCH_ASSOC);
                          
						@unlink($row["urun_resim"]);
					  
					  
					  if($id){
						
						  
						
						
						  
						  $sil = $db->prepare("delete from urunler where urun_id=?");
						  $ok = $sil->execute(array($id));
						  
						  if($ok){
							  
		 echo '<div class="alert alert-success">urun basarıyla silindi yonlendiriliyorsunuz...</div>';
  
					//header("refresh: 2; url=?do=urunler");		  
						  
						  }else {
							  
							  
							  
							  
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