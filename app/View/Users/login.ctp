<?php
    //echo $this->Session->flash('auth');
    echo $this->Form->create(array('action'=>'login', 'id'=>'slick-login'));
    echo  "<p style='font: bold 34px/38px \"Gloria Hallelujah\",cursive; color: #FFF;'>StickyNotes App</p>";
    /*echo $this->Form->inputs(array(
       'legend' => '',
       'username',
       'password'
    ), array('autocomplete'=>'off'));*/
    echo $this->Form->input('username', array('label' => ''));
    echo $this->Form->input('password', array('type'=>'password','label' => ''));
    echo $this->Form->end('Log In');
?>
