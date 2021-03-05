<?php
session_start();
include "wea.php";
//$city_name = "france" ;
//$city_name =strtolower($city_name) ;
//$api_key = "35b94edccc663895a10545fa84d48ac2";
//$api_url = "http://api.openweathermap.org/data/2.5/weather?q=".$city_name."&appid=". $api_key;
//$weither_data = json_decode(file_get_contents($api_url),true);
//$temperature = $weither_data['main']['temp'];
//$temperature_c = $temperature - 273.15;
//$temperature_curr_weather = $weither_data['weather'][0]['main'];
//$temperature_curr_weather_des = $weither_data['weather'][0]['description'];
//$temperature_curr_weather_icon = $weither_data['weather'][0]['icon'];
//    echo "the current weather in ".$city_name." is ".$temperature_c."° celcuis.";
//    echo "
//    <img src='http://api.openweathermap.org/img/w/".$temperature_curr_weather_icon.".png' >
//        ";
$_SESSION['nom']="";
$_SESSION['getTemp']="";
$_SESSION['getTemp_c']="";
$_SESSION['getTemp_cw']="";
$_SESSION['getTemp_cwd']="";
$_SESSION['getIcon']="";
$empt = "";

wea::auto();

if(isset($_POST['submit']))
{
    if(!empty($_POST['pay'])){
    $_SESSION['nom']=$_POST['pay'];
    
    $obj = new wea($_POST['pay']);
    $_SESSION['getTemp']=$obj->getTemp();
    $_SESSION['getTemp_c'] = $obj->temperature_c;
    $_SESSION['getTemp_cw'] = $obj->getTemp_cw();
    $_SESSION['getIcon'] = $obj->getIcon();
   header('location:weather2.php');
        }
    if(empty($_POST['pay']))
    {
       header('location:404.php'); 
    }
}
else{
    echo "  ";
}
if(isset($_POST['vider']))
{
    $empt = "  ";
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Weather App</title>
        <link rel="stylesheet" href="bootstrap.css" type="text/css">
        <link rel="stylesheet" href="weat.css">
    </head>
    <body>
        <header></header> 
    <div class="container" style="margin-top:250px">
        <h1>Welcome to my weatherApp</h1>
        <h1>L_Codeur Cloudy</h1>
        <p>Veillez saisir la localite correspondante</p>
        <form method="post" action="">
            <h1>Entrer le nom du pay</h1>
            <input type="text" class="form-control" name="pay" placeholder="Veillez saisir votre localite" value="<?php echo $empt; ?>"><br>
            <input type="submit" class="btn btn-danger" name="submit" value="soumettre">
            <br>
            <br>
            <input type="submit" class="btn btn-danger" name="vider" value="vider">
        </form>
    </div>
        <footer></footer>
    </body>
</html>