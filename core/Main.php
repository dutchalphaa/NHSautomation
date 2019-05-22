<?php

namespace core;

final class Main  
{
  protected $_url;

  public function __construct() 
  {
    if(!empty($_GET["url"])){
      $this->_url = explode("/", $_GET["url"]);
    }
  }

  public function init() 
  {
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");

    if(isset($this->_url)){
     if(class_exists("core\\controllers\\".$this->_url[0]."Controller", true)){
       if (method_exists("core\\controllers\\".$this->_url[0]."Controller", $this->_url[1])) {
        $class = "core\\controllers\\".$this->_url[0]."Controller";
        $function = $this->_url[1];        
        $class = new $class();

        if(isset($this->_url[2])){
          $class->$function($this->_url[2]);
        } else {
          $class->$function();
        }
       } else {
         $this->RouteNotFound();
       }
     } else {
       $this->RouteNotFound();
     }
    } else {
      http_response_code(200);
      echo json_encode([
        "message" => "bmware api"
      ]);
    }
  }

  protected function RouteNotFound()
  {
    http_response_code(404);
      echo json_encode([
        "message" => "Route not found"
      ]);
  }
}
