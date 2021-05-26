<?php
    
    if(isset($_POST['kupi']))
    {
        header('location: kupovina.php'); // salje korisnika na stranu kupovina.php
    }

    function nadjiUredjaj($id)
    {
        $mysqli = new mysqli("localhost", "root", "", "projekat");

        $upit = "SELECT * from uredjaji where uredjajID = $id";

        $uredjaj = $mysqli -> query($upit);

        $rez = $uredjaj->fetch_assoc();

        return ($rez);
    }
    
    function ispisiKorpu()
    {
        foreach($_SESSION['korpa'] as $k => $v)
                {  
                    $stavka = nadjiUredjaj($v['pID']);
                    $ukupnaCena = $v['kolicina'] * $stavka['cena'];

                    echo "
                    <tr>
                
                    <td>
                        <div class='zaSLiku'><img src='" . $stavka['slikaThumb'] . "' alt=' Thumbnail_slika_uredjaja_u_korpi' class='img-responsive'></div> 
                    </td>
                    <td>" . $stavka['naziv'] . "</td>
                    <td>" . $v['kolicina'] . "</td>
                    <td>" . $stavka['cena'] . "</td>
                    <td> " . $ukupnaCena . "</td>
                    <td>
                        <form method='post'>
                            <input type='hidden' name='sifra' value='" . $stavka['uredjajID'] . "'>
                            <button name='izbaciIzKorpe' class='izbaciIzKorpe'> 
                                <i class='far fa-times-circle fa-lg'></i>
                            </button>  
                        </form>
                    </td>
                    </tr>
                    ";
                }
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

        return $ukupanRacun;
    }  
?>