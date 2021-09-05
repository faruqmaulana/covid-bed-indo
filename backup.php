<?php
$prov_host = $_POST["province_host"];
$dist_host = $_POST["district_host"];
$butt_host = $_POST["button_host"];
$curl = curl_init();

curl_setopt_array($curl, array(
	CURLOPT_URL => "https://rs-bed-covid-api.vercel.app/api/get-hospitals?provinceid=".$prov_host."&cityid=".$dist_host."&type=".$butt_host,
	CURLOPT_SSL_VERIFYHOST => 0,
	CURLOPT_SSL_VERIFYPEER => 0,
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_CUSTOMREQUEST => "GET",
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if($err){
	echo "cURL Error #:" . $err;
}else{

	$array_response = json_decode($response,TRUE);
	$hospitals_data = $array_response["hospitals"];
	foreach ($hospitals_data as $key => $data_host) {
		$curl = curl_init();
		$id_hospitals = $data_host["id"];
		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://rs-bed-covid-api.vercel.app/api/get-hospital-map?hospitalid=".$id_hospitals,
			CURLOPT_SSL_VERIFYHOST => 0,
			CURLOPT_SSL_VERIFYPEER => 0,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_CUSTOMREQUEST => "GET",
		));
		
		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

			
		$array_response = json_decode($response,TRUE);
		$location = $array_response["data"]["gmaps"];

		 $hospital_name = $data_host["name"];
		 $address = $data_host["address"];
		 $phone = $data_host["phone"];
		 $queue = $data_host["queue"];
		 $bed_availability = $data_host["bed_availability"];
		 $info = $data_host["info"];

		 if ($phone == null) {
			$phone = "Tidak Tersedia";
			$halo = "disabled";
			$disable_cursor = 'style="cursor: not-allowed;"';

		if ($bed_availability != 0 && $queue == 0) {
			$status_hospitals ='<div class="host-status">
								<p class="pt-2">Tersedia : '.$bed_availability.'</p>
								<p class="pb-2">Tanpa antrean</p>
								</div>';
			$halo = "";
		}else if ($bed_availability != 0 && $queue != 0) {
			$status_hospitals ='<div class="host-status">
								<p class="pt-2">Tersedia : '.$bed_availability.'</p>
								<p class="pb-2">Antri : '.$queue.'</p>
								</div>';
			$halo = "";
		}
		else if ($bed_availability == 0){
			$status_hospitals ='<div class="text-white" style="background-color: #E53E3E; border-radius: 5px;">
								<p class="pt-4 pb-4 font-weight-bold">Penuh !</p>
								</div>';
			$haloo = 'style="border: 4px solid; border-radius: 7px; border-color: #E53E3E;"';
		}

		}


		else{ 
			$phone = $phone;
			$halo = "";
			$disable_cursor = "";

		if ($bed_availability != 0 && $queue == 0) {
			$status_hospitals ='<div class="host-status">
								<p class="pt-2">Tersedia : '.$bed_availability.'</p>
								<p class="pb-2">Tanpa antrean</p>
								</div>';

			$haloo = "";
		}else if ($bed_availability != 0 && $queue != 0) {
			$status_hospitals ='<div class="host-status">
								<p class="pt-2">Tersedia : '.$bed_availability.'</p>
								<p class="pb-2">Antri : '.$queue.'</p>
								</div>';

			$haloo = "";
		}
		else if ($bed_availability == 0){
			$status_hospitals ='<div class="text-white" style="background-color: #E53E3E; border-radius: 5px;">
								<p class="pt-4 pb-4 font-weight-bold">Penuh !</p>
								</div>';
			$haloo = 'style="border: 4px solid; border-radius: 7px; border-color: #E53E3E;"';
		}

		}


		 echo '<div class="hospital-box pt-4 mt-3"'.$haloo.'>
  		              	<div class="row align-items-center">
							<div class="col-sm-9">
								<h4 class="font-weight-bold">'.$hospital_name.'</h4>
								<p class="pt-1">'.$address.'<br>
								<span class="address">'.$info.'</span></p>	
							</div>
							<div class="col-sm-3 text-center">'.$status_hospitals.'
							</div>
						</div>
						<div class="info-box">
							<div class="row">
						  <div class="col-sm-4 mb-2" '.$disable_cursor.'>
						  	<a type="button" class="btn btn-primary btn-block not-allowed '.$halo.'" href="tel:'.$phone.'"><i class="fa fa-phone"></i> '.$phone.'</a>
						  </div>
						  <div class="col-sm-3 ml-auto mb-2">
						  	<a type="button" class="btn btn-outline-primary btn-block not-allowed" target="_blank" href="'.$location.'"><i class="fas fa-map-marker-alt"></i> Lokasi</a>
						  </div>
						  <div class="col-sm-3">
						  	<a type="button" class="btn btn-outline-primary btn-block not-allowed see-detail" id_hospital="'.$id_hospitals.'">Detail <i class="fas fa-arrow-right"></i></a>
						  </div>
						  </div>
						</div>
					</div>';
			}
		}

?>