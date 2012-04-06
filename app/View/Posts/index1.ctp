<!-- File: /app/views/posts/index.ctp 

<div style="float:right;" >
	<?php	    
    	if (!$userId) {
    		echo $html->link('Login', '/users/login');
 		}
	?>
</div>
<div style="margin-top:40px"></div>
<h1>Blog posts</h1>
<?php    
    $addPost = array('controller' => 'posts', 'action' => 'add');
    echo $this->Html->link('Add Post',$addPost);
?>

<table>
	<tr>
		<th>Id</th>
		<th>Icon</th>
		<th>Title</th>
        <th>Created</th>
		<?php
    		if($userId) { ?>
        		<th>Actions</th>
		<?php 
		    }
		?>		
	</tr>

	<?php foreach ($posts as $post): ?>
	<tr>
		<td><?php echo $post['Post']['id']; ?></td>
		<td> 
			 <?php 
        if(empty($post['Post']['filename'])) {
  
            echo $html->image('/uploads/null.jpg', array('alt' => 'null.jpg',
                                                    'style' => 'width:40px; height:20;'
                                                   ));
        } else {
    
            echo $html->image('/uploads/'.$post['Post']['id']."/".$post['Post']['filename'],array('alt' => $post['Post']['filename'], 
                                                                                     'style' => 'width:40px; height:30;'));
        }
        ?>
        </td>
        <td>
		    <!-- This code is use for link the title 
			<?php echo $this->Html->link($post['Post']['title'],
			array('controller' => 'posts','admin' => 'true', 'action' => 'view', $post['Post']['id'])); ?>
		                                                                         
		</td>
        <td><?php echo $post['Post']['created']; ?></td>
		
		<?php
        	if ($userId) {
		?>
			<td>
				<?php
                if($post['Post']['user_id'] == $userId) {
		        	$delete  = array('action' => 'delete', $post['Post']['id']);
		            echo $this->Html->link('Delete', $delete, null, 'Are you sure?');
		            
		            $edit    = array('action' => 'edit', $post['Post']['id']);
				    echo $this->Html->link('Edit', $edit);
                }
                ?>
               
			</td>
			<?php
             }
             ?>		
	</tr>
	<?php endforeach; ?>
</table>-->
