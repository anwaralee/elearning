		$(document).ready(function(){
				$('.forms').css("display","none");	
				
			});
			
			
	function show_content(divName){
		$(".forms").css("display","none");
		
		$("#"+divName).fadeIn('1500');
		 $('html, body').stop().animate({
                        scrollTop: $("#"+divName).offset().top
                    }, 700,'easeInOutExpo');
		}