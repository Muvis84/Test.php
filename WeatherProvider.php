<?php
Class APIs{
  protected $api = "669b8c3ae522bdd1f4b00c86862ac61b";
}
Class Currentweather Extends APIs{
  private $jsonfile;
  private $jsondata;
  private $temp;
  private $humidity;
  private $pressure;
  private $visibility;
  private $description;
  private $windspeed;
  private $winddir;
  private $iconcode;
  private $coordlon;
  private $coordlat;
  private $cityname;
  private $countrycode;
  
  
  private function jsondata($url) {
    $this->jsonfile = file_get_contents($url);
    $this->jsondata = json_decode($this->jsonfile);
    return $this->jsondata;
  }
  
  
  //location for current weather
  public function locationbycity($city, $country) {
    $currenturl = "http://api.openweathermap.org/data/2.5/weather?q=". 
    str_replace(' ', '%20', $city) .",". str_replace(' ', '%20', $country) .
    "&units=metric&appid=". $this->api ."";
      return $currenturl;
  }
  
  // Get current temperature
  public function temperature($url) {
    $this->temp = $this->jsondata($url)->main->temp;
    return $this->temp;
  }
  // Get current humidity
  public function humidity($url) {
    $this->humidity = $this->jsondata($url)->main->humidity;
    return $this->humidity;
  }
  // Get current pressure
  public function pressure($url) {
    $this->pressure = $this->jsondata($url)->main->pressure;
    return $this->pressure;
  }
  // Get current visibility
  public function visibility($url) {
    $this->visibility = $this->jsondata($url)->visibility;
    return $this->visibility;
  }
  //Get current weather description
  public function description($url) {
    $this->description = $this->jsondata($url)->weather[0]->description;
    return $this->description;
  }
  // Get wind speed
  public function windspeed($url) {
    $this->windspeed = $this->jsondata($url)->wind->speed;
    return $this->windspeed;
  }
  //Get wind direction
  public function winddir($url) {
    $this->winddir = $this->jsondata($url)->wind->deg;
    return $this->winddir;
  }
  //Get icon code
  public function iconcode($url) {
    $this->iconcode = $this->jsondata($url)->weather[0]->icon;
    return $this->iconcode;
  }
  // Get country name
  public function cityname($url) {
    $this->cityname = $this->jsondata($url)->name;
    return $this->cityname;
  }
  //Get city name
  public function countrycode($url) {
    $this->countrycode = $this->jsondata($url)->sys->country;
    return $this->countrycode;
  }
  
}

?>
