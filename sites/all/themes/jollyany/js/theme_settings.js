jQuery(document).ready(function ($) {

	$("#edit-contactmap .fieldset-wrapper").hide();
	$("#edit-contactmap .fieldset-legend").click(function(){
		$("#edit-contactmap .fieldset-wrapper").slideToggle("slow");
		$(this).toggleClass("active");
		$('#edit-contactmap .plus').toggleClass('minus');
	});
	
	$("#edit-seo .fieldset-wrapper").hide();
	$("#edit-seo .fieldset-legend").click(function(){
		$("#edit-seo .fieldset-wrapper").slideToggle("slow");
		$(this).toggleClass("active");
		$('#edit-seo .plus').toggleClass('minus');
	});
	
	$("#edit-page .fieldset-wrapper").hide();
	$("#edit-page .fieldset-legend").click(function(){
		$("#edit-page .fieldset-wrapper").slideToggle("slow");
		$(this).toggleClass("active");
		$('#edit-page .plus').toggleClass('minus');
	});
	
	$("#edit-header .fieldset-wrapper").hide();
	$("#edit-header .fieldset-legend").click(function(){
		$("#edit-header .fieldset-wrapper").slideToggle("slow");
		$(this).toggleClass("active");
		$('#edit-header .plus').toggleClass('minus');
	});
	
	$("#edit-footer .fieldset-wrapper").hide();
	$("#edit-footer .fieldset-legend").click(function(){
		$("#edit-footer .fieldset-wrapper").slideToggle("slow");
		$(this).toggleClass("active");
		$('#edit-footer .plus').toggleClass('minus');
	});
	
	$("#edit-projects .fieldset-wrapper").hide();
	$("#edit-projects .fieldset-legend").click(function(){
		$("#edit-projects .fieldset-wrapper").slideToggle("slow");
		$(this).toggleClass("active");
		$('#edit-projects .plus').toggleClass('minus');
	});
	
	$("#edit-blog .fieldset-wrapper").hide();
	$("#edit-blog .fieldset-legend").click(function(){
		$("#edit-blog .fieldset-wrapper").slideToggle("slow");
		$(this).toggleClass("active");
		$('#edit-blog .plus').toggleClass('minus');
	});
	
	$("#edit-contact .fieldset-wrapper").hide();
	$("#edit-contact .fieldset-legend").click(function(){
		$("#edit-contact .fieldset-wrapper").slideToggle("slow");
		$(this).toggleClass("active");
		$('#edit-contact .plus').toggleClass('minus');
	});
	
	$("#edit-layout-style .fieldset-wrapper").hide();
	$("#edit-layout-style .fieldset-legend").click(function(){
		$("#edit-layout-style .fieldset-wrapper").slideToggle("slow");
		$(this).toggleClass("active");
		$('#edit-layout-style .plus').toggleClass('minus');
	});
	
	$("#edit-header-style .fieldset-wrapper").hide();
	$("#edit-header-style .fieldset-legend").click(function(){
		$("#edit-header-style .fieldset-wrapper").slideToggle("slow");
		$(this).toggleClass("active");
		$('#edit-header-style .plus').toggleClass('minus');
	});
	
	$("#edit-footer-style .fieldset-wrapper").hide();
	$("#edit-footer-style .fieldset-legend").click(function(){
		$("#edit-footer-style .fieldset-wrapper").slideToggle("slow");
		$(this).toggleClass("active");
		$('#edit-footer-style .plus').toggleClass('minus');
	});
	
	$("#edit-color .fieldset-wrapper").hide();
	$("#edit-color .fieldset-legend").click(function(){
		$("#edit-color .fieldset-wrapper").slideToggle("slow");
		$(this).toggleClass("active");
		$('#edit-color .plus').toggleClass('minus');
	});
	
	$("#edit-background .fieldset-wrapper").hide();
	$("#edit-background .fieldset-legend").click(function(){
		$("#edit-background .fieldset-wrapper").slideToggle("slow");
		$(this).toggleClass("active");
		$('#edit-background .plus').toggleClass('minus');
	});
	
	$("#edit-css .fieldset-wrapper").hide();
	$("#edit-css .fieldset-legend").click(function(){
		$("#edit-css .fieldset-wrapper").slideToggle("slow");
		$(this).toggleClass("active");
		$('#edit-css .plus').toggleClass('minus');
	});
  
});