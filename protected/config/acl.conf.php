<?php

$acl['auth']['allow'] = array('*');

// anonymous users can only access to the methods of AuthenticationController
$acl['anonymous']['allow'] = array(
		'AuthenticationController'=> array('getLoginPage', 'adduser', 'getSession', 'toLogout')
);
?>