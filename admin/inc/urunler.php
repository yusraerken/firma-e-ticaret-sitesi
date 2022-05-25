<?php !defined("admin") ? die("hacking?") : null;?>


<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">urunler</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			
			<div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            urunler bolumu  <a href="?do=urun_ekle" class="btn btn-default" style="float:right;">urun ekle</a>
                        <div style="clear:both;"></div>
						</div>
                        <div class="panel-body">
                            
                         <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>urun adi</th>
                                            <th>urun bilgi</th>
                                            <th>urun tarih</th>
                                            <th>urun durum</th>
                                            <th>işlemler</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                   <?php 
                                    
									$query = $db->query("select * from urunler order by urun_id desc")->fetchAll(PDO::FETCH_ASSOC);
                                          
										  foreach($query as $row){
											  
											 ?>
											 <tr>
										    <td><?php echo $row["urun_adı"];?></td>
                                            <td><?php echo $row["urun_bilgi"];?></td>
                                            <td><?php echo $row["urun_tarih"];?></td>
                                           <?php 
										   
										   if($row["urun_durum"] == 1){
											   
											   echo ' <td style="color:green">onaylı</td>';
											   
										   }else {
											   
											   echo ' <td style="color:red">onaylı deyil</td>';
											   
										   }
										   
										   
										   ?>
                                            <td align="center"><a href="?do=urun_duzenle&id=<?php echo $row["urun_id"];?>" class="btn btn-primary btn-sm">duzenle</a> <a href="?do=urun_sil&id=<?php echo $row["urun_id"];?>" class="btn btn-danger btn-sm">sil</a></td>
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