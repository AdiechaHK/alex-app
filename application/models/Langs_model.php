<?php

/**
* langs Model
*/
class Langs_model extends CI_Model
{

  public $key;
  public $value_l1;
  public $value_l2;
  public $category;

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
    $this->category = isset($data['category'])? $data['category']: 'G';

    $this->db->insert('langs', $this);
    return $this->db->insert_id();
  }

  public function update($id, $data)
  {
    $this->key      = $data['key'];
    $this->value_l1 = $data['value_l1'];
    $this->value_l2 = $data['value_l2'];
    if(isset($data['category'])) {
      $this->category = $data['category'];
    }

    $this->db->update('langs', $this, array('id' => $id));
    return $id;
  }

  public function delete($id)
  {
    $this->db->delete('langs', array('id' => $id));
  }

  public function deleteCond($cond) {
    $this->db->delete('langs', $cond);
  }

  public function save($data) {
    $query = $this->db->get_where('langs', "key = '" . $data['key'] . "'");
    if ($query->num_rows() > 0) {
      $this->db->update('langs', $data, array('key' => $data['key']));
    } else {
      $this->db->insert('langs', $data);
    }
  }

  public function get_one($query) {
    $query = $this->db->get_where('langs', $query);
    foreach ($query->result() as $row) {
      return $row;
    } 
    return null;
  }

}

?>