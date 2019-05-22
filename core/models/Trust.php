<?php

namespace core\models;

class Trust implements \JsonSerializable
{
  public function __construct($organisationId, $organisationCode, $subType, $name, $addressOne,
  $addressTwo, $addressThree, $city, $county, $postcode) 
  {
    $this->_organisationId = $organisationId;
    $this->_organisationCode = $organisationCode;
    $this->_subType = $subType;
    $this->_name = $name;
    $this->_addressOne = $addressOne;
    $this->_addressTwo = $addressTwo;
    $this->_addressThree = $addressThree;
    $this->_city = $city;
    $this->_county = $county;
    $this->_postcode = $postcode;
    //OrganisationID�OrganisationCode�OrganisationType�SubType�OrganisationStatus�IsPimsManaged�OrganisationName�Address1�Address2�Address3�City�County�Postcode�Latitude�Longitude    
  }

  public function jsonSerialize()
  {
    return [
      "organisationId" => $this->_organisationId,
      "organisationCode" => $this->_organisationCode,
      "subType" => $this->_subType,
      "name" => $this->_name,
      "addressOne" => $this->_addressOne,
      "addressTwo" => $this->_addressTwo,
      "addressThree" => $this->_addressThree,
      "city" => $this->_city,
      "county" => $this->_county,
      "postcode" => $this->_postcode
    ];
  }

  protected $_organisationId;
  
  public function getOrganisationId()
  {
    return $this->_organisationId;
  }

  protected $_organisationCode;
  
  public function getOrganisationCode()
  {
    return $this->_organisationCode;
  }

  protected $_subType;
  
  public function getSubType()
  {
    return $this->_subType;
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
}