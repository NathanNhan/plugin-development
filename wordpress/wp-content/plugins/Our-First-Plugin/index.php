<?php 
/*
Plugin Name: Our First Plugin
Plugin URI: https://akismet.com/
Description: Used by millions, Akismet is quite possibly the best way in the world to <strong>protect your blog from spam</strong>. It keeps your site protected even while you sleep. To get started: activate the Akismet plugin and then go to your Akismet Settings page to set up your API key.
Version: 4.2.1
Author: Nathan
Author URI: https://automattic.com/wordpress-plugins/
License: GPLv2 or later
Text Domain: wcdomain
 */

//  add_filter('the_content' , 'FirstPlugin'); 
//  function FirstPlugin($content) {
//      if(is_single() && is_main_query()){
//          return $content . "<p>This is my blog of Nathan</p>";
//      } else {
//          return $content;
//      }
//  }
class wordCoundPlugin {
    function __construct()
    {
      add_action('admin_menu', array($this,'settingWordCount'));
      add_action('admin_init',array($this, 'settings'));
      //filter to display content to front end
      add_filter('the_content' , array($this, 'filterContent'));
        
    }
    //filter content to display front end
    function filterContent ($content) {
     if(is_main_query() && is_single() && (get_option('wcp_character', '1') || get_option('wcp_time', '1'))){
         return $this->createHTML($content);
     } 
     return $content;
    }
    //display data in front end
    function createHTML ($content) {
        
        $html = '<h3>' . esc_html(get_option('wcp_headline')) . '</h3><p>';
        if(get_option('wp_count', '1') || get_option('wcp_time','1')){
            $wordCount = str_word_count(strip_tags($content));
        }
        if(get_option('wp_count', '1')){
            $html .= 'This post have ' . $wordCount . ' words.<br>';
        }
        if(get_option('wcp_character', '1')){
            $html .= 'This post have ' . strlen(strip_tags($content)) . ' characters.<br>';
        }
        if(get_option('wcp_time','1')){
            $html .= 'This post will take ' . round($wordCount/225) . ' to read the post';
        }
        $html .= '</p>';
        if(get_option('wcp_location', "0") === "0"){
            return $html . $content;
        } else {
            return $content . $html;
        }
    }
    function settings () {
        add_settings_section('firstSection',null,null,'wp-word-count-setting');
        add_settings_field('wcp_location','Display Location', array($this,'locationHTML'),'wp-word-count-setting','firstSection');
        register_setting('wpCount','wcp_location',array('sanitize' => array($this,'sanitizeText') , 'default' => '0'));
        //headline field
        add_settings_field('wcp_headline', 'Headline Post', array($this, 'headlineHTML'), 'wp-word-count-setting', 'firstSection');
        register_setting('wpCount', 'wcp_headline', array('sanitize' => 'sanity_text_field', 'default' => 'Post Statistics'));

        //character field
        add_settings_field('wcp_character', 'Character count', array($this, 'characterHTML'), 'wp-word-count-setting', 'firstSection',array('theName' => 'wcp_character'));
        register_setting('wpCount', 'wcp_character', array('sanitize' => 'sanity_text_field', 'default' => '1'));
        //Read time field
        add_settings_field('wcp_time', 'Read Time', array($this, 'readTimeHTML'), 'wp-word-count-setting', 'firstSection', array('theName' => 'wcp_time'));
        register_setting('wpCount', 'wcp_time', array('sanitize' => 'sanity_text_field', 'default' => '1'));
        //Word count Field
        add_settings_field('wp_count', 'Word Count', array($this, 'wordCountHTML'), 'wp-word-count-setting', 'firstSection', array('theName' => 'wp_count'));
        register_setting('wpCount', 'wp_count', array('sanitize' => 'sanity_text_field', 'default' => '1'));
    }
    //validate input text 
    function sanitizeText ($input) {
      if($input !== "0" && $input !== "1"){
        add_settings_error( 'wcp_location', 'wcp_location_error','Display location must be or beginning or end!' );
        return get_option('wcp_location');
      } 
      return $input;
    }
    // html for setting form
 

    function headlineHTML () { ?>
        <input type="text" name="wcp_headline" value="<?php echo esc_attr(get_option('wcp_headline')) ?>"/>
        <?php }
    
    function checkBoxHTML ($args) { ?>
           <input type="checkbox" name="<?php echo $args['theName'] ?>" value="1" <?php checked(get_option('', '1'))?>>
    <?php }

    function locationHTML () { ?>
      <select name="wcp_location">
          <option value="0"<?php selected(get_option('wcp_location', '0')) ?>>Begin of the post</option>
          <option value="1"<?php selected(get_option('wcp_location' , '1')) ?>>End of the post</option>
      </select>
   <?php }
    function settingWordCount () {
        
        add_options_page('wpcount','Word Count', 'manage_options','wp-word-count-setting', array($this,'ourSettingHTML'));
    }
    //setting html for form 
   function ourSettingHTML () { ?>
   <form action="options.php" method="post">
      <?php 
        settings_fields('wpCount');
        do_settings_sections('wp-word-count-setting');
        submit_button();
       ?>
   </form>
   
    <?php }
}

$wordCountPlugin = new wordCoundPlugin();
