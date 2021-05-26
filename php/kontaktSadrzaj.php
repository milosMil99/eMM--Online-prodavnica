<?php

  if(isset($_POST['posalji']))
  {
    $mysqli = new mysqli("localhost", "root", "", "projekat");

    $ime = $_POST['ime'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $naslov = $_POST['naslov'];
    $poruka = $_POST['poruka'];


    $upit = "INSERT into poruke (ImePrezime, eMail, telBr, naslovPoruke, poruka) VALUES
                                ('$ime', '$email', '$tel', '$naslov', '$poruka')";

    $unos = $mysqli->query($upit);

    if($unos)
    {
      echo "Poruka uspesno poslata!";
    }
    else
    {
      echo "Poruka nije uspesno poslata!";
    }
  }

?>

<div class="row"> <!-- podela prikaza -->
      <div class="col-md-6">
        <h2 class="page-header">
          Kontakt
        </h2>
        <form method="post"> <!-- pocetak forme -->
          <div class="form-group">
            <label for="inputName">Vaše ime i prezime</label>
            <input type="text" class="form-control" name='ime' id="inputName" placeholder="Unesite Vaše ime i prezime">
          </div>
          <div class="form-group">
            <label for="inputEmail">Vaš email</label>
            <input type="email" class="form-control" name='email' id="inputEmail" placeholder="Ovde unesite Vaš email">
          </div>
          <div class="form-group">
            <label for="inputTel">Telefonski broj</label>
            <input type="tel" class="form-control" name='tel' id="inputTel" placeholder="Ovde unesite Vaš telefonski broj">
          </div>
          <div class="form-group">
            <label for="inputSubject">Naslov Vaše poruke</label>
            <input type="text" class="form-control" name='naslov' id="inputSubject" placeholder="Ovde unesite naslov Vaše poruke">
          </div>
          <div class="form-group">
            <label for="inputText">Vaša Poruka</label>
            <textarea class="form-control" name='poruka' rows="5" id="inputText"></textarea>
          </div>
          <button name="posalji" class="btn btn-danger btn-lg btn-block">Pošaljite <span class="glyphicon glyphicon-send" aria-hidden="true"></span></button>
        </form> <!-- kraj forme -->
      </div> 
      <div class="col-md-6">
        <h2 class="page-header">
          Gde se nalazimo
        </h2>
        <p><i class="fas fa-map-marker" aria-hidden="true"></i> Savski nasip 7, Beograd 11000 </p>
        <p><i class="fas fa-phone" aria-hidden="true"></i> +381 11 2096777</p>
        <p><i class="fas fa-envelope" aria-hidden="true"></i> office@its.edu.rs</p>
        <br><br><br>
        <form action="reklamacija.php" method="post">
            <button>Ulozite reklamaciju</button>
        </form>
       
      </div>
    </div> <!-- kraj podele prikaza -->
            <br><br><br>