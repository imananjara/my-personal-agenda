$( document ).ready(function() {
	
	var activitytodel;
	var notetodel;
	var type;
	var activityNameJs;
	var notifColor;
	var varText;
	
	var activityNameForNotif = $(".activityNameForNotif");
	
	//Get app's base url
	var baseurl = $('#base-url').val();
	
	//Add tooltips to del/edit button
	$(".del-activity").tooltip({
		title: 'Supprimer cette activite'
	});
	
	$(".edit-activity").tooltip({
		title: 'Editer cette activite'
	});
	
	$(".edit-note").tooltip({
		title: 'Editer cette note'
	});
	
	$(".del-note").tooltip({
		title: 'Supprimer cette note'
	});
	
	//Add tooltip to the progress bar
	$(".progress").each(function(){
		$(this).tooltip({
			title: $(this).children(".activityPercentDone").html(),
			placement: 'right'
		});
	});
	
	//Notification system : display a notification when the remaining time is under that 1 day (updatable)
	$(".leftTimeSeconds").each(function(){
		
		if ($(this).html() < 86400) {
			
			 activityNameJs = $(this).parent().find(activityNameForNotif).html();
			 varText = 'L\'activite "' + activityNameJs + '" arrive bientot a son terme (moins de 1 jour restant)';
			 notifColor = 'warning';
			 
			 if ($(this).html() < 43200) {
				 varText = 'Attention, il reste moins de 12 heures pour terminer l\'activite : "' + activityNameJs + '"';
				 notifColor = 'danger';
			 }
			 
			 if ($(this).html() == 0) {
				 varText = 'L\'activite "' + activityNameJs + '" est terminee';
				 notifColor = 'info';
			 }
			 
			 $('.bottom-right').notify({
				    message: {text:  varText},
			 		closable: false,
			 		fadeOut: { enabled: true, delay: 6000 },
			 		type: notifColor
				  }).show(); // for the ones that aren't closable and don't fade out there is a .hide() function.
			} 
	});
	
	
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
	
});