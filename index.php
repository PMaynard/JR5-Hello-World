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


//------------------------------
// view using $_post
// gratuitous variations on hello world using url variables
// THIS-SITE.com/bonjour
// THIS-SITE.com/hello/hw 
// THIS-SITE.com/hello/hw/spanish/bold/caps=on
// THIS-SITE.com/hello/hw/french/bolditalic
// THIS-SITE.com/hello/hw/german/caps=on
//------------------------------
function view_jrHelloWorld_hw($_post,$_user,$_conf)
{
// fdebug($_post);
// (2013-07-12T10:51:09+01:00 0.91176400)-(mem: 8388608)-(pid: 72619)-(uri: /hello/hw/spanish/bolditalic/caps=on)
// Array
// (
//     [_uri] => /hello/hw/spanish/bolditalic/caps=on
//     [module_url] => hello
//     [module] => jrHelloWorld
//     [option] => hw
//     [_1] => spanish
//     [_2] => bolditalic
//     [caps] => on
// )

    $_rep['hello_world'] = 'hello world';
    
    if (isset($_post['_1'])) {
		switch ($_post['_1']) {
			case 'french':
				$_rep['hello_world'] = 'bonjour monde';
				break;
			case 'spanish':
				$_rep['hello_world'] = 'hola mundo';
				break;
			case 'german':
				$_rep['hello_world'] = 'hallo welt';
				break;
			case 'italian':
				$_rep['hello_world'] = 'ciao mondo';
				break;
			case 'english':
			default:
				break;
		}
    }
    
    // use the second variable 
    // note: use as many as you like. 
    // $_post['_3'], $_post['_4'], etc
    if (isset($_post['_2'])) {
		switch ($_post['_2']) {
			case 'bold':
				$_rep['bold'] = true;
				break;
			case 'italic':
				$_rep['italic'] = true;
				break;
			case 'bolditalic':
				$_rep['bold'] = true;
				$_rep['italic'] = true;
				break;
			default:
				break;
		}
    }
    
    // named variable /caps=on/kitten=fluffy/ or caps=on&kitten=fluffy
    if (isset($_post['caps']) && $_post['caps'] == 'on') {
        $_rep['hello_world'] = strtoupper($_rep['hello_world']);
    }
    
    return jrCore_parse_template("hw.tpl",$_rep,'jrHelloWorld');

}


//----------------------------------------
// modulehello (magic_view)
// view needs to be registered in jrHelloWorld_init()
//----------------------------------------
function view_jrHelloWorld_modulehello($_post,$_user,$_conf)
{
    $_rep['hello_world'] = 'hello world';
    $out = jrCore_parse_template('hw.tpl',$_rep,'jrHelloWorld');
    return $out;
}

//------------------------------
// say hello in an acp page
// YOUR-SITE.com/hello/helloadmin
//------------------------------
function view_jrHelloWorld_helloadmin($_post,$_user,$_conf)
{
    jrUser_master_only();
    jrCore_page_include_admin_menu();
    jrCore_page_admin_tabs('jrHelloWorld');
    
    jrCore_page_banner('hi admin');
    jrCore_page_note('hello world');

    jrCore_page_display();
}


//------------------------------
// helloform view
// A form to write Hello World to a log
//------------------------------
function view_jrHelloWorld_writetologform($_post,$_user,$_conf)
{
    // Master Admin only 
    jrUser_master_only();

    jrCore_page_banner('Write Hello World to Log');

    // Form init
    $_tmp = array(
        'submit_value' => 'write to log',
        'cancel'       => 'referrer'
    );
    jrCore_form_create($_tmp);

    // Where to write to
    $_opt = array(
        0 => 'select log',
        1 => 'write to activity log',
        2 => 'write to debug log'
    );
    $_tmp = array(
        'name'     => 'write_to',
        'label'    => 'which log?',
        'help'     => 'When the form is saved Hello World will be written to the Jamroom activity log or the debug log depending on your selection here.',
        'type'     => 'select',
        'options'  => $_opt,
        'default'  => 0,
        'validate' => 'number_nn',
        'min'      => 0,
        'max'      => 2,
        'required' => false
    );
    jrCore_form_field_create($_tmp);

    // Display page with form in it
    jrCore_page_display();
}

//------------------------------
// helloform save
//------------------------------
function view_jrHelloWorld_writetologform_save($_post,$_user,$_conf)
{
    // Master Admin only 
    jrUser_master_only();
    if ($_post['write_to'] == 1) {
        jrCore_logger('INF','Hello World!'); // write to jamroom activity log
        jrCore_set_form_notice('success','Hello world has been written to the activity log');
    } elseif ($_post['write_to'] == 2) {
        fdebug('Hello World!'); // write to debug log
        jrCore_set_form_notice('success','Hello world has been written to the debug log');
    } else {
        jrCore_set_form_notice('error','ERROR: You must select which log to write to');
    }
    jrCore_form_result();
}

