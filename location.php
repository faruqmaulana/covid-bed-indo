<?php
$d_host = $_POST["id_hospital"];
$curl = curl_init();

curl_setopt_array($curl, array(
	CURLOPT_URL => "https://rs-bed-covid-api.vercel.app/api/get-hospital-map?hospitalid=".$d_host,
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
	$location = $array_response["data"]["gmaps"];

    echo '<script>
    function pageRedirect() {
        window.location.replace("'.$location.'");
    }      
    pageRedirect();
    </script>
    ';
}
?>