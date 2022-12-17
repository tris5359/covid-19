<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Covid19 extends CI_Controller {
		public function __construct(){
	parent::__construct();
 	$this->load->model('ModelAdmin');
 	//$this->load->model('Mhome');
	$this->load->helper('url');  
	require APPPATH.'libraries/phpmailer/src/Exception.php';
 	require APPPATH.'libraries/phpmailer/src/PHPMailer.php';
	require APPPATH.'libraries/phpmailer/src/SMTP.php';

	}

	public function index(){
    $this->load->view('admin/loginSistem');	
	}	
	public function Register(){
    $this->load->view('admin/Register');	
	}
	public function beranda(){
	$this->ModelAdmin->getsequrity();
    $this->load->view('admin/page/beranda');	
	}
	public function Wilayah(){
	$this->ModelAdmin->getsequrity();
    $this->load->view('admin/page/Wilayah');	
	}
	public function Positif(){
	$this->ModelAdmin->getsequrity();
    $this->load->view('admin/page/Positif');	
	}
	public function kontak(){
	$this->ModelAdmin->getsequrity();
    $this->load->view('admin/page/kontak');	
	}
	public function FAQ(){
	$this->ModelAdmin->getsequrity();
    $this->load->view('admin/page/FAQ');	
	}
	public function Operator(){
	$this->ModelAdmin->getsequrity();
    $this->load->view('admin/page/Operator');	
	}
	public function profil(){
	$this->ModelAdmin->getsequrity();
    $this->load->view('admin/page/profil');	
	}
	public function kataSandi(){
	$this->ModelAdmin->getsequrity();
    $this->load->view('admin/page/kataSandi');	
	}
	public function PDP(){
	$this->ModelAdmin->getsequrity();
    $this->load->view('admin/page/PDP');	
	}
	public function ODP(){
	$this->ModelAdmin->getsequrity();
    $this->load->view('admin/page/ODP');	
	}
	public function Meninggal(){
	$this->ModelAdmin->getsequrity();
    $this->load->view('admin/page/Meninggal');	
	}
	public function Sembuh(){
	$this->ModelAdmin->getsequrity();
    $this->load->view('admin/page/Sembuh');	
	}
	public function forum(){
	$this->ModelAdmin->getsequrity();
    $this->load->view('admin/page/forum');	
	}
	public function Kecamatan(){
	$this->ModelAdmin->getsequrity();
    $this->load->view('admin/page/Kecamatan');	
	}
	public function Desa(){
	$this->ModelAdmin->getsequrity();
    $this->load->view('admin/page/Desa');	
	}
	public function dataOperator(){
	$this->ModelAdmin->getsequrity();
    $this->load->view('admin/page/dataOperator');	
	}
	public function veiwDetailFAQ(){
	$this->ModelAdmin->getsequrity();
    $this->load->view('admin/page/veiwDetailFAQ');	
	}

	public function editFoto(){
	    $kduser = $this->input->post('kdUser');
	    $nama = $this->input->post('nama');
	    $fotolama = $this->input->post('fotolama');
		$ekstensi_diperbolehkan	= array('png','jpg','jpeg');
	    $foto = $_FILES['foto']['name'];
		$x = explode('.', $foto);
		$ekstensi = strtolower(end($x));
		$ukuran	= 1044070;	
		$kdname = $this->ModelAdmin->GetKdUser($kduser);
	         $KDN= $kdname[0]['kdUser'];   

		$namaFoto = 'Fto-'.$KDN.'-IT';
		
		 
			if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
			    if($_FILES['foto']['size'] < $ukuran){			
				if(!empty($foto)){
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size'] = '1024';
            $config['upload_path'] = './assets/images/';
             $config['file_name'] = $namaFoto;
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('foto')) {
                $old_cover = $fotolama;
                unlink(FCPATH . 'assets/images/' .$old_cover);
                $new_cover = $this->upload->data('file_name');
                $this->db->set('foto', $new_cover);          
			      }}
			      else{
			        $new_cover = $fotolama;
			      }
				try{
				$input=$this->ModelAdmin->editFoto($new_cover, $kduser);
		 		$this->session->set_flashdata('success', 'Foto akun berhasil di perbarui');
			}
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}
			    }else{
				$this->session->set_flashdata('error', 'Ukuran foto terlalu besar. foto harus kurang dari 1 megabytes (1Mb)');
			    }
		       }else{
		       	$this->session->set_flashdata('error', 'Jenis foto tidak valid. Hanya tipe JPG, JPEG, dan PNG yang diterima');
		       }

      redirect('covid19/profil');
	}

	public function cek_login()
	{
		$username=$this->input->post('username');
		$password=$this->input->post('pass');

		$cek=$this->ModelAdmin->cek_login($username,$password);
		if(count($cek)>0){
			if($cek[0]['status']>0){
				if($cek[0]['password']==$password){
					if($cek[0]['hakAkses']==1 || $cek[0]['hakAkses']==2){
						$_SESSION['kaprodi'] = $this->session->set_userdata(array('id'=>$cek[0]['kdUser']));
						redirect('covid19/beranda'); }
				}else{
				$this->session->set_flashdata('errorps', 'Kata Sandi Salah! ');
				redirect('covid19');}
			}else{
			$this->session->set_flashdata('errorps', 'Akun Belum di Aktivasi! Silakan cek Email Anda Untuk Aktivasi Akun ');
				redirect('covid19');
			}
		}else{
			$this->session->set_flashdata('errorps', 'ID Pengguna Tidak Ditemukan! Pastikan kembali ID Pengguna Anda ');
				redirect('covid19');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('covid19');
	}

	public function ubahPositif(){
		try{
			$kdKasus = $this->input->post('kdKasus');
			$positif = $this->input->post('positif');
			$tgl = $this->input->post('tanggal');
		    $input=$this->ModelAdmin->ubahPositif($positif,$kdKasus,$tgl);
			$this->session->set_flashdata('success', 'Behasil Mengubah Kasus Terkonfirmasi Positif Tanggal "'.$tgl.'"');
				   
	    }
	    catch(PDOException $e){
	      	$_SESSION['error'] = $e->getMessage();
	    }
		
	      redirect('covid19/Positif');
	}

	public function tambahPositif(){
		try{
			$Positif = $this->input->post('Positif');
			$tgl = date('Y-m-d');

			$cek=$this->ModelAdmin->getKasus($tgl);
			if($cek[0]['tanggal']!=0){

			$input=$this->ModelAdmin->ubahPositif2($Positif,$tgl);
			$this->session->set_flashdata('success', 'Behasil Menambahkan Kasus Terkonfirmasi Positif Tanggal "'.$tgl.'"');
		 }else {
		 	$input=$this->ModelAdmin->tambahPositif($Positif,$tgl);
			$this->session->set_flashdata('success', 'Behasil Menambahkan Kasus Terkonfirmasi Positif Tanggal "'.$tgl.'"');

		}
	    }
	    catch(PDOException $e){
	      	$_SESSION['error'] = $e->getMessage();
	    }
		
	      redirect('covid19/Positif');
	}

	public function ubahSembuh(){
		try{
			$kdKasus = $this->input->post('kdKasus');
			$Sembuh = $this->input->post('Sembuh');
			$tgl = $this->input->post('tanggal');
		    $input=$this->ModelAdmin->ubahSembuh($Sembuh,$kdKasus,$tgl);
			$this->session->set_flashdata('success', 'Behasil Mengubah Kasus Terkonfirmasi Sembuh Tanggal "'.$tgl.'"');
				   
	    }
	    catch(PDOException $e){
	      	$_SESSION['error'] = $e->getMessage();
	    }
		
	      redirect('covid19/Sembuh');
	}

	public function tambahSembuh(){
		try{
			$Sembuh = $this->input->post('Sembuh');
			$tgl = date('Y-m-d');

			$cek=$this->ModelAdmin->getKasus($tgl);
			if($cek[0]['tanggal']!=0){

			$input=$this->ModelAdmin->ubahSembuh2($Sembuh,$tgl);
			$this->session->set_flashdata('success', 'Behasil Menambahkan Kasus Terkonfirmasi Sembuh Tanggal "'.$tgl.'"');
		 }else {
		 	$input=$this->ModelAdmin->tambahSembuh($Sembuh,$tgl);
			$this->session->set_flashdata('success', 'Behasil Menambahkan Kasus Terkonfirmasi Sembuh Tanggal "'.$tgl.'"');

		}
	    }
	    catch(PDOException $e){
	      	$_SESSION['error'] = $e->getMessage();
	    }
		
	      redirect('covid19/Sembuh');
	}

	public function ubahMeninggal(){
		try{
			$kdKasus = $this->input->post('kdKasus');
			$Meninggal = $this->input->post('Meninggal');
			$tgl = $this->input->post('tanggal');
		    $input=$this->ModelAdmin->ubahMeninggal($Meninggal,$kdKasus,$tgl);
			$this->session->set_flashdata('success', 'Behasil Mengubah Kasus Terkonfirmasi Meninggal Tanggal "'.$tgl.'"');
				   
	    }
	    catch(PDOException $e){
	      	$_SESSION['error'] = $e->getMessage();
	    }
		
	      redirect('covid19/Meninggal');
	}
	public function tambahMeninggal(){
		try{
			$Meninggal = $this->input->post('Meninggal');
			$tgl = date('Y-m-d');

			$cek=$this->ModelAdmin->getKasus($tgl);
			if($cek[0]['tanggal']!=0){

			$input=$this->ModelAdmin->ubahMeninggal2($Meninggal,$tgl);
			$this->session->set_flashdata('success', 'Behasil Menambahkan Kasus Terkonfirmasi Meninggal Tanggal "'.$tgl.'"');
		 }else {
		 	$input=$this->ModelAdmin->tambahMeninggal($Meninggal,$tgl);
			$this->session->set_flashdata('success', 'Behasil Menambahkan Kasus Terkonfirmasi Meninggal Tanggal "'.$tgl.'"');

		}
	    }
	    catch(PDOException $e){
	      	$_SESSION['error'] = $e->getMessage();
	    }
		
	      redirect('covid19/Meninggal');
	}

	public function ubahODP(){
		try{
			$kdKasus = $this->input->post('kdKasus');
			$ODP = $this->input->post('ODP');
			$tgl = $this->input->post('tanggal');
		    $input=$this->ModelAdmin->ubahODP($ODP,$kdKasus,$tgl);
			$this->session->set_flashdata('success', 'Behasil Mengubah Kasus ODP Tanggal "'.$tgl.'"');
				   
	    }
	    catch(PDOException $e){
	      	$_SESSION['error'] = $e->getMessage();
	    }
		
	      redirect('covid19/ODP');
	}
	public function tambahODP(){
		try{
			$ODP = $this->input->post('ODP');
			$tgl = date('Y-m-d');

			$cek=$this->ModelAdmin->getKasus($tgl);
			if($cek[0]['tanggal']!=0){

			$input=$this->ModelAdmin->ubahODP2($ODP,$tgl);
			$this->session->set_flashdata('success', 'Behasil Menambahkan Kasus ODP Tanggal "'.$tgl.'"');
		 }else {
		 	$input=$this->ModelAdmin->tambahODP($ODP,$tgl);
			$this->session->set_flashdata('success', 'Behasil Menambahkan Kasus ODP Tanggal "'.$tgl.'"');

		}
	    }
	    catch(PDOException $e){
	      	$_SESSION['error'] = $e->getMessage();
	    }
		
	      redirect('covid19/ODP');
	}

	public function ubahPDP(){
		try{
			$kdKasus = $this->input->post('kdKasus');
			$PDP = $this->input->post('PDP');
			$tgl = $this->input->post('tanggal');
		    $input=$this->ModelAdmin->ubahPDP($PDP,$kdKasus,$tgl);
			$this->session->set_flashdata('success', 'Behasil Mengubah Kasus PDP Tanggal "'.$tgl.'"');
				   
	    }
	    catch(PDOException $e){
	      	$_SESSION['error'] = $e->getMessage();
	    }
		
	      redirect('covid19/PDP');
	}
	public function tambahPDP(){
		try{
			$PDP = $this->input->post('PDP');
			$tgl = date('Y-m-d');

			$cek=$this->ModelAdmin->getKasus($tgl);
			if($cek[0]['tanggal']!=0){

			$input=$this->ModelAdmin->ubahPDP2($PDP,$tgl);
			$this->session->set_flashdata('success', 'Behasil Menambahkan Kasus PDP Tanggal "'.$tgl.'"');
		 }else {
		 	$input=$this->ModelAdmin->tambahPDP($PDP,$tgl);
			$this->session->set_flashdata('success', 'Behasil Menambahkan Kasus PDP Tanggal "'.$tgl.'"');

		}
	    }
	    catch(PDOException $e){
	      	$_SESSION['error'] = $e->getMessage();
	    }
		
	      redirect('covid19/PDP');
	}

	public function hapusWilayah(){
	    try{
	    $namaDaerah = $this->input->get('namaDaerah');
	    $kd = $this->input->get('kd');
		 $input=$this->ModelAdmin->hapusWilayah($kd);
		 $this->session->set_flashdata('success', 'Daerah "'.$namaDaerah.'" Berhasil di Hapus!');
    }
    catch(PDOException $e){
      	$_SESSION['error'] = $e->getMessage();
    }
      redirect('covid19/Wilayah');
	}

	public function tambahwilayah(){
		try{
			$provinsi = $this->input->post('provinsi');
			$kabkot = $this->input->post('kabkot');
		    $input=$this->ModelAdmin->tambahwilayah($provinsi,$kabkot);
			$this->session->set_flashdata('success', 'Behasil Memambahkan Wilayah "'.$kabkot.'"!');
				   
	    }
	    catch(PDOException $e){
	      	$_SESSION['error'] = $e->getMessage();
	    }
		
	      redirect('covid19/Wilayah');
	}

	public function ubahWilayah(){
		try{
			//$provinsi = $this->input->post('provinsi');
			$kdDaerah = $this->input->post('kdDaerah');
			$kabkot = $this->input->post('kabkot');
		    $input=$this->ModelAdmin->ubahWilayah($kabkot,$kdDaerah);
			$this->session->set_flashdata('success', 'Behasil Mengubah Wilayah "'.$kabkot.'"!');
				   
	    }
	    catch(PDOException $e){
	      	$_SESSION['error'] = $e->getMessage();
	    }
		
	      redirect('covid19/Wilayah');
	}

	public function tambahFAQ(){
		try{
			$FAQ = $this->input->post('FAQ');
			$input=$this->ModelAdmin->tambahFAQ($FAQ);
			$this->session->set_flashdata('success', 'Behasil Kelompok Pertanyaan (FAQ)!');
				   
	    }
	    catch(PDOException $e){
	      	$_SESSION['error'] = $e->getMessage();
	    }
		
	      redirect('covid19/FAQ');
	}

	public function hapusFAQ(){
	    try{
	     $kd = $this->input->get('kd');
		 $input=$this->ModelAdmin->hapusFAQ($kd);
		 $this->session->set_flashdata('success', 'Berhasil Menghapus Kelompok Pertanyaan (FAQ)!!');
    }
    catch(PDOException $e){
      	$_SESSION['error'] = $e->getMessage();
    }
      redirect('covid19/FAQ');
	}

	public function ubahFAQ(){
		try{
			$kdHeader = $this->input->post('kdHeader');
			$FAQ = $this->input->post('FAQ');
			$input=$this->ModelAdmin->ubahFAQ($FAQ, $kdHeader);
			$this->session->set_flashdata('success', 'Behasil Mengubah Kelompok Pertanyaan (FAQ)!');
				   
	    }
	    catch(PDOException $e){
	      	$_SESSION['error'] = $e->getMessage();
	    }
		
	      redirect('covid19/FAQ');
	}

	public function tambahPertanyaanFAQ(){
		try{
			$Pertanyaan = $this->input->post('Pertanyaan');
			$jenisFAQ = $this->input->post('jenisFAQ');
			$Penjelasan = $this->input->post('Penjelasan');
			$kdHeader = $this->input->post('kdHeader');
	    	$Penjelasan = str_replace('<p>', '', $Penjelasan);
	    	$Penjelasan = str_replace('</p>', '', $Penjelasan);

		    $input=$this->ModelAdmin->tambahPertanyaanFAQ($Pertanyaan,$kdHeader,$Penjelasan);
			$this->session->set_flashdata('success', 'Behasil Memambahkan Pertanyaan (FAQ)!');
				   
	    }
	    catch(PDOException $e){
	      	$_SESSION['error'] = $e->getMessage();
	    }
	      redirect('covid19/veiwDetailFAQ?auth='.base64_encode($kdHeader).'&Modul='.base64_encode($jenisFAQ));
	}

	public function ubahPertanyaanFAQ(){
		try{
			$Pertanyaan = $this->input->post('Pertanyaan');
			$jenisFAQ = $this->input->post('jenisFAQ');
			$Penjelasan = $this->input->post('Penjelasan');
			$kdHeader = $this->input->post('kdHeader');
			$kdIsi = $this->input->post('kdIsi');
	    	$Penjelasan = str_replace('<p>', '', $Penjelasan);
	    	$Penjelasan = str_replace('</p>', '', $Penjelasan);
	    	
		    $input=$this->ModelAdmin->ubahPertanyaanFAQ($Pertanyaan,$kdIsi,$Penjelasan);
			$this->session->set_flashdata('success', 'Behasil Mengubah Pertanyaan (FAQ)!');
				   
	    }
	    catch(PDOException $e){
	      	$_SESSION['error'] = $e->getMessage();
	    }
	      redirect('covid19/veiwDetailFAQ?auth='.base64_encode($kdHeader).'&Modul='.base64_encode($jenisFAQ));
	}
	
	public function hapusPertanyaanFAQ(){
		try{
			$judulisi = $this->input->get('judulisi');
			$jenisFAQ = $this->input->get('jenisFAQ');
			$kdHeader = $this->input->get('kdHeader');
			$kd = $this->input->get('kd');
		 	$input=$this->ModelAdmin->hapusPertanyaanFAQ($kd);
		 	$this->session->set_flashdata('success', 'Pertanyaan "'.$judulisi.'" Berhasil di Hapus!');
				   
	    }
	    catch(PDOException $e){
	      	$_SESSION['error'] = $e->getMessage();
	    }
	      redirect('covid19/veiwDetailFAQ?auth='.base64_encode($kdHeader).'&Modul='.base64_encode($jenisFAQ));
	}
			
	public function tambahkecamatan(){
		try{
			$Kecamatan = $this->input->post('Kecamatan');
			$namaKabkot = $this->input->post('namaKabkot');
			$kdDaerah = $this->input->post('kdDaerah');
		    $input=$this->ModelAdmin->tambahkecamatan($Kecamatan,$kdDaerah);
			$this->session->set_flashdata('success', 'Behasil Memambahkan Kecamatan "'.$Kecamatan.'"!');
				   
	    }
	    catch(PDOException $e){
	      	$_SESSION['error'] = $e->getMessage();
	    }
	      redirect('covid19/Kecamatan?auth='.base64_encode($kdDaerah).'&Modul='.base64_encode($namaKabkot));
	}
	public function hapusKecamatan(){
	    try{
	    $namaKecamatan = $this->input->get('namaKecamatan');
	    $namaDaerah = $this->input->get('namaDaerah');
	    $kdDaerah = $this->input->get('kdDaerah');
	    $kd = $this->input->get('kd');
		 $input=$this->ModelAdmin->hapusKecamatan($kd);
		 $this->session->set_flashdata('success', 'Kecamatan "'.$namaKecamatan.'" Berhasil di Hapus!');
    }
    catch(PDOException $e){
      	$_SESSION['error'] = $e->getMessage();
    }
      redirect('covid19/Kecamatan?auth='.base64_encode($kdDaerah).'&Modul='.base64_encode($namaDaerah));
	}

	public function ubahKecamatan(){
		try{
			//$provinsi = $this->input->post('provinsi');
			$kdKecamatan = $this->input->post('kdKecamatan');
			$namaKecamatan = $this->input->post('namaKecamatan');
			$namaKabkot = $this->input->post('namaKabkot');
			$kdDaerah = $this->input->post('kdDaerah');
		    $input=$this->ModelAdmin->ubahKecamatan($namaKecamatan,$kdKecamatan);
			$this->session->set_flashdata('success', 'Behasil Mengubah Kecamatan "'.$namaKecamatan.'"!');
				   
	    }
	    catch(PDOException $e){
	      	$_SESSION['error'] = $e->getMessage();
	    }
		
	      redirect('covid19/Kecamatan?auth='.base64_encode($kdDaerah).'&Modul='.base64_encode($namaKabkot));
	}

	public function tambahkelurahan(){
		try{
			$kdKecamatan = $this->input->post('kdKecamatan');
			$Kelurahan = $this->input->post('Kelurahan');
			$namaKecamatan = $this->input->post('namaKecamatan');
		    $input=$this->ModelAdmin->tambahkelurahan($Kelurahan,$kdKecamatan);
			$this->session->set_flashdata('success', 'Behasil Memambahkan Kelurahan "'.$Kelurahan.'"!');
				   
	    }
	    catch(PDOException $e){
	      	$_SESSION['error'] = $e->getMessage();
	    }
	      redirect('covid19/Desa?auth='.base64_encode($kdKecamatan).'&Modul='.base64_encode($namaKecamatan));
	}

	public function hapusKelurahan(){
	    try{
	    $namaKelurahan = $this->input->get('namaKelurahan');
	    $namaKecamatan = $this->input->get('namaKecamatan');
	    $kdKecamatan = $this->input->get('kdKecamatan');
	    $kd = $this->input->get('kd');
		 $input=$this->ModelAdmin->hapusKelurahan($kd);
		 $this->session->set_flashdata('success', 'Kelurahan "'.$namaKelurahan.'" Berhasil di Hapus!');
    }
    catch(PDOException $e){
      	$_SESSION['error'] = $e->getMessage();
    }
      redirect('covid19/Desa?auth='.base64_encode($kdKecamatan).'&Modul='.base64_encode($namaKecamatan));
	}

	public function ubahKelurahan(){
		try{
			//$provinsi = $this->input->post('provinsi');
			$kdKelurahan = $this->input->post('kdKelurahan');
			$namaKelurahan = $this->input->post('namaKelurahan');
	    $namaKecamatan = $this->input->post('namaKecamatan');
	    $kdKecamatan = $this->input->post('kdKecamatan');
		    $input=$this->ModelAdmin->ubahKelurahan($namaKelurahan,$kdKelurahan);
			$this->session->set_flashdata('success', 'Behasil Mengubah Kelurahan "'.$namaKelurahan.'"!');
				   
	    }
	    catch(PDOException $e){
	      	$_SESSION['error'] = $e->getMessage();
	    }
		
	      redirect('covid19/Desa?auth='.base64_encode($kdKecamatan).'&Modul='.base64_encode($namaKecamatan));
	}

	public function tambahOperator(){
	try{
	    $instansi = $this->input->post('instansi');
	    $nama = $this->input->post('nama');
	    $Daerah = $this->input->post('Daerah');
	    $alamat = $this->input->post('alamat');
	    $email = $this->input->post('email');
	    $nohp = $this->input->post('no_tlp');
	    $pass = $this->input->post('pass');
	    $username = $this->input->post('username');
	    $status =3;
	    $type =2;
		 $input=$this->ModelAdmin->tambahOperator($instansi,$nama,$Daerah,$alamat,$email,$nohp,$pass,$username,$status,$type);
		 $this->session->set_flashdata('success', 'Data Operator berhasil di tambah');
    }
    catch(PDOException $e){
      	$_SESSION['error'] = $e->getMessage();
    }
      redirect('covid19/Operator');
	}

	public function hapusOperator(){
	try{
	    $kduser = $this->input->get('kdUser');
	    $nama = $this->input->get('nama');
		 $input=$this->ModelAdmin->hapusOperator($kduser);
		 $this->session->set_flashdata('success', 'Berhasil menghapus akun "'.$nama.'"');
    }
    catch(PDOException $e){
      	$_SESSION['error'] = $e->getMessage();
    }
      redirect('covid19/Operator');
	}

	public function aktivasiOperator(){
	try{
	    $kduser = $this->input->get('kdUser');
	    $nama = $this->input->get('nama');
		 $input=$this->ModelAdmin->aktivasiOperator($kduser);
		 $this->session->set_flashdata('success', 'Berhasil mengaktivasi akun "'.$nama.'"');
    }
    catch(PDOException $e){
      	$_SESSION['error'] = $e->getMessage();
    }
      redirect('covid19/Operator');
	}

	public function updateOperator(){
	try{
	    $instansi = $this->input->post('instansi');
	    $kdUser = $this->input->post('kdUser');
	    $nama = $this->input->post('nama');
	    $Daerah = $this->input->post('Daerah');
	    $alamat = $this->input->post('alamat');
	    $email = $this->input->post('email');
	    $nohp = $this->input->post('no_tlp');
	    $pass = $this->input->post('pass');
	    $username = $this->input->post('username');
		 $input=$this->ModelAdmin->updateOperator($kdUser,$instansi,$nama,$Daerah,$alamat,$email,$nohp,$pass,$username);
		 $this->session->set_flashdata('success', 'Data Operator berhasil di tambah');
    }
    catch(PDOException $e){
      	$_SESSION['error'] = $e->getMessage();
    }
      redirect('covid19/Operator');
	}

	public function updateProfil(){
	try{
	    $instansi = $this->input->post('instansi');
	    $kdUser = $this->input->post('kdUser');
	    $nama = $this->input->post('nama');
	    $Daerah = $this->input->post('Daerah');
	    $alamat = $this->input->post('alamat');
	    $email = $this->input->post('email');
	    $nohp = $this->input->post('no_tlp');
	    $pass = $this->input->post('pass');
	    $username = $this->input->post('username');
		 $input=$this->ModelAdmin->updateOperator($kdUser,$instansi,$nama,$Daerah,$alamat,$email,$nohp,$pass,$username);
		 $this->session->set_flashdata('success', 'Data Operator berhasil di tambah');
    }
    catch(PDOException $e){
      	$_SESSION['error'] = $e->getMessage();
    }
      redirect('covid19/profil');
	}

	public function ubahPassword(){
	try{
	    $passlama = $this->input->post('passlama');
	    $kduser = $this->input->post('kdUser');
	    $password = $this->input->post('password');
	    $passwordbaru = $this->input->post('passwordbaru');
	    $konpassword = $this->input->post('konpassword');	    
			if(strlen($passwordbaru) >= 5){
				if ($passwordbaru != $passlama) {
				if($passwordbaru == $konpassword){					
					try{
						$input=$this->ModelAdmin->ubahPassword($kduser,$konpassword);
		 				$this->session->set_flashdata('success', 'Kata Sandi Berhasil di Rubah');
				    }catch(PDOException $e){
				    	$this->session->set_flashdata('error', 'Gagal Merubah Kata Sandi');}
				  }else{
				    	$this->session->set_flashdata('error', 'Konfirmasi Kata sandi tidak cocok');}
				}else{
				    	$this->session->set_flashdata('error', 'Kata Sandi Baru tidak boleh sama dengan kata sandi lama!');}
			}else{
				    	$this->session->set_flashdata('error', 'Kata Sandi Baru terlalu Lemah!');}
		 
    	}catch(PDOException $e){
      		$_SESSION['error'] = $e->getMessage();}
	
      redirect('covid19/kataSandi');
	}

	public function hapusTanya(){
	try{
	    $kdtanya = $this->input->get('kdtanya');
		 $input=$this->ModelAdmin->hapusTanya($kdtanya);
		 $this->session->set_flashdata('success', 'Berhasil menghapus Pertanyaan!');
    }
    catch(PDOException $e){
      	$_SESSION['error'] = $e->getMessage();
    }
      redirect('covid19/forum');
	}

	public function Tanggapi(){
        $kdtanya = $this->input->post('kdtanya');
	    $komentar = $this->input->post('komentar');
	    $nama = $this->input->post('nama');
	    $email = $this->input->post('email');

	    $komentar = str_replace('<p>', '', $komentar);
	    $komentar = str_replace('</p>', '', $komentar);
	
			if($komentar == ''){
				$this->session->set_flashdata('error', 'Isi Tanggapan Anda Terlebih dahulu');
				redirect('covid19/forum');

			}else{
				try{
					$message = '					
					<div  style="margin-left: 5%;width: 80%;box-shadow: 0px 20px 20px 5px #555;padding: 50px">
					  <div style=" ">
					      <h2 style="text-align: center;text-transform: capitalize;">Hai! '.$nama.'</h2>
					      <div style="margin-left: 5%;margin-top: 50px">
					        <h2>Pertanyaan anda telah di tanggapi oleh moderator!</h2>
							<p>Tanggapan:</p>
							<p>"<b>'.$komentar.'</b>"</p>
							<p>Terima Kasih Telah Bertanya dan selalu kunjungi kami, untuk melihat perkembangan COVID-19 di Provinsi Bengkulu</p>
					      </div>
					      <div style="text-align: center;margin-top: 80px">
					        <a href="http://localhost/COVID-19/page/tanyaKami" style="padding: 10px 50px;text-transform: uppercase;background-color: #2196F3;color: #fff;border-radius: 20px;border:2px solid #00BCD4;text-decoration:none ">Lihat Forum diskusi</a>
					      </div>
					  </div></div>
					</div>';
					//username :SITUA
					//Password : Kakaka;1
					$response = false;
                     $mail = new PHPMailer();                         
				    try {
				        //Server settings            
				        $mail->isSMTP();                                     
				        $mail->Host = 'smtp.gmail.com';                      
				        $mail->SMTPAuth = true;                               
				        $mail->Username = 'si.bimbingan.informatika@gmail.com';     
				        $mail->Password = 'abcd9876';                    
				        $mail->SMTPOptions = array(
			            'ssl' => array(
			            'verify_peer' => false,
			            'verify_peer_name' => false,
			            'allow_self_signed' => true
			            )
			        );                        
				        $mail->SMTPSecure = 'ssl';                           
				        $mail->Port = 465;                                   

				        $mail->setFrom('si.bimbingan.informatika@gmail.com');
				        
				        //Recipients
				        $mail->addAddress($email);              
				        $mail->addReplyTo('si.bimbingan.informatika@gmail.com');
				       
				        //Content
				        $mail->isHTML(true);                                  
				        $mail->Subject = 'Forum Covid-19 Provinsi Bengkulu';
				        $mail->Body    = $message;
				        $mail->send();
		 				$input=$this->ModelAdmin->Tanggapi($kdtanya, $komentar);
		 				$this->session->set_flashdata('success', 'Berhasil menanggapi Pertanyaan!');
				        redirect('covid19/forum');
				    } 
				    catch (Exception $e) {
		 				$this->session->set_flashdata('error', 'Pesan Gagal terkirim, silakan coba lagi!');
				        redirect('covid19/forum');
				    }
				}
				catch(PDOException $e){
		 				$this->session->set_flashdata('error', $e->getMessage());
					redirect('covid19/forum');
				}

			}
      redirect('covid19/forum');
	}

	public function tambahKontak(){
	try{
	    $namaRS = $this->input->post('namaRS');
	    $email = $this->input->post('email');
	    $no_tlp = $this->input->post('no_tlp');
	    $alamat = $this->input->post('alamat');
	    $peta = $this->input->post('peta');
	    $peta = str_replace('<p>', '', $peta);
	    $peta = str_replace('</p>', '', $peta);

		 $input=$this->ModelAdmin->tambahKontak($namaRS, $email, $no_tlp, $alamat, $peta);
		 $this->session->set_flashdata('success', 'Berhasil menambahkan kontak!');
    }
    catch(PDOException $e){
      	$_SESSION['error'] = $e->getMessage();
    }
      redirect('covid19/kontak');
	}

	public function hapusKontak(){
	try{
	    $kd = $this->input->get('kd');
		 $input=$this->ModelAdmin->hapusKontak($kd);
		 $this->session->set_flashdata('success', 'Berhasil menghapus kontak!');
    }
    catch(PDOException $e){
      	$_SESSION['error'] = $e->getMessage();
    }
      redirect('covid19/kontak');
	}

	public function editKontak(){
	try{
	    $kdRS = $this->input->post('kdRS');
	    $namaRS = $this->input->post('namaRS');
	    $email = $this->input->post('email');
	    $no_tlp = $this->input->post('no_tlp');
	    $alamat = $this->input->post('alamat');
	    $peta = $this->input->post('peta');
	    $peta = str_replace('<p>', '', $peta);
	    $peta = str_replace('</p>', '', $peta);

		 $input=$this->ModelAdmin->editKontak($kdRS, $namaRS, $email, $no_tlp, $alamat, $peta);
		 $this->session->set_flashdata('success', 'Berhasil Mengubah kontak!');
    }
    catch(PDOException $e){
      	$_SESSION['error'] = $e->getMessage();
    }
      redirect('covid19/kontak');
	}
	
}
?>