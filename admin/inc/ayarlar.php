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
                        
                        if($_POST){
                            
                            $baslik   = p("baslik");
                            $aciklama = p("aciklama");
                            $keyw     = p("keyw");
                            $tema     = p("tema");
                            $durum    = p("durum");
                            
                            if(!$baslik || !$aciklama || !$keyw || !$tema || !$durum){
                                
                                echo '<div class="alert alert-warning">gerekli alanları doldurmanız gerekiyor..</div>';
                                
                            }else {
                                
                                $update = $db->prepare("update ayarlar set 
                                
                                            site_baslik=?,
                                            site_aciklama=?,
                                            site_anahtar=?,
                                            site_tema=?,
                                            site_durum=? where site_id=?
                                
                                
                                ");
                                
                                $ok = $update->execute(array($baslik,$aciklama,$keyw,$tema,$durum,1));
                                
                                if($ok){
                                    
                                    echo '<div class="alert alert-success">ayarlar basarıyla kaydedildi yonlendiriliyorsunuz...</div>';
                                    
                                    header("refresh: 2; url=/firma/admin/?do=ayarlar");
                                    
                                }else {
                                    
            echo '<div class="alert alert-danger">ayarlar guncellenirken bir hata olustu...</div>';
    
                                    
                                }
                                
                            }
                            
                            
                        }else { 
                        
                         $query = $db->prepare("select * from ayarlar where site_id=?");
                         $query->execute(array(1));
                         $row = $query->fetch(PDO::FETCH_ASSOC);    
                            ?>
                            <form action="" method="post">
                            <div class="col-lg-6">
                        <div class="form-group">
                        <label>site baslık</label>
                        <input name="baslik" value="<?php echo $row["site_baslik"];?>" class="form-control">
                        </div>
                        <div class="form-group">
                        <label>site acıklaması</label>
                        <textarea name="aciklama" rows="3" class="form-control" ><?php echo $row["site_aciklama"];?></textarea>
                        </div>
                        <div class="form-group">
                        <label>site anahtar kelimeler virgul ile ayırın (php,css,html) gibi</label>
                        <textarea name="keyw" rows="3" class="form-control" ><?php echo $row["site_anahtar"];?></textarea>
                        </div>
                        <div class="form-group">
                        <label>site tema</label>
                        <select class="form-control" name="tema" > 
                        <?php klasor("../tema");?>
                        </select>
                        </div>
                        <div class="form-group">
                        <label>site durum</label>
                        <select class="form-control" name="durum" > 
                        <option  value="1"<?php echo $row["site_durum"] == 1 ? ' selected ' : null;?>>site acık</option>
                        <option  value="2" <?php echo $row["site_durum"] == 2 ? ' selected ' : null;?>>site kapalı</option>
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