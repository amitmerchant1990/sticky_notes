<?php

class User extends AppModel {
    public function beforeSave($options = array()) {
        //exit;
        if (isset($this->data['User']['password'])) {
            $this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
        }
        return true;
    }
}

?>
