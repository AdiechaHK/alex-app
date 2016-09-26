<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {


  function __construct() {
    parent::__construct();
    auth();
  }

	public function index()
	{
		admin($this, 'admin/index');
    redirect('admin/pages');
	}

  public function logout()
  {
    clear_admin_access();
  }


  // Page related methods
  public function pages()
  {

    // Collecting all pages
    $this->load->model('Pages_model', 'pages');
    
    $data = array(
        'section' => 'pages',
        'pages'   => $this->pages->all()
      );
    admin($this, 'admin/pages/index', $data);
  }

  public function page_form($id = NULL)
  {
    $data = array(
        'section' => 'pages',
        'title'   => $id == NULL? "New Page": "Edit Page"
      );

    if($id != null)
    {
      $this->load->model('Pages_model', 'pages');
      $page = $this->pages->find($id);
      if($page != null) $data['page'] = $page;
      else die("Could not find specific page !");
    }
    admin($this, 'admin/pages/form', $data); 
  }

  public function page_show($id)
  {
    $this->load->model('Pages_model', 'pages');
    $data = array(
        'section' => 'pages',
        'page' => $this->pages->find($id)
      );
    admin($this, 'admin/pages/show', $data);
  }

  public function page_del($id)
  {
    $this->load->model('Pages_model', 'pages');
    $this->pages->delete($id);
    redirect('admin/pages');
  }

  public function page_save($id = NULL)
  {
    $this->load->model('Pages_model', 'pages');
    if($id == NULL) $this->pages->insert($_POST);
    else $this->pages->update($id, $_POST);
    redirect('admin/pages');
  }


  // Menu related methods
  public function menus() {


    $this->load->model('Menus_model', 'menus');
    
    $data = array(
        'section' => 'menus',
        'menus'   => $this->menus->getMenuJson()
      );
    admin($this, 'admin/menus/index', $data);
  }

  public function menu_form($id = NULL)
  {
    $this->load->model('Pages_model', 'pages');
    $this->load->model('Menus_model', 'menus');
    $data = array(
        'section' => 'menus',
        'title'   => $id == NULL? "New Menu": "Edit Menu",
        'pages'   => $this->pages->all(),
        'parents' => $this->menus->get("type = 'PARENT'")    
      );

    if($id != null)
    {
      $menu = $this->menus->find($id);
      if($menu != null) $data['menu'] = $menu;
      else die("Could not find specific menu !");
    }
    admin($this, 'admin/menus/form', $data); 
  }

  public function menu_save($id = NULL)
  {
    $this->load->model('Menus_model', 'menus');
    if($id == NULL) $this->menus->insert($_POST);
    else $this->menus->greedy_update($id, $_POST);
    redirect('admin/menus');
  }

  public function menu_show($id)
  {
    $this->load->model('Pages_model', 'pages');
    $this->load->model('Menus_model', 'menus');
    $data = array(
        'section' => 'menus',
        'pages' => $this->pages->all(),
        'menu' => $this->menus->find($id)
      );
    admin($this, 'admin/menus/show', $data);
  }

  public function menu_update() {

    $this->load->model('Menus_model', 'menus');

    // $this->menus->greedy_update('*', array('parent' => NULL));

    foreach ($_REQUEST['list'] as $menu) {
      $this->menus->greedy_update($menu['id'], $menu);
    }
    echo "Updated successfully !";  
    exit;
  }


  public function menu_del($id) {
    $this->load->model('Menus_model', 'menus');
    $this->menus->delete($id);
    redirect('admin/menus');
  }

  public function langs() {
    $this->load->model('Langs_model', 'langs');
    $data = array(
      'section' => 'langs',
      'langs'   => $this->langs->all()
    );
    admin($this, 'admin/langs/index', $data);
  }

  public function lang_save($id = NULL) {
    $this->load->model('Langs_model', 'langs');
    if($id == NULL) $id = $this->langs->insert($_POST);
    else $this->langs->update($id, $_POST);
    echo json_encode(['status' => "SUCCESS", 'id' => $id]);
  }

  public function lang_del($id) {
    $this->load->model('Langs_model', 'langs');
    $this->langs->delete($id);
    echo json_encode(['status' => "SUCCESS"]);
  }

}
