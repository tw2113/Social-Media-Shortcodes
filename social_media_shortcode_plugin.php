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
   return social_link_sc('Twitter', 'http://twitter.com', $atts);
}
function identica_sc($atts){ 
   return social_link_sc('Identica', 'http://identi.ca', $atts);
}
function facebook_sc($atts){ 
   return social_link_sc('Facebook', 'http://www.facebook.com', $atts);
}
function reddit_sc($atts){ 
   return social_link_sc('Reddit', 'http://www.reddit.com/user', $atts);
}
function linkedin_sc($atts){ 
   return social_link_sc('Linkedin', 'http://www.linkedin.com/in', $atts);
}
function stumbleupon_sc($atts){ 
   return social_link_sc('StumbleUpon', 'http://www.stumbleupon.com/stumbler', $atts);
}
function myspace_sc($atts){ 
   return social_link_sc('Myspace', 'http://www.myspace.com', $atts);
}
function digg_sc($atts){
   return social_link_sc('Digg', 'http://www.digg.com', $atts);
}
function foursquare_sc($atts){
   return social_link_sc('Foursquare', 'http://foursquare.com', $atts);
}
function delicious_sc($atts){
   return social_link_sc('Delicious', 'http://www.delicious.com', $atts);
}
function youtube_sc($atts){
   return social_link_sc('Youtube', 'http://www.youtube.com', $atts);
}
function gowalla_sc($atts){
   return social_link_sc('Gowalla', 'http://www.gowalla.com/users', $atts);
}
function flickr_sc($atts){
   return social_link_sc('Flickr', 'http://www.flickr.com/photos', $atts);
}
function vimeo_sc($atts){
   return social_link_sc('Vimeo', 'http://www.vimeo.com', $atts);
}
function stickam_sc($atts){
   return social_link_sc('Stickam', 'http://www.stickam.com', $atts);
}
function scribd_sc($atts){
   return social_link_sc('Scribd', 'http://www.scribd.com', $atts);
}
function slideshare_sc($atts){
   return social_link_sc('Slideshare', 'http://www.slideshare.net', $atts);
}
function dailybooth_sc($atts){
   return social_link_sc('Daily Booth', 'http://www.dailybooth.com', $atts);
}
function codesnippit_sc($atts){
   return social_link_sc('Codesnipp.it', 'http://www.codesnipp.it', $atts);
}
function forrst_sc($atts){
   return social_link_sc('Forrst', 'http://www.forrst.com/people', $atts);
}
function dribbble_sc($atts){
   return social_link_sc('Dribbble', 'http://www.dribbble.com', $atts);
}
function lastfm_sc($atts){
   return social_link_sc('Last.fm', 'http://www.last.fm/user', $atts);
}
function favstarfm_sc($atts){
   return social_link_sc('Favstar.fm', 'http://www.favstar.fm/users', $atts);
}
function okcupid_sc($atts){
   return social_link_sc('Okcupid', 'http://www.okcupid.com/profile', $atts);
}
function github_sc($atts){
	return social_link_sc('Github', 'https://github.com/', $atts);
}
function programmableweb_sc($atts){
	return social_link_sc('Programmable Web', 'http://www.programmableweb.com/profile', $atts);
}
function colourlovers_sc($atts){
	return social_link_sc('Colourlovers', 'http://www.colourlovers.com/lover', $atts);
}

add_shortcode('twitter', 'twitter_sc');
add_shortcode('identica', 'identica_sc');
add_shortcode('facebook', 'facebook_sc');
add_shortcode('reddit', 'reddit_sc');
add_shortcode('linkedin', 'linkedin_sc');
add_shortcode('stumbleupon', 'stumbleupon_sc');
add_shortcode('myspace', 'myspace_sc');
add_shortcode('digg', 'digg_sc');
add_shortcode('foursquare', 'foursquare_sc');
add_shortcode('delicious', 'delicious_sc');
add_shortcode('youtube', 'youtube_sc');
add_shortcode('gowalla', 'gowalla_sc');
add_shortcode('flickr', 'flickr_sc');
add_shortcode('vimeo', 'vimeo_sc');
add_shortcode('stickam', 'stickam_sc');
add_shortcode('scribd', 'scribd_sc');
add_shortcode('slideshare', 'slideshare_sc');
add_shortcode('dailybooth', 'dailybooth_sc');
add_shortcode('codesnippit', 'codesnippit_sc');
add_shortcode('forrst', 'forrst_sc');
add_shortcode('dribbble', 'dribbble_sc');
add_shortcode('lastfm', 'lastfm_sc');
add_shortcode('favstarfm', 'favstarfm_sc');
add_shortcode('okcupid', 'okcupid_sc');
add_shortcode('github', 'github_sc');
add_shortcode('programmableweb', 'programmableweb_sc');
add_shortcode('colourlovers', 'colourlovers_sc');

?>
