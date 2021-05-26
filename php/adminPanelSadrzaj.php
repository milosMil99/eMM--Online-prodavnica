<div class="row">
        <div class="col-md-4">
            
            <form method="get">
                Pronadji uredjaj
                <input type="text" name="pID" placeholder="Unesite sifru uredjaja">
                <input type="submit" value="Pronadji" name='nadji'>
                <br><br><br>
                
            </form>
            <form action="izmenaKorisnika.php" method="post">
                <input type="submit" value="Manipulisi korisnicima">
            </form>
        </div>
        <div class="col-md-7">
        <form method='post' enctype='multipart/form-data'>
            <div class='form-group'>
                <label for='marka'>Marka telefona</label>
                <input type='text' class='form-control input' value="<?php echo $marka;?>" id='marka' name='marka'>
            </div>
            <div class='form-group'>
                <label for='naziv'>Model telefona</label>
                <input type='text' class='form-control input' value="<?php echo $naziv;?>" id='naziv' name='naziv'>
            </div>
            <div class='form-group'>
                <label for='slikaNapred'>Prednja slika telefona</label>
                <input type='file' class='form-control input' name='slikaNapred'>
            </div>
            <div class='form-group'>
                <label for='slikaPozadi'>Zanja slika telefona</label>
                <input type='file' class='form-control input' name='slikaPozadi'>
            </div>
            <div class='form-group'>
                <label for='slikaThumb'>Prednja thumbnail slika telefona</label>
                <input type='file' class='form-control input' name='slikaThumb'>
            </div>
            <div class='form-group'>
                <label for='sistem'>Sistem telefona</label>
                <input type='text' class='form-control input' value="<?php echo $sistem;?>" name='sistem'>
            </div>
            <div class='form-group'>
                <label for='procesor'>Procesor telefona</label>
                <input type='text' class='form-control input' value="<?php echo $procesor;?>" name='procesor'>
            </div>
            <div class='form-group'>
                <label for='dijagonala'>Dijagonala ekrana telefona</label>
                <input type='text' class='form-control input' value="<?php echo $dijagonala;?>" name='dijagonala'>
            </div>
            <div class='form-group'>
                <label for='ram'>Ram telefona</label>
                <input type='text' class='form-control input' value="<?php echo $ram;?>" name='ram'>
            </div>
            <div class='form-group'>
                <label for='kameraZadnja'>Zadnja kamera telefona</label>
                <input type='text' class=' form-control input' value="<?php echo $kameraZ;?>" name='kameraZadnja'>
            </div>
            <div class='form-group'>
                <label for='marka'>Baterija telefona</label>
                <input type='text' class='form-control input' value="<?php echo $baterija;?>" name='baterija'>
            </div>
            <div class='form-group'>
                <label for='dimenzije'>Dimenzije telefona</label>
                <input type='text' class='form-control input' value="<?php echo $dimenzije;?>"  name='dimenzije'>
            </div>
            <div class='form-group'>
                <label for='tezina'>Tezina telefona</label>
                <input type='text' class='form-control input' value="<?php echo $tezina;?>" name='tezina'>
            </div>
            <div class='form-group'>
                <label for='rezolucija'>Rezolucija telefona</label>
                <input type='text' class='form-control input' value="<?php echo $rezolucija;?>" name='rezolucija'>
            </div>
            <div class='form-group'>
                <label for='tipEkrana'>Tip ekrana telefona</label>
                <input type='text' class='form-control input' value="<?php echo $tipEkrana;?>" name='tipEkrana'>
            </div>
            <div class='form-group'>
                <label for='memorija'>Memorija telefona</label>
                <input type='text' class='form-control input' value="<?php echo $memorija;?>" name='memorija'>
            </div>
            <div class='form-group'>
                <label for='kameraPrednja'>Prednja kamera telefona</label>
                <input type='text' class='form-control input' value="<?php echo $kameraP;?>" name='kameraPrednja'>
            </div>
            <div class='form-group'>
                <label for='dualSim'>Dual Sim?</label>
                <input type='text' class='form-control input' value="<?php echo $dual;?>" name='dualSim'>
            </div>
            <div class='form-group'>
                <label for='cena'>Cena telefona</label>
                <input type='text' class='form-control input' value="<?php echo $cena;?>" name='cena'>
            </div>
            
            <input type='submit' name='unesi' class='btn btn-danger btn-lg ' value='Unesi u bazu'>
            <input type='submit' name='izmeni' class='btn btn-danger btn-lg ' value='Izmeni u bazi'>
            <input type='submit' name='obrisi' class='btn btn-danger btn-lg ' value='Obrisi iz baze'>
        </form>
        </div>
        <div class="col-md-1">
                 
        </div>

    </div>