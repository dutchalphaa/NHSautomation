<?php

namespace core\controllers;

use \core\Csv;

class CsvController  
{
  public function read(string $type = "Csv") 
  {
    $list_name = "get" . $type . "List";

    $csv = new Csv();
    $csv->readCsv($type);

    $list = $csv->$list_name();

    http_response_code(200);
    echo json_encode($list);
  }
}
