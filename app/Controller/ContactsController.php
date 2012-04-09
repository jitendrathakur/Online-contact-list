<?php

class ContactsController extends AppController
{
  var $name = 'Contacts';
  
  public $helpers = array('Form', 'Html', 'Js', 'Time');

  
  //var $uses = 'Contact';
  
  function index()
  {
      
  
  }
  
  function portrait() {
   $this->autoRender = false;
   $q=$_GET["q"];
$target_path = "/home/jitendra/public_html/blog/app/webroot/uploads/";
debug(WWW_ROOT);
// $target_path = $target_path . basename($q);
debug($target_path);
/*
app/models/behaviors/file_model.php (line 184)

/tmp/phphSlD7z

app/models/behaviors/file_model.php (line 185)

/home/jitendra/public_html/blog/app/webroot/uploads/572/dilbert.jpg

app/models/behaviors/file_model.php (line 186)

/home/jitendra/public_html/blog/app/webroot/
*/

$p = 'tmp/phpPILqaQ';

//$p = '\var\www\html\app\tmp\php168.tmp';

debug(move_uploaded_file($p, $target_path));
exit;

/*if(move_uploaded_file($p, $target_path))
 {
echo "The file ". basename($q).
" has been uploaded";
} else{
echo "<br>There was an error uploading the file, please try again!";
}*/
debug("success");
exit;
  }
  
  function add($id = null)
  { 

    $data = array();
    $this->layout = 'ajax';
    $this->autoLayout = false;
    Configure::write('debug', 2);

      $this->Contact->id = !empty($id) ? $id : null;
      $data['Contact']['user_id'] = $this->Auth->user('id');
      $data['Contact']['number'] = $this->request->data['number'];
      $data['Contact']['name']  = $this->request->data['uname'];      
      $data['Contact']['relation'] = $this->request->data['relation'];
      $data['Contact']['alternate_number'] = $this->request->data['altNumber']; 
    
      if ($this->Contact->save($data)) {
        if (empty($id)) {
          $this->Contact->id = $this->Contact->getLastInsertID();
        }
        $contacts = $this->Contact->read();
      }     
    
      $this->set(compact('contacts','id'));   
 
  }

  function delete($id = null)
  {
    $this->layout = 'ajax';
    $this->autoLayout = false;
    $this->autoRender = false;
    Configure::write('debug', 0);
    $this->Contact->delete($id);
  
  }

}
