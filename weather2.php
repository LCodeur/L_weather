<?php
session_start();

if(isset($_POST['submit']))
{
    header('location:weather1.php');
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Weather App</title>
        <link rel="stylesheet" href="bootstrap.css" type="text/css">
        <link rel="stylesheet" href="weat2.css">
    </head>
    <body>
        <header></header> 
    <div class="container" style="margin-top: 130px;">
        <h1>Welcome to my weatherApp</h1>
        <p>les info sur la localite correspondante</p>
        <p>
            <?php echo date('l'); ?>
        </p>
        <p>
            <?php echo date('F , Y'); ?>
        </p>
        <h2>L_Codeur Cloudy</h2>
        <h3>
    <?php 
        echo $_SESSION['getTemp_c']; 
    ?>°C
        </h3>
        <h4>
            <?php echo $_SESSION['nom']; ?>
        </h4>
        <img src='http://api.openweathermap.org/img/w/<?php echo $_SESSION['getIcon']  ?>.png' style="margin-left:46%;width:50px">
        <br>
        <form method="post" action="">
            <input type="submit" class="btn btn-danger" name="submit" value="retour" >
        </form>
          <p>Merci davoir visiter!!</p>
    </div>
        <footer>
       
        </footer>
    </body>
</html>