<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class pencegahan extends CI_Controller {
	public function __construct(){
	parent::__construct();
 	$this->load->model('modelPage');
 	//$this->load->model('Mhome');
	$this->load->helper('url');  
	}

	public function index()
	{
	//	$this->modelLogin->getsecurity();
    $this->load->view('pencegahan');
	
	}	
}



	
	