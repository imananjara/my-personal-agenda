<?php

/*****************************************************************************************
********************************* Relations **********************************************
******************************************************************************************/

// ActivityType/Activity
$dbmap['ActivityType']['has_many']['Activity'] = array('foreign_key'=>'activity_type_id');
$dbmap['Activity']['belongs_to']['ActivityType'] = array('foreign_key'=>'activity_type_id');

//User/Activity
$dbmap['User']['has_many']['Activity'] = array('foreign_key'=>'user_id');
$dbmap['Activity']['belongs_to']['User'] = array('foreign_key'=>'user_id');

//User/Note
$dbmap['User']['has_many']['Note'] = array('foreign_key'=>'user_id');
$dbmap['Note']['belongs_to']['User'] = array('foreign_key'=>'user_id');

//Notification/User
$dbmap['User']['has_one']['Notification'] = array('foreign_key' => 'user_id');
$dbmap['Notification']['belongs_to']['User'] = array('foreign_key' => 'user_id');

$dbconfig['dev'] = array($HOST, $NAME, $USER, $PASSWD, 'mysql', true, 'charset'=>'utf8');
$dbconfig['prod'] = array($HOST, $NAME, $USER, $PASSWD, 'mysql', true, 'charset'=>'utf8');
?>