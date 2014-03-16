<?php
Doo::loadModel('base/NotificationBase');

class Notification extends NotificationBase{
	
	/**
	 * Get the Notification object linked with the current user
	 */
	public static function _getUserNotification() {
		
		$options = array(
			'asArray' => true,
			'limit' => 1
		);
				
		$notif = new Notification();
		$notif->user_id = $_SESSION["mpa_user_id"];
		$notif = $notif->find($options);
		
		if(empty($notif)) return null;
		
		return $notif;
	}
	
	/**
	 * Update the user notification
	 */
	public static function _updateUserNotification($notifId, $simpleAlertMsg, $simpleAlertTl, $criticalAlertMsg, $criticalAlertTl, $endActivityMsg) {
		
		$options['limit'] = 1;
		
		$notif = new Notification();
		$notif->notification_id = $notifId;
		$notif = $notif->find($options);
		
		$notif->simple_alert_msg = $simpleAlertMsg;
		$notif->simple_alert_tl = $simpleAlertTl;
		$notif->critical_alert_msg = $criticalAlertMsg;
		$notif->critical_alert_tl = $criticalAlertTl;
		$notif->end_activity_msg = $endActivityMsg;
		
		$notif->update();
		
	}
}

