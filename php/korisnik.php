<?php
    // admin panela nastavak za manipulaciju korisika

    if(isset($_POST['unesi']))
    {
        $mysqli = new mysqli("localhost", "root", "", "projekat");
            $ime=$_POST['ime'];
            $username=$_POST['username'];
            $pass=$_POST['pass'];
            $admin=$_POST['admin'];

        $upit2 = "INSERT into korisnici (ime, username, password, admin) 
                    VALUES ('$ime', '$username', '$pass', '$admin')";
        $unos = $mysqli->query($upit2);

        if($unos)
        {
            echo "Unos u bazu je uspesan!";
        }
        else
        {
            echo "Unos u bazu nije uspesan!";
        }

    }

    $uID='';
    $ime='';
    $username = '';
    $pass='';
    $admin='';

    if(isset($_GET['nadjiUser']))
    {
        $mysqli = new mysqli("localhost", "root", "", "projekat");

        $upit = "SELECT * from korisnici where userID = " . $_GET['userID'] . "";
        $uID = $_GET['userID'];
        $nesto = $mysqli->query($upit);

        
        if($rez1=$nesto->fetch_assoc())
        {
            $ime=$rez1['ime'];
            $username=$rez1['username'];
            $pass=$rez1['password'];
            $admin=$rez1['admin'];
            
        }

        
    }

    if(isset($_POST['obrisi']))
        {
            $mysqli = new mysqli("localhost", "root", "", "projekat");

            $upit3 = "DELETE from korisnici where userID = '$uID' ";
            
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
        if(isset($_POST['izmeni']))
        {
            
            $mysqli = new mysqli("localhost", "root", "", "projekat");
            
            $upit4 = "UPDATE korisnici
                    set ime = '".$_POST['ime'] ."', username = '".$_POST['username'] ."', password = '".$_POST['pass'] ."', admin = '".$_POST['admin'] ."'
                    WHERE userID = '$uID'";
                
            
            $update = $mysqli->query($upit4);

            if($update)
            {
                echo "Uspesne izmene u bazi!";
            }
            else
            {
                echo "Nisu uspesne izmene u bazi!";
            }
        }
?>


  
                
  