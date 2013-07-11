<?php

// make sure we are not being called directly
defined('APP_DIR') or exit();

//------------------------------
// profile_default - /username/hello
//------------------------------
function profile_view_jrHelloWorld_default($_profile,$_post,$_user,$_conf)
{
    $_rep['hello_world'] = 'hello world';
    $out = jrCore_parse_template('hw.tpl',$_rep,'jrHelloWorld');
    return $out;
}