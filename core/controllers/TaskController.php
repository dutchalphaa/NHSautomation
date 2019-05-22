<?php

namespace core\controllers;

use core\Csv;

class TaskController  
{
  public function get() 
  {
    Csv::getCsv();
    http_response_code(200);
    echo json_encode(["message" => "new file has been downloaded"]);
  }
}
