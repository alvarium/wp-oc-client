<?php
/**
 * @package wp-oc-client
 * @version 0.0.1
 */
/*
Plugin Name: WP oc-client
Plugin URI: http://wordpress.org/plugins/hello-dolly/
Description:
Author: Genar <genar@alvarium.io>
Version: 0.0.1
Author URI: http://alvarium.io/
*/

require_once('vendor/autoload.php');
require_once('admin-section.php');

use OpenComponents\Client;

$client;

function initializePlugin()
{
    $client = new Client(array(
        'serverRendering' => ''
    ));
}
