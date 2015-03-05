<?php

/*****************************************************************************************
********************************* Relations **********************************************
******************************************************************************************/

//ActivityType/Activity
$dbmap['ActivityType']['has_many']['Activity'] = array('foreign_key'=>'activity_type_id');
$dbmap['Activity']['belongs_to']['ActivityType'] = array('foreign_key'=>'activity_type_id');

//Activity/Task
$dbmap['Activity']['has_many']['Task'] = array('foreign_key'=>'activity_id');
$dbmap['Task']['belongs_to']['Activity'] = array('foreign_key'=>'activity_id');

//User/Activity
$dbmap['User']['has_many']['Activity'] = array('foreign_key'=>'user_id');
$dbmap['Activity']['belongs_to']['User'] = array('foreign_key'=>'user_id');

//User/Note
$dbmap['User']['has_many']['Note'] = array('foreign_key'=>'user_id');
$dbmap['Note']['belongs_to']['User'] = array('foreign_key'=>'user_id');

//User/ActivityType
$dbmap['User']['has_many']['ActivityType'] = array('foreign_key'=>'user_id');
$dbmap['ActivityType']['belongs_to']['User'] = array('foreign_key'=>'user_id');

//Notification/User
$dbmap['User']['has_one']['Notification'] = array('foreign_key' => 'user_id');
$dbmap['Notification']['belongs_to']['User'] = array('foreign_key' => 'user_id');

$dbconfig['dev'] = array($HOST, $NAME, $USER, $PASSWD, 'mysql', true, 'charset'=>'utf8');
$dbconfig['prod'] = array($HOST, $NAME, $USER, $PASSWD, 'mysql', true, 'charset'=>'utf8');
?>