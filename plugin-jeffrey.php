<?php 

/**
* Plugin Name: Jeffrey's first plugin
*/


if( !defined( 'ABSPATH')) {
    die;
}


class JeffreyPlugin
{
    function __construct() {
        add_action('init', array( $this, 'custom_post_type' ));
    }

    function activate() {
        //generate a CPT
        $this->custom_post_type();
        // flush rewrite rules
        flush_rewrite_rules();
    }

    function deactivate() {

        //flush rewrite rules
        flush_rewrite_rules();

    }

    function uninstall() {

        //delete a CPT

    }
    
    function custom_post_type() {
        register_post_type( 'book', ['public' => true, 'label' => 'Books'] );
    }
}

if( class_exists( 'JeffreyPlugin') ) {
    $jeffreyPlugin = new JeffreyPlugin();
}

//activation hook
register_activation_hook( __FILE__, array( $jeffreyPlugin, 'activate'));

//deactivation hook
register_deactivation_hook( __FILE__, array( $jeffreyPlugin, 'deactivate'));


