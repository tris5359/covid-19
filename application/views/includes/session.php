<?php
	include 'conn.php';
	date_default_timezone_set('Asia/Jakarta');


	$conn = $pdo->open();

	try{

			$stmt2 = $conn->prepare("SELECT * FROM site limit 1");
			$stmt2->execute();
			$site = $stmt2->fetch();
		}
		catch(PDOException $e){
			echo "There is some problem in connection: " . $e->getMessage();
		}


	$pdo->close();

?>