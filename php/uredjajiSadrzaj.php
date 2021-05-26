<div class="row"> <!--Pocetak dela strane na kojoj se nalaze uredjaji i filteri-->
    <div class="col-md-2"><!--Pocetak segmenta namenjen filterima-->
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

          <div class="panel panel-default"> <!--Filter po proizvodjacima-->
            <div class="panel-heading" role="tab" id="headingOne">
              <h4 class="panel-title">
                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  Proizvođač
                </a>
              </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
              <div class="panel-body">
               
              <?php  
                    $mysqli = new mysqli("localhost", "root", "", "projekat");

                    $upitZaSveProizvodjace = "SELECT DISTINCT marka from uredjaji";
                    $proizvodjaci = $mysqli->query($upitZaSveProizvodjace);

                    while($rez = $proizvodjaci-> fetch_assoc())
                    {
                         echo " <form method='POST'> <label for=' " . $rez['marka'] . "'> " . $rez['marka'] . "  </label>
                                <input type='checkbox' name='proizvodjaci[]' id='".$rez['marka']."' value='".$rez['marka']."'><br>
                         ";
                         
                    }    

               ?><!--PHP kod koji vraca sve razlicite proizvodjace koje imamo u bazi-->
             
              </div>
            </div>
          </div><!--Filter po proizvodjacima kraj-->

          <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingTwo">
              <h4 class="panel-title">
                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  Operativni sistem
                </a>
              </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
              <div class="panel-body">
              <?php  
                    $mysqli = new mysqli("localhost", "root", "", "projekat");

                    $upitZaSveOS = "SELECT DISTINCT sistem from uredjaji";
                    $OS = $mysqli->query($upitZaSveOS);

                    while($rez = $OS-> fetch_assoc())
                    {
                         echo " <label for=' " . $rez['sistem'] . "'> " . $rez['sistem'] . "  </label>
                                <input type='checkbox' name='sistemi[]' id=' " . $rez['sistem'] . "' value='".$rez['sistem']."'><br>
                         ";
                         
                    }
               ?><!--PHP kod koji vraca sve razlicite operativne sisteme koje imamo u bazi-->
              </div>
            </div>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingThree">
              <h4 class="panel-title">
                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  RAM Memorija
                </a>
              </h4>
            </div>
            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
              <div class="panel-body">
              <?php  
                    $mysqli = new mysqli("localhost", "root", "", "projekat");

                    $upitZaSveRam = "SELECT DISTINCT ram from uredjaji";
                    $Ram = $mysqli->query($upitZaSveRam);

                    while($rez = $Ram-> fetch_assoc())
                    {
                         echo " <label for=' " . $rez['ram'] . "GB'> " . $rez['ram'] . "  GB</label>
                                <input type='checkbox' name='ramMemorije[]' id=' " . $rez['ram'] . 'GB' . "' value='".$rez['ram']."'><br>
                         ";
                         
                    }
               ?><!--PHP kod koji vraca sve razlicite velicine ram memorije koje imamo u bazi-->
              </div>
            </div>
          </div>
          <input type='submit' id="potvrda" value='Potvrdi' name='potvrda'></form>
    </div>
    
  </div><!--Kraj segmenta namenjen filterima-->

  <div class="col-xs-12 col-md-10"><!--Pocetak segmenta namenjen uredjajima-->    
  <form method='POST'>
    <button type='submit' class='brisanjeFiltera' name='brisanjeFiltera'>Izbrisi filtere <i class='fas fa-times'></i></button>
  </form>  
  <br>
  <div class='row prikazUredjaja'>
    
    
    <?php
                function ispisiSveUredjaje()
                {
                  $mysqli = new mysqli("localhost", "root", "", "projekat");
                  
                    $upit = "SELECT * from uredjaji";
                  
                  

                  $telefoni = $mysqli->query($upit);
                    if($telefoni->num_rows>1)
                    {
                      while($rez = $telefoni->fetch_assoc())
                      {
                        echo "<form method='GET'  action='uredjajStrana.php'><div class='col-xs-12 col-sm-6 col-md-4'><div class='uredjaj'>
                                <div>
                                  <input type='hidden' name='kljuc' value='" . $rez['uredjajID'] . "'>
                                  <p class='marka' name='" . $rez['marka'] . "'> " . $rez['marka'] . " </p>
                                  <strong class='model'> " . $rez['naziv'] . " </strong>
                                </div>
                                  <a href='#' ><img src=\" " . $rez['slikaThumb'] . " \" class='slikaTelefona img-responsive'></a>
                                  <div  class='cenaTelefona'>
                                   <b> <h3 class='natpisCena'> Cena:</h3></b>  <p class='cena'>" . $rez['cena'] . "</p>
                                  </div>
                                  <input type='submit' name='submit' value='Saznajte više ->' class='dugmeSaznajte'> 
                              </div></div></form>";
                        }
                      } 
                  }
                
                    if(isset($_POST['potvrda']))// ako su primenjeni filteri
                    {
                      if(isset($_POST['proizvodjaci']))//ako je setovan filter po proizvodjacima
                      {
                        
                        $str = "(";                    
                          foreach($_POST['proizvodjaci'] as $marka)
                          {
                            $trimovana = trim($marka);//trimujemo marku telefona koju smo izvukli iz baze jer je postojao problem sa nepotrebnim whitespace-om
                            $str.="'$trimovana',";
                            
                          }             
                          $str .= "'')"; // dodajemo na string za bazu odgovaraujce pdoatke

                        if(isset($_POST['sistemi']))//ako je setovan filter po sistemima
                        {
                          $str .= " AND sistem in (";
                          foreach($_POST['sistemi'] as $sistem)
                          {  
                            $str.="'$sistem',";
                            
                          }
                          $str .= "'')";// dodajemo na string za bazu odgovaraujce pdoatke
                        }

                        if(isset($_POST['ramMemorije']))//ako je setovan filter po ram-u
                        {
                          $str .= " AND ram in (";
                          foreach($_POST['ramMemorije'] as $ram)
                          {                           
                            $str.="'$ram',";// dodajemo na string za bazu odgovaraujce pdoatke
                            
                          }
                          $str .= "'')";
                        }
                      

                        if(isset($_POST['brisanjeFiltera'])) //ovim if-om brisemo sve filtere tj. prikazujemo sve uredjaje
                        {
                          $upit2 = "SELECT * from uredjaji";                         
                        }
                        else
                        {
                          $upit2 = "SELECT * from uredjaji where marka in " . $str;                       
                        }
               
                        $telefoni2 = $mysqli->query($upit2);
                        while($rez = $telefoni2->fetch_assoc())
                        {
                            
                          echo "<form method='GET'  action='uredjajStrana.php'><div class='col-xs-12 col-sm-6 col-md-4'><div class='uredjaj'>
                                  <div>
                                  <input type='hidden' name='kljuc' value='" . $rez['uredjajID'] . "'>
                                    <p class='marka'> " . $rez['marka'] . " </p>
                                    <strong class='model'> " . $rez['naziv'] . " </strong>
                                  </div>
                                  <a href='#' ><img src=\" " . $rez['slikaThumb'] . " \" class='slikaTelefona img-responsive'></a>
                                  <div  class='cenaTelefona'>
                                    <b> <h3 class='natpisCena'> Cena:</h3></b>  <p class='cena'>" . $rez['cena'] . "</p>
                                  </div>
                                  <input type='submit' value='Saznajte više ->' class='dugmeSaznajte'> 
                                </div></div></form>";
                        }
                        
                      }  
                     
                    }
                    else// ako nisu primenjeni filteri
                    {                                           
                       ispisiSveUredjaje();                                            
                    }
                    
                    
                    
                ?>
               </div> 
    </div><!--Kraj segmenta namenjen uredjajima  -->

    
   
  </div><!--Pocetak dela strane na kojoj se nalaze uredjaji i filteri-->