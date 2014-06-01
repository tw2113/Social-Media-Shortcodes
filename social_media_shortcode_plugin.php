<?php
/*
Plugin Name: Social Media Shortcode Pack
Plugin URI: http://michaelbox.net
Description: Plugin that declares shortcodes for several different social media websites. Makes it easier to provide semantic links to them when linking a user ID.
Version: 1.1
Author: Michael Beckwith
Author URI: http://michaelbox.net
*/

$smsc_shortcodes = array(
    'identica' => array( 'Identica', 'http://identi.ca' ),
    'facebook' => array( 'Facebook', 'http://www.facebook.com' ),
    'twitter' => array( 'Twitter', 'http://twitter.com' ),
    'reddit' => array('Reddit', 'http://www.reddit.com/user'),
    'linkedin' => array('Linkedin', 'http://www.linkedin.com/in'),
    'stumbleupon' => array('StumbleUpon', 'http://www.stumbleupon.com/stumbler'),
    'myspace' => array('Myspace', 'http://www.myspace.com'),
    'digg' => array('Digg', 'http://www.digg.com'),
    'foursquare' => array('Foursquare', 'http://foursquare.com'),
    'delicious' => array('Delicious', 'http://www.delicious.com'),
    'youtube' => array('Youtube', 'http://www.youtube.com'),
    'gowalla' => array('Gowalla', 'http://www.gowalla.com/users'),
    'flickr' => array('Flickr', 'http://www.flickr.com/photos'),
    'vimeo' => array('Vimeo', 'http://www.vimeo.com'),
    'stickam' => array('Stickam', 'http://www.stickam.com'),
    'scribd' => array('Scribd', 'http://www.scribd.com'),
    'slideshare' => array('Slideshare', 'http://www.slideshare.net'),
    'dailybooth' => array('Daily Booth', 'http://www.dailybooth.com'),
    'codesnippit' => array('Codesnipp.it', 'http://www.codesnipp.it'),
    'forrst' => array('Forrst', 'http://www.forrst.com/people'),
    'dribbble' => array('Dribbble', 'http://www.dribbble.com'),
    'lastfm' => array('Last.FM', 'http://www.last.fm/user'),
    'favstarfm' => array('Favstar.FM', 'http://www.favstar.fm/users'),
    'okcupid' => array('OkCupid', 'http://www.okcupid.com/profile'),
    'github' => array('Github', 'https://github.com'),
    'programmableweb' => array('Programmable Web', 'http://www.programmableweb.com/profile'),
    'colourlovers' => array('Colourlovers', 'http://www.colourlovers.com/lover')
);
     
foreach( array_keys( $smsc_shortcodes ) as $shortcode )
	add_shortcode( $shortcode, 'smsc_shortcode_handler' );
     
    function smsc_shortcode_handler( $atts, $enclosed, $shortcode ) {
            extract(shortcode_atts( array(
                    'name' => '',
                    'text' => '',
            ), $atts));
     
            global $smsc_shortcodes;
            $service = $smsc_shortcodes[$shortcode][0];
            $link = $smsc_shortcodes[$shortcode][1];
     
            if ( empty($text) ) $text = "$name ($service)";
     
    return "<a href=\"$link/$name\" title=\"$name's $service profile\">$text</a>";
    }
