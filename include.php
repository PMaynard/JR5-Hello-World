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
    return true;
}

/**
 * magic view init
 *
 * Which would be seen for all profiles at a url something like:
 * /stevex/audio/sayhellotome
 * /stevex/video/sayhellotome
 *
 */

// function tmpHelloWorld_init()
// {
//     jrCore_register_module_feature('jrCore','magic_view','tmpHelloWorld','sayhellotome','view_tmpHelloWorld_hi');
//     return true;
// }