<?php
/**
 * @copyright ..........................
 * @author ........ .......... <someone [at] somewhere [dot] com>
 */

// make sure we are not being called directly
defined('APP_DIR') or exit();

//-----------------------------------
// A view for this module at:
// THIS-SITE.com/hello/world
// the MOST simple way to do 'hello world'
//-----------------------------------
function view_jrHelloWorld_world($_post,$_user,$_conf)
{
    return 'hello world';
}

//-----------------------------------
// A view for this module at:
// THIS-SITE.com/hello/saturday
// using a template with 'hello world'
//-----------------------------------
function view_jrHelloWorld_saturday($_post,$_user,$_conf)
{
    $_replace = array();
    $_replace['some_wanted_var'] = 'hello';
    $_replace['other_wanted_var'] = 'world';
    return jrCore_parse_template("some_template_name.tpl",$_replace,'jrHelloWorld');
}
