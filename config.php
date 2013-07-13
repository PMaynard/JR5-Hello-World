<?php

// make sure we are not being called directly
defined('APP_DIR') or exit();

/**
 * jrHelloWorld_config
 */
function jrHelloWorld_config()
{
    // HelloWorld config setting
    // $_conf['jrHelloWorld_hello_world'] == 'on'
    // we are checking this value in jrHelloWorld_form_display_listener
    $_tmp = array(
        'name'     => 'hello_world',
        'default'  => 'on',
        'type'     => 'checkbox',
        'validate' => 'onoff',
        'required' => 'on', 
        'label'    => 'Say hello before integrity check',
        'help'     => 'Enabling this option will cause a really annoying Hello World alert when viewing the integrity check form. Unchecking the box will cause the alerts to stop.',
        'section'  => 'general settings',
        'order'    => 1
    );
    jrCore_register_setting('jrHelloWorld',$_tmp);

    return true;
}
?>
