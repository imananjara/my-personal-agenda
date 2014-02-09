$( document ).ready(function() {
	
	var activitytodel;
	//Get app's base url
	var baseurl = $('#base-url').val();
	
	//If the user click on "delete button"
	$(".del-activity").on('click', function(){
		var activityidstr = $(this).attr("id").split("-");
		activitytodel = activityidstr[1]
		$('#delete-activity-modal').modal('show');
	});
	
	//If the user confirm his action, the application delete the activity
	$("#delete-modal-activity-btn").on("click", function(){
		$('#delete-activity-modal').modal('hide');
		location.href = baseurl + "deleteactivity/" + activitytodel;
	});
		
	//Notification system
	function notification(type, message) {
	 	$('#notifications').removeClass();
	 	$('#notifications').addClass('alert '+type).html(message);
	 	$('#notifications').slideDown();
	 	setTimeout(function(){ $('#notifications').slideUp(); }, 2000);
	 }
	
});