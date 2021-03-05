<?php

class wea
{
    private $city_name;
    private $api_key;
    private $weither_data;
    public  $temperature;
    public $temperature_c;
    private $temperature_curr_weather;
    private $temperature_curr_weather_des;
    private $temperature_curr_weather_icon;
    
    public function __construct($name)
    {
$this->city_name = $name;
$this->city_name =strtolower($this->city_name) ;
$this->api_key = "35b94edccc663895a10545fa84d48ac2";
$api_url = "http://api.openweathermap.org/data/2.5/weather?q=".$this->city_name."&appid=". $this->api_key;
$this->weither_data = json_decode(file_get_contents($api_url),true);
$this->temperature = $this->weither_data['main']['temp'];
$this->temperature_c = $this->temperature - 273.15;
$this->temperature_curr_weather = $this->weither_data['weather'][0]['main'];
$this->temperature_curr_weather_des = $this->weither_data['weather'][0]['description'];
$this->temperature_curr_weather_icon = $this->weither_data['weather'][0]['icon'];
    }
    
    public function getTemp()
    {
    return $this->temperature;
    }
    
    public function getTemp_c()
    {
        return $this->temperature_c = ($this->temperature - 273.15);
    }
    
    public function getTemp_cw()
    {
        return $this->temperature_curr_weather = $this->weither_data['weather'][0]['main'];
    }
    
    public function getTemp_cwd()
    {
        return $this->temperature_curr_weather_des = $this->weither_data['weather'][0]['description'];
    }
    
     public function getIcon()
    {
         $this->temperature_curr_weather_icon = $this->weither_data['weather'][0]['icon'];
     return $this->temperature_curr_weather_icon;
    }
    
    public function __destruct()
    {
        
    }
    static function auto()
    {
        spl_autoload_register(array(__CLASS__,'autoload'));
    }
    static function autoload($class_name)
    {
        require $class_name.'.php';
    }
}