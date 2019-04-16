<?php
namespace Album\Model;

// Added: Add these import statements
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

 class Album
 {
     public $id;
	 public $userName;
	 public $email;	 
	 public $firstName;
	 public $lastName;
	 public $profileType;
	 public $enabled;

     public function exchangeArray($data)
     {
         $this->id          = (!empty($data['id'])) ?          $data['id']          : null;	 
         $this->userName    = (!empty($data['userName'])) ?    $data['userName']    : null;
		 $this->email       = (!empty($data['email'])) ?       $data['email']       : null;
         $this->firstName   = (!empty($data['firstName'])) ?   $data['firstName']   : null;
         $this->lastName    = (!empty($data['lastName'])) ?    $data['lastName']    : null;		 
         $this->profileType = (!empty($data['profileType'])) ? $data['profileType'] : null;			 
         $this->enabled     = (!empty($data['enabled'])) ?     $data['enabled']     : null;		  
     }    

     // Add the following method:
     public function getArrayCopy()
     {
     	return get_object_vars($this);
     }      
     
     // Add content to these methods:
     public function setInputFilter(InputFilterInterface $inputFilter)
     {
     	throw new \Exception("Not used");
     }
     
     public function getInputFilter()
     {
     	if (!$this->inputFilter) {
     		$inputFilter = new InputFilter();
     
     		$inputFilter->add(array(
     				'name'     => 'id',
     				'required' => true,
     				'filters'  => array(
     						array('name' => 'Int'),
     				),
     		));
     
     		$inputFilter->add(array(
     				'name'     => 'userName',
     				'required' => true,
     				'filters'  => array(
     						array('name' => 'StripTags'),
     						array('name' => 'StringTrim'),
     				),
     				'validators' => array(
     						array(
     								'name'    => 'StringLength',
     								'options' => array(
     										'encoding' => 'UTF-8',
     										'min'      => 1,
     										'max'      => 100,
     								),
     						),
     				),
     		)); 
			

     		$inputFilter->add(array(
     				'name'     => 'email',
     				'required' => true,
     				'filters'  => array(
     						array('name' => 'StripTags'),
     						array('name' => 'StringTrim'),
     				),
     				'validators' => array(
     						array(
     								'name'    => 'StringLength',
     								'options' => array(
     										'encoding' => 'UTF-8',
     										'min'      => 1,
     										'max'      => 100,
     								),
     						),
     				),
     		));			
			
     		$inputFilter->add(array(
     				'name'     => 'firstName',
     				'required' => true,
     				'filters'  => array(
     						array('name' => 'StripTags'),
     						array('name' => 'StringTrim'),
     				),
     				'validators' => array(
     						array(
     								'name'    => 'StringLength',
     								'options' => array(
     										'encoding' => 'UTF-8',
     										'min'      => 1,
     										'max'      => 100,
     								),
     						),
     				),
     		)); 

     		$inputFilter->add(array(
     				'name'     => 'lastName',
     				'required' => true,
     				'filters'  => array(
     						array('name' => 'StripTags'),
     						array('name' => 'StringTrim'),
     				),
     				'validators' => array(
     						array(
     								'name'    => 'StringLength',
     								'options' => array(
     										'encoding' => 'UTF-8',
     										'min'      => 1,
     										'max'      => 100,
     								),
     						),
     				),
     		)); 

     		$inputFilter->add(array(
     				'name'     => 'profileType',
     				'required' => true,
     				'filters'  => array(
     						array('name' => 'StripTags'),
     						array('name' => 'StringTrim'),
     				),
     				'validators' => array(
     						array(
     								'name'    => 'StringLength',
     								'options' => array(
     										'encoding' => 'UTF-8',
     										'min'      => 1,
     										'max'      => 100,
     								),
     						),
     				),
     		)); 

     		$inputFilter->add(array(
     				'name'     => 'enabled',
     				'required' => true,
     				'filters'  => array(
     						array('name' => 'StripTags'),
     						array('name' => 'StringTrim'),
     				),
     				'validators' => array(
     						array(
     								'name'    => 'StringLength',
     								'options' => array(
     										'encoding' => 'UTF-8',
     										'min'      => 1,
     										'max'      => 100,
     								),
     						),
     				),
     		)); 			
			
     		$this->inputFilter = $inputFilter;
     	}
     
     	return $this->inputFilter;
     } 
 }
 
