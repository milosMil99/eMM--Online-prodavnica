<?php

    function nadjiUredjaj($id)
    {
        $mysqli = new mysqli("localhost", "root", "", "projekat");

        $upit = "SELECT * from uredjaji where uredjajID = $id";

        $uredjaj = $mysqli -> query($upit);

        $rez = $uredjaj->fetch_assoc();

        return ($rez);
    }

    function ispisiTabelu()
    {
        if(isset($_SESSION['korpa']))
        foreach($_SESSION['korpa'] as $k=>$v)
        {
            $nizUredjaja = nadjiUredjaj($v['pID']);
        
            echo "
                <tr>
                    <td>" . $nizUredjaja['naziv'] . "</td>
                    <td>" . $v['kolicina'] . "</td>
                    <td>" . $nizUredjaja['cena'] . "</td>
                </tr>
            ";
        }
    }

    function ukupanRacun()
        {
            $ukupanRacun = 0;
            if(isset($_SESSION['korpa']))
            foreach($_SESSION['korpa'] as $k => $v)
            {
                $stavka = nadjiUredjaj($v['pID']);
                $ukupnaCena = $v['kolicina'] * $stavka['cena'];
                $ukupanRacun += $ukupnaCena;
            }

            return $ukupanRacun;
        }
?>