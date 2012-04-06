<!-- File: /app/views/posts/add.ctp -->
<h1>Add Post</h1>
<?php
echo $this->Form->create('Post' , array("type" => "file") );
echo $this->Form->input('title');
echo $this->Form->input('body', array('rows' => '3'));
echo $this->Form->input('file',array("type" => "file")); 

echo $this->Form->input('Tag');

echo $this->Form->end('Save Post');
?>

