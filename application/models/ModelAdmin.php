
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelAdmin extends CI_Model {
public function __construct(){
		parent::__construct();
 $this->load->database();
	}

	
	public function cek_login($username,$password)
	{
		$query=$this->db->query('SELECT * from tb_user where username="'.$username.'"');
		return $query->result_array();
	}

	public function getKasus($tgl){
		$data = $this->db->query("SELECT count(*) as tanggal  FROM tb_kasus where tgl like '%".$tgl."%' "); 
		return $data->result_array();
	}
	public function GetKdUser($CEK) {
		$data = $this->db->query("SELECT kdUser  FROM tb_user where kdUser like '".$CEK."' ORDER BY kdUser DESC LIMIT 1"); 
		return $data->result_array();
	}
	
	public function hapusWilayah($kd) {
		$data = $this->db->query("DELETE FROM `tb_kabkot` WHERE kdDaerah ='".$kd."'");
	}
	public function tambahwilayah($provinsi,$kabkot) {
		$data = $this->db->query("INSERT INTO `tb_kabkot` (`kdDaerah`, `namaDaerah`, `provinsi`) VALUES (NULL, '".$kabkot."', '".$provinsi."');");
	}
	public function ubahWilayah($kabkot,$kdDaerah) {
		$data = $this->db->query("UPDATE `tb_kabkot` SET `namaDaerah` = '".$kabkot."' WHERE `tb_kabkot`.`kdDaerah` = '".$kdDaerah."'");
	}
	public function tambahkecamatan($Kecamatan,$kdDaerah) {
		$data = $this->db->query("INSERT INTO `tb_kecamatan` (`kdKecamatan`, `namaKecamatan`, `kdDaerah`) VALUES (NULL, '".$Kecamatan."', '".$kdDaerah."');");
	}
	public function hapusKecamatan($kd) {
		$data = $this->db->query("DELETE FROM `tb_kecamatan` WHERE kdKecamatan ='".$kd."'");
	}
	public function ubahKecamatan($namaKecamatan,$kdKecamatan) {
		$data = $this->db->query("UPDATE `tb_kecamatan` SET `namaKecamatan` = '".$namaKecamatan."' WHERE kdKecamatan= '".$kdKecamatan."'");
	}
	public function tambahkelurahan($Kelurahan,$kdKecamatan) {
		$data = $this->db->query("INSERT INTO `tb_kelurahan` (`kdKelurahan`, `namaKelurahan`, `kdKecamatan`) VALUES (NULL, '".$Kelurahan."', '".$kdKecamatan."');");
	}
	public function hapusKelurahan($kd) {
		$data = $this->db->query("DELETE FROM `tb_kelurahan` WHERE kdKelurahan ='".$kd."'");
	}
	public function ubahKelurahan($namaKelurahan,$kdKelurahan){
		$data = $this->db->query("UPDATE `tb_kelurahan` SET `namaKelurahan` = '".$namaKelurahan."' WHERE kdKelurahan= '".$kdKelurahan."'");
	}
	public function tambahOperator($instansi,$nama,$Daerah,$alamat,$email,$nohp,$pass,$username,$status,$type){
		$data = $this->db->query("INSERT INTO `tb_user` (`kdUser`, `username`, `password`, `nama`, `instansi`, `alamatInstansi`, `email`, `noTlp`, `alamat`, `foto`, `hakAkses`, `status`) VALUES (NULL, '".$username."', '".$pass."', '".$nama."', '".$instansi."', '".$Daerah."', '".$email."', '".$nohp."', '".$alamat."', '', '".$type."', '0');");
	}
	public function hapusOperator($kduser){
		$data = $this->db->query("DELETE FROM `tb_user` WHERE kdUser ='".$kduser."'");
	}
	public function updateOperator($kdUser,$instansi,$nama,$Daerah,$alamat,$email,$nohp,$pass,$username){
		$data = $this->db->query("UPDATE `tb_user` SET `username` = '".$username."', `password` = '".$pass."', `nama` = '".$nama."',`instansi` = '".$instansi."', `alamatInstansi` = '".$Daerah."', `email` = '".$email."', `noTlp` = '".$nohp."', `alamat` = '".$alamat."' WHERE kdUser= '".$kdUser."'");
	}
	public function editFoto($namaFoto, $kdUser) {
		$data = $this->db->query("UPDATE  tb_user SET foto='".$namaFoto."' WHERE kdUser='".$kdUser."'");
	}
	public function ubahPassword($kduser,$konpassword){
		$data = $this->db->query("UPDATE tb_user SET  password='".$konpassword."' WHERE kdUser='".$kduser."'");
	}


	public function aktivasiOperator($kduser){
		$data = $this->db->query("UPDATE `tb_user` SET `status` = '1' WHERE kdUser ='".$kduser."'");
	}
	public function hapusTanya($kdtanya){
		$data = $this->db->query("DELETE FROM `tb_tanyakami` WHERE kdtanya ='".$kdtanya."'");
	}
	public function Tanggapi($kdtanya, $komentar){
		$data = $this->db->query("UPDATE `tb_tanyakami` SET `tanggapan` = '".$komentar."' WHERE kdtanya ='".$kdtanya."'");
	}
	public function tambahKontak($namaRS, $email, $no_tlp, $alamat, $peta){
		$data = $this->db->query("INSERT INTO `tb_rumahsakit` (`kdRS`, `namaRS`, `alamaRS`, `noTlp`, `email`, `petaKoordinat`) VALUES (NULL, '".$namaRS."', '".$alamat."', '".$no_tlp."', '".$email."', '".$peta."');");
	}
	public function hapusKontak($kd){
		$data = $this->db->query("DELETE FROM `tb_rumahsakit` WHERE kdRS ='".$kd."'");
	}
	public function editKontak($kdRS, $namaRS, $email, $no_tlp, $alamat, $peta){
		$data = $this->db->query("UPDATE `tb_rumahsakit` SET `namaRS` = '".$namaRS."', `alamaRS` = '".$alamat."', `noTlp` = '".$no_tlp."', `email` = '".$email."', `petaKoordinat` = '".$peta."' WHERE kdRS ='".$kdRS."'");
	}
	public function tambahFAQ($FAQ){
		$data = $this->db->query("INSERT INTO `tb_headerfaq` (`kdHeader`, `judul`) VALUES (NULL, '".$FAQ."');");
	}
	public function hapusFAQ($kd){
		$data = $this->db->query("DELETE FROM `tb_headerfaq` WHERE kdHeader ='".$kd."'");
	}
	public function ubahFAQ($FAQ, $kdHeader){
		$data = $this->db->query("UPDATE `tb_headerfaq` SET `judul` = '".$FAQ."' WHERE kdHeader ='".$kdHeader."'");
	}
	public function tambahPertanyaanFAQ($Pertanyaan,$kdHeader,$Penjelasan){
		$data = $this->db->query("INSERT INTO `tb_isifaq` (`kdIsi`, `judulisi`, `isi`, `kdHeader`) VALUES (NULL, '".$Pertanyaan."', '".$Penjelasan."', '".$kdHeader."');");
	}
	public function ubahPertanyaanFAQ($Pertanyaan,$kdIsi,$Penjelasan){
		$data = $this->db->query("UPDATE `tb_isifaq` SET judulisi = '".$Pertanyaan."', isi = '".$Penjelasan."' WHERE kdIsi ='".$kdIsi."'");
	}
	public function hapusPertanyaanFAQ($kd){
		$data = $this->db->query("DELETE FROM `tb_isifaq`  WHERE kdIsi ='".$kd."'");
	}

	public function tambahPositif($Positif,$tgl){
		$data = $this->db->query("INSERT INTO `tb_kasus` (`kdKasus`, `tgl`, `terkonfirmasi`) VALUES (NULL, '".$tgl."', '".$Positif."');");
	}
	public function ubahPositif($Positif,$kdKasus,$tgl){
		$data = $this->db->query("UPDATE `tb_kasus` SET `tgl`='".$tgl."', `terkonfirmasi`='".$Positif."' WHERE kdKasus='".$kdKasus."'");
	}
	public function ubahPositif2($Positif,$tgl){
		$data = $this->db->query("UPDATE `tb_kasus` SET `terkonfirmasi`='".$Positif."' WHERE `tgl`='".$tgl."'");
	}

	public function ubahSembuh($Sembuh,$kdKasus,$tgl){
		$data = $this->db->query("UPDATE `tb_kasus` SET `tgl`='".$tgl."', `sembuh`='".$Sembuh."' WHERE kdKasus='".$kdKasus."'");
	}

	public function ubahSembuh2($Sembuh,$tgl){
		$data = $this->db->query("UPDATE `tb_kasus` SET `sembuh`='".$Sembuh."' WHERE `tgl`='".$tgl."'");
	}
	public function tambahSembuh($Sembuh,$tgl){
		$data = $this->db->query("INSERT INTO `tb_kasus` (`kdKasus`, `tgl`, `sembuh`) VALUES (NULL, '".$tgl."', '".$Sembuh."');");
	}

	public function ubahMeninggal($Meninggal,$kdKasus,$tgl){
		$data = $this->db->query("UPDATE `tb_kasus` SET `tgl`='".$tgl."', `meninggal`='".$Meninggal."' WHERE kdKasus='".$kdKasus."'");
	}
	public function ubahMeninggal2($Meninggal,$tgl){
		$data = $this->db->query("UPDATE `tb_kasus` SET `meninggal`='".$Meninggal."' WHERE `tgl`='".$tgl."'");
	}
	public function tambahMeninggal($Meninggal,$tgl){
		$data = $this->db->query("INSERT INTO `tb_kasus` (`kdKasus`, `tgl`, `meninggal`) VALUES (NULL, '".$tgl."', '".$Meninggal."');");
	}

	public function ubahODP($ODP,$kdKasus,$tgl){
		$data = $this->db->query("UPDATE `tb_kasus` SET `tgl`='".$tgl."', `ODP`='".$ODP."' WHERE kdKasus='".$kdKasus."'");
	}
	public function ubahODP2($ODP,$tgl){
		$data = $this->db->query("UPDATE `tb_kasus` SET `ODP`='".$ODP."' WHERE `tgl`='".$tgl."'");
	}
	public function tambahODP($ODP,$tgl){
		$data = $this->db->query("INSERT INTO `tb_kasus` (`kdKasus`, `tgl`, `ODP`) VALUES (NULL, '".$tgl."', '".$ODP."');");
	}

	public function ubahPDP($PDP,$kdKasus,$tgl){
		$data = $this->db->query("UPDATE `tb_kasus` SET `tgl`='".$tgl."', `PDP`='".$PDP."' WHERE kdKasus='".$kdKasus."'");
	}
	public function ubahPDP2($PDP,$tgl){
		$data = $this->db->query("UPDATE `tb_kasus` SET `PDP`='".$PDP."' WHERE `tgl`='".$tgl."'");
	}
	public function tambahPDP($PDP,$tgl){
		$data = $this->db->query("INSERT INTO `tb_kasus` (`kdKasus`, `tgl`, `PDP`) VALUES (NULL, '".$tgl."', '".$PDP."');");
	}

	
	public function get($id=null){
		$this->db->from('tb_user');
		if ($id != null) {
			$this->db->where('user_id', $id);
		}
		$query = $this->db->get();
		return $query;
	}
	public function getsequrity() {
		$us= $this->session->userdata('id');
		if (empty($us)) {
			$this->session->sess_destroy();
			redirect('covid19');
		}
	}



}




