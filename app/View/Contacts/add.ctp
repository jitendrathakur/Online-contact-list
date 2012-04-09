<?php

//echo $this->Form->create('Contact' , array('type' => 'file'));
//echo $this->Html->input('file', array('type' => 'file'));
?>

<div id="<?php echo $contacts['Contact']['id']; ?>" class="main_frame">
<div id ="number" class="number_list">
     <input id="textlook" type="text" value="<?php echo $contacts['Contact']['number']; ?>" readonly="readonly" />    
</div>
<div id ="name" class="number_list">
    <input id="textlook" type="text" value="<?php echo $contacts['Contact']['name']; ?>" readonly="readonly" />    
</div>
<div id ="relation" class="number_list">
    <input id="textlook" type="text" value="<?php echo $contacts['Contact']['relation']; ?>" readonly="readonly" />    
</div>
<div id ="altNumber" class="number_list">
    <input id="textlook" type="text" value="<?php echo $contacts['Contact']['alternate_number']; ?>" readonly="readonly" />    
</div>
<div class="action number_list" id="action">
<a href="#" onclick="editContact(<?php echo $contacts['Contact']['id']; ?>)" id="listEdit">edit</a>
/
<a href="#" onclick="deleteContact(<?php echo $contacts['Contact']['id']; ?>)" id="listDelete">delete</a>
</div>

</div>
