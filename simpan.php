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
}else if($butt_host == "1"){

	$array_response = json_decode($response,TRUE);
	$hospitals_data = $array_response["hospitals"];
	if(!empty($hospitals_data)){
	foreach ($hospitals_data as $key => $data_host) {
		
		 $id_hospitals = $data_host["id"];
		 $hospital_name = $data_host["name"];
		 $address = $data_host["address"];
		 $phone = $data_host["phone"];
		 $queue = $data_host["queue"];
		 $bed_availability = $data_host["bed_availability"];
		 $info = $data_host["info"];
			
		if ($bed_availability != 0 && $queue == 0 && $phone == null) {
			$status_hospitals ='<div class="host-status">
								<p class="pt-2">Tersedia : '.$bed_availability.'</p>
								<p class="pb-2">Tanpa antrean</p>
								</div>';
			$haloo = '';

			$phone = "Tidak Tersedia";
			$halo = "disabled";
			$disable_cursor = 'style="cursor: not-allowed;"';
		}else if ($bed_availability != 0 && $queue != 0 && $phone == null) {
			$status_hospitals ='<div class="host-status">
								<p class="pt-2">Tersedia : '.$bed_availability.'</p>
								<p class="pb-2">Antri : '.$queue.'</p>
								</div>';
			$haloo = '';
			$phone = "Tidak Tersedia";
			$halo = "disabled";
			$disable_cursor = 'style="cursor: not-allowed;"';
		}
		else if ($bed_availability == 0 && $queue == 0 && $phone == null){
			$status_hospitals ='<div class="text-white" style="background-color: #E53E3E; border-radius: 5px;">
								<p class="pt-4 pb-4 font-weight-bold">Penuh !</p>
								</div>';
			$haloo = 'style="border: 3px solid; border-radius: 7px; border-color: #E53E3E;"';
			$phone = "Tidak Tersedia";
			$halo = "disabled";
			$disable_cursor = 'style="cursor: not-allowed;"';
		}
		else if ($bed_availability != 0 && $queue == 0 && $phone != null) {
			$status_hospitals ='<div class="host-status">
								<p class="pt-2">Tersedia : '.$bed_availability.'</p>
								<p class="pb-2">Tanpa antrean</p>
								</div>';
			$haloo = '';

			$phone = $phone;
			$halo = "";
			$disable_cursor = '';
		}
		else if ($bed_availability != 0 && $queue != 0 && $phone != null) {
			$status_hospitals ='<div class="host-status">
								<p class="pt-2">Tersedia : '.$bed_availability.'</p>
								<p class="pb-2">Antri : '.$queue.'</p>
								</div>';
			$haloo = '';
			$phone = $phone;
			$halo = "";
			$disable_cursor = '';
		}
		else if ($bed_availability == 0 && $queue == 0 && $phone != null){
			$status_hospitals ='<div class="text-white" style="background-color: #E53E3E; border-radius: 5px;">
								<p class="pt-4 pb-4 font-weight-bold">Penuh !</p>
								</div>';
			$haloo = 'style="border: 3px solid; border-radius: 7px; border-color: #E53E3E;"';
			$phone = $phone;
			$halo = "";
			$disable_cursor = '';
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
						  	<a type="button" class="btn btn-outline-primary btn-block not-allowed info-lokasi" id="lokasi" target="_blank" id_hospitall="'.$id_hospitals.'"><i class="fas fa-map-marker-alt"></i> Lokasi</a>
						  </div>
						  <div class="col-sm-3">
						  	<a type="button" class="btn btn-outline-primary btn-block not-allowed see-detail" id_hospital="'.$id_hospitals.'">Detail <i class="fas fa-arrow-right"></i></a>
						  </div>
						  </div>
						</div>
					</div>';
			}
		}else{
			echo'<h4 class="font-weight-bold text-center pt-3">Data Tidak Ditemukan</h4>';
		}
		}


		else if($butt_host == "2"){
			$array_response = json_decode($response,TRUE);
			$hospitals_data = $array_response["hospitals"];
			if(!empty($hospitals_data)){
			foreach ($hospitals_data as $data_host) {
				 //more information about hospital name, address and phone etc.				
				 $id_hospitals = $data_host["id"];
				 $hospital_name = $data_host["name"];
				 $address = $data_host["address"];
				 $phone = $data_host["phone"];

				 //disable phone if null data and add red border if beds is not available
				  echo '<div class="box-hospital-detail" style="border-radius:10px; padding: 24px 30px 20px 30px; box-shadow:0 5px 15px rgba(0,0,0,0.1);">
				  		<h4 style="font-weight:bold;">'.$hospital_name.'</h4>
						<p>'.$address.'</p>
						<div class="row">';

				 if ($phone == null) {
					$phone = "Tidak Tersedia";
					$halo = "disabled";
					$disable_cursor = 'style="cursor: not-allowed;"';

				}

				else{ 
					$phone = $phone;
					$halo = "";
					$disable_cursor = "";

				}

				 //to hold array data
				 $data_host = $data_host["available_beds"];
				 foreach ($data_host as $bed_availability) {
				 
				 $available = $bed_availability["available"];
				 $bed_class = $bed_availability["bed_class"];
				 $room_name = $bed_availability["room_name"];
				 $info = $bed_availability["info"];



				if ($available <= 0) {
					$styleBox ='
					 style="text-align: center;
							border-radius: 5px;
							background: var(--non-covid-box);
							border:2px solid;
							padding:12px;
							border-color: #e53e3e;"';
					$style = 'style="border-color: #e53e3e;"';
					$fontStyle = 'style="color: #e53e3e;"';
				}
				else if($available >= 0){
					$styleBox ='
					 style="text-align: center;
							border-radius: 5px;
							padding:12px;
							background: var(--non-covid-box);"';
					$style = '';
					$fontStyle = '';
				}

				 echo '<div class="col-12 col-sm-4 mb-2">
					    	<div class="non-covid-box" '.$styleBox.'>
							<h3 class="font-weight-bold" '.$fontStyle.'>'.$available.'</h3>
							<p style="margin-bottom:0;">'.$bed_class.'</p>
							<p>'.$room_name.'</p><hr '.$style.'>
							<p style="font-size:12px; margin-bottom:0;">'.$info.'</p>
							</div>
					    </div>
					  ';
		} 
		echo '</div>
					<div class="info-box mt-3">
							<div class="row">
						  <div class="col-sm-4 mb-2" '.$disable_cursor.'>
						  	<a type="button" class="btn btn-primary btn-block not-allowed '.$halo.'" href="tel:'.$phone.'"><i class="fa fa-phone"></i> '.$phone.'</a>
						  </div>
						  <div class="col-sm-3 ml-auto mb-2">
						  	<a type="button" class="btn btn-outline-primary btn-block not-allowed info-lokasi" id="lokasi" target="_blank" id_hospitall="'.$id_hospitals.'"><i class="fas fa-map-marker-alt"></i> Lokasi</a>
						  </div>
						  <div class="col-sm-3">
						  	<a type="button" class="btn btn-outline-primary btn-block not-allowed see-detail" id_hospital="'.$id_hospitals.'">Detail <i class="fas fa-arrow-right"></i></a>
						  </div>
						  </div>
						</div>
					</div>';
		}
	}else{
			echo'<h4 class="font-weight-bold text-center pt-3">Data Tidak Ditemukan</h4>';
	}
	}

?>