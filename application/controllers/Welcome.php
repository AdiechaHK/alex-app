<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$this->load->model('Menus_model', 'menus');

	    $data['menus'] = $this->menus->getMenuJson();

	    // echo json_encode($data);

		view($this, 'welcome_message', $data);

	}

	public function main()
	{
		$this->load->model('Menus_model', 'menus');

	    $data['menus'] = $this->menus->getMenuJson();

		view($this, 'welcome/main', $data);
	}
}
