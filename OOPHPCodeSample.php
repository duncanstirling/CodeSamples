<?php

abstract class AbstractClass
{
	protected $artistName;
	protected $albumName;
	protected $trackList;	
	
	abstract protected function setProperty($key, $value);
	abstract protected function getProperty($property);
}
 
class AlbumClass extends AbstractClass
{
  public function __construct()
  {
      echo 'The class "', __CLASS__, '" was initiated.<br />';
  }
 
  public function __destruct()
  {
      echo 'The class "', __CLASS__, '" was destroyed.<br />';
  }
 
  public function __toString()
  {
      echo "Using the toString method: ";
      return $this->getProperty($property);
  }
 
  public function setProperty($key, $value)
  {
      $this->{$key} = $value;
  }
 
  public function getProperty($property)
  {
      return $this->{$property};
  }
}
 
$obj            = new AlbumClass;
$trackListArr   = array();
$trackListArr[] = 'track1'; 
$trackListArr[] = 'track2';
$trackList      = json_encode($trackListArr);

$obj->setProperty('trackList', $trackList); 
$obj->setProperty('artistName', 'this is the artist'); 
$obj->setProperty('albumName', 'this is the album'); 
 
echo $obj->getProperty('artistName')."<br />";
echo $obj->getProperty('albumName')."<br />";
echo $obj->getProperty('trackList')."<br />"; 

unset($obj);
?>