<?php
namespace Album\Form;

 use Zend\Form\Form;

 class AlbumForm extends Form
 {
     public function __construct($name = null)
     {
         // we want to ignore the name passed
         parent::__construct('album');

         $this->add(array(
             'name' => 'id',
             'type' => 'Hidden',
         ));
         $this->add(array(
             'name' => 'userName',
             'type' => 'Text',
             'options' => array(
                 'label' => 'Username',
                 'class' => 'userForm1'
             ),
			'attributes' => array(
                'required' => 'required'
            )			 
         ));
         $this->add(array(
             'name' => 'email',
             'type' => 'Email',
             'options' => array(
                 'label' => 'Email',
                 'class' => 'userForm1'
             ),
			'attributes' => array(
                'required' => 'required'
            )
         ));		 
         $this->add(array(
             'name' => 'firstName',
             'type' => 'Text',
             'options' => array(
                 'label' => 'First name',
                 'class' => 'userForm1'
             ),
			'attributes' => array(
                'required' => 'required'
            )			 
         ));
         $this->add(array(
             'name' => 'lastName',
             'type' => 'Text',
             'options' => array(
                 'label' => 'Last name',
                 'class' => 'userForm1'
             ),
			'attributes' => array(
                'required' => 'required'
            )			 
         ));		 

         /*$this->add(array(
             'name' => 'profileType',
             'type' => 'Text',
             'options' => array(
                 'label' => 'Profile type',
                 'class' => 'userForm1'
             ),
			'attributes' => array(
                'required' => 'required'
            )			 
         ));*/

        $this->add(array(
            'type' => 'Zend\Form\Element\Select',
            /*'attributes' => array(
                'multiple' => 'multiple',
            ),*/
            'name' => 'profileType',
            'options' => array(
                'label' => 'Profile type',
                'value_options' => array(
                    'parent'  => 'Parent',
                    'student' => 'Student',
                    'staff'   => 'Staff',
                    'admin'   => 'Admin',
                ),
            ),
			'attributes' => array(
                'required' => 'required'
            )			
        )); 		 
		 
		 
		 
        $this->add(array(
            'type' => 'Zend\Form\Element\Select',
            'name' => 'enabled',
            'options' => array(
                'label' => 'Enabled',
                'value_options' => array(
                    'no'  => 'no',
                    'yes' => 'yes',
                ),
            ),
			'attributes' => array(
                'required' => 'required'
            )			
        )); 		 
		 
		 
		 
         /*$this->add(array(
             'name' => 'enabled',
             'type' => 'Text',
             'options' => array(
                 'label' => 'Enabled',
                 'class' => 'userForm1'
             ),
			'attributes' => array(
                'required' => 'required'
            )			 
         ));*/		 
	 
         $this->add(array(
             'name' => 'submit',
             'type' => 'Submit',
             'attributes' => array(
                 'value' => 'Go',
                 'id' => 'submitbutton',
             ),
			'attributes' => array(
                'required' => 'required'
            )			 
         ));
     }
 }