<?php
/**
 * File is used as post controller
 *
 * Contains code needed mainly to get the post-related work done
 *
 * PHP version 5
 *
 * @category Controller
 * @package  MyPhone
 *
 * @version  SVN: $Id$
 *
 */

/**
 * post controller class
 *
 * @category Controller
 * @package  MyPhone
 *
 */
class PostsController extends AppController
{

    /**
     * Property is used to helper class function.
     *
     * @var string $helper of the controller
     * @since 1.0.0 - May 10, 2010
     */
    var $helpers = array(
                    'Html',
                    'Form',
                    //'Ajax',
                   // 'Javascript',
                    
                   );
 
    var $components = array('Email', 'Cookie', 'RequestHandler');
     

    /**
     * Property is used to name the content types controller.
     *
     * @var string $name of the controller
     * @since 1.0.0 - May 10, 2010
     */
    var $name = 'Posts';


    /**
     * Property is used to name the content types controller.
     *
     * @var string $name of the controller
     * @since 1.0.0 - May 10, 2010
     *
     * @return void
     */
    function beforeFilter()
    {      
        //$this->Auth->allow('index','view');      
        //parent::beforeFilter(); 
    }//end beforeFilter()  


    /**
     * Action used to index the carrier info.
     *
     * @return void
     */
    function index()
    {  
        $posts = "test";
    
       // $this->Post->contain();        
        $this->set('posts');
    }//end index()


    /**
     * Action used to view the carrier info.
     *
     * @param int $id takes id of the carrier
     *
     * @return void
     */
    function view($id = null)
    {     
 
        $this->Post->id = $id;
        $this->set('post', $this->Post->read());
        $userId = $this->Auth->User('id');
        $uname  = $this->Auth->User('username');
        $this->set("post_id", $this->Post->id);                 
            
        if (!empty($this->params['form']['text'])) { 
              
            $this->data['Post']['text']    =  $this->params['form']['text'];
            $this->data['Post']['post_id'] =  $this->params['form']['postid'];          
            $this->data['Post']['user_id'] = $userId;
            $this->data['Post']['uname']   = $uname;            

            foreach ($this->data as $key) {
                $data['Comment'] = $key;
            }         
            if ($this->Post->Comment->save($data) ) {                      
                $this->redirect(array('action' => 'view', $id));
            }      
            
        } else { 
            $this->data = $this->Post->findById($id);    
        }

    }//end view()



    /**
     * Action used to add the carrier info.
     *
     * @return void
     */
    function add()
    {

       /* $userId = $this->Auth->User('id');
        if (!empty($this->data)) {
            $this->data['Post']['user_id'] = $userId;
            if ($this->Post->save($this->data)) {
                $this->Session->setFlash('Your post has been saved.');
                $this->redirect(array('action' => 'index'));
            }
        }     

        $tags = $this->Post->Tag->find('list', array('fields' => array('id', 'name')));
        $this->set(compact('tags'));*/
    }//end add()
    

    /**
     * Action used to remove image.
     *
     * @param int $id takes id of the carrier
     *
     * @return void
     */
    function removeImage($id) 
    {

        $data = array(
                 'Post' => array('filename' => "")
                );  
                
        $this->check($id);
        $field = $this->Post->read('filename', $id); 
 
        if ($this->Post->save($data, false, array('filename'))) {
    
            unlink('uploads/'.$field['Post']['id'].'/'.$field['Post']['filename']);
            $this->Session->setFlash('Your post has been updated.');
            $this->redirect(array('action' => '../posts/edit/'.$id));
        }

    }//end removeImage()
    
    
    /**
     * Action used to delete the carrier info.
     *
     * @param int $id takes id of the carrier
     *
     * @return void
     */
    function delete($id)
    {    
   
        $this->check($id);
        if ($this->Post->delete($id)) {          
            $this->redirect(array('action' => 'index'));
        }
    }//end delete()


    /**
     * Action used to check user for edit and delete.
     *
     * @param int $id takes id of the carrier
     *
     * @return void
     */
    function check($id)
    {
        $this->Post->contain(); 
        $condition = array('id' => $id);
        $fields    = array('user_id');
        $check     = $this->Post->find('first', array('conditions' => $condition, 'fields' => $fields));
        $checkUser = $check['Post']['user_id'];

        if ($this->Auth->User('id')==$checkUser) {
            return true;
        } else { 
            $this->Session->setFlash('Your action is prohibited.');
            $this->redirect(array('action' => 'index'));            
        }
    }//end check()
   

    /**
     * Action used to edit the carrier info.
     *
     * @param int $id takes id of the carrier
     *
     * @return void
     */
    function edit($id = null)
    {
       
        $this->check($id);       
        $this->Post->id = $id;
        $tags           = $this->Post->Tag->find('list', array('fields' => array('Tag.name')));
        $this->set(compact('tags'));
       
        if (empty($this->data)) {
            $this->data = $this->Post->read();
              
            $this->set('post', $this->data);
        } else { 
            $this->data['Post']['id'] = $id;  
    
            if ($this->Post->save($this->data)) {              
                $this->redirect(array('action' => '../posts/view/'.$id));
            }
        }
        
    }//end edit()
    
    
     function email()
    {
      
  $this->Email->from    = '<jitendra@gmail.com>';
  $this->Email->to      = '<jitendra.thakur2008@gmail.com>';
  $this->Email->subject = 'Test';
  $this->Email->send('Hello message body!');
        
    }//end email()
        
        
     function export() 
        { 
            // Stop Cake from displaying action's execution time 
            //Configure::write('debug',0); 
            // Find fields needed without recursing through associated models 
            $this->Post->contain(); 
            $data = $this->Post->find( 
                'all', 
                array( 
                    'fields' => array('id','created','body'), 
                    'order' => "Post.id ASC", 
                   
            )); 
          
            // Define column headers for CSV file, in same array format as the data itself 
            $headers = array( 
                'Order'=>array( 
                    'id' => 'ID', 
                    'created' => 'Date', 
                    'body' => 'Body',                     
       
                ) 
            ); 
            // Add headers to start of data array 
            array_unshift($data,$headers); 
            // Make the data available to the view (and the resulting CSV file) 
            $this->set(compact('data')); 
        } 


}//end class
?>

