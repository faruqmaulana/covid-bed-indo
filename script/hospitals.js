window.addEventListener('load',() => {

	let params = (new URL(document.location)).searchParams;

	let prov = params.get('provinceid');
	let dist = params.get('city');
	let button = params.get('type');

		$.ajax({
		type: 'post',
		url: 'simpan.php',	
		data: 'province_host='+prov+'&district_host='+dist+'&button_host='+button,
		success:function(hospitals_data)
		{	
			if (hospitals_data === ""){
				$('#wait').hide();
				$("div[name=hospitals]").html('<h4 class="font-weight-bold text-center pt-3">Data Tidak Ditemukan</h4>');
			}else{
			
			$("h5[name=waiter]").hide();
			$('#wait').hide();
			$("div[name=hospitals]").html(hospitals_data);
			$("#id_hospit").on('click','.see-detail', function(){
			let id_hospt = $(this).attr("id_hospital");
			window.location.href = `hospitals_detail.html?id_host=${id_hospt}&type=${button}`
		});
			$("#id_hospit").on('click','.info-lokasi', function(){
			let id_hospt = $(this).attr("id_hospitall");
			var url = `blink_page.html?id_hospital=${id_hospt}`
			window.open(url, '_blank');
		});
		}
		},
		error: function (xhr, textStatus, errorThrown) {
        console.log('Error in API Call!');
        console.log(xhr);
        console.log(textStatus);
        console.log(errorThrown);
      },
	});
	
})
