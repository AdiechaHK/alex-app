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

  public function get($condition) {
    $query = $this->db->get_where('menus', $condition);
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
    $this->page     = isset($data['page']) && $data['page'] != "none"? $data['page']:NULL; 
    $this->parent   = isset($data['parent']) && $data['parent'] != "none"? $data['parent']:NULL; 

    $this->db->insert('menus', $this);
  }

  public function update($id, $data)
  {
    $this->title    = isset($data['title'])?$data['title']:NULL; 
    $this->type     = isset($data['type'])?$data['type']:'PAGE'; 
    $this->link     = isset($data['link'])?$data['link']:NULL; 
    $this->page     = isset($data['page']) && $data['page'] != "none"? $data['page']:NULL; 
    $this->parent   = isset($data['parent']) && $data['parent'] != "none"?$data['parent']:NULL; 

    $this->db->update('menus', $this, array('id' => $id));
  }

  public function delete($id)
  {
    $this->db->delete('menus', array('id' => $id));
  }

}

?>