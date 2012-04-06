<?php
echo $this->Html->css('header');
?>
<div class="header">
  <div class="userLog">
  <?php
      echo "Hi " .$this->Session->read('Auth.User.username'). "      ";
      echo $this->Html->link(
        'Logout',
        array(
          'plugin'     => false,
          'admin'      => false,
          'controller' => 'users',
          'action'     => 'logout'
        ),
        array(
          'id'     => 'logout',
          'escape' => false
        )
    );
  ?>
  </div>
</div>