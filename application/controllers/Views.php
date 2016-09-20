<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Views extends CI_Controller {

  function __construct() {
    parent::__construct();
  }

  public function show($id)
  {
    $this->load->model('Pages_model', 'pages');


    $page = $this->pages->find($id);

    if($page == NULL) $this->load->view('errors/404');
    else echo $page->content_l1;
  }
}
