<?php
$id_prov = $_POST["province_id"];
$curl = curl_init();

curl_setopt_array($curl, array(
	CURLOPT_URL => "https://rs-bed-covid-api.vercel.app/api/get-cities?provinceid=".$id_prov,
	CURLOPT_SSL_VERIFYHOST => 0,
	CURLOPT_SSL_VERIFYPEER => 0,
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_CUSTOMREQUEST => "GET",
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if($err){
	echo "cURL Error #:" . $err;
}else{
	$array_response = json_decode($response,TRUE);
	$district = $array_response["cities"];

	echo "<option>-- Pilih Kabupaten / Kota --</option>";
	foreach ($district as $key => $data_district) {
		echo "<option id_district='".$data_district["id"]."'>";
		echo $data_district["name"];
		echo "</option>";

	}
	
}
?>