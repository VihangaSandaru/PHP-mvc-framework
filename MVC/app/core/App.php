<?php

class App{

    private $controller = 'Home';
    private $method = 'index'; // danata index kiyla danne passe 

private function spiltURL(){
    $URL= $_GET['url']  ?? "home";
    $URL = explode("/", trim($URL,"/"));
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
        unset($URL[0]);
    }
    else{
        $filename="../app/controllers/_404.php";
        require $filename;
        $this->controller = "_404";
    }

    // $home = new Home;
    $controller = new $this -> controller;
//   select method
    if(!empty($URL[1])){
        if(method_exists($controller, $URL[1])){
            $this->method = $URL[1];
            unset($URL[1]);
        }
    }

    call_user_func_array([$controller, $this->method], []);

  } 
}
