<?php
// make sure we are not being called directly
defined('APP_DIR') or exit();

/**
 * meta
 */
function tmpHelloWorld_meta()
{
    $_tmp = array(
        'name'        => 'Hello World',
        'url'         => 'hello',
        'version'     => '1.0.0a',
        'developer'   => 'Pete, &copy;'. strftime('%Y'),
        'description' => 'An example hello world module',
        'support'     => 'http://www.petermaynard.co.uk',
        'category'    => 'tools'
    );
    return $_tmp;
}

/**
 * init
 */
function tmpHelloWorld_init()
{
    global $_conf;
    // Link to my custom hello world PHP script.
    jrCore_register_module_feature('jrCore','tool_view','tmpHelloWorld',"{$_conf['jrCore_base_url']}/modules/tmpHelloWorld/hello.php",array('Hello World','An example hello world module'));
    
    return true;
}