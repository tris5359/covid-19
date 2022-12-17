<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class ProtokolKesehatan extends CI_Controller {
	public function __construct(){
	parent::__construct();
 	$this->load->model('modelPage');
 	//$this->load->model('Mhome');
	$this->load->helper('url');  
	}

	public function index()
	{
	//	$this->modelLogin->getsecurity();
    $this->load->view('protokolKesehatan');
	
	}	
	public function protokol_isolasi_mandiri()
	{
	//	$this->modelLogin->getsecurity();
    $this->load->view('protokol-isolasi-diri-sendiri');
	
	}
	public function disinfeksi_mandiri()
	{
	//	$this->modelLogin->getsecurity();
    $this->load->view('disinfeksi_mandiri');
	}
	public function protokol_resto()
	{
	//	$this->modelLogin->getsecurity();
    $this->load->view('protokol_resto');
	}
	public function protokol_umum_di_transportasi_dan_di_area_publik()
	{
	//	$this->modelLogin->getsecurity();
    $this->load->view('protokol_umum_di_transportasi_dan_di_area_publik');
	}
	public function protokol_psbb()
	{
	//	$this->modelLogin->getsecurity();
    $this->load->view('protokol_psbb');
	}
	public function protokol_mall()
	{
	//	$this->modelLogin->getsecurity();
    $this->load->view('protokol_mall');
	}
}



	
	