<?php
require_once('vendor/autoload.php');

use OpenComponents\Client;

function ocComponent($attrs) {
    foreach($attrs as $key => $attr) {
        $pascalCaseKey = lcfirst(str_replace(' ', '', ucwords(str_replace('_', ' ', $key))));
        $pascalCaseKey = str_replace('-', '.',  $pascalCaseKey);
        $attrs[$pascalCaseKey] = html_entity_decode($attr);
    }

    // Initializing the client
    $client = new Client(array(
        "serverRendering" => get_option('serverRendering')
    ));

    $components = array(
        array(
            'name' => $attrs['component'],
            'parameters' => $attrs
        )
    );

    if ($attrs['version']) {
        $components[0]['version'] = $attrs['version'];
    }

    if (get_option('includeOcClient')) {
        $components[] = array('name' => 'oc-client');
    }

    // Render some component
    $components = $client->renderComponents($components);

    if (is_array($components['html'])) {
        $return = '';
        foreach ($components['html'] as $content) {
            $return .= $content;
        }
        return $return;
    }

    // Print the rendered component and volià
    return $components['html'];
}

add_shortcode('oc-component', 'ocComponent');
