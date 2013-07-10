<?php
define('APP_DIR','../..');
require APP_DIR .'/modules/jrCore/include.php';
jrCore_init();


$_user = jrUser_session_start();
// Make sure user is logged in.
jrUser_session_require_login();
// Make sure it is a master admin.
jrUser_master_only();

echo "Hello World";