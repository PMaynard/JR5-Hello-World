<?
// make sure we are not being called directly
defined('APP_DIR') or exit();

//------------------------------
// expandinggrid_default
// 
// Access from http://localhost/jamroom/hello/sayhellotome
// 
//------------------------------
function view_tmpHelloWorld_sayhellotome($_post,$_user,$_conf)
{
    return "Hello World!";
} 