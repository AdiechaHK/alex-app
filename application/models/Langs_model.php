<?php

/**
* langs Model
*/
class Langs_model extends CI_Model
{

  public $key;
  public $value_l1;
  public $value_l2;

  public function __construct()
  {
    parent::__construct();
  }

  public function all()
  {
    $query = $this->db->get('langs');
    return $query->result();

  }

  public function find($id)
  {
    $query = $this->db->get_where('langs', "id = " . $id);
    foreach ($query->result() as $row) {
      return $row;
    } 
    return null;
  }

  public function insert($data)
  {
    $this->key      = $data['key']; // please read the below note
    $this->value_l1 = $data['value_l1'];
    $this->value_l2 = $data['value_l2'];

    $this->db->insert('langs', $this);
    return $this->db->insert_id();
  }

  public function update($id, $data)
  {
    $this->key      = $data['key'];
    $this->value_l1 = $data['value_l1'];
    $this->value_l2 = $data['value_l2'];

    $this->db->update('langs', $this, array('id' => $id));
    return $id;
  }

  public function delete($id)
  {
    $this->db->delete('langs', array('id' => $id));
  }

}

?>