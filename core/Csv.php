<?php

namespace core;

use core\models\Ccg;
use core\models\Gp;
use core\models\Trust;

class Csv
{
  protected $_dataDir;
  protected $_ccgList;
  protected $_gpList;
  protected $_trustList;
  
  public function getCcgList() 
  {
    return $this->_ccgList;
  }

  public function getGpList()
  {
    return $this->_gpList;
  }

  public function getTrustList()
  {
    return $this->_trustList;
  }

  public function __construct() 
  {
    $this->_dataDir = dirname(__DIR__, 1) . "\\data";
  }

  protected function encode_utf8($data)
  {
    if ($data === null || $data === '') {
      return $data;
    }
    if (!mb_check_encoding($data, 'UTF-8')) {
      return mb_convert_encoding($data, 'UTF-8');
    } else {
      return $data;
    }
  }

  public function readCsv($modelName) 
  {
    try {
      if(file_exists($this->_dataDir . "\\" . $modelName . ".csv")){
        $content = array_map('str_getcsv', file($this->_dataDir . "\\" . $modelName . ".csv"));
      } else {
        throw new Exception();
      }
    } catch (\Throwable $th) {
      http_response_code(404);
      echo json_encode(
        ["message" => "route not found"]
      );
      die();
    }

    
    $modelFunction = "model" . $modelName;
    $csv = [];
    $formatted_array = [];
    $model_array = [];

    foreach ($content as $value) {
      array_push($csv, $this->encode_utf8($value));
    }

    foreach ($csv as $inner_array) {

      if(is_array($inner_array)){
        $csv_string = implode("", $inner_array);
      }

      $csv_exploded_string = explode("?", $csv_string);
      array_push($formatted_array, $csv_exploded_string);
    }
      
    $this->$modelFunction($formatted_array);
  }

  private function modelCcg($formattedArray) 
  {
    $model_array = [];
    $first = true;

    foreach ($formattedArray as $value) {
      if(!$first){
        $ccg = new Ccg($value[0], $value[1], $value[6], $value[7], $value[8], $value[9], $value[10], $value[11], $value[12], $value[15], $value[16], $value[17], $value[18]);
        array_push($model_array, $ccg);
      } else {
        $first = false;
      }
    }

    $this->_ccgList = $model_array;
  }

  private function modelGp($formattedArray) 
  {
    $model_array = [];
    $first = true;

    foreach ($formattedArray as $value) {
      if(!$first){
        $gp = new Gp($value[0], $value[1], $value[7], $value[8], $value[9], $value[10], $value[11], $value[12], $value[13], $value[18], $value[19], $value[20], $value[21]);
        array_push($model_array, $gp);
      } else {
        $first = false;
      }
    }

    $this->_gpList = $model_array;
  }

  private function modelTrust($formattedArray) 
  {
    $model_array = [];
    $first = true;

    foreach ($formattedArray as $value) {
      if(!$first){
        $trust = new Trust($value[0], $value[1], $value[3], $value[6], $value[7], $value[8], $value[9], $value[10], $value[11], $value[12]);
        array_push($model_array, $trust);
      } else {
        $first = false;
      }
    }

    $this->_trustList = $model_array;
  }

  public static function getCsv() 
  {
    file_put_contents(dirname(__DIR__, 1) . "\\data\\CCG.csv", fopen("http://media.nhschoices.nhs.uk/data/foi/CCG.csv", 'r'));
    file_put_contents(dirname(__DIR__, 1) . "\\data\\GP.csv", fopen("http://media.nhschoices.nhs.uk/data/foi/GP.csv", 'r'));
    file_put_contents(dirname(__DIR__, 1) . "\\data\\TRUST.csv", fopen("http://media.nhschoices.nhs.uk/data/foi/Trust.csv", 'r'));
  }
}