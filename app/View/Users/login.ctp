<?php
    //echo $this->Session->flash('auth');
    echo $this->Form->create(array('action'=>'login', 'id'=>'slick-login'));
    echo $this->Form->inputs(array(
       'legend' => '',
       'username',
       'password'
    ));
    echo $this->Form->end('Log In');
?>
