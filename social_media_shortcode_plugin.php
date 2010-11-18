<?php 
/*
Plugin Name: Social Media Shortcode Pack
Plugin URI: http://michaelbox.net
Description: Plugin that declares shortcodes for several different social media websites. Makes it easier to provide semantic links to them when linking a user ID.
Version: 1.0
Author: Michael Beckwith
Author URI: http://michaelbox.net
*/

function social_link_sc($service, $link, $atts){
   extract(shortcode_atts( array(
         'name' => '',
         'text' => '',
      ), $atts));

   if ( empty($text) )
      $text = "$name ($service)";

   return "<a href=\"$link/$name\" title=\"$name's $service profile\">$text</a>";
}
//First is the service name, then the profile url sans user ID. Gets passed to social_link_sc and has the actual link returned.
function twitter_sc($atts){ 
   return social_link_sc('twitter', 'http://twitter.com', $atts);
}
function identica_sc($atts){ 
   return social_link_sc('identica', 'http://identi.ca', $atts);
}
function facebook_sc($atts){ 
   return social_link_sc('facebook', 'http://www.facebook.com', $atts);
}
function reddit_sc($atts){ 
   return social_link_sc('reddit', 'http://www.reddit.com/user', $atts);
}
function linkedin_sc($atts){ 
   return social_link_sc('linkedin', 'http://www.linkedin.com/in', $atts);
}
function stumbleupon_sc($atts){ 
   return social_link_sc('stumbleupon', 'http://www.stumbleupon.com/stumbler', $atts);
}
function myspace_sc($atts){ 
   return social_link_sc('myspace', 'http://www.myspace.com', $atts);
}

add_shortcode('twitter', 'twitter_sc');
add_shortcode('identica', 'identica_sc');
add_shortcode('facebook', 'facebook_sc');
add_shortcode('reddit', 'reddit_sc');
add_shortcode('linkedin', 'linkedin_sc');
add_shortcode('stumbleupon', 'stumbleupon_sc');
add_shortcode('myspace', 'myspace_sc');
?>
