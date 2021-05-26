<?php
    session_start();

    function nadjiUredjaj($id)
    {
        $mysqli = new mysqli("localhost", "root", "", "projekat");

        $upit = "SELECT * from uredjaji where uredjajID = $id";

        $uredjaj = $mysqli -> query($upit);

        $rez = $uredjaj->fetch_assoc();

        return ($rez);
    }

    function ukupanRacun()
        {
            $ukupanRacun = 0;
            foreach($_SESSION['korpa'] as $k => $v)
            {
                $stavka = nadjiUredjaj($v['pID']);
                $ukupnaCena = $v['kolicina'] * $stavka['cena'];
                $ukupanRacun += $ukupnaCena;
            }
            $ukupanRacunSaPorezom= $ukupanRacun *1.2;

            return $ukupanRacunSaPorezom;
        }

        if(isset($_POST['kupi']))
        {
            $sifra= 0;
            $ime = $_POST['ime'];
            $eMail = $_POST['eMail'];
            $tel = $_POST['tel'];
            $adresa = $_POST['adresa'];
            $napomena = $_POST['napomena'];
            $ukupnoPara = $_POST['ukupnoPara'];
            $datum = date("Y-m-d");

            $mysqli = new mysqli("localhost", "root", "", "projekat");

            $upit = "INSERT into racun VALUES ('$sifra', '$ime', '$eMail', '$tel', '$adresa', '$napomena', '$ukupnoPara', '$datum')";
            
            $rez = $mysqli->query($upit);
            $last_id = mysqli_insert_id($mysqli);
            if($rez)
            {
                
                
                echo "Uspesna kupovina! Sifra vaseg racuna je: <b>" . $last_id . " </b>";
            }
            else
            {
                echo "Kupvina nije uspesna!";
            }            
        }
    
            $mysqli = new mysqli("localhost", "root", "", "projekat");
            
    

?>

<!--Koncan ispis racuna na kraju kupovine propraceno bazom-->
<h1>eMMS narudzbina</h1>
    <h3>Fiskalni racun</h3>
    <?php
        echo '<p>Roba narucena ';
        echo $datum;
        echo '</p>';
        echo '<p>Kupili ste:</p>';

        foreach($_SESSION['korpa'] as $k=>$v)
        {
            $nizUredjaja = nadjiUredjaj($v['pID']);
            $upit = "INSERT into kupljeniuredjaji (idUredjaja,markaUredjaja , idRacuna) values ('" . $nizUredjaja['uredjajID'] ."','" . $nizUredjaja['naziv'] ."' , '$last_id')";
            $kupljeno = $mysqli->query($upit);
            if(!$kupljeno)
            {
                echo "Nije kupljeno";
            }
            echo "
                <p>
                   <b> " . $nizUredjaja['naziv'] . "</b>
                   " . $v['kolicina'] . "
                   " . $nizUredjaja['cena'] . "
                </p>
            ";
        }

        echo "<p>Ukupno sa porezom: " . ukupanRacun() . " dinara</p>";
        echo'Hvala!';
    ?>