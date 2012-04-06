<?php $baseurl = Router::url('/'); ?>

<script type="text/javascript" >


$(function() {  
  
$("#submit").click(function() {

    var comment = $("#PostText").val();	
    var postid =  $("#PostPostId").val();
    if(comment=="") { alert("comment can not be empty!"); return false;}
    var dataString = 'text=' + comment + '&postid=' + postid;
	
	
$.ajax({
		type: "POST",
        url:"<?php echo $baseurl; ?>posts/view/"+postid,  
        data: dataString,
        cache: true,
        success: function(data){  
        var row = '<div  id="newdiv" style="clear:both; width:500px; height:60px; padding:10px 0px 0px 10px; border:10px solid gray; -moz-border-radius:5px">';
               row += '<span>Post by : <?php echo $uname; ?></span></br>';
              
               row += '<span>' + comment + '</span>';            
               row += '</div></br>'; 
  $("#update").append(row);  
  $("#newdiv").fadeIn("slow");	
  document.getElementById('PostText').value='';
  $("#PostText").focus();
 
   }
 });

return false;
	});


});

</script>

<!-- File: /app/views/posts/view.ctp -->
<div style="float:right;margin-right:5px;" >
	<?php

		if (!$userId) {
		echo $html->link('Home ', '/posts');	
		echo $html->link('Login', '/users/login');
		}
		if(!$post['Post']['id']) {
		return false;
		}
		if($post['Post']['user_id'] == $userId) {
						
						$field = array('controller' => 'posts', 'action' => 'edit', $post['Post']['id'] );
						echo $this->Html->link('Edit ',$field);
					}
	?>
</div>
<div style="width:600px; height:200px; margin-top:40px" >
    <div style="width:200px; float:left;">
        <?php 
        if(empty($post['Post']['filename'])) {
  
            echo $html->image('/uploads/null.jpg', array('alt' => 'null.jpg',
                                                    'style' => 'width:160px; height:180; border:2 px inset silver;-moz-border-radius:5px'
                                                   ));
        } else {
    
            echo $html->image('/uploads/'.$post['Post']['id']."/".$post['Post']['filename'],array('alt' => $post['Post']['filename'], 
                                                                                     'style' => 'width:160px; height:180;
                                                                                      border:5px inset silver; -moz-border-radius:5px'));
        }
        ?>
    </div>
    <div style="width:400px; margin-left:200px">
        <h1><?php echo "Title : ".$post['Post']['title']; ?></h1>
       
        <h4>Tag : 
           <?php
               foreach($post['Tag'] as  $tag) {
			        $tags[] = " ".$tag['name'];				  
               }
               if(!empty($tags)) {
	        echo implode(',', $tags); 
	        }      
           ?>
        </h4>
        <h1>Description : <?php echo $post['Post']['body']; ?></h1>
        <p><small>Created :  <?php echo $post['Post']['created']; ?></small></p>
    </div>
</div>

<hr>
<!--this code is form or comment post -->
<?php
	if($userId) {
?>

		<div id="commentPanel">
		
			<?php 
			
			echo $form->create('Post'); ?>
			<?php echo $form->input('text', array('rows' => '2', 'name' => 'text')); ?>			
			<?php echo $form->input('post_id',array('type'=>'hidden', 'value' => $post_id, 'name' => 'postid'));?>
			<?php
			    $options = array(                            
                            'id' => 'submit',
                            'value' => 'Add Comment',                           
                           );             
			    echo $form->end($options);
			 ?>
		</div>
		
<?php
	}
?>
<h3>Comments:</h3>

<?php 
	foreach ($post['Comment'] as $comment) {
?>
		<div  id="comment" style="clear:both; width:500px; height:60px; padding:10px 0px 0px 10px; border:10px solid gray; -moz-border-radius:5px">

			<div style="width:300px;float:left;">
				<?php
				$commentId = $comment['id'];
				echo "Post by : ".$comment['uname']."<br/>";
				echo $comment['text']."<br/>";
				echo "<small>".$comment['created']."</small>";
				?>
			</div>
			<div>
				<?php

					if($comment['user_id'] == $userId) {

						$delComment = array('controller' => 'comments', 'action' => 'delete', $commentId);
						echo $this->Html->link('Delete',$delComment);
						$editComment = array('controller' => 'comments', 'action' => 'edit', $commentId);
						echo $this->Html->link('Edit',$editComment);
					}
				?>
			</div>
		</div>
</br>
<?php	

	}
	
?>


<div id="update">

</div>

