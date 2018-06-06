var main_Cl_element = 0;

jQuery(document).ready(function(){
	
	var all_divs = jQuery('.category-item');
	
	if(all_divs.length > 5){
		jQuery('#left_route').show();
		jQuery('#right_route').show();
	}

	if (document.body.offsetWidth < 1000) {
		jQuery('#under_route_categories').css('width', (all_divs.length*124)+'px');

		jQuery('#right_route').click(function(){
			if(main_Cl_element < parseInt(all_divs.length-5)){
				jQuery('.route_categories').css('overflow', 'hidden');
				main_Cl_element += 5;
				
				jQuery('#under_route_categories').animate({
					marginLeft: '-=620px'
				}, 900);
			}
		});

		jQuery('#left_route').click(function(){
			if(main_Cl_element > 0){
				jQuery('.route_categories').css('overflow', 'hidden');
				main_Cl_element -= 5;

				jQuery('#under_route_categories').animate({
					marginLeft: '+=620px'
				}, 900);
			}
		});
	}
	else {
		jQuery('#under_route_categories').css('width', (all_divs.length*175)+'px');

		jQuery('#right_route').click(function(){
			if(main_Cl_element < parseInt(all_divs.length-5)){
				jQuery('.route_categories').css('overflow', 'hidden');
				main_Cl_element += 5;
				
				jQuery('#under_route_categories').animate({
					marginLeft: '-=850px'
				}, 900);
			}
		});

		jQuery('#left_route').click(function(){
			if(main_Cl_element > 0){
				jQuery('.route_categories').css('overflow', 'hidden');
				main_Cl_element -= 5;

				jQuery('#under_route_categories').animate({
					marginLeft: '+=850px'
				}, 900);
			}
		});
	}
});