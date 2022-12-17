<?php 

function requestApi($url){

	$ch = curl_init();

	//set url
	curl_setopt($ch, CURLOPT_URL, $url);


	//aktifkan fungsi transfer nilai yang berupa string
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);


	//fungsi setting agar dapat dijalankan pada localhost
	//mematikan ssl verify (https)

	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

	//tampung hasil kedalam varfiabel $output
	$output = curl_exec($ch);

	//tutup curl
	curl_close($ch);

	return $output;
}

$data = requestApi("https://data.covid19.go.id/public/api/prov.json");

$data = json_decode($data, TRUE);

echo '<pre>'.$data.'</pre>';

 ?>