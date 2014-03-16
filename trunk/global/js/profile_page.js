$( document ).ready(function() {
	
	//Get app's base url
	baseurl = $('#base-url').val();
	
	//When the page loads, we hide the notifications bar
	$('#notifications').hide();
	
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
		
		$.ajax({
			type: "POST",
			url: url,
			data: data
		}).success(function(){
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
				
		var data = $("#notification-form").serialize();
		var url = baseurl + "editnotification";
		
		$.ajax({
			type: "POST",
			url: url,
			data: data
		}).success(function(){
			notification('alert-success', 'Vos notifications ont été modifiées avec succès');
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