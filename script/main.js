	//theme
	function toggleTheme(){
		if (localStorage.getItem("covid-theme") !== null){
			if(localStorage.getItem("covid-theme") === "dark"){
				$("body").addClass("dark");
				$("table").addClass("table-dark");
			}
			else{
				$("body").removeClass("dark");
				$("table").removeClass("table-dark");
			}
		}
		updateIcon();
	}
	toggleTheme();

	$(".toggle-theme").on("click", function(){
		$("body").toggleClass("dark");
		if($("body").hasClass("dark")){
			localStorage.setItem("covid-theme","dark");
		}else{
			localStorage.setItem("covid-theme","light");
		}
		updateIcon();
	});  
	function updateIcon(){
		if($("body").hasClass("dark")){
			$(".toggle-theme i").removeClass("fa-moon");
			$(".toggle-theme i").addClass("fa-sun");
		}
		else{
			$(".toggle-theme i").removeClass("fa-sun");
			$(".toggle-theme i").addClass("fa-moon");	
		}
	}