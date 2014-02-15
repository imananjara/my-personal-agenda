$( document ).ready(function() {
	
	var activitytodel;
	var notetodel;
	//Get app's base url
	var baseurl = $('#base-url').val();
	
	//If the user click on "delete button"
	$(".del-activity").on('click', function(){
		var activityidstr = $(this).attr("id").split("-");
		activitytodel = activityidstr[1];
		$('#delete-activity-modal').modal('show');
	});
	
	//If the user click on "delete button"
	$(".del-note").on('click', function(){
		var noteidstr = $(this).attr("id").split("-");
		notetodel = noteidstr[1];
		$('#delete-note-modal').modal('show');
	});
	
	//If the user confirm his action, the application delete the activity
	$("#delete-modal-activity-btn").on("click", function(){
		$('#delete-activity-modal').modal('hide');
		location.href = baseurl + "deleteactivity/" + activitytodel;
	});
	
	//If the user confirm his action, the application delete the note
	$("#delete-modal-note-btn").on("click", function(){
		$('#delete-note-modal').modal('hide');
		location.href = baseurl + "deletenote/" + notetodel;
	});
		
	//Notification system
	function notification(type, message) {
	 	$('#notifications').removeClass();
	 	$('#notifications').addClass('alert '+type).html(message);
	 	$('#notifications').slideDown();
	 	setTimeout(function(){ $('#notifications').slideUp(); }, 2000);
	 }
	
});