<?php
/**
 * @copyright ..........................
 * @author ........ .......... <someone [at] somewhere [dot] com>
 */


// make sure we are not being called directly
defined('APP_DIR') or exit();

/**
 * meta
 */
function jrHelloWorld_meta()
{
    $_tmp = array(
        'name'        => 'Hello World',
        'url'         => 'hello',
        'version'     => '1.0.0',
        'developer'   => 'Sombody Somwhere, &copy;' . strftime('%Y'),
        'description' => 'print Hello World to the screen at: THIS-SITE.com/hello/world',
        'category'    => 'site',
        'activate'    => true
    );
    return $_tmp;
}

/**
 * init
 */
function jrHelloWorld_init()
{
    // magic view - seen at /username/blog/profilehello
    // you need to register with the view from the blog module 
    // 
    jrCore_register_module_feature('jrCore','magic_view','jrHelloWorld','modulehello','view_jrHelloWorld_modulehello');

    return true;
}