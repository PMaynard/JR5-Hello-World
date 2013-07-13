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
    // magic view - seen at YOUR-SITE.com/blog/modulehello, YOUR-SITE.com/audio/modulehello, etc
    // provides view_jrHelloWorld_modulehello for each module
    // view_jrHelloWorld_modulehello is a function in index.php
    jrCore_register_module_feature('jrCore','magic_view','jrHelloWorld','modulehello','view_jrHelloWorld_modulehello');
    
    jrCore_register_event_listener('jrCore','form_display','jrHelloWorld_form_display_listener');

    return true;
}

/**
 * form_display listener displays "hello world" as an alert when viewing the integrity check form
 * @param $_data array Array of information from trigger
 * @param $_user array Current user
 * @param $_conf array Global Config
 * @param $_args array additional parameters passed in by trigger caller
 * @param $event string Triggered Event name
 * @return array
 */
function jrHelloWorld_form_display_listener($_data,$_user,$_conf,$_args,$event)
{
    // filter out everything except the integrity check form
    if ($_data['form_view'] == 'jrCore/integrity_check') {
        $_js = array('alert("Hello World");');
        jrCore_create_page_element('javascript_ready_function',$_js);
    }
    return $_data;
}

/**
 * Smarty function to show an embedded hello world
 * @param $params array parameters for function
 * @param $smarty object Smarty object
 * @return string
 */
 // use in any template like this: {jrHelloWorld_hi}
 // only one optional parameter - spelling="wrong"
 // which would need to look exactly like this: {jrHelloWorld_hi spelling="wrong"}
 // returns 'Hello World' or 'Hellow Worlg' if spelling="wrong"
function smarty_function_jrHelloWorld_hi($params,$smarty)
{
    if ($params['spelling'] == 'wrong') {
        return 'Hellow Worlg (which is definitely more than valid as first words written, spoken or coded).';
    }
    return 'Hello World';
}
