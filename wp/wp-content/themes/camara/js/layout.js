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
		//$('.dropdown').msDropDown();

		$('.dropdown').change(function () {
			//alert($(this).val());
			$('.dropdown-content').fadeOut();
			if ($(this).val() == 'none'){
				return false;
			}
			var id = '#' + $(this).val();
			
			$(id).fadeIn();

		});
		
		$('.dropdown').change();
	},
	init: function(){
		
		Site.ddpng();
		Site.combos();
		//Site.nav();
		
		$(document.body).addClass('hasJS');

	}
};

$(document).ready(Site.init);