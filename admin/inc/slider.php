<?php !defined("admin") ? die("hacking?") : null;?>


<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">slider</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			
			<div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           slider bolumu  <a href="?do=slider_ekle" class="btn btn-default" style="float:right;">slider ekle</a>
                        <div style="clear:both;"></div>
						</div>
                        <div class="panel-body">
                            
                         <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>slider resim</th>
                                            <th>slider adi</th>
                                            <th>sayfa tarih</th>
                                           
                                            <th>işlemler</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                   <?php 
                                    
									$query = $db->query("select * from slider order by slider_id desc")->fetchAll(PDO::FETCH_ASSOC);
                                          
										  foreach($query as $row){
											  
											 ?>
											 <tr>
										    <td><img src="<?php echo $row["slider_resim"];?>" width="200" height="100" alt="" /></td>
                                            <td><?php echo $row["slider_adi"];?></td>
                                            <td><?php echo $row["slider_tarih"];?></td>
                                           
                                            <td align="center"><a href="?do=slider_duzenle&id=<?php echo $row["slider_id"];?>" class="btn btn-primary btn-sm">duzenle</a> <a href="?do=slider_sil&id=<?php echo $row["slider_id"];?>" class="btn btn-danger btn-sm">sil</a></td>
                                        </tr>
                                            <?php											 
											  
										  }
										  
                                    ?>								   
                                       
                                        
                                    </tbody>
                                </table>
                            </div>


							
					   </div>
                        <div class="panel-footer">
                           kolay video dersleri footer
                        </div>
                    </div>
                </div>
			
			</div>