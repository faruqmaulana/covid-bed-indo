window.addEventListener('load',() => {

	let params = (new URL(document.location)).searchParams;

	let id_hospt = params.get('id_host');
	let button = params.get('type');

		$.ajax({
				type: 'post',
				url: 'hospitals_detail.php',	
				data: 'id_hostp='+id_hospt+'&button_hostp='+button,
				success:function(detail)
				{	
					$('#wait').hide();
					$("div[name=detail-host]").html(detail);
				},
				error: function (xhr, textStatus, errorThrown) {
			    console.log('Error in API Call!');
			    console.log(xhr);
			    console.log(textStatus);
			    console.log(errorThrown);
			  },
			});
})


