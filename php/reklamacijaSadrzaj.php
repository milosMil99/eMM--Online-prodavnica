<h2>Reklamacija</h2>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-6">
        <form method="post">
                Pronadji racun
                <input type="text" name="racunID" placeholder="Unesite sifru racuna">
                <input type="submit" value="Pronadji" name='nadji'>
                <br><br><br>
                
        </form>
        </div>
        <div class="col-md-4">
            <h4>Izaberite uredjaj za koji zelite da ulozite reklamaciju</h4>
            <form method='post'>
                <table>
                    <tr>
                        <th>ID Uredjaja</th>
                        <th>Naziv Uredjaja</th>
                        <th></th>
                    </tr>

                    <?php
                    
                        if(isset($_POST['nadji']))
                        {
                            $idRacuna = $_POST['racunID'];
                            $mysqli = new mysqli("localhost", "root", "", "projekat");
                            $upit = "SELECT * from kupljeniuredjaji where idRacuna = '$idRacuna'";

                            $izlaz = $mysqli->query($upit);

                            while($rez = $izlaz-> fetch_assoc())
                            {
                                echo "
                                    <tr>
                                        <td>" . $rez['idUredjaja'] . "</td>
                                        <td>" . $rez['markaUredjaja'] . "</td>
                                        <td><input type='checkbox' name='niz[]' value='" . $rez['idUredjaja'] . "'></td>
                                    </tr>
                                ";
                            }
                        }
                    
                    ?>
                </table>
                <button name='potvrdi'>Potvrdi izbor</button>
            </form>
        </div>
    </div>
    
    <?php
    
           if(isset($_POST['potvrdi']))
           {
               if(isset($_POST['niz'])) // da li je izabrao neki od ponudjenih uredjaja u tabeli
               {
                   $niz = $_POST['niz'];
                    $datum = date("Y-m-d");
                   $mysqli = new mysqli("localhost", "root", "", "projekat");

                   $reklamacija = "INSERT into reklamacije (datum) VALUES ('$datum')"; //upit za dodavanje reklamacije

                   $upseh = $mysqli->query($reklamacija);
                   $last_id = mysqli_insert_id($mysqli);
                   if($upseh)
                   {
                        foreach($niz as $k => $v)
                        {
                            $upit = "INSERT into uredjajireklamacija (uredjajID, idReklamacije) VALUES ('$v', '$last_id')"; //upit koji nam dodaje svaki izabrani uredjaj u reklamaciju

                            $rekl = $mysqli->query($upit);
                            if($rekl)
                            {
                                echo "Uspesno ste prilozili reklamaciju!";
                            }
                            else
                            {
                                echo "Nije prosla reklamacija";
                            }
                        }
                   }
                   else
                   {
                       echo "Nije prosla reklamacija";
                   }
               }
           }             
    
    ?>