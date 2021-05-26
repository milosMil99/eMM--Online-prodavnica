     <table class="table table-striped mojaTabela">
        <tr>
            <th>Slika</th>
            <th>Naziv</th>
            <th>Kolicina</th>
            <th>Jedinicna cena</th>
            <th>Ukupna cena</th>
            <th>Izbaci iz korpe</th>
        </tr>
        <?php
            $ukupanRacun = 0;
            if(!isset( $_SESSION['korpa']))
            {
                echo "Nema nista u korpi! <br><br><br>";
            }
            else
            {
                if(isset($_POST['isprazni'])) //praznjennje korpe
                {
                    unset($_SESSION['korpa']);
                    echo "Nema nista u korpi!";
                }
                else
                {
                    if(isset($_POST['izbaciIzKorpe'])) //pojedinacno izbacivanje iz korpe
                    {
                        if(count($_SESSION['korpa'])>1)
                        {
                                foreach($_SESSION['korpa'] as $k => $v)
                                {
                                    if($_POST['sifra'] == $v['pID'])
                                    {
                                        unset($_SESSION['korpa'][$k]);
                                        ispisiKorpu();
                                    }
                                }
                        }
                        else
                        {
                            unset($_SESSION['korpa']);
                            echo "Nema nista u korpi!";
                        }
                    }
                    else
                    {
                        ispisiKorpu();
                    }
                }
            }
        ?>
    </table>
    <form method="post">
        <button name="isprazni" id="isprazni">Isprazni Korpu</button>
        <div class="kupovina">
            Ukupna cena: <input type="text" size='6' value = "<?php if(isset( $_SESSION['korpa'])) echo ukupanRacun(); else echo 0;?>">
            <button name="kupi" id="kupi" >Nastavi sa kupovinom</button>
        </div>  
    </form>
    <br><br><br>