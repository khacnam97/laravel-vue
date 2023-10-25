$(document).ready(function(){
	//scroll to top
	$(window).scroll(function() {    
		var scroll = $(window).scrollTop();
		
		if (scroll == 0){
			$("#nav-top").css({'background-color' :'#6cb2eb','color' : 'white-space'})
		}

		if( ($(document).height() - $(window).height()) - scroll <50 ){
			$("#btnpositon").css({'background-color' :'white','color' : 'black'})
			$("#btnpositon").show();

		}
		else{
			$("#btnpositon").css({'background-color' :'black','color' : 'white'})
			$("#btnpositon").hide();

		}

	})

	$('#btnpositon').click(function(){
		$('html, body').animate({scrollTop:0}, 'slow');
	})

	$("#scr1").click(function(){
		var elmnt = document.getElementById("contact");
		elmnt.scrollIntoView();
		window.scrollBy(0, 50);
	})
	$("#scr2").click(function(){
		var elmnt = document.getElementById("about");
		elmnt.scrollIntoView();
		window.scrollBy(0, -40);
	})
	$('#scr3').click(function(){
		var elmnt = document.getElementById("topplace");
		elmnt.scrollIntoView();
		window.scrollBy(0, -100);

	})
	$('#createacc').click(function(){
	    $("#myModal").modal("hide");
	    $('#myModal2').modal('show');
	})
	$('#signin').click(function(){
		$('#myModal2').modal('hide');
	    $("#myModal").modal("show");
	})

	
})		

