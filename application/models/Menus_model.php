<?php

/**
* Menus Model
*/
class Menus_model extends CI_Model
{

  public $title;
  public $type;
  public $link;
  public $page;
  public $key;
  public $parent;

  public function __construct()
  {
    parent::__construct();
  }

  public function all()
  {
    $query = $this->db->get('menus');
    return $query->result();

  }

  public function get($condition, $sort = 'id', $by = 'asc') {
    $this->db->where($condition);
    $this->db->order_by($sort, $by);
    $query = $this->db->get('menus');
    return $query->result();
  }

  public function find($id)
  {
    $query = $this->db->get_where('menus', "id = " . $id);
    foreach ($query->result() as $row) {
      return $row;
    } 
    return null;
  }

  public function insert($data)
  {
    $this->title    = isset($data['title'])?$data['title']:NULL; 
    $this->type     = isset($data['type'])?$data['type']:'PAGE'; 
    $this->link     = isset($data['link'])?$data['link']:NULL; 
    $this->key      = isset($data['key'])?$data['key']:NULL; 
    $this->page     = isset($data['page']) && $data['page'] != "none"? $data['page']:NULL; 
    $this->parent   = isset($data['parent']) && $data['parent'] != "none"? $data['parent']:NULL; 

    $this->db->insert('menus', $this);
  }

  public function update($id, $data)
  {
    $this->title    = isset($data['title'])?$data['title']:NULL; 
    $this->type     = isset($data['type'])?$data['type']:'PAGE'; 
    $this->link     = isset($data['link'])?$data['link']:NULL; 
    $this->key      = isset($data['key'])?$data['key']:NULL; 
    $this->page     = isset($data['page']) && $data['page'] != "none"? $data['page']:NULL; 
    $this->parent   = isset($data['parent']) && $data['parent'] != "none"?$data['parent']:NULL; 

    $this->db->update('menus', $this, array('id' => $id));
  }

  public function greedy_update($id, $data) {
    $this->db->update('menus', $data, array('id' => $id));
  }

  public function delete($id)
  {
    $this->db->delete('menus', array('id' => $id));
  }

  public function get_menu_for_nesting($id = NULL) {
    if($id == NULL) {
      $this->db->where('parent IS NULL', null, false)->or_where('parent', 0);
    } else {
      $this->db->where('parent', $id);
    }
    $this->db->order_by('index', 'asc');
    $query = $this->db->get('menus');
    return $query->result();
  }

  public function getMenuJson() {
    $menus = $this->get_menu_for_nesting();

    $menuJson = array();

    foreach ($menus as $key => $value) {
      $menuJson[$value->id] = $this->getObject($value);
    }
    return $menuJson;
  }

  private function getObject($menu) {
    $result = $this->get_menu_for_nesting($menu->id);
    if(sizeof($result) > 0) {
      $menu->sublist = array();
      foreach ($result as $item) {
        $menu->sublist[$item->id] = $this->getObject($item);
      }
    }
    return $menu;
  }

  public function getHref() {
    return "#";
  }

}

?>