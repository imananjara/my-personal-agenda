<?php
Doo::loadCore('db/DooModel');

class NotificationBase extends DooModel{

    /**
     * @var int Max length is 11.
     */
    public $notification_id;

    /**
     * @var int Max length is 11.
     */
    public $user_id;

    /**
     * @var varchar Max length is 250.
     */
    public $simple_alert_msg;

    /**
     * @var int Max length is 11.
     */
    public $simple_alert_tl;

    /**
     * @var varchar Max length is 250.
     */
    public $critical_alert_msg;

    /**
     * @var int Max length is 11.
     */
    public $critical_alert_tl;

    /**
     * @var varchar Max length is 250.
     */
    public $end_activity_msg;

    public $_table = 'notification';
    public $_primarykey = 'notification_id';
    public $_fields = array('notification_id','user_id','simple_alert_msg','simple_alert_tl','critical_alert_msg','critical_alert_tl','end_activity_msg');

    public function getVRules() {
        return array(
                'notification_id' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'optional' ),
                ),

                'user_id' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'notnull' ),
                ),

                'simple_alert_msg' => array(
                        array( 'maxlength', 250 ),
                        array( 'notnull' ),
                ),

                'simple_alert_tl' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'notnull' ),
                ),

                'critical_alert_msg' => array(
                        array( 'maxlength', 250 ),
                        array( 'notnull' ),
                ),

                'critical_alert_tl' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'notnull' ),
                ),

                'end_activity_msg' => array(
                        array( 'maxlength', 250 ),
                        array( 'notnull' ),
                )
            );
    }

}