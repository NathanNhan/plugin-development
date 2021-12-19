<?php
/*
Plugin Name: Are you paying attention quiz
Plugin URI: https://quiz.com/
Description: Are you paying attention quiz
Version: 4.2.1
Author: Nathan
Author URI: https://automattic.com/wordpress-plugins/

Text Domain: quizdomain
 */

 if(!defined('ABSPATH')) exit; // Exit if access directly

 class AreYouPayingAttention {
     function __construct () {
        add_action('init' , array($this, 'adminAsset'));
     }
     function adminAsset () {
         wp_register_script('ourNewBlockType', plugin_dir_url(__FILE__) . 'build/index.js' , array('wp-blocks', 'wp-element'));
         register_block_type('outplugin/are-you-paying-attent' , array(
             "editor_script" => 'ourNewBlockType',
             "render_callback" => array($this,'renderHTML')
         ));
     }
     function renderHTML ($attr) {
         return '<p>today the sky is ' . $attr['skypeColor'] .' and the grass is ' . $attr['grassColor'] . '</p>';
     }
 }

 $AreYouPayingAttention = new AreYouPayingAttention();