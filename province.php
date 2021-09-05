<?php
$curl = curl_init();

curl_setopt_array($curl, array(
	CURLOPT_URL => "https://rs-bed-covid-api.vercel.app/api/get-provinces",
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
	$provinces_data = $array_response["provinces"];

	echo "<option>-- Pilih Provinsi --</option>";

	foreach ($provinces_data as $key => $data_prov) {
		echo "<option  data-tokens='".$data_prov["name"]."' id_province='".$data_prov["id"]."'>";
		echo $data_prov["name"];
		echo "</option>";

	}
	
}
?>