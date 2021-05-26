<?php
  session_start();


  if(isset($_POST['logIn']))
              {
                $_SESSION['uspeh'] = 'true';
                  if(isset($_POST['user']) && isset($_POST['pass']))
                  {
                    $mysqli = new mysqli("localhost", "root", "", "projekat");

                    $upit = "SELECT * from korisnici where username = '" . $_POST['user'] . "' and password = '" . $_POST['pass'] . "'";

                    
                   $korisnik = $mysqli->query($upit);

                   $rez = $korisnik->fetch_assoc();

                    if($rez)
                    {
                        $_SESSION['brojac'] = 0;
                        $_SESSION['username'] = $rez['username'];
                        $_SESSION['admin'] = $rez['admin'];    
                        
                        header('location:index.php');                      
                    }
                    else
                    {
                     
                      $_SESSION['uspeh'] = 'false';
                    }
                  }
                }

              if(isset($_POST['logOut']))
              {
                //ovime unistavamo sesiju i time postizemo log out
                session_unset();
                session_destroy();
              }


  if(isset($_SESSION['username'])) //ispis logovanog korisnika u navigaciji
    {
     $user= $_SESSION['username'];
    } 
    else 
    { 
      $user =  "Uloguj se";
      
    }

  if(isset($_SESSION['korpa'])) //ispis kolicine proizvoda u korpi
  {
    $brojUredjaja=count($_SESSION['korpa']);
  }
  else
  {
    $brojUredjaja=0;
  }
  
?>
<div>
<div class="ugao"><!--ovo je crveno crni cosak stranice-->
        <div class="crni"></div>
        <div class="crveni"></div>
</div>  <!--ovo je kraj crveno crnog coska stranice-->

    
   
    <div class="logo"> <!--Ovo je logo stranice-->
      <a href="index.php"><img src="images/Logo.png" alt="logo firme" class="img-responsive logo"></a>
  </div><!--Ovo je logo stranice-->

  <nav class="navbar navbar-default navigacija2"  data-spy="affix"> <!--Ovo je pocetak navigacije-->
      <div class="container-fluid">
        
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" id="slovaNavigacije" href="index.php">POČETNA</a>
        </div>
    
        
        <div class="collapse navbar-collapse navigacija" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li><a href="uredjaji.php" id="slovaNavigacije2">UREDJAJI <span class="sr-only">(current)</span></a></li>
            <li><a href="kontakt.php" id="slovaNavigacije">KONTAKT</a></li>
            <?php
              if(isset($_SESSION['username']))
              {
                if($_SESSION['admin']==1)
                  echo "<li><a href='adminPanel.php' id='slovaNavigacije'>ADMIN PANEL</a></li>"; //dodavanje linka ka admin panelu u slucaju da je ulogovan admin
              }
              
            ?>
          </ul>
          
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown"> <!--Ovo je pocetak dropdowna-->
              <a href="#" class="dropdown-toggle" id="slovaNavigacije"  data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    <i class="far fa-user fa-lg"></i> <?php echo $user;?></a>
                    
              
              <ul class="dropdown-menu logovanje">
                <form method="post">
                <li><input type="text" name="user" placeholder="username">  </li>
                <li role="separator" class="divider"></li>
                <li><input type="password" name="pass" placeholder="password"></li>
                <li role="separator" class="divider"></li>
                <li> <p><input type="submit" name="logIn"  class="logovanjeButton" value="Uloguj se"> 
                <a href="registracija.php">Registruj se</a></p> </li>
                <li><input type="submit" name="logOut" value="Log Out"></li>
                </form>
              </ul>
            </li><!--Ovo je kraj dropdowna-->

            
            <li><a href="korpa.php" id="slovaNavigacije"><i class="fas fa-shopping-cart fa-lg"></i> KORPA <sup id="brojUKorpi"><?php echo $brojUredjaja;?></sup></a>  </li>
            <li> <!--Ovo je pocetak dela navigacije namenjen za pretragu-->
              <a class="btn btn-primary" id="dugmeTrazi" role="button" data-toggle="collapse" href="#pretraga" aria-expanded="false" aria-controls="pretraga">
                <span class="glyphicon glyphicon-search" aria-hidden="true"></span> Pretraga
              </a>
              
            </li><!--Ovo je kraj dela navigacije namenjen za pretragu-->
          </ul>
          
          </div>
      </div>
      <div class="collapse"  id="pretraga"> <!--Div koji se pojavljuje prilikom klika na pretragu-->
        <div class="well searchPolje">
          <div class="divSearch">
          <form metohd="get" action="search.php">
            <button class="traziDugme" name="trazi"> <i class="fas fa-search fa-lg"></i></button>
            <input type="text" class="inputSearch2" name='search' id="inputSearch" placeholder="Unesite pojam za pretragu"></form>
        </div>
        </div>
      </div>
  </nav> <!--Ovo je kraj navigacije-->
<?php
   
     if(isset($_SESSION['uspeh'])) //uspeh prilikom logovanja
      {    
           if($_SESSION['uspeh']== 'false')
            {
                echo" <div class='alert alert-danger' id='odgovor' role='alert'>Nema korisnika sa tim podacima!</div>";
                unset($_SESSION['uspeh']);
            }
        }
?>
        
       
</div>

<script type="text/javascript">

   

    // close the div in 3 secs
    window.setTimeout("closeDiv();", 3000);

    function closeDiv()
    {
        var Temp = document.getElementById("odgovor")
        if (Temp != null)
            Temp.style.display = "none";
    }

</script>  