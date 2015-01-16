<?php
/*
Plugin Name: WP Popup Social Link and Content Share
Plugin URI: http://hamidulbd.com/plugin/wp-popup-social
Description: WP Popup Social Link and Content Share is Awesome Social Share Plugin . You can Add Awesome Social Profile Popup Link. It's too easy to use with ShortCode . You can setting with  ShortCode . 
Author: Hamidul Islam
Author URI: http://hamidulbd.com
Version: 1.0
*/

add_action('wp_footer','social_footer');
	
	function social_footer()
	{
	wp_enqueue_script('socialShare', plugins_url('/assets/javascripts/socialShare.min.js',__FILE__ ), array('jquery'), null, true);
	wp_enqueue_script('socialprofile', plugins_url('/assets/javascripts/socialProfiles.min.js',__FILE__ ), array('jquery'), null, true);
	
wp_enqueue_style('arthref', plugins_url('/assets/stylesheets/arthref.css', __FILE__));	
	}
	
add_shortcode('socialprofile', 'wfsocial'); 
function wfsocial($atts, $content=null){
extract( shortcode_atts(array('profile_class'=>'profile', 'animation'=>'chain', 'chainAnimationSpeed'=>'100','link'=> ''), $atts));
return'
<a class="'.$profile_class.' followSelecto" href="#">'.$content.'</a>
<script>
	$(document).ready(function () {

		$(".'.$profile_class.'").socialProfiles({
			animation: "'.$animation.'",
			blur: true,
			chainAnimationSpeed: "'.$chainAnimationSpeed.'",
			'.$link.'
			
		});
	});
</script>
';
}


add_shortcode('socialtext', 'wfsocialtext'); 
function wfsocialtext($atts, $content=null){
extract( shortcode_atts(array('text_class'=>'textclass', 'social_site'=> 'facebook,twitter,google,pinterest,stumbleupon,delicious,friendfeed,digg,linkedin,reddit,yahoo,windows,tumblr,myspace,blogger', 'animation'=>'launchpad', 'chainAnimationSpeed'=>'100'), $atts));
return'
<p class="'.$text_class.'">'.$content.'</p>
<script>
	$(document).ready(function () {

		$(".'.$text_class.'").socialShare({
			social: "'.$social_site.'",
			whenSelect: true,
			blur: true,
			animation:"'.$animation.'",
			chainAnimationSpeed:"'.$chainAnimationSpeed.'",
			selectContainer: ".'.$text_class.'"
		});
	});
</script>
';
}

add_action('admin_head', 'gavickpro_add_my_tc_button');
add_action('admin_enqueue_scripts', 'gavickpro_tc_css');

function gavickpro_add_my_tc_button() {
    global $typenow;
    if ( !current_user_can('edit_posts') && !current_user_can('edit_pages') ) {
   	return;
    }
    if( ! in_array( $typenow, array( 'post', 'page' ) ) )
        return;
	if ( get_user_option('rich_editing') == 'true') {
		add_filter("mce_external_plugins", "gavickpro_add_tinymce_plugin");
		add_filter('mce_buttons', 'gavickpro_register_my_tc_button');
	}
}

function gavickpro_add_tinymce_plugin($plugin_array) {
   	$plugin_array['gavickpro_tc_button'] = plugins_url( '/complex-popup-button.js', __FILE__ ); 
   	return $plugin_array;
}

function gavickpro_register_my_tc_button($buttons) {
   array_push($buttons, "gavickpro_tc_button");
   return $buttons;
}

function gavickpro_tc_css() {
	wp_enqueue_style('gavickpro-tc', plugins_url('/style.css', __FILE__));
}
?>
