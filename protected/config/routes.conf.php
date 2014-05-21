<?php

//----------------My personal agenda routes--------------------------
$route['*']['/simpletest'] = array('TestController', 'simpleTest');

$route['*']['/'] = array('MainPageController', 'getMainPage');

$route['*']['/login'] = array('AuthentificationController', 'getLoginPage');
$route['*']['/logout'] = array('AuthentificationController', 'toLogout');

$route['post']['/getsession'] = array('AuthentificationController', 'getSession');
$route['post']['/adduser'] = array('AuthentificationController', 'adduser');

$route['get']['/activity'] = array('ActivityController', 'getActivityEditionPage');
$route['get']['/activity/:activity_id'] = array('ActivityController', 'getActivityEditionPage');
$route['get']['/deleteactivity/:activity_id'] = array('ActivityController', 'deleteActivity');
$route['post']['/saveactivity'] = array('ActivityController', 'saveActivity');

$route['post']['/saveactivitytype'] = array('ActivityController', 'saveActivityType');
$route['get']['/deleteactivitytype/:activity_type_id'] = array('ActivityController', 'deleteActivityType');

$route['get']['/calendar'] = array('ActivityController', 'getCalendarOfActivity');

$route['get']['/note'] = array('NoteController','getNoteEditionPage');
$route['get']['/note/:note_id'] = array('NoteController','getNoteEditionPage');
$route['post']['/savenote'] = array('NoteController', 'saveNote');
$route['get']['/deletenote/:note_id'] = array('NoteController', 'deleteNote');

$route['get']['/profile'] = array('UserController', 'getUserProfile');
$route['post']['/editprofile'] = array('UserController', 'editUserProfile');
$route['post']['/editnotification'] = array('UserController', 'editUserNotification');

$route['get']['/exportactivities'] = array('ExportController', 'exportActivitiesPdf');

$route['get']['/administrator'] = array('MainPageController', 'getAdministratorMainPage');
$route['get']['/administrator/users'] = array('UserController', 'getAdministratorUsersPage');
//-------------------------------------------------------------------

 
 
 
//----------------DooPHP routes--------------------------- 
$route['*']['/error'] = array('ErrorController', 'index');


//Delete if
$admin = array('admin'=>'1234');

//view the logs and profiles XML, filename = db.profile, log, trace.log, profile
$route['*']['/debug/:filename'] = array('MainController', 'debug', 'authName'=>'DooPHP Admin', 'auth'=>$admin, 'authFail'=>'Unauthorized!');

//show all urls in app
$route['*']['/allurl'] = array('MainController', 'allurl', 'authName'=>'DooPHP Admin', 'auth'=>$admin, 'authFail'=>'Unauthorized!');

//generate routes file. This replace the current routes.conf.php. Use with the sitemap tool.
$route['post']['/gen_sitemap'] = array('MainController', 'gen_sitemap', 'authName'=>'DooPHP Admin', 'auth'=>$admin, 'authFail'=>'Unauthorized!');

//generate routes & controllers. Use with the sitemap tool.
$route['post']['/gen_sitemap_controller'] = array('MainController', 'gen_sitemap_controller', 'authName'=>'DooPHP Admin', 'auth'=>$admin, 'authFail'=>'Unauthorized!');

//generate Controllers automatically
$route['*']['/gen_site'] = array('MainController', 'gen_site', 'authName'=>'DooPHP Admin', 'auth'=>$admin, 'authFail'=>'Unauthorized!');

//generate Models automatically
$route['*']['/gen_model'] = array('MainController', 'gen_model', 'authName'=>'DooPHP Admin', 'auth'=>$admin, 'authFail'=>'Unauthorized!');
//-----------------------------------------------------------

?>