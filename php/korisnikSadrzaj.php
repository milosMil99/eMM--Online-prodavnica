<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">

    <form method="get">
                Pronadji korisnika <br>    
                    <input type="text" name="userID" placeholder="Unesite sifru korisnika">
                    <br>
                    <input type="submit" value="Pronadji" name='nadjiUser'>
        </form>
    <form method="POST">
                  
                    <br><br>
                    <div class='form-group'>
                        <label for='ime'>Ime korisnika</label>
                        <input type='text' class='form-control input' value="<?php echo $ime;?>" id='ime' name="ime">
                    </div>
                    <div class='form-group'>
                        <label for='username'>Username</label>
                        <input type='text' class='form-control input' value="<?php echo $username;?>" id='username' name='username'>
                    </div>
                    <div class='form-group'>
                        <label for='pass'>Password</label>
                        <input type='text' class='form-control input' value="<?php echo $pass;?>" id='pass' name='pass'>
                    </div>
                    <div class='form-group'>
                        <label for='admin'>Admin</label>
                        <input type='text' class='form-control input' value="<?php echo $admin;?>" id='admin' name='admin'>
                    </div>
                    <input type='submit' name='unesi' class='btn btn-danger  ' value='Unesi u bazu'>
                    <input type='submit' name='izmeni' class='btn btn-danger  ' value='Izmeni u bazi'>
                    <input type='submit' name='obrisi' class='btn btn-danger  ' value='Obrisi iz baze'>
    </form>
    </div>
    <div class="col-md-4"></div>
  </div>