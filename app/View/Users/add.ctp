<?php
    $form = $this->Form;

    echo $this->Form->create();
    echo $this->Form->inputs(array(
        'legend' => 'Signup',
        'username',
        'password'
    ));
    echo $this->Form->end('Submit');
?>
