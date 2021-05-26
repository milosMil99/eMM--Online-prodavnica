<?php 
    $mysqli = new mysqli("localhost", "root", "", "projekat");
    
    if (isset($_GET['trazi']) || isset($_GET['trazi2']))
    {
        
        $pretraga = $_GET['search'];
        $Upit="SELECT * FROM uredjaji WHERE marka LIKE '%$pretraga%' OR naziv LIKE '%$pretraga%' OR sistem LIKE '%$pretraga%'"; // upit za pretragu
        
        $rez = $mysqli->query($Upit);
        if ($rez ->num_rows >0){
            while($row =$rez->fetch_assoc()){
                echo "<a href='uredjajStrana.php?kljuc=". $row['uredjajID']  ."'> <div>
                <div class='rezultat'>
                <p class='rezultatP'> <b>" . $row['marka'] . "</b> " .  $row['naziv'] ."  " . $row['sistem'] . " </p>
                </div>
                </div> </a>";
            }
    
        }else{
            echo "Nema trazenog rezultata!";
        }
    }
?>
    <br><br><br>
    <?php
    
        if(isset($_POST['link']))
        {
            echo "Da";
        }
    ?>