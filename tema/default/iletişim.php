<div class="icerikler"> 
      
          <div class="baslik"> 
      <h2>Urun tasarım</h2>
      <span>Siz Isteyin Biz Tasarlayalım</span>
      </div>    
    <div class="aciklama"> 
   
   <div class="iletisim"> 
         
            <div class="container" style=" font-size:19px; padding:5px; width:200px;">
                            <h2>iletisim bilgileri</h2>
                          </div>
                            <hr>

                           <ul class="container details">
                            <li><p><span class="glyphicon glyphicon-earphone one" style="width:50px;"></span><?php echo $telefon;?></p></li>
                            <li><p><span class="glyphicon glyphicon-envelope one" style="width:50px;"></span><?php echo $email;?></p></li>
                            <li><p><span class="glyphicon glyphicon-map-marker one" style="width:50px;"></span><?php echo $ilce;?></p></li>
                            <li><p><span class="glyphicon glyphicon-new-window one" style="width:50px;"></span><a href="#"><?php echo $site;?></p></a>
                          </ul>
   
   
   
   </div>
   
    <!--- iletisim ---->
    <div class="container">
  <?php 
  
   iletisim();
  
  
  
  ?>
  <div class="row">
      <div class="col-md-6 col-md-offset-0">
        <div class="well well-sm">
          <form class="form-horizontal" action="" method="post">
          <fieldset>
            <legend style="font-size:18px;padding:6px;" class="text-center">iletisim formu</legend>
    
            <!-- Name input-->
            <div class="form-group">
              <label class="col-md-3 control-label" for="name">adınız</label>
              <div class="col-md-9">
                <input id="name" name="isim" type="text" placeholder="isminiz" class="form-control">
              </div>
            </div>
    
            <!-- Email input-->
            <div class="form-group">
              <label class="col-md-3 control-label" for="email">eposta</label>
              <div class="col-md-9">
                <input id="email" name="email" type="text" placeholder="mail adresiniz" class="form-control">
              </div>
            </div>
       <div class="form-group">
              <label class="col-md-3 control-label" for="baslik">baslik</label>
              <div class="col-md-9">
              <input id="baslik" name="baslik" type="text" placeholder="baslik" class="form-control">
              </div>
            </div>
    
            <!-- Message body -->
            <div class="form-group">
              <label class="col-md-3 control-label" for="message">mesajınız</label>
              <div class="col-md-9">
                <textarea class="form-control" id="message" name="mesaj" placeholder="mesajınız..." rows="5"></textarea>
              </div>
            </div>
    
            <!-- Form actions -->
            <div class="form-group">
              <div class="col-md-12 text-right">
                <button type="submit" class="btn btn-primary btn-lg">formu gonder</button>
              </div>
            </div>
          </fieldset>
          </form>
        </div>
      </div>
  </div>
</div>
    <!---bitis iletisim-->   
   
   
   
   
    
    </div>
     
     </div>