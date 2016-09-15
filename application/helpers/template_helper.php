<?php

function view($controller, $name, $data = array())
{
  common('user', $controller, $name, $data);
}

function admin($controller, $name, $data = array())
{
  common('admin', $controller, $name, $data);
}

function common($type, $controller, $name, $data = array())
{

  $controller->load->view('template/common/top', $data);
  $controller->load->view('template/'.$type.'/head', $data);
  $controller->load->view('template/common/middle', $data);
  $controller->load->view('template/'.$type.'/header', $data);
  $controller->load->view($name, $data);
  $controller->load->view('template/'.$type.'/footer', $data);
  $controller->load->view('template/'.$type.'/scripts', $data);
  $controller->load->view('template/common/bottom', $data);

}

?>