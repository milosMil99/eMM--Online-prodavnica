<?php
  
   function brzaKupovina($sifra)
   {
     
       $kolicina = 1;
     
     if(!isset($_SESSION['korpa']) || count($_SESSION['korpa'])<1) //da li uopste postoji korpa, i ako postoji da li ima u sebi neki proizvod
     {
       $_SESSION['korpa'] = array(1 => array('pID' => $sifra, 'kolicina' => $kolicina)); // ako nema setujemo je i  stavljamo odgovarajuci elemnt u korpu
     }
     else
     {
       $sifreUredjaja = array_column($_SESSION['korpa'], 'pID');
       
       if(in_array($sifra, $sifreUredjaja))
       {
         foreach($_SESSION['korpa'] as $k => $v)
         {
           
           if($sifra == $v['pID'])
           {
             $_SESSION['korpa'][$k]['kolicina'] += $kolicina;
           }
         }
       }
       else
       {
         array_push($_SESSION['korpa'], array('pID'=> $sifra, 'kolicina' => $kolicina));    
       }
     }
    }
   
?>

<br>
     <div class="row"><!--ovo je pocetak sladjera-->
      <div class="col-md-12">
        <div class="slider">
          <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" data-interval="3000">
            <!-- Indicators -->
            <ol class="carousel-indicators">
              <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
              <li data-target="#carousel-example-generic" data-slide-to="1"></li>
              <li data-target="#carousel-example-generic" data-slide-to="2"></li>
            </ol>
          
            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox" data-interval="1000">
              <div class="item active" >
                <img src="images/carousel/samsung2.png" alt="..." class="img-responsive">  <!--FALI LINKOVANJE SLIDERA!!!!!-->
              </div>
              <div class="item">
                <img src="images/carousel/samsung.png" alt="..." class="img-responsive"><!--FALI LINKOVANJE SLIDERA!!!!!-->
              </div>
              <div class="item">
                <img src="images/carousel/huawei.png" alt="..." class="img-responsive"><!--FALI LINKOVANJE SLIDERA!!!!!-->
              </div>
            </div>
          
            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
      </div>
    </div><!--ovo je kraj sladjera-->
    <br><br>
    

    <div class="row ceoPrviSegment"> <!--Pocetak prvog segmenta-->
      <div class="col-md-6"><!--Pocetak levog dela prvog  segmenta-->
        <div class="jumbotron prviSegment">
          <h2 id="slovaPrvogSegmenta">Mobilni uređaji</h2>  <br>
           <p >Izaberite savršen uređaj za vas uz našu pomoć i osećajte se sigurno i bezbrižno.</p>
            <p><a class="btn btn-primary btn-lg prviSegmentDugme" href="#" role="button">Pogledajte našu ponudu</a></p>
        </div><!--Kraj levog dela prvog  segmenta-->
      </div>
     
      <div class="col-md-6 desniDeoPrvogSegmenta "> <!--Pocetak desnog dela prvog  segmenta-->
        <h3>Naša preporuka</h3>
        
          <div class="row">
            <div class="col-md-6">
              <div class="xiaomi">
                <img src="images/mi10pro.svg" alt="mi10pro" class="xiaomiSlika">
              </div>
            </div>
            <div class="col-md-6 xiaomiTekst">
                <p > <b id="pokreniKreativnost"> Pokreni svoju kreativnost!</b><br>
                  Podržan sa Qualcomm® Snapdragon™ 865, Mi 10T Pro nudi neverovatnu efikasnost, performanse i 5G konekciju.
                </p>
                <a href="uredjajStrana.php?kljuc=23">Detaljnije</a>
            </div>
          </div>
      </div><!--Kraj desnog dela prvog  segmenta-->
    </div><!--Kraj prvog segmenta-->
   <br><br>
   <div class="row prodaja"><!--Pocetak najprodavanijih uredjaja-->
      <p class="NaslovProdaje">Brza kupovina</p>
      <div class="col-xs-12 col-sm-6 col-md-4 najprodavaniji">
      <form method='post'>
      <br>
          <div class='uredjaj'>
           <div >
              <img class="brzaKupovinaSLika" src="images\Uredjaji\Samsung\Galaxy-Note-20-Ultra\napredThumb.svg" >
            </div>
            <div class="opis">
              
                  <input type='hidden' name='kljuc1' value='4'>
                  <p class='marka'> Samsung <br> <strong class='model'> Note 20 Ultra </strong></p>
                  
              </div>                 
              <button type='submit' name='submit1' class='btn btn-danger btn-lg dugmeSaznajte'>Kupi-><i class="fas fa-shopping-cart"></i> </button>
              
            </div>
        
        <br>
      </div>
      <div class="col-xs-12 col-sm-6 col-md-4 najprodavaniji">
      
        <br>
          <div class='uredjaj'>
          <div>
              <img  class="brzaKupovinaSLika" src="images\Uredjaji\Huawei\P40-pro-plus\napredThumb.svg" >
          </div>
              <div class="opis">
                  <input type='hidden' name='kljuc2' value='19'>
                  <p class='marka'> Huawei <br> <strong class='model'> P40 PRO + </strong></p>
                  
              </div>                 
              <button type='submit' name='submit2' class='btn btn-danger btn-lg dugmeSaznajte'>Kupi-><i class="fas fa-shopping-cart"></i> </button> 
              
            </div>
        
        <br>
      </div>
      <div class="col-xs-12 col-md-4 najprodavaniji">
      
        <br>
          <div class='uredjaj'>
            <div>
              <img class="brzaKupovinaSLika" src="images\Uredjaji\iPhone\12-pro-256\napredThumb.svg" >
            </div>
              <div class="opis">
                  <input type='hidden' name='kljuc3' value='9'>
                  <p class='marka'> iPhone <br> <strong class='model'> 12 PRO 256GB</strong></p>
                  
              </div>                 
              <button type='submit' name='submit3' class='btn btn-danger btn-lg dugmeSaznajte'>Kupi-><i class="fas fa-shopping-cart"></i> </button> 
              
            </div>
      </form>
        <br>
      </div>
    </div>
        <?php
            if(isset($_POST['submit1']))
            {
              brzaKupovina($_POST['kljuc1']);
            }

            if(isset($_POST['submit2']))
            {
              brzaKupovina($_POST['kljuc2']);
            }

            if(isset($_POST['submit3']))
            {
              brzaKupovina($_POST['kljuc3']);
            }
        ?>
        
<br><br>
  <div class="row kontakt"><!--Pocetak drugog segmenta-->
            
              <div class="col-xs-4 col-sm-4 col-md-4 ">
                <div class="ikonica"> 
                  <div class="ikonica2">
                    <img class="ikonicaSLika" src="images\supportIcon.svg" alt="podrska+prodaji+ikonica" class="img-responsive">
                  </div>
                </div>
                <div class="ikonicaTekst">
                  <p class="tekst">Mozete nas kontaktirati u svakom momentu radnih sati, kakvo god pitanje da imate</p>
                </div>
              </div>

              <div class="col-xs-4  col-sm-4 col-md-4">
                <div class="ikonica"> 
                    <div class="ikonica2">
                      <i class="far fa-question-circle fa-6x ikona"></i>
                    </div>
                  </div>
                <div class="pitanjeTekst"> 
                  <p class="tekst">Mozete nam poslati mejl van radnih sati, kakvo god pitanje da imate</p>
                </div>
              </div>

              <div class="col-xs-4  col-sm-4 col-md-4">
              <div class="ikonica"> 
                    <div class="ikonica2">
                      <i class="fas fa-exclamation-circle fa-6x ikona"></i>
                    </div>
                  </div>
                <div class="pitanjeTekst"> 
                  <p class="tekst">Imate problem sa nasim uredjajem? Ulozite reklamaciju</p>
                </div>
              </div>
                    
  </div><!--Kraj drugog segmenta-->
  <br>
    <form action="kontakt.php"><button class="dugmeKontakt">Kontkatirajte nas</button></form> 
  <div class="row"><!--Pocetak treceg segmenta-->
    <div class="col-md-6">
      <div class="leviDeoTrecegSegmenta">
        <h3>Već ste doneli odluku pri odabiru vaseg uređaja? </h3> <br>
        <p>Jednostavno unesite ključnu reč, i uz par koraka vaš uređaj kreće ka vama.</p>
        <form metohd="get" action="search.php">
          <div class="row dugmeTraziTrecegSegmenta">
            <div class="col-lg-12">
              <div class="input-group">
                  
                <input type="text" name="search" class="form-control" placeholder="npr. Xiaomi mi 10T Pro">
                <span class="input-group-btn">
                  <button type="submit" name="trazi2" class="btn btn-default" type="button">Trazi</button>
                </span>
                
              </div><!-- /input-group -->
            </div><!-- /.col-lg-6 -->
          </div><!-- /.row -->
        </form>
      </div>
    </div>
    <div class="col-md-6">
      <img src="images/iphone2.jpg" alt="slika telefona" class="img-responsive img-rounded drugiSegmentSlika">
    </div>
  </div><!--Kraj treceg segmenta-->
  <br><br>