<?php

class App{

    private $controller = 'Home';
    private $method = 'index'; // danata index kiyla danne passe 

private function spiltURL(){
    $URL= $_GET['url']  ?? "home";
    $URL = explode("/", $URL);
    return $URL;
}

public function loadController(){
    $URL = $this->spiltURL();
    // print_r($URL);
    // exit();
    $filename = "../app/controllers/".ucfirst($URL[0]).".php";
    if(file_exists($filename)){
        require $filename;
        $this->controller = ucfirst($URL[0]);
    }
    else{
        $filename="../app/controllers/_404.php";
        require $filename;
        $this->controller = "_404";
    }

    // $home = new Home;
    $controller = new $this -> controller;
    call_user_func_array([$controller, $this->method], []);

  } 
}
