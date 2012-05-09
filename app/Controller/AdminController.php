<?php
App::uses('AppController', 'Controller');
/**
 * Neighbourhoods Controller
 *
 * @property Neighbourhood $Neighbourhood
 */
class AdminController extends AppController {

  public $uses = array( 'Image', 'Lesson');
  public $layout = 'admin';
  
  function beforeFilter(){
    if(!$this->Session->check('User.isAdmin') && $this->action != 'login' && $this->action != 'get_products')
      $this->redirect('/admin/login');  
  }
  
  public function index(){
    
  }
  
  function logout (){
    $this->Session->delete('User');
    $this->Session->setFlash(__('Sesión cerrada correctamente.', true), 'flash_success');
    $this->redirect('/admin/login');
  
  }

  function login (){
    $this->layout = 'admin';
    $this->pageTitle = __('Login', true);
    if(empty($this->data))
    {
      // Redirect the user if we're logged in
      if($this->Session->check('User.username') && $this->Session->check('User.isAdmin'))
        $this->redirect('/admin/index');
    }
    else
    {
      $admin_user = null;
      
      if($this->data['User']['username']=='admin' && $this->data['User']['password'] == 'amistad001'){
        $admin_user = array(
                'username'=>'admin',
                'isAdmin'=>true
              );
        $this->Session->write('User', $admin_user);
        $this->redirect('/admin/index');
      }
      else{
        $this->Session->setFlash(__('Usuario o contraseña incorrecta.', true), 'flash_error');
      }
    }
    $this->set('login','login');
  }

  /*
  ********************Images****************************
 * index method
 *
 * @return void
 */
  public function indexImage() {
    $this->Image->recursive = 0;
    $this->set('images', $this->paginate('Image'));
  }

/**
 * view method
 *
 * @param string $id
 * @return void
 */
  public function viewImage($id = null) {
    $this->Image->id = $id;
    if (!$this->Image->exists()) {
      throw new NotFoundException(__('Invalid image'));
    }
    $this->set('image', $this->Image->read(null, $id));
  }

/**
 * add method
 *
 * @return void
 */
  public function addImage() {
    if ($this->request->is('post')) {
      $this->Image->create();
      if ($this->Image->save($this->request->data)) {
        $this->Session->setFlash(__('The image has been saved'));
        $this->redirect(array('action' => 'indexImage'));
      } else {
        $this->Session->setFlash(__('The image could not be saved. Please, try again.'));
      }
    }
  }

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
  public function editImage($id = null) {
    $this->Image->id = $id;
    if (!$this->Image->exists()) {
      throw new NotFoundException(__('Invalid image'));
    }
    if ($this->request->is('post') || $this->request->is('put')) {
      if ($this->Image->save($this->request->data)) {
        $this->Session->setFlash(__('The image has been saved'));
        $this->redirect(array('action' => 'indexImage'));
      } else {
        $this->Session->setFlash(__('The image could not be saved. Please, try again.'));
      }
    } else {
      $this->request->data = $this->Image->read(null, $id);
    }
  }

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
  public function deleteImage($id = null) {
    if (!$this->request->is('post')) {
      throw new MethodNotAllowedException();
    }
    $this->Image->id = $id;
    if (!$this->Image->exists()) {
      throw new NotFoundException(__('Invalid image'));
    }
    if ($this->Image->delete()) {
      $this->Session->setFlash(__('Image deleted'));
      $this->redirect(array('action' => 'indexImage'));
    }
    $this->Session->setFlash(__('Image was not deleted'));
    $this->redirect(array('action' => 'indexImage'));
  }
/*  ********************Images**************************** */

/*   ********************Lessons**************************** */ 
/**
 * index method
 *
 * @return void
 */
  public function indexLesson() {
    $this->Lesson->recursive = 0;
    $this->set('lessons', $this->paginate('Lesson'));
  }

/**
 * view method
 *
 * @param string $id
 * @return void
 */
  public function viewLesson($id = null) {
    $this->Lesson->id = $id;
    if (!$this->Lesson->exists()) {
      throw new NotFoundException(__('Invalid lesson'));
    }
    $this->set('lesson', $this->Lesson->read(null, $id));
  }

/**
 * add method
 *
 * @return void
 */
  public function addLesson() {
    if ($this->request->is('post')) {
      $this->Lesson->create();

      $this->upload($this->params['data']["Lesson"]["mp3"]);

      $this->request->data['Lesson']['url']=$this->params['data']["Lesson"]["mp3"]['name'];
      if ($this->Lesson->save($this->request->data)) {
        $this->Session->setFlash(__('The lesson has been saved'));
        $this->redirect(array('action' => 'indexLesson'));
      } else {
        $this->Session->setFlash(__('The lesson could not be saved. Please, try again.'));
      }
    }
  }

  private function upload($upload=null){
    $directorio = 'mp/';
    $nombre_archivo=$upload['name'];
    if (move_uploaded_file($upload['tmp_name'], $directorio . $upload['name']))
    {
        print "El archivo fue subido con éxito.";
    }
    else
    {
        print "Error al intentar subir el archivo.";
    }
  }

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
  public function editLesson($id = null) {
    $this->Lesson->id = $id;
    if (!$this->Lesson->exists()) {
      throw new NotFoundException(__('Invalid lesson'));
    }
    if ($this->request->is('post') || $this->request->is('put')) {
      if ($this->Lesson->save($this->request->data)) {
        $this->Session->setFlash(__('The lesson has been saved'));
        $this->redirect(array('action' => 'indexLesson'));
      } else {
        $this->Session->setFlash(__('The lesson could not be saved. Please, try again.'));
      }
    } else {
      $this->request->data = $this->Lesson->read(null, $id);
    }
  }

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
  public function deleteLesson($id = null) {
    if (!$this->request->is('post')) {
      throw new MethodNotAllowedException();
    }
    $this->Lesson->id = $id;
    if (!$this->Lesson->exists()) {
      throw new NotFoundException(__('Invalid lesson'));
    }
    if ($this->deleteMp3($id) && $this->Lesson->delete()) {
      $this->Session->setFlash(__('Lesson deleted'));
      $this->redirect(array('action' => 'indexLesson'));

    }
    $this->Session->setFlash(__('Lesson was not deleted'));
    //$this->redirect(array('action' => 'indexLesson'));
  }

  public function deleteMp3($id = null){
    $lesson = $this->Lesson->find('first', array('id'=>$id));
    if($lesson['Lesson']['url']!=null){
       unlink("./mp/".$lesson['Lesson']['url']);
    } 
    $this->Session->setFlash(__($id));
    var_dump($lesson['Lesson']['url']);
    var_dump($id);
    return true;
  }
/*   ********************Lessons**************************** */ 
}