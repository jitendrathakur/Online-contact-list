<!-- File: /app/views/posts/edit.ctp -->
<h1>Edit Post</h1>
<?php
 
echo $this->Form->create('Post', array("type" => "file"));
?>
<div style="width:200px; float:left;">
    <?php      

        if(!$post['Post']['filename']) {
  
            echo $html->image('/uploads/null.jpg', array('alt' => 'null.jpg',
                                                    'style' => 'width:160px; height:180; border-style:outset'
                                                   ));
            
        } else {
    
            echo $html->image('/uploads/'.$post['Post']['id']."/".$post['Post']['filename'],array('alt' => $post['Post']['filename'], 
                                                                                     'style' => 'width:160px; height:180;
                                                                                      border-style:outset'));
            $field= array('controller' => 'posts', 'action' => 'removeImage', $post['Post']['id']);
            echo $this->Html->link('remove image',$field);
        }
        ?>
</div>
<?php
  
echo $this->Form->input('title');
echo $this->Form->input('body', array('rows' => '3'));
echo $this->Form->input('file',array("type" => "file")); 
echo $this->Form->input('Tag.Tag');
echo $this->Form->end('Save Post');
?>

