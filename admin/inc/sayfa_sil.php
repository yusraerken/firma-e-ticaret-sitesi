<?php !defined("admin") ? die("hacking?") : null;?>


<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">sayaf silme</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			
			<div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           sayfa silme işlemi
                        </div>
                        <div class="panel-body">
                        <?php 
                      
					  $id = g("id");   
					    $query = $db->prepare("select * from sayfalar where sayfa_id=?");
						$query->execute(array($id));
						$row = $query->fetch(PDO::FETCH_ASSOC);
                          
						@unlink($row["sayfa_resim"]);
					  
					  
					  if($id){
						
						  
						
						
						  
						  $sil = $db->prepare("delete from sayfalar where sayfa_id=?");
						  $ok = $sil->execute(array($id));
						  
						  if($ok){
							  
		 echo '<div class="alert alert-success">sayfa basarıyla silindi yonlendiriliyorsunuz...</div>';
  
					header("refresh: 2; url=?do=sayfalar");		  
						  
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