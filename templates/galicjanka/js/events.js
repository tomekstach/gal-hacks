var main_EV_element = 0;

jQuery(document).ready(function(){
	
	var all_divs = jQuery('.event-item');
	
	if (document.body.offsetWidth < 768) {
		if(all_divs.length > 1){
			jQuery('#left_route').show();
			jQuery('#right_route').show();
		}
		
		jQuery('.event-item a').click(function(){
			return false;
		});
	
		jQuery('#under_route_events').css('width', (all_divs.length*320)+'px');
		main_EV_element = all_divs.length-1;
		jQuery('#under_route_events').animate({
			marginLeft: '-='+ (main_EV_element*320) +'px'
		}, 900);

		jQuery('#right_route').click(function(){
			if(main_EV_element < parseInt(all_divs.length-1)){
				jQuery('.route_events').css('overflow', 'hidden');
				main_EV_element += 1;
				
				jQuery('#under_route_events').animate({
					marginLeft: '-=320px'
				}, 900);
			}
		});

		jQuery('#left_route').click(function(){
			if(main_EV_element > 0){
				jQuery('.route_events').css('overflow', 'hidden');
				main_EV_element -= 1;

				jQuery('#under_route_events').animate({
					marginLeft: '+=320px'
				}, 900);
			}
		});
	}
	else if (document.body.offsetWidth < 1000) {
		if(all_divs.length > 3){
			jQuery('#left_route').show();
			jQuery('#right_route').show();
		}
		
		jQuery('#under_route_events').css('width', (all_divs.length*222)+'px');
		main_EV_element = all_divs.length-3;
		jQuery('#under_route_events').animate({
			marginLeft: '-='+ ((main_EV_element*222)-11) +'px'
		}, 900);

		jQuery('#right_route').click(function(){
			if(main_EV_element < parseInt(all_divs.length-3)){
				jQuery('.route_events').css('overflow', 'hidden');
				main_EV_element += 1;
				
				jQuery('#under_route_events').animate({
					marginLeft: '-=222px'
				}, 900);
			}
		});

		jQuery('#left_route').click(function(){
			if(main_EV_element > 0){
				jQuery('.route_events').css('overflow', 'hidden');
				main_EV_element -= 1;

				jQuery('#under_route_events').animate({
					marginLeft: '+=222px'
				}, 900);
			}
		});
	}
	else {
		if(all_divs.length > 4){
			jQuery('#left_route').show();
			jQuery('#right_route').show();
		}
		
		jQuery('#under_route_events').css('width', (all_divs.length*222)+'px');
		main_EV_element = all_divs.length-4;
		jQuery('#under_route_events').animate({
			marginLeft: '-='+ (main_EV_element*222) +'px'
		}, 900);

		jQuery('#right_route').click(function(){
			if(main_EV_element < parseInt(all_divs.length-4)){
				jQuery('.route_events').css('overflow', 'hidden');
				main_EV_element += 1;
				
				jQuery('#under_route_events').animate({
					marginLeft: '-=222px'
				}, 900);
			}
		});

		jQuery('#left_route').click(function(){
			if(main_EV_element > 0){
				jQuery('.route_events').css('overflow', 'hidden');
				main_EV_element -= 1;

				jQuery('#under_route_events').animate({
					marginLeft: '+=222px'
				}, 900);
			}
		});
	}
});