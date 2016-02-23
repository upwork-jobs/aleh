/**
 * custom.js
 *
 * custom js for theme
 */

(function($) {
    "use strict";
	
	jQuery('#donatebtn-scrolltofixed').scrollToFixed();
    	
	jQuery('.btn-donate-amount').click(function(){
		jQuery('.donate-amount').val(jQuery(this).val());
	});
	
	
	jQuery('.adopt-a-child .pop-up-donate-icon').click(function(e){
		e.preventDefault();
		var child_id = jQuery(this).attr('href');
		var id_array  = child_id.split('#');
		jQuery('#form-donate-amount_'+id_array[1]).submit();
	});
	



})(jQuery);