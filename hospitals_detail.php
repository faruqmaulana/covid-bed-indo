<?php
$d_host = $_POST["id_hostp"];
$b_host = $_POST["button_hostp"];

$curl = curl_init();

curl_setopt_array($curl, array(
	CURLOPT_URL => "https://rs-bed-covid-api.vercel.app/api/get-bed-detail?hospitalid=".$d_host."&type=".$b_host,
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
	echo "Server down mohon tunggu sesaat.";
}else{
	$array_response = json_decode($response,TRUE);
	$hospital_detail = $array_response;
	$hospitalname = $hospital_detail["data"]["name"];
	$address = $hospital_detail["data"]["address"];
	$phone = $hospital_detail["data"]["phone"];
	$count_number = 1;

	if($phone == "hotline tidak tersedia"){
		$halo = "disabled";
		$disable_cursor = 'style="cursor: not-allowed;"';
	}
	else if ($phone != "hotline tidak tersedia"){
		$halo = "";
		$disable_cursor = '';
	}


	echo '<h3 class="font-weight-bold pt-4">'.$hospitalname.'</h3>
    <p class="address">'.$address.'</p>
    <a type="button" class="btn btn-outline-primary btn-block not-allowed '.$halo.'" href="tel:'.$phone.'" '.$disable_cursor.' style="color: var(--btn-bg-main); border-color: var(--btn-bg-main);"><i class="fa fa-phone"></i> '.$phone.'</a><p><span class="line"></span></p>';
	$beds = $hospital_detail["data"]["bedDetail"];

		foreach ($beds as $bed) {
  		$time = $bed["time"];
  		$bedtitle = $bed["stats"]["title"];
  		$bedavailable = $bed["stats"]["bed_available"];
  		$bedempty = $bed["stats"]["bed_empty"];
  		$queue = $bed["stats"]["queue"];
  		$count_number += 1;

  		echo '<div class="panel">
		        <div class="panel-heading" role="tab" id="heading'.$count_number.'" style="background-color:var(--panel-heading);">
		          <h4 class="panel-title">
		        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse'.$count_number.'" aria-expanded="true" aria-controls="collapseOne" class="font-weight-bold" style="padding-right:40px;">'.$bedtitle.'<br>
		          <span>Diupdate pada : '.$time.' </span>
		        </a>
		      </h4>
		        </div>
		        <div id="collapse'.$count_number.'" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading'.$count_number.'">
		          <div class="panel-body" style="background-color:var(--main-color);">
		          	<div class="col-sm-12">
		          	<div class="box-information d-flex justify-content-around text-center" style="font-size: 0.8em;">
		          		<div class="box-1 mb-2 mr-2 ml-2">
		          			<p class="pt-2">Tempat Tidur</p>
		          			<h5>'.$bedavailable.'</h5>
		          		</div>
		          		<div class="box-2 mb-2 mr-2 ml-2">
		          			<p class="pt-2">Kosong</p>
		          			<h5>'.$bedempty.'</h5>
		          		</div>
		          		<div class="box-3 mb-2 mr-2 ml-2">
		          			<p class="pt-2">Antrean</p>
		          			<h5>'.$queue.'</h5>
		          		</div>
		          	</div>
		          </div>
		        </div>
		      </div>
		      <!-- end of panel -->
		    </div>';

		}
	
}
?>