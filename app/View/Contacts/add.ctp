<?php

//echo $this->Form->create('Contact' , array('type' => 'file'));
//echo $this->Html->input('file', array('type' => 'file'));
?>

<div id="<?php echo $contacts['Contact']['id']; ?>" class="main_frame">
<div id ="number" class="number_list"><?php echo $contacts['Contact']['number']; ?></div>
<div id ="nameSuffix" class="number_list"><strong><?php echo $contacts['Contact']['name'].$contacts['Contact']['suffix']; ?></strong></div>
<div id ="relation" class="number_list"><?php echo $contacts['Contact']['relation']; ?></div>
<div id ="altNumber" class="number_list"><?php echo $contacts['Contact']['alternate_number']; ?></div>
<div class="number_list">
<a href="#" onclick="editContact(<?php echo $contacts['Contact']['id']; ?>)" id="listEdit">edit</a>
/
<a href="#" onclick="deleteContact(<?php echo $contacts['Contact']['id']; ?>)" id="listDelete">delete</a>
</div>
<br>
</div>
