$(function () {

    // TinyNav.js 1
	$('#menu-main-menu').tinyNav({});	  
	$('#menu-testing-menu').tinyNav({});
	  
	$('#myTab a:last').tab('show'); 
	$('#myTab a').click(function (e) {
		e.preventDefault();
		$(this).tab('show');
	})

});

if ($(window).width() > 800) tinyscrollH();

function tinyscrollH(){
    $('#scrollbar1 .viewport').height($(window).height()-100);
    $('#scrollbar1 .scrollbar').height($(window).height()-100);
    $('#scrollbar1').tinyscrollbar();
    }
