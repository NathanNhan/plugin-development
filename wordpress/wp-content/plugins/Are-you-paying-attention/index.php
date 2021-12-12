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
        add_action('enqueue_block_editor_assets' , array($this, 'adminAsset'));
     }
     function adminAsset () {
         wp_enqueue_script('ourNewBlockType', plugin_dir_url(__FILE__) . 'test.js' , array('wp-blocks', 'wp-element'));
     }
 }

 $AreYouPayingAttention = new AreYouPayingAttention();