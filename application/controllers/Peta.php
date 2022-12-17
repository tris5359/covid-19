<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Peta extends CI_Controller {
	public function __construct(){
	parent::__construct();
 	$this->load->model('modelPage');
 	//$this->load->model('Mhome');
	$this->load->helper('url');  
	}

	public function PesebaranDunia()
	{
	//	$this->modelLogin->getsecurity();
    $this->load->view('PesebaranDunia');
	
	}	
	public function PesebaranIndonesia()
	{
	//	$this->modelLogin->getsecurity();
    $this->load->view('PesebaranIndonesia');
	
	}	
	public function PetaRasioKerentanan()
	{
	//	$this->modelLogin->getsecurity();
    $this->load->view('PetaRasioKerentanan');
	
	}	
	public function PesebaranBengkulu()
	{
	//	$this->modelLogin->getsecurity();
    $this->load->view('PesebaranBengkulu');
	
	}	
}



	