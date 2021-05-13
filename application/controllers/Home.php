<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('v_home');
	}
	
	public function marker_json()
	{
		$data=$this->db->get('marker')->result();
		echo json_encode($data);
	}
}
