	//display all province data
	$.ajax({
		type:'post',
		url: 'province.php',
		success:function(province_data)
		{
			$("select[name=province]").html(province_data);

		}
	});

	//must be choose a province firstly to unlock next option
	$("select[name=province]").on("change", function(){
		let id_prov = $("option:selected", this).attr("id_province");
		$.ajax({
			type:'post',
			url: 'district.php',
			data :'province_id='+id_prov,
			success:function(province)
			{
			$("select[name=district]").html(province);
			$("select").removeAttr("disabled");
			$("select").removeClass("not-allowed");
			}

	});

	});
	// district get id
	$("select[name=district]").on("change", function(){
		let id_diss = $("option:selected", this).attr("id_district");
		 $("a").removeClass("not-allowed");
		$("a").removeClass("disabled");
	});

	//remove disabled search button
	// display all hospitals with specific district
		$("a[type=button]").on("click", function(){
		let prov = $("option:selected","select[name=province]").attr("id_province")
		let dist = $("option:selected","select[name=district]").attr("id_district")
		let button = $("input[name=inlineRadioOptions]:checked").attr("id_button")
		window.location.href = `hospitals.html?provinceid=${prov}&city=${dist}&type=${button}`
		});


	

