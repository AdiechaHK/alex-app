<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

  function __construct() {
    parent::__construct();
  }

  public function menus()
  {
    $this->load->model('Menus_model', 'menus');
    $menus = $this->menus->all();

    $json = array();

    foreach (['base_menu', 'level_menu'] as $collection) {
      foreach ($menus as $menu) {
        $json = $this->$collection($menu, $json);
      }
    }

    echo json_encode($json);
  }

  private function base_menu($menu, $json)
  {
    if($menu->parent == null) {
      if(!array_key_exists('base_list', $json)) $json['base_list'] = array();
      array_push($json['base_list'], $menu);
    }
    return $json;
  }

  private function level_menu($menu, $json)
  {
    if($menu->parent != null) {
      if(!array_key_exists($menu->parent, $json)) $json[$menu->parent] = array();
      array_push($json[$menu->parent], $menu);
    }
    return $json;
  }
}
