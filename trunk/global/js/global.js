//Handle AJAX errors
$( document ).ajaxError(function( event, jqxhr, settings, exception ) {
	//Session failed
    if ( jqxhr.status== 401 ) {
    	location.href = location.pathname;
    }
});