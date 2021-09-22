<!DOCTYPE html>
<html lang="en" >
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>covid bed indo</title>
	<!-- bootstrap css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- main css -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">

</head>
<body style="background-color:var(--main-color);">

<section class="d-flex align-items-center" style="min-height: 100vh;">
	<div class="container">
		<form method="post">
			<div class="row">
				<div class="col-sm-8 offset-sm-2">
					<h1 class="font-weight-bold mb-3 text-center"> Tempat Tidur Rumah Sakit  </h1>
					 <div class="form-group">
					   <label for="provinsi" class="font-weight-bold">Pilih Provinsi</label>
					   <select class="form-control" name="province">
					   <option>Silahkan Pilih Provinsi Terlebih Dahulu...</option>
					   </select>
					</div>
				
					 <div class="form-group">
					   <label for="kabupaten" class="font-weight-bold">Pilih Kabupaten / Kota</label>
					   <select disabled class="form-control not-allowed" name="district">
					   <option>Silahkan Pilih Provinsi Terlebih Dahulu...</option>
					   </select>
					</div>

					<!-- --------------------Radio Button-------------------- -->
					<div class="d-flex justify-content-start">
					<p>Pilih tempat tidur :&nbsp;</p>
					<div class="radio-button-form">
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1" id_button="1" checked>
							<label class="form-check-label" for="inlineRadio1">Covid 19</label>
						</div>
						<div class="form-check form-check-inline ">
						  	<input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2" id_button="2">
							<label class="form-check-label" for="inlineRadio2">Non-Covid 19</label>
							</div>
						</div>
					</div>
					<span class="cari"><a type="button" class="btn btn-primary btn-block not-allowed disabled">Cari</a></span>
					<div name="amjing"></div>
				</div>
			</div>
		</form>
	</div>			
</section>


<footer class="text-center p-1">
	<p class="font-weight-bold"><i class="fab fa-github"></i> &nbsp;
		<a href="https://github.com/faruqmaulana/covid-bed-indo" style="color:var(--black);">Github Repository</a>
		<span style="font-weight: 300; color:var(--slash-color-main);"> | </span>
		<a href="https://github.com/satyawikananda/rs-bed-covid-indo-api" style="color:var(--black);">API Source</a>
	</p>	
</footer>

<!-- Theme -->

  <div class="toggle-theme">
    <i class="fas "></i>
  </div>

<!-- Akhir Theme -->




<!-- jquery js -->
<script src="script/jquery.min.js"></script>
<!-- popper js -->
<script src="script/popper.min.js"></script>  
<!-- bootstrap js -->
<script src="script/bootstrap.min.js"></script>
<!-- main js -->
<script src="script/main.js"></script> 
<script src="script/provinces.js"></script> 
</body>
</html>