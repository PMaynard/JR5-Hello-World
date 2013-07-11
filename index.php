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
// THIS-SITE.com/bonjour
// THIS-SITE.com/hello/hw 
// THIS-SITE.com/hello/hw/spanish/bold/caps=on
// THIS-SITE.com/hello/hw/french/bolditalic
// THIS-SITE.com/hello/hw/german/caps=on
//------------------------------
function view_jrHelloWorld_hw($_post,$_user,$_conf)
{
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
    
    if (isset($_post['caps']) && $_post['caps'] == 'on') {
        $_rep['hello_world'] = strtoupper($_rep['hello_world']);
    }
    
    return jrCore_parse_template("hw.tpl",$_rep,'jrHelloWorld');

}


//----------------------------------------
// modulehello (magic_view)
//----------------------------------------
function view_jrHelloWorld_modulehello($_post,$_user,$_conf)
{
    $_rep['hello_world'] = 'hello world';
    $out = jrCore_parse_template('hw.tpl',$_rep,'jrHelloWorld');
    return $out;
}

