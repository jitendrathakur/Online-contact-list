<?php
echo $this->Html->script('homes/index');

?>
	
  <div id="flashBox" class="flashBox"></div>
<div class="outer">
<div class="wrapper">

  <div class ="container">
    
    <?php
    $class = "number_list"; 
    ?>
    <div class ="main_frame_header">
      <div class ="<?php echo $class; ?>">Number</div>
      <div class ="<?php echo $class; ?>">Name & Suffix</div>      
      <div class ="<?php echo $class; ?>">Relation</div>
      <div class ="<?php echo $class; ?>">Alt number</div>
      <div class ="<?php echo $class; ?>">Action</div>  <br/>
    </div> 
    <?php
     foreach($contacts as $contact) : ?>
    <div class ="main_frame" id="<?php echo $contact['Contact']['id']; ?>">
      <div id ="number" class ="<?php echo $class; ?>">
        <input id="textlook" type="text" value="<?php echo $contact['Contact']['number']; ?>" readonly="readonly" />
        
      </div>
      <div id ="name" class ="<?php echo $class; ?>">
        <strong>
          <input id="textlook" type="text" value="<?php echo $contact['Contact']['name']; ?>" readonly="readonly" />        
        </strong>
      </div>      
      <div id ="relation" class ="<?php echo $class; ?>">
         <input id="textlook" type="text" value="<?php echo $contact['Contact']['relation']; ?>" readonly="readonly" />        
      </div>
      <div id ="altNumber" class ="<?php echo $class; ?>">
        <input id="textlook" type="text" value="<?php echo $contact['Contact']['alternate_number']; ?>" readonly="readonly" />         
      </div>
      <div id="action" class ="action <?php echo $class; ?>"><a href="#" onclick="editContact(<?php echo $contact['Contact']['id']; ?>)" id="listEdit">edit</a>&nbsp;&nbsp;<a href="#" onclick="deleteContact(<?php echo $contact['Contact']['id']; ?>)" id="listDelete">delete</a></div> 
    </div>
    <?php endforeach; ?>

  </div>
  <div class="tempBox"></div>
  <div class="button" title="Add New Contact"><button class="" onclick="newContact();">+</button></div>
</div>
</div>
