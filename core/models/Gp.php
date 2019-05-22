<?php

namespace core\models;

class Gp implements \JsonSerializable
{
  public function __construct($organisationId, $organisationCode, $name, $addressOne, $addressTwo, 
  $addressThree, $city, $county, $postcode, $phone, $email, $website, $fax) 
  {
    $this->_organisationId = $organisationId;
    $this->_organisationCode = $organisationCode;
    $this->_name = $name; 
    $this->_addressOne = $addressOne;
    $this->_addressTwo = $addressTwo;
    $this->_addressThree = $addressThree;
    $this->_city = $city;
    $this->_county = $county;
    $this->_postcode = $postcode;
    $this->_phone = $phone;
    $this->_email = $email;
    $this->_website = $website;
    $this->_fax = $fax;
    
  }

  public function jsonSerialize() 
  {
    return [
      "organisationId" => $this->_organisationId,
      "organisationCode" => $this->_organisationCode,
      "name" => $this->_name,
      "addressOne" => $this->_addressOne,
      "addressTwo" => $this->_addressTwo,
      "addressThree" => $this->_addressThree,
      "city" => $this->_city,
      "county" => $this->_county,
      "postcode" => $this->_postcode,
      "phone" => $this->_phone,
      "email" => $this->_email,
      "website" => $this->_website,
      "fax" => $this->_fax
    ];
  }

  protected $_organisationId;
  
  public function getOrganisationId() {
    return $this->_organisationId;
  }

  protected $_organisationCode;
  
  public function getOrganisationCode() 
  {
    return $this->_organisationCode;
  }

  protected $_name;
  
  public function getName() 
  {
    return $this->_name;
  }

  protected $_addressOne;
  
  public function getAddressOne() 
  {
    return $this->_addressOne;
  }

  protected $_addressTwo;
  
  public function getAddressTwo() 
  {
    return $this->_addressTwo;
  }

  protected $_addressThree;
  
  public function getAddressThree() 
  {
    return $this->_addressThree;
  }

  protected $_city;
  
  public function getCity() 
  {
    return $this->_city;
  }

  protected $_county;
  
  public function getCounty() 
  {
    return $this->_county;
  }

  protected $_postcode;
  
  public function getPostcode() 
  {
    return $this->_postcode;
  }

  protected $_phone;
  
  public function getPhone() 
  {
    return $this->_phone;
  }

  protected $_email;
  
  public function getEmail() 
  {
    return $this->_email;
  }

  protected $_website;
  
  public function getWebsite() 
  {
    return $this->_website;
  }

  protected $_fax;
  
  public function getFax() 
  {
    return $this->_fax;
  }
}

//OrganisationName�Address1�Address2�Address3�City�County�Postcode�Latitude�Longitude�ParentODSCode�ParentName�Phone�Email�Website�Fax
