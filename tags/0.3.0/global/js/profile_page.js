$( document ).ready(function() {
	
	//Get app's base url
	baseurl = $('#base-url').val();
	
	//When the page loads, we hide the notifications bar and the ajax loader gif
	$('#notifications').hide();
	$('#ajax-loader').hide();
	
	//For each time left, convert this into date format (days, hours and minutes);
	get_days_hour_minutes(parseInt($("#simple_alert_tl_seconds").html()), "simple_alert_tl");
	get_days_hour_minutes(parseInt($("#critical_alert_tl_seconds").html()), "critical_alert_tl");
		
	//If the user clicks on the subscribe button
	$("#to-update-profile-action").on('click', function(){
		
		//Check if the profile edit form is empty
		if ($("#inputFirstNameProfile").val() == "" || $("#inputLastNameProfile").val() == "" || $("#inputEmailProfile").val() == "")
		{
			notification('alert-danger', '<strong>Erreur lors de l\'edition du profil</strong> : Vous devez remplir tous les champs pour pouvoir editer votre profil');
			return;
		}
		
		//Check the mail format
		if (!(/^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/.test($("#inputEmailProfile").val()))) {
			notification('alert-danger', '<strong>Erreur lors de l\'edition du profil</strong> : L\'email a été écrit dans un format incorrect.');
			return;
		}
		
		var data = $("#update-profile-form").serialize();
		var url = baseurl + "editprofile";
		
		//Show ajax loader
		$('#ajax-loader').show();
		
		$.ajax({
			type: "POST",
			url: url,
			data: data
		}).success(function(){
			$('#ajax-loader').hide();
			notification('alert-success', 'Votre profil a bien été édité');
		});
		
		
	});
	
	//If the user clicks on the update notification button
	$("#to-update-notifications-action").on("click", function(){
		
		//Check if all msg's inputs fields aren't empty
		if ($("#simple_alert_msg").val() == "" || $("#critical_alert_msg").val() == "" || $("#end_activity_msg").val() == 0)
		{
			notification('alert-danger', '<strong>Erreur lors de la modification des notifications</strong> : Tous les champs doivent être remplis');
			return;
		}
		
		//Check the date format
		if (!(checkDate("simple_alert_tl")) || !(checkDate("critical_alert_tl")))
		{
			notification('alert-danger', '<strong>Erreur lors de la modification des notifications</strong> : Des données ont été ecrites dans un format incorrect');
			return;
		}
		
		//Convert date to seconds
		$("#simple_alert_tl").val((parseInt($("#simple_alert_tl_day").val()) * 86400) + (parseInt($("#simple_alert_tl_hour").val()) * 3600) + (parseInt($("#simple_alert_tl_minute").val()) * 60));
		$("#critical_alert_tl").val((parseInt($("#critical_alert_tl_day").val()) * 86400) + (parseInt($("#critical_alert_tl_hour").val()) * 3600) + (parseInt($("#critical_alert_tl_minute").val()) * 60));
		
		if ((parseInt($("#simple_alert_tl").val()) == 0) || (parseInt($("#critical_alert_tl").val()) == 0))
		{
			notification('alert-danger', '<strong>Erreur lors de la modification des notifications</strong> : Seule l\'alerte "Fin de l\'activité" peut apparaitre au moment où une activité prend fin');
			return;
		}
		
		if (parseInt($("#simple_alert_tl").val()) < parseInt($("#critical_alert_tl").val()))
		{
			notification('alert-danger', '<strong>Erreur lors de la modification des notifications</strong> : L\'alerte de niveau 1 doit apparaitre avant l\'alerte de niveau 2');
			return;
		}
		
		var data = $("#notification-form").serialize();
		var url = baseurl + "editnotification";
		
		//Show ajax loader
		$('#ajax-loader').show();
		
		$.ajax({
			type: "POST",
			url: url,
			data: data
		}).success(function(){
			$('#ajax-loader').hide();
			notification('alert-success', 'Vos notifications ont été modifiées avec succès');
		});
	});
	
	//When the user clicks on activity add button
	$("#activity-type-add-action").on('click', function(){
		
		if ($("#activity_type_name").val() == "" || $("#activity_type_description").val() == "") {
			notification('alert-danger', '<strong>Erreur lors de l\'ajout d\'un type d\'activité</strong> : Vous devez remplir tous les champs pour pouvoir ajouter un type d\'activité');
			return;
		}
		
		var data = "activity_type_name=" + $("#activity_type_name").val() + "&activity_type_description=" + $("#activity_type_description").val();
		var url = baseurl + "saveactivitytype";
		
		//Show ajax loader
		$('#ajax-loader').show();
		
		$.ajax({
			type: "POST",
			url: url,
			data: data
		}).success(function(activity_type_id){
			
			//Line's insertion
			var newTabLine = $("<tr></tr>").attr("id", "activity-type-" + activity_type_id);
			newTabLine.append($("<td></td>").html($("#activity_type_name").val()));
			newTabLine.append($("<td></td>").html($("#activity_type_description").val()));
			
			var deleteButton = $("<a></a>").addClass("btn btn-danger delete-activity-type-btn").attr("href","javascript:void(0)").html("Supprimer");
			var editButton = $("<a></a>").addClass("btn btn-primary edit-activity-type-btn").attr("href","javascript:void(0)").html("Editer");
			newTabLine.append($("<td></td>").append(editButton).append(" ").append(deleteButton));

			newTabLine.insertBefore($("#add-activity-type-line")).hide().fadeIn('slow');
			
			$("#activity_type_name").val("");
			$("#activity_type_description").val("");
			
			$('#ajax-loader').hide();
			
			notification('alert-success', 'Votre type d\'activité a bien été enregistré');
		});
	
	});
	
	//When the user click on the edit button display edit form
	$("#activity-type-table").on('click', '.edit-activity-type-btn', function(){
		
		var activityNameCol = $(this).parent().parent().children(':nth-child(1)');
		var activityDescriptionCol = $(this).parent().parent().children(':nth-child(2)');
		var activityActionsCol = $(this).parent().parent().children(':nth-child(3)');
		
		//Get name and description
		var activityNameToEdit = activityNameCol.html();
		var activityDescToEdit = activityDescriptionCol.html();
		
		//Remove colums
		activityNameCol.empty();
		activityDescriptionCol.empty();
		activityActionsCol.empty();
		
		//Add inputs
		var activityNameInput = $("<input>").addClass("form-control activity-name-to-edit").attr("placeholder", "Nom...").val(activityNameToEdit);
		var activityNameHidden = $("<input>").attr("type", "hidden").addClass("activity-name-hidden").val(activityNameToEdit).hide();
		activityNameCol.append(activityNameInput).append(activityNameHidden);
		var activityDescInput = $("<input>").addClass("form-control activity-desc-to-edit").attr("placeholder", "Description...").val(activityDescToEdit);
		var activityDescHidden = $("<input>").attr("type", "hidden").addClass("activity-desc-hidden").val(activityDescToEdit).hide();
		activityDescriptionCol.append(activityDescInput).append(activityDescHidden);
		
		//Add buttons
		var cancelButton = $("<a></a>").addClass("btn btn-danger cancel-action-btn").attr("href","javascript:void(0)").html("Annuler");
		var validateButton = $("<a></a>").addClass("btn btn-success validate-edit-action-btn").attr("href","javascript:void(0)").html("Valider");
		activityActionsCol.append(validateButton).append(" ").append(cancelButton);

	});
	
	//When the user clicks on the cancel button, we hide inputs and display instead the colums 
	$("#activity-type-table").on("click", ".cancel-action-btn", function(){

		var activityNameCol = $(this).parent().parent().children(':nth-child(1)');
		var activityDescriptionCol = $(this).parent().parent().children(':nth-child(2)');
		var activityActionsCol = $(this).parent().parent().children(':nth-child(3)');
		
		var activityNameValue = activityNameCol.find(".activity-name-hidden").val();
		var activityDescValue = activityDescriptionCol.find(".activity-desc-hidden").val();
		
		//Remove colums
		activityNameCol.empty();
		activityDescriptionCol.empty();
		activityActionsCol.empty();
		
		activityNameCol.append(activityNameValue);
		activityDescriptionCol.append(activityDescValue);
		
		//Add buttons
		var editButton = $("<a></a>").addClass("btn btn-primary edit-activity-type-btn").attr("href","javascript:void(0)").html("Editer");
		var deleteButton = $("<a></a>").addClass("btn btn-danger delete-activity-type-btn").attr("href","javascript:void(0)").html("Supprimer");
		activityActionsCol.append(editButton).append(" ").append(deleteButton);
	});
	
	//When the user validates edition, update the activity type
	$("#activity-type-table").on("click", ".validate-edit-action-btn", function(){
		
		var activityNameCol = $(this).parent().parent().children(':nth-child(1)');
		var activityDescriptionCol = $(this).parent().parent().children(':nth-child(2)');
		var activityActionsCol = $(this).parent().parent().children(':nth-child(3)');
		
		var activityNameValue = activityNameCol.find(".activity-name-to-edit").val();
		var activityDescValue = activityDescriptionCol.find(".activity-desc-to-edit").val();
		
		if (activityNameValue == "" || activityDescValue == "") {
			notification('alert-danger', '<strong>Erreur lors de l\'édition d\'un type d\'activité</strong> : Vous devez remplir tous les champs pour pouvoir éditer un type d\'activité');
			return;
		}
		
		var data = "activity_type_id=" + $(this).parent().parent().attr("id").split("-")[2] + "&activity_type_name=" + activityNameValue + "&activity_type_description=" + activityDescValue;
		var url = baseurl + "saveactivitytype";
		
		//Show ajax loader
		$('#ajax-loader').show();
		
		$.ajax({
			type: "POST",
			url: url,
			data: data
		}).success(function(activity_type_id){
			
			//Remove colums
			activityNameCol.empty();
			activityDescriptionCol.empty();
			activityActionsCol.empty();
			
			//Add new values
			activityNameCol.append(activityNameValue);
			activityDescriptionCol.append(activityDescValue);
			
			//Add buttons
			var editButton = $("<a></a>").addClass("btn btn-primary edit-activity-type-btn").attr("href","javascript:void(0)").html("Editer");
			var deleteButton = $("<a></a>").addClass("btn btn-danger delete-activity-type-btn").attr("href","javascript:void(0)").html("Supprimer");
			activityActionsCol.append(editButton).append(" ").append(deleteButton);
			
			$('#ajax-loader').hide();
			
			notification('alert-success', 'Votre type d\'activité a été modifié avec succès');
		});
	});
	
	$("#activity-type-table").on("click", ".delete-activity-type-btn", function(){
		
		var activityTypeLine = $(this).parent().parent();
		var activityTypeId = activityTypeLine.attr("id").split("-")[2];
		
		if (($("#activity-type-table tr").size() - 2) < 2) {
			notification('alert-danger', 'Vous devez garder au moins un type d\'activité dans votre liste. La suppression de ce type d\'activité est donc impossible');
			return;
		}
		
		var url = baseurl + 'deleteactivitytype/' + activityTypeId;
		
		//Show ajax loader
		$('#ajax-loader').show();
		
		$.ajax({
			url: url
		}).success(function(){
			activityTypeLine.remove();
			$('#ajax-loader').hide();
			notification('alert-success', 'Votre type d\'activité a été supprimé avec succès');
		});
	});
	
	//Convert seconds into date format
	function get_days_hour_minutes(time, alert_type) {
		var remainingTime=time;
		var result='';

		var nbDays=Math.floor(remainingTime/(3600*24));
		$("#" + alert_type + "_day").val(nbDays);
		
		remainingTime -= nbDays*24*3600;

		var nbHours=Math.floor(remainingTime/3600);
		$("#" + alert_type + "_hour").val(nbHours);
		
		remainingTime -= nbHours*3600;

		var nbMinutes=Math.floor(remainingTime/60);
		$("#" + alert_type + "_minute").val(nbMinutes);

	}
	
	//Check if the date input are not empty and the input is a number
	function checkDate(alert_type) {
		
		var dayValue = $("#" + alert_type + "_day").val();
		var hourValue = $("#" + alert_type + "_hour").val();
		var minuteValue = $("#" + alert_type + "_minute").val();
		
		//Day
		if (!is_int(dayValue))
			return false;
		
		//Hour
		if (!is_int(hourValue) || !(parseInt(hourValue) >= 0 && parseInt(hourValue) < 24))
			return false;
				
		
		//Minute
		if (!is_int(minuteValue) || !(parseInt(minuteValue) >= 0 && parseInt(minuteValue) < 60))
				return false;
			
		return true;
	}
	
	//Check if the value is an integer
	function is_int(value){ 
		  if((parseFloat(value) == parseInt(value)) && !isNaN(value)){
		      return true;
		  } else { 
		      return false;
		  } 
	}

	
	//Notification system
	function notification(type, message) {
	 	$('#notifications').removeClass();
	 	$('#notifications').addClass('alert '+type).html(message);
	 	$('#notifications').slideDown();
	 	setTimeout(function(){ $('#notifications').slideUp(); }, 2000);
	 }
	
});