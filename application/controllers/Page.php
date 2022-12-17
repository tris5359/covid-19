<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Page extends CI_Controller {
	public function __construct(){
	parent::__construct();
 	$this->load->model('modelPage');
 	//$this->load->model('Mhome');
	$this->load->helper('url');  
	}

	public function index()
	{
	//	$this->modelLogin->getsecurity();
    $this->load->view('index');
	
	}	
	public function LayananKesehatan()
	{
	//	$this->modelLogin->getsecurity();
    $this->load->view('LayananKesehatan');
	
	}
	public function data()
	{
	//	$this->modelLogin->getsecurity();
    $this->load->view('data');
	
	}
	public function pencegahan()
	{
	//	$this->modelLogin->getsecurity();
    $this->load->view('pencegahan');
	
	}		
	public function protokolKesehatan()
	{
	//	$this->modelLogin->getsecurity();
    $this->load->view('protokolKesehatan');
	
	}
	public function berita()
	{
	//	$this->modelLogin->getsecurity();
    $this->load->view('berita');
	
	}
	public function tanyaKami()
	{
	//	$this->modelLogin->getsecurity();
    $this->load->view('tanyaKami');
	
	}
	public function About()
	{
	//	$this->modelLogin->getsecurity();
    $this->load->view('tentang');
	
	}
	public function kontak()
	{
	//	$this->modelLogin->getsecurity();
    $this->load->view('kontak');
	
	}
	
	public function insertTanya(){
	try{
	    $name = $this->input->post('name');
	    $email = $this->input->post('email');
	    $message = $this->input->post('message');
	    $tgl = date('Y-m-d');
			$time = date('H:i:s');

		 $input=$this->modelPage->insertTanya($name,$email,$message,$tgl,$time);
		 $this->session->set_flashdata('success', 'Pertanyaan Anda berhasil dikirimkan ! Moderator akan menanggapi untuk kemudian ditampilkan di halaman Forum!');
    }
    catch(PDOException $e){
      	$_SESSION['error'] = $e->getMessage();
    }
      redirect('page/tanyaKami');
	}



	public function updateMahasiswa(){
	try{
	    $npm = $this->input->get('NPM');
	    $nama = $this->input->get('nama');
	    $tmp = $this->input->get('tmplahir');
	    $tgl = $this->input->get('tgllahir');
	    $jk = $this->input->get('jk');
	    $agama = $this->input->get('agama');
	    $alamat = $this->input->get('alamat');
	    $email = $this->input->get('email');
	    $nohp = $this->input->get('no_tlp');

	    $namaAyah = $this->input->get('namaayah');
	    $pekerjaanAyah = $this->input->get('pekerjaanayah');
	    $noTlpAyah = $this->input->get('noayah');
	    $namaIbu = $this->input->get('namaibu');
	    $pekerjaanIbu = $this->input->get('Pekerjaanibu');
	    $noTlpIbu = $this->input->get('noibu');
	    $alamatOrtu = $this->input->get('alamat2');
	    $pass = $this->input->get('password');
	    $passbaru = $this->input->get('passwordbaru');
	    $passkon = $this->input->get('konpassword');

		 $input=$this->modelAktivasi->updateMahasiswa($npm,$nama,$tmp,$tgl,$jk,$agama,$alamat,$email,$nohp,$passbaru,$namaAyah,$pekerjaanAyah,$noTlpAyah,$namaIbu,$pekerjaanIbu,$noTlpIbu,$alamatOrtu);
		 $this->session->set_flashdata('success', 'Data berhasil di perbarui');
		 $this->session->set_flashdata('selesai', '1');
    }
    catch(PDOException $e){
      	$_SESSION['error'] = $e->getMessage();
    }
      redirect('aktivasiAkun');
	}
}



	
	