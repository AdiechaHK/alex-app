<?php

/**
* Pages Model
*/
class Pages_model extends CI_Model
{

  public $title;
  public $content_l1;
  public $content_l2;

  public function __construct()
  {
    parent::__construct();
  }

  public function all()
  {
    $query = $this->db->get('pages');
    return $query->result();

  }

  public function find($id)
  {
    $query = $this->db->get_where('pages', "id = " . $id);
    foreach ($query->result() as $row) {
      return $row;
    } 
    return null;
  }

  public function insert($data)
  {
    $this->title      = $data['title']; // please read the below note
    $this->content_l1 = $data['content_l1'];
    $this->content_l2 = $data['content_l2'];

    $this->db->insert('pages', $this);
  }

  public function update($id, $data)
  {
    $this->title      = $data['title'];
    $this->content_l1 = $data['content_l1'];
    $this->content_l2 = $data['content_l2'];

    $this->db->update('pages', $this, array('id' => $id));
  }

  public function delete($id)
  {
    $this->db->delete('pages', array('id' => $id));
  }

}

?>