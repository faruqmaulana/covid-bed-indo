

window.addEventListener('load',() => {

	let params = (new URL(document.location)).searchParams;

	let id_hospt = params.get('id_hospital');
		$.ajax({
				type: 'post',
				url: 'location.php',	
				data: 'id_hospital='+id_hospt,
				success:function(_hospitals_location)
				{	
					$("div[name=location]").html(_hospitals_location);
					console.log(detail);
				},
				error: function (xhr, textStatus, errorThrown) {
			    console.log('Error in API Call!');
			    console.log(xhr);
			    console.log(textStatus);
			    console.log(errorThrown);
			  },
			});
})


