<?php
	include 'conn.php';
	date_default_timezone_set('Asia/Jakarta');

	$conn = $pdo->open();

	$stmt = $conn->prepare("SELECT * FROM tb_user WHERE kdUser=:id");
	$stmt->execute(['id'=>$this->session->userdata('id')]);
	$user = $stmt->fetch();

	try{        
      $stmx = $conn->prepare("SELECT SUM(terkonfirmasi) as vpositif,SUM(dirawat) as vdirawat, SUM(meninggal) as vmeninggal, SUM(sembuh) as vsembuh FROM `tb_kasus`");
      $stmx->execute();
      $data = $stmx->fetch();
    
  }
  catch(PDOException $e){
    echo "There is some problem in connection: " . $e->getMessage();
  }


	$pdo->close();

?>