$( document ).ready(function() {
	
	var activitytodel;
	var notetodel;
	var type;
	var activityNameJs;
	var notifColor;
	var varText;
	
	var activityNameForNotif = $(".activityNameForNotif");
	
	//Initialise month tab
	var monthsTab = { "01" : "Janvier", 
					  "02" : "Février", 
					  "03" : "Mars",
					  "04" : "Avril",
					  "05" : "Mai",
					  "06" : "Juin",
					  "07" : "Juillet",
					  "08" : "Aout",
					  "09" : "Septembre",
					  "10" : "Octobre",
					  "11" : "Novembre",
					  "12" : "Décembre"};
	
	//Get app's base url
	var baseurl = $('#base-url').val();
	
	//Add tooltips to see/del/edit button
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
		
		//Warning alert
		if ($(this).html() < parseInt($("#simple_alert_tl").html())) {
			
			 activityNameJs = $(this).parent().find(activityNameForNotif).html();
			 varText = activityNameJs + " : " + $("#simple_alert_msg").html();
			 notifColor = 'warning';
			 
			 //Critical alert
			 if ($(this).html() < parseInt($("#critical_alert_tl").html())) {
				 varText = activityNameJs + " : " + $("#critical_alert_msg").html();
				 notifColor = 'danger';
			 }
			 
			 //End activity alert
			 if ($(this).html() == 0) {
				 varText = activityNameJs + " : " + $("#end_activity_msg").html();
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
	
	//Whenever the user clicks on the 'more details' btn, display details zone.
	$(".more-details-trigger").on("click", function(){
		if (!$(this).hasClass("zone-displayed")) {
			$(this).next(".more-details-zone").velocity("slideDown", "fast");
			$(this).addClass("zone-displayed");
			$(this).empty().append("Moins de détails ").append($("<span></span>").addClass("glyphicon glyphicon-chevron-up"));
		} else {
			$(this).removeClass("zone-displayed");
			$(this).next(".more-details-zone").velocity("slideUp", "fast");
			$(this).empty().append("Plus de détails ").append($("<span></span>").addClass("glyphicon glyphicon-chevron-down"));
		}
	});
	
	//If the user click on "delete button"
	$(".del-activity").on('click', function(){
		activitytodel = $(this).attr("id").split("-")[1];
		$('#delete-activity-modal').modal('show');
	});
	
	//If the user click on "delete button"
	$(".del-note").on('click', function(){
		notetodel = $(this).attr("id").split("-")[1];
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
	
	function getFullDate(sqldate) {
		
		var sqlEndDate = sqldate.split(" ")[0].split("-");
		
		var sqlEndHour = sqldate.split(" ")[1].split(":");
		
		var fullDate = sqlEndDate[2] + " " + monthsTab[sqlEndDate[1]] + " " + sqlEndDate[0] + " à " + sqlEndHour[0] + "h" + sqlEndHour[1];
		
		return fullDate;
	}
	
});