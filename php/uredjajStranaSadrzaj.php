<?php
            if(isset($_GET['kljuc']))
            {
              $sifra = $_GET['kljuc'];//kljuc po kome prikazujemo uredjaj
            }
            

            $mysqli = new mysqli("localhost", "root", "", "projekat");

            $upit = "SELECT * from uredjaji where uredjajID = $sifra";
            

            $uredjaj = $mysqli->query($upit);
            $rez =  $uredjaj->fetch_assoc();

            $marka = $rez['marka'];
            $model = $rez['naziv'];
            $slikaNapred = $rez['slikaNapred'];
            $slikaPozadi = $rez['slikaPozadi'];
            $sistem = $rez['sistem'];
            $procesor = $rez['procesor'];
            $dijagonala = $rez['dijagonalaEkrana'];
            $ram = $rez['ram'];
            $kameraZ = $rez['kameraZadnja'];
            $kameraP = $rez['kameraPrednja'];
            $baterija = $rez['baterija'];
            $dimenzije = $rez['dimenzije'];
            $tezina = $rez['tezina'];
            $rezolucija = $rez['rezolucija'];
            $tipEkrana = $rez['tipEkrana'];
            $memorija = $rez['internaMemorija'];
            $sim = $rez['dualSim'];
            $cena = $rez['cena'];
            ?>


      <div class="row"> <!--CELA STRANA-->
        <div class="col-xs-12 col-sm-12 col-md-6">
          <div class="row">
            <div class="col-xs-4 col-md-4">
              <?php   
              echo " <a><img src='" . $slikaNapred . "' alt='PrednjaStranaUredjaja' onclick='funkcija1()' id='' class='slikeSaStrane img-responsive'></a>
              <a><img src='" . $slikaPozadi . "' alt='ZadnjaStranaUredjaja' onclick='funkcija2()' id='' class='slikeSaStrane img-responsive'></a>
              ";?>
            </div>
            <div class="col-xs-8 col-md-8">
                <?php echo " <img src='" . $slikaNapred . "' alt='PrednjaStranaUredjaja' id='glavnaSlika' class='img-responsive'>";?>
            </div>
          </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-6">
          <?php echo "<h3><strong>$marka</strong> $model</h3>"; ?>
          <div class="specifikacije">
          
            <div class="row jedanSpec">
              <div class="col-md-6"><i class="fas fa-cog"></i> Operativni sistem:</div>
              <?php echo "<div class='col-md-6 resenje'>$sistem</div>"; ?>
            </div>
            <div class="row jedanSpec">
                <div class="col-md-6"><i class="fas fa-microchip"></i> Procesor:</div>
                <?php echo "<div class='col-md-6 resenje'>$procesor</div>"; ?>
            </div>
            <div class="row jedanSpec">
                <div class="col-md-6"><i class="fas fa-mobile"></i> Ekran dijagonala:</div>
                <?php echo "<div class='col-md-6 resenje'>$dijagonala inc</div>"; ?>
            </div>
            <div class="row jedanSpec">
                <div class="col-md-6"><i class="fas fa-memory"></i> RAM:</div>
                <?php echo "<div class='col-md-6 resenje'>$ram GB</div>"; ?>
            </div>
            <div class="row jedanSpec">
                <div class="col-md-6"><i class="fas fa-camera"></i> Kamera:</div>
                <?php echo "<div class='col-md-6 resenje'>$kameraZ MP</div>"; ?>
            </div>
            <div class="row jedanSpec">
                <div class="col-md-6"><i class="fas fa-battery-half"></i> Baterija:</div>
                <?php echo "<div class='col-md-6 resenje'>$baterija mAh</div>"; ?>
            </div>
           <?php echo"<h3 class='cena'>Cena: $cena</h3>";?> 
          </div>
          <form method="POST"> 
          <button type="submit" name="kupi"  class="kupi">Kupi<i class="fas fa-shopping-cart"></i></button>
            <input type="text" name='kolicina' value='1' size='3'>
          </form>
        </div>
      </div>
      <?php    
         
          
          $i=0; 
         if(isset($_POST['kupi'])) //provera da li je korisnik kliknuo na dugme kupi
          {
            if(isset($_POST['kolicina'])) //proveravamo prvo koliko uredjaja zeli da kupi
            {
              $kolicina = $_POST['kolicina'];
            }
            else // ako nije naglasio koliko stavljamo 1
            {
              $kolicina = 1;
            }

            
            if(!isset($_SESSION['korpa']) || count($_SESSION['korpa'])<1) //da li uopste postoji korpa, i ako postoji da li ima u sebi neki proizvod
            {
              $_SESSION['korpa'] = array(1 => array('pID' => $sifra, 'kolicina' => $kolicina)); // ako nema setujemo je i  stavljamo odgovarajuci elemnt u korpu
              $_SESSION['dodato'] = 'true';
            }
            else
            {
              $sifreUredjaja = array_column($_SESSION['korpa'], 'pID'); //izvlacimo sifre uredjaja koje se nalaze u korpi
              
              if(in_array($sifra, $sifreUredjaja))// ako postoje sifre u nizu znaci da treba samo da povecamo kolicinu
              {
                foreach($_SESSION['korpa'] as $k => $v)
                {
                  
                  if($sifra == $v['pID'])
                  {
                    $_SESSION['korpa'][$k]['kolicina'] += $kolicina;
                    $_SESSION['dodato'] = 'true';
                  }
                }
              }
              else // ako ne postoje dodajemo novi uredjaj
              {
                array_push($_SESSION['korpa'], array('pID'=> $sifra, 'kolicina' => $kolicina));
                $_SESSION['dodato'] = 'true';
                 
              }
            }

            if(isset($_SESSION['dodato']))
            {        
                if($_SESSION['dodato'] == 'true')
                  { 
                    echo "<div class='alert alert-success'   id='odgovor' role='alert'>Uspesno ste dodali uredjaj u korpu!</div> ";
                    unset($_SESSION['dodato']);
                  }
                  else
                  {
                    echo" <div class='alert alert-danger' id='odgovor' role='alert'>Dodavanje u korpu nije uspesno!</div>";
                    unset($_SESSION['dodato']);
                  }
            }
          }
      ?>
      <br><br><br>
      <div class="zaDetalje">
        <a class="btn btn-primary" id="detalji" role="button" data-toggle="collapse" href="#specifikacije" aria-expanded="false" aria-controls="specifikacije">
            Detaljne specifikacije
        </a>
        <div class="collapse" id="specifikacije">
            <div class="well">
                <table class="table table-striped">
                    <tr>
                        <th>Specifikacije</th>
                        <th>Podaci</th>
                    </tr>
                    <tr>
                        <td>Operativni sistem</td>
                        <?php echo "<td>$sistem</td>"; ?>
                    </tr>
                    <tr>
                        <td>Procesor</td>
                        <?php echo "<td>$procesor</td>"; ?>
                    </tr>
                    <tr>
                        <td>Dijgaonala ekrana</td>
                        <?php echo "<td>$dijagonala</td>"; ?>
                    </tr>
                    <tr>
                        <td>Radna memorija</td>
                        <?php echo "<td>$ram</td>"; ?>
                    </tr>
                    <tr>
                        <td>Zadnja kamera</td>
                        <?php echo "<td>$kameraZ</td>"; ?>
                    </tr>
                    <tr>
                        <td>Prednja kamera</td>
                        <?php echo "<td>$kameraP</td>"; ?>
                    </tr>
                    <tr>
                        <td>Baterija</td>
                        <?php echo "<td>$baterija</td>"; ?>
                    </tr>
                    <tr>
                        <td>Rezolucija</td>
                        <?php echo "<td>$rezolucija</td>"; ?>
                    </tr>
                    <tr>
                        <td>Tip ekrana</td>
                        <?php echo "<td>$tipEkrana</td>"; ?>
                    </tr>
                    <tr>
                        <td>Interna memorija</td>
                        <?php echo "<td>$memorija</td>"; ?>
                    </tr>
                    <tr>
                        <td>Dimenzije</td>
                        <?php echo "<td>$dimenzije</td>"; ?>
                    </tr>
                    <tr>
                        <td>Tezina</td>
                        <?php echo "<td>$tezina</td>"; ?>
                    </tr>
                    <tr>
                        <td>Dual SIM</td>
                        <?php 
                          if($sim == '1')
                            echo "<td>Da</td>";
                          else
                            echo "<td>Ne</td>"; 
                        ?>
                    </tr>
                    
                </table>
            </div>
        </div>
        </div>
    </div>
    <br><br>