<?php
        if(isset($_POST['unesi']))
        {
            if(empty($_FILES['slikaNapred']) || empty($_FILES['slikaPozadi']) || empty($_FILES['slikaThumb']) || empty($_POST['marka']) || empty($_POST['naziv']) || empty($_POST['sistem']))
            {
                echo "Morate prvo uneti slike!";
                echo "Morate prvo popuniti obavezna polja!";
                //u slucaju da slike nisu unete
            }    
            else 
            {
                
                if(!empty($_FILES['slikaNapred']))
                {
                    
                    mkdir('images/Uredjaji/'. $_POST['marka'] . '/' .  $_POST['naziv'] . '/');
                    $_FILES['slikaNapred']['name'] = 'napred.jpg';
                    $source = $_FILES['slikaNapred']['tmp_name'];
                    $target = 'images/Uredjaji/'. $_POST['marka'] . '/' .  $_POST['naziv'] . '/' . $_FILES['slikaNapred']['name'];
                    $src1 = $target;
    
                    move_uploaded_file($source, $target);
                }
                if(!empty($_FILES['slikaPozadi']))
                {
                    
                    $_FILES['slikaPozadi']['name'] = 'pozadi.jpg';
                    $source = $_FILES['slikaPozadi']['tmp_name'];
                    $target = 'images/Uredjaji/'. $_POST['marka'] . '/' .  $_POST['naziv'] . '/' . $_FILES['slikaPozadi']['name'];
                    $src2 = $target;
                    move_uploaded_file($source, $target);
                }
                if(!empty($_FILES['slikaThumb']))
                {
                    
                    $_FILES['slikaThumb']['name'] = 'napredThumb.svg';
                    $source = $_FILES['slikaThumb']['tmp_name'];
                    $target = 'images/Uredjaji/'. $_POST['marka'] . '/' .  $_POST['naziv'] . '/' . $_FILES['slikaThumb']['name'];
                    $src3 = $target;
                    move_uploaded_file($source, $target);
                }
                
                //ovim segmentom koda smo prebacili upload-ovane slike iz tmp direktorijuma u zeljeni folder
    
    
    
                $marka = $_POST['marka'];
                $model = $_POST['naziv'];
                $sistem = $_POST['sistem'];
                $procesor = $_POST['procesor'];
                $dijagonala = $_POST['dijagonala'];
                $ram = $_POST['ram'];
                $kameraZ = $_POST['kameraZadnja'];
                $kameraP = $_POST['kameraPrednja'];
                $baterija = $_POST['baterija'];
                $dimenzije = $_POST['dimenzije'];
                $tezina = $_POST['tezina'];
                $rezolucija = $_POST['rezolucija'];
                $tipEkrana = $_POST['tipEkrana'];
                $memorija = $_POST['memorija'];
                $sim = $_POST['dualSim'];
                $cena = $_POST['cena'];
    
                $mysqli = new mysqli("localhost", "root", "", "projekat");
            
                $upit = "INSERT into uredjaji (marka, naziv, slikaNapred, slikaPozadi, slikaThumb, sistem, procesor, dijagonalaEkrana, ram, kameraZadnja, baterija, dimenzije,
                                            tezina, rezolucija, tipEkrana, internaMemorija, kameraPrednja, dualSim, cena) VALUES 
                (
                    '$marka', '$model', '$src1', '$src2', '$src3',
                    '$sistem', '$procesor', '$dijagonala', '$ram', '$kameraZ',
                    '$baterija', '$dimenzije','$tezina', '$rezolucija', ' $tipEkrana',
                    ' $memorija', '$kameraP', '$sim', '$cena'
                )";
            
            $rez= $mysqli->query($upit);
    
            if($rez)
            {
                echo "Uspesan unos u bazu";
            }
            else
            {
                echo "Unos u bazu nije uspesan!";
            }
    
            }  
        }

        $pID = 0;
        $marka='';
        $naziv='';
        $sistem='';
        $sistem='';
        $procesor='';
        $dijagonala='';
        $ram='';
        $kameraZ='';
        $baterija='';
        $dimenzije='';
        $rezolucija='';
        $tipEkrana='';
        $memorija='';
        $kameraP='';
        $dual='';
        $cena='';
        $tezina='';
    
    
        if(isset($_GET['nadji']))//ovim kodom cemo pronaci zeljeni uredjaj u bazi
        {
            $mysqli = new mysqli("localhost", "root", "", "projekat");


            $upit = "SELECT * from uredjaji where uredjajID = " . $_GET['pID'] . "";

            $pID = $_GET['pID'];

            $telefon = $mysqli->query($upit);

            if($rez=$telefon->fetch_assoc())
            {
                $marka=$rez['marka'];
                $naziv=$rez['naziv'];
                $sistem=$rez['sistem'];
                $procesor=$rez['procesor'];
                $dijagonala=$rez['dijagonalaEkrana'];
                $ram=$rez['ram'];
                $kameraZ=$rez['kameraZadnja'];
                $baterija=$rez['baterija'];
                $dimenzije=$rez['dimenzije'];
                $rezolucija=$rez['rezolucija'];
                $tipEkrana=$rez['tipEkrana'];
                $memorija=$rez['internaMemorija'];
                $kameraP=$rez['kameraPrednja'];
                $dual=$rez['dualSim'];
                $cena=$rez['cena'];
                $tezina=$rez['tezina'];
                
            }
            if(isset($_POST['izmeni']) && !empty($_POST['marka'])) //deo koda namenje izvrsavanjem update dela admin strane
            {
                
                $mysqli = new mysqli("localhost", "root", "", "projekat");
                
                $upit2 = "UPDATE uredjaji
                        set marka =  '".$_POST['marka'] ."' , naziv = '".$_POST['naziv'] ."', sistem = '".$_POST['sistem'] ."', procesor = '".$_POST['procesor'] ."',
                            dijagonalaEkrana = '".$_POST['dijagonala'] ."', ram = '".$_POST['ram'] ."', kameraZadnja = '".$_POST['kameraZadnja'] ."', baterija = '".$_POST['baterija'] ."',
                            dimenzije = '".$_POST['dimenzije'] ."', tezina = '".$_POST['tezina'] ."', rezolucija = '".$_POST['rezolucija'] ."', tipEkrana = '".$_POST['tipEkrana'] ."',
                            internaMemorija = '".$_POST['memorija'] ."',
                            kameraPrednja = '".$_POST['kameraPrednja'] ."', dualSim = '".$_POST['dualSim'] ."', cena = '".$_POST['cena'] ."'
                        WHERE uredjajID = '$pID'";
                    
                
                $update = $mysqli->query($upit2);

                if($update)
                {
                    echo "Uspesne izmene u bazi!";
                }
                else
                {
                    echo "Nisu uspesne izmene u bazi!";
                }
            }

            if(isset($_POST['obrisi']))//deo koda namenje izvrsavanjem delete dela admin strane
            {
                $mysqli = new mysqli("localhost", "root", "", "projekat");

                $upit3 = "DELETE from uredjaji where uredjajID = '$pID'";


                $delete = $mysqli->query($upit3);

                if($delete)
                {
                    echo "Uspesne izmene u bazi!";
                }
                else
                {
                    echo "Nisu uspesne izmene u bazi!";
                }
            }

        }
    
?>