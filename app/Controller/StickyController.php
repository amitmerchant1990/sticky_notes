<?php

class StickyController extends AppController {

    /**
     * Controller name
     *
     * @var string
     */
    public $name = 'Sticky';

    /**
     * Default helper
     *
     * @var array
     */
    public $helpers = array('Form', 'Html', 'Session');
    
    /**
     * This controller does not use a model
     *
     * @var array
     */
    public $uses = array('User', 'Stickynote');

    public function beforeFilter() {
        //parent::beforeFilter();
        $this->Auth->loginError = "Login error";
        $this->Auth->authError = "Auth error";
        
        //$this->Auth->fields =array('username' => 'username', 'password' => 'password');
       
        $this->Auth->loginRedirect = array('controller' => 'users', 'action' => 'index');
        $this->Auth->allow('add');
        
        /* To prevent black-holed POST requests */
        $this->Security->csrfCheck = false;
        $this->Security->validatePost = false;
        
    }
    
    public function index() {
        $this->layout = 'default';
        $this->pageTitle = 'All Stickynotes';
        $stickynotes = $this->Stickynote->find('all', array('order' => array('Stickynote.id ASC')));
        $this->set('stickynotes', $stickynotes);
    }
    
    public function addnote(){
        $this->layout = 'ajax';
        //$newer_note_id = $this->Stickynote->getInsertId();
        
        $this->request->data['Stickynote']['note'] = '';
        $this->Stickynote->save($this->request->data['Stickynote']);
        
        $newer_note_id = $this->Stickynote->find('first', array('order' => array('Stickynote.id DESC')));
        //$newer_note_id = $this->Stickynote->find('first', array('fields'=>array('MAX(Stickynote.id) as id'), 'order' => array('Stickynote.id DESC')));
        //print_r($newer_note_id);
        echo json_encode(array('response'=>true, 'insert_id'=>$newer_note_id['Stickynote']['id']));
    }
    
    public function update(){
        $this->layout = 'ajax';
        $note_id = $_REQUEST['id'];
        $note_content = $_REQUEST['content'];
        $this->Stickynote->id = $note_id; 
        $this->request->data['Stickynote']['note'] = $note_content;
        $this->request->data['Stickynote']['created'] = date('Y-m-d H:i:s');
        if($this->Stickynote->save($this->request->data['Stickynote'])){
            echo json_encode(array('response'=>true));
        }else{
            echo json_encode(array('response'=>false));
        }
    }
    
    public function delete(){
        $this->layout = 'ajax';
        $note_id = $_REQUEST['id'];
        if($this->Stickynote->delete($note_id)){
            echo json_encode(array('response'=>true));
        }else{
            echo json_encode(array('response'=>false));
        }
    }

}
?>
