$(document).ready(function(){
	var uri = document.location.href;
	var path = uri.replace(/http:\/\/|https:\/\//g,"");
	var method = path.split("/");
	$('.slideBar li').has('ul').addClass('sub').append('<i class="fa fa-angle-down"></i>');
	$('.slideBar > li > a').each(function(){
		if($(this).hasClass(method[2])){
			$(this).addClass('link-menu-active');
		}
	}).click(function(event){
		event.preventDefault();
		$(this).toggleClass('link-menu-active');
		if($(this).parent().has('ul')){
			$(this).parent().find('ul').slideToggle(400);
		}
	});
});