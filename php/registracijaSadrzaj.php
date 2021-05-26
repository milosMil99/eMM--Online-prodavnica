<div class="prijava">
    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6 forma">
        <h3>Forma za registraciju</h3>
          <form method="POST">
            <label for="ime">Ime: </label>
            <input type="text" name="ime" id="ime" onchange="proveriIme()" placeholder="Unesite svoje ime">
            
            <label for="username">Username: </label>
            <input type="text" name="username" id="username" onchange="proveriUser()" placeholder="Unesite zeljeni username">
            
            <label for="pass">Password: </label>
            <input type="password" name="pass" id="pass" onchange="proveriPass()" placeholder="Unesite password">
              
            <label for="passR">Ponovite password: </label>
            <input type="password" name="passR" id="passR" onchange="proveriPassR()" placeholder="Ponovite password">
              <br><br>
            <input type="submit" name="submit" value="Potvrdi">
          </form>

  <?php
  
    if(isset($_POST['submit']))
    {
      $id = 0;
      $ime = $_POST['ime'];
      $user = $_POST['username'];
      $pass = $_POST['pass'];
      $admin = 0;

      $mysqli = new mysqli("localhost", "root", "", "projekat");

      $upitZaUnosKorisnika = "INSERT into korisnici VALUES ('$id','$ime', '$user', '$pass', '$admin')";

      if($mysqli->query($upitZaUnosKorisnika))
      {
        echo "<div class='alert alert-success' role='alert'>Uspesno ste se registrovali!</div>";
      }
      else
      {
        echo "<div class='alert alert-danger' role='alert'>Niste se uspesno registrovali!</div>";
      }
    }
  
  ?>
      </div>
      <div class="col-md-3"></div>
    </div>
  </div>
