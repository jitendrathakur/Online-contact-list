<?php

class HomesController extends AppController
{
  var $name = 'Homes';
  
  public $helpers = array('Form', 'Html', 'Js', 'Time');

  var $components = array('RequestHandler'); 

  
  //var $uses = 'Contact';
  
  function index()
  {
  
  
     $result = $this->Home->find('all', array('contain' => array()));
     $this->set('homes', $result);
     
     $contact = ClassRegistry::init('Contact');    
     $contacts = $contact->find('all', array('conditions' => array('user_id' => $this->Auth->user('id'))));
     $this->set('contacts', $contacts);  
  
  }

  public function export() {

     $contact = ClassRegistry::init('Contact');    
     $contacts = $contact->find('all', array(
                                        'fields' => array('number','name','relation','alternate_number'), 
                                        'conditions' => array(
                                                        'user_id' => $this->Auth->user('id')
                                                        )
                                        )
     );

     $headers = array(
                 'Contact' => array(
                              'number'           => '<b>Number</b>',
                              'name'             => '<b>Name</b>',
                              'relation'         => '<b>Relation</b>',
                              'alternate_number' => '<b>Alternate Number</b>',            
                             )
                );

     // Add headers to start of data array
      array_unshift($contacts,$headers);

      $this->set('contacts', $contacts);  

  }

}
