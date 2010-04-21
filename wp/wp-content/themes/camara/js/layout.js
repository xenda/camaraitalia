/*
 * Site.js
 */
Site = {
	ddpng: function(){
		if (document.ie) {
			if (document.ie.version == 6) {
				
				/*
				DD_belatedPNG.fix('#head-logo, #head-contact, #branding, #banner');
				DD_belatedPNG.fix('#nav .searchform input, #nav .searchform button, .post-content #sendbutton');
				DD_belatedPNG.fix('.home #container .bg, #content h2, .size1of3 .img .t, .size1of3 .img .b');
				DD_belatedPNG.fix('.bg-top, .bg-bottom, #content');
				*/
				
				$(document.body).addClass('ddpng-ready');
			}
		}
	},
	nav: function(){
		if (document.ie) {
			if (document.ie.version == 6) {
				$('#nav li')
					.bind('mouseenter', function(){
						$(this).addClass('hover');
					})
					.bind('mouseleave', function(){
						$(this).removeClass('hover');
					});
			}
		}
	},
	combos: function(){
		
		$('#main-combo').msDropDown();
		$('#sector').msDropDown();
		$('#month').msDropDown();
		$('#alfabetico').msDropDown();
	},
	init: function(){
		
		Site.ddpng();
		Site.combos();
		
		$(document.body).addClass('hasJS');

	}
};

$(document).ready(Site.init);

function oportunidades(combo) {
	
	var total = combo.length - 1;
	var int = 1;

	for(int=1; int <= total; int++){
		document.getElementById(combo[int].value).style.display="none";
	}

	if (combo.value != 'none') {
		document.getElementById(combo.value).style.display="block";
	}
	
}