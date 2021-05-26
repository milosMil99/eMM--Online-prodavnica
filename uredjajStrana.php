<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>eMM | Online prodavnica mobilnih telefona</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/all.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/stranaUredjaj.css" rel="stylesheet">
  </head>
    <body>
        <?php include "php/header.php"; ?>
        <?php include "php/uredjajStranaSadrzaj.php"; ?>
        <?php include "php/footer.php";?>

        
          <script>
            function funkcija1()
            {
              var strana = document.getElementById('saStrane1');
                var image =  document.getElementById('glavnaSlika');
                image.src  = strana.src;
            }
    
            function funkcija2()
            {
              var strana = document.getElementById('saStrane2');
                var image =  document.getElementById('glavnaSlika');
                image.src  = strana.src;
            }
          </script>
          

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>