$(document).ready(function(){
	$(window).scroll(function(){   
    if(window.pageYOffset > 150){
      $(".home header").addClass("affix");
    }else{
      $(".home header").removeClass("affix");
    }
  });	
  /**
   * TypeJS
   */
	if($(".forPeople").length > 0) {
		var typed = new Typed(".forPeople", {
	    strings: lang.typed,
	    smartBackspace: true,
	    startDelay: 1500,
	    typeSpeed: 100,
	    backSpeed: 50,
	    backDelay: 1000,
	    loop: true
	  });  
	}     
	/**
	* Testimonials
	*/         
	if($(".testimonials").length > 0) {
		$(".testimonials").owlCarousel({
			items: 3,
			autoplay: true,
			loop: true,
			autoplayTimeout: 4000,
			itemElement: 'testimonial-item'
		});
	}
	$(".form-group i.fa-eye").click(function(e){
		e.preventDefault();
		var fg = $(this).parent(".form-group");
		if($(this).hasClass("active")){
			fg.find("input[name=password]").attr("type", "password");
			$(this).removeClass("active");		
		}else{
			fg.find("input[type=password]").attr("type", "text");
			$(this).addClass("active");			
		}
	});
	$("#show-language").click(function(e){
		e.preventDefault();
		$(".langs").fadeToggle();
	});	
	$(".sidebar-collapse").click(function(e){
		e.preventDefault();
		
		if($(window).width() < 600){
			$(".sidebar").toggleClass('fixed');
		} else {
			$("body").toggleClass("compact");
		}

		if($("body").hasClass("compact")){
			var date = new Date();
			date.setDate(date.getDate() + 10);
			document.cookie = "menu.collapsed = 1; expires ="+date;	
		}else{
			var date = new Date();
			date.setDate(date.getDate() - 10);
			document.cookie = "menu.collapsed =; expires ="+date;
		}

	});
	if(getCookie("menu.collapsed") && $(".sidebar-collapse").length > 0){
		$("body").addClass("compact");	
	}
	$('.pricing-container button[data-pricing]').click(function(){
		$('.pricing-container button[data-pricing]').removeClass('btn-primary').removeClass('btn-light').removeClass('active');
		$(this).removeClass('btn-light').addClass('active');
	});
	$('[data-trigger=darkmode]').click(function(e){
		e.preventDefault();
			const d = new Date();
			d.setTime(d.getTime() + (30*24*60*60*1000));
			let expires = "expires="+ d.toUTCString();
			document.cookie = 'darkmode' + "=1;" + expires + ";path=/";
			$('body').addClass('dark');
			$('html').attr('data-scheme', 'dark');
			$(this).addClass('d-none');
			$('[data-trigger=lightmode]').removeClass('d-none');
	});

	$('[data-trigger=lightmode]').click(function(e){
		e.preventDefault();
			document.cookie = "darkmode=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
			$('body').removeClass('dark');
			$('html').removeAttr('data-scheme');
			$(this).addClass('d-none');
			$('[data-trigger=darkmode]').removeClass('d-none');
	});
});
function getCookie(name) {
  var value = "; " + document.cookie;
  var parts = value.split("; " + name + "=");
  if (parts.length == 2) return parts.pop().split(";").shift();
}