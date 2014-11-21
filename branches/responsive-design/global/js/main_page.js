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
	$(".del-activity").tooltip({
		title: 'Supprimer cette activité'
	});
	
	$(".edit-activity").tooltip({
		title: 'Editer cette activité'
	});
	
	$(".edit-note").tooltip({
		title: 'Editer cette note'
	});
	
	$(".del-note").tooltip({
		title: 'Supprimer cette note'
	});
	
	$('.see-activity').tooltip({
		title: 'Voir cette activité'
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
	
	//If the user click on "see activity" button, create an activity view
	$(".see-activity").on('click', function(){
		
		$("#activity-modal-title").html("Fiche de l\'activité : " + $(this).parent().find(".activityNameForNotif").html());
		
		//Clean the activity modal body
		$("#activity-modal-content").empty();
		
		//Link to the edition page
		$("#activity-edition-link").attr("href", baseurl + "activity/" + $(this).parent().find(".activityIdentifiant").html());
		
		//Main informations
		$("#activity-modal-content").append($("<p></p>").html("Description : <strong>" + $(this).parent().find(".activityDescription").html() + "</strong>"));
		$("#activity-modal-content").append($("<p></p>").html("Date et heure de fin : <strong> Le " + getFullDate($(this).parent().find(".activityEndDate").html()) + "</strong>"));
		$("#activity-modal-content").append($("<p></p>").html("Complété à : <strong>" + $(this).parent().find(".activityPercentDone").html().split(" : ")[1] + "</strong>"));
		
		//Comments
		var activityCommentary = $(this).parent().find(".activityCommentary").html();
		
		if (activityCommentary != "") {
			
			$("#activity-modal-content").append($("<p></p>").html("Vous avez écrit un commentaire sur cette activité :"));
			$("#activity-modal-content").append($("<div></div>").addClass("well").html(activityCommentary));
		}
		
		$('#activity-modal').modal('show');
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