<?php
echo $this->Html->css('users/login');
echo $this->Html->script('users/login');
?>
<div class="flashBox" id="flashBox"></div>
<div class="midBox">
    <h2><?php echo __('Login') ?></h2>
<?php

echo $this->Form->create('User', array('action' => 'login'));
echo $this->Form->inputs(array(
    'legend' => false,
    'username',
    'password'
));
echo $this->Form->end('Login', null, array('class' => 'button'));
echo $this->Html->link('Create new account', '#', array('class' => 'link', 'id' => 'createNew'));
?>
</div>

<div class="registrationBox">
    <h2><?php echo __('Registration Form') ?></h2>
    <?php
    echo $this->Form->inputs(array(
    'legend' => false,
    'username',
    'password'
));
echo $this->Html->link('Create', '#', array('class' => 'button', 'id' => 'saveForm'));
echo $this->Html->link('Cancel', '#', array('class' => 'link', 'id' => 'cancelNew'));


?>
</div>
