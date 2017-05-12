jQuery(document).ready(function( $ ) {

    $('.select').chosen();
    
    $('.status_filter').change(function(){
	$.ajax({
	    url : window.location.href,
	    data: {
		status: this.value
	    },
	    method: 'POST',
	    success : function(data) {
		$( ".positions_table" ).remove();		
		$('.positions_table_wrapper').append(data);
	    }
	})
    });

});