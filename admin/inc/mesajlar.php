<?php !defined("admin") ? die("hacking?") : null;?>


<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">mesajlar</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			
			<div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            mesajlar bolumu  
                        <div style="clear:both;"></div>
						</div>
                        <div class="panel-body">
                            
                         <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>mesaj gonderen</th>
                                            <th>mesaj baslik</th>
                                            <th>mesaj tarih</th>
                                           
                                            <th>işlemler</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                   <?php 
                                    
									$query = $db->query("select * from mesajlar order by mesaj_id desc")->fetchAll(PDO::FETCH_ASSOC);
                                          
										  foreach($query as $row){
											  
											 ?>
											 <tr>
										    <td><?php echo $row["mesaj_gonderen"];?></td>
                                            <td><?php echo $row["mesaj_baslik"];?></td>
                                            <td><?php echo $row["mesaj_tarih"];?></td>
                                          
                                            <td align="center"><a href="?do=mesaj_oku&id=<?php echo $row["mesaj_id"];?>" class="btn btn-primary btn-sm">mesajı oku</a> <a href="?do=mesaj_sil&id=<?php echo $row["mesaj_id"];?>" class="btn btn-danger btn-sm">sil</a></td>
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