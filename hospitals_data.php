<?php
// $id_prov = $_POST["prov_id"];
// $id_dist = $_POST["dist_id"];
// $id_butt = $_POST["but_id"];
$url_stringg = $_POST["testt"];
$curl = curl_init();

curl_setopt_array($curl, array(
	CURLOPT_URL => 
	"https://rs-bed-covid-api.vercel.app/api/get-hospitals".$url_stringg,
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
	$array_response = json_decode($response,true);
	$hospt = $array_response["hospitals"];


	foreach ($hospt as $key => $data_hospt) {

		 $hospital_name = $data_hospt["name"];
		 $address = $data_hospt["address"];
		 $phone = $data_hospt["phone"];
		 $queue = $data_hospt["queue"];
		 $bed_availability = $data_hospt["bed_availability"];
		 $info = $data_hospt["info"];

		 if ($info == "0") {
		 	echo "Tanpa Antrean";
		 }
		 elseif ($bed_availability == "0") {
		 	echo "Penuh !";
		 }

		echo '<div class="hospital-box pt-4">
  		              	<div class="d-flex justify-content-between">
							<div class="box-1">
								<h5 class="font-weught-bold">'.$hospital_name.'</h5>
								<p>'.$address.'<br>
								<span>'.$info.'</span></p>	
							</div>
							<div class="box-2 mt">
								<p>Tersedia : '.$bed_availability.'</p>
								<p>'.$queue.'</p>
							</div>
						</div>
						<div class="d-flex">
						  <div class="mr-auto">
						  	<a type="button" class="btn btn-primary btn-block not-allowed" href="tel:'.$phone.'">'.$phone.'</a>
						  </div>
						  <div class="lokakasi pr-2">
						  	<a type="button" class="btn btn-primary btn-block not-allowed">Lokasi</a>
						  </div>
						  <div class="button">
						  	<a type="button" class="btn btn-primary btn-block not-allowed">Detail</a>
						  </div>
						</div>
					</div>';


		//---------------PERCOBAAN 1------------------

		// echo "<h1 class=""font-weught-bold mb-3"">$hospital_name</h1>
		// 			<span class=""cari""><a type=""button"" class=""btn btn-primary btn-block not-allowed"" href=""index.html"">Kembali Ke Pencarian</a></span>
		// 			<div class=""hospital-box pt-4"">
  // 		              	<div class=""d-flex justify-content-between"">
		// 					<div class=""box-1"">
		// 						<h5 class=""font-weught-bold"">RS Muhammadiyah Babat</h5>
		// 						<p>Jl. KH. Ahmad Dahlan No. 14 Babat, Lamongan<br>
		// 						<span>Diupdate 58 menit yang lalu</span></p>	
		// 					</div>
		// 					<div class=""box-2 mt"">
		// 						<p>Tersedia : 4</p>
		// 						<p>Tanpa Antrean</p>
		// 					</div>
		// 				</div>
		// 				<div class=""d-flex"">
		// 				  <div class=""mr-auto"">
		// 				  	<a type=""button"" class=""btn btn-primary btn-block not-allowed"" href=""tel:08113222440"">08113222440</a>
		// 				  </div>
		// 				  <div class=""lokakasi pr-2"">
		// 				  	<a type=""button"" class=""btn btn-primary btn-block not-allowed"">Lokasi</a>
		// 				  </div>
		// 				  <div class=""button"">
		// 				  	<a type=""button"" class=""btn btn-primary btn-block not-allowed"">Detail</a>
		// 				  </div>
		// 				</div>
		// 			</div>";



		//---------------PERCOBAAN 2------------------
	// 	// echo '<div class="d-flex justify-content-between">
		// 					<div class="box-1">
		// 						<h5 class="font-weught-bold">RS Muhammadiyah Babat</h5>
		// 						<p>Jl. KH. Ahmad Dahlan No. 14 Babat, Lamongan<br>
		// 						<span>Diupdate 58 menit yang lalu</span></p>	
		// 					</div>
		// 					<div class="box-2 mt">
		// 						<p>Tersedia : 4</p>
		// 						<p>Tanpa Antrean</p>
		// 					</div>
		// 				</div>
		// 				<div class="d-flex">
		// 				  <div class="mr-auto">
		// 				  	<a type="button" class="btn btn-primary btn-block not-allowed" href="tel:08113222440">08113222440</a>
		// 				  </div>
		// 				  <div class="lokakasi pr-2">
		// 				  	<a type="button" class="btn btn-primary btn-block not-allowed">Lokasi</a>
		// 				  </div>
		// 				  <div class="button">
		// 				  	<a type="button" class="btn btn-primary btn-block not-allowed">Detail</a>
		// 				  </div>
		// 				</div>';

		// echo "<div class="'d-flex justify-content-between'"><div class="'box-1'"><h5 class="'font-weught-bold'">";
		// echo $hospital_name;
		// echo "</h5><p>";
		// echo $address;
		// echo "<br><span>";
		// echo $info;
		// echo "</span></p></div>
		// 					<div class="'box-2 mt'">
		// 						<p>Tersedia : 4</p>
		// 						<p>Tanpa Antrean</p>
		// 					</div>
		// 				</div>
		// 				<div class="'d-flex'">
		// 				  <div class="'mr-auto'">
		// 				  	<a type="'button'" class="'btn btn-primary btn-block not-allowed'" href=tel:";
		// echo $phone;
		// echo ">08113222440</a>
		// 				  </div>
		// 				  <div class="'lokakasi pr-2'">
		// 				  	<a type="'button'" class="'btn btn-primary btn-block not-allowed'">Lokasi</a>
		// 				  </div>
		// 				  <div class="'button'">
		// 				  	<a type="'button'" class="'btn btn-primary btn-block not-allowed'">Detail</a>
		// 				  </div>
		// 				</div>";




		// echo "<div col-md-6 id_district='".$data_hospt["id"]."'>";
		// echo $hospital_name = $data_hospt["name"];
		// echo $address = $data_hospt["address"];
		// echo $address = $data_hospt["phone"];
		// echo $address = $data_hospt["queue"];
		// echo $address = $data_hospt["bed_availability"];
		// echo $address = $data_hospt["info"];
		// echo "</div>";

	}
	
}
?>
