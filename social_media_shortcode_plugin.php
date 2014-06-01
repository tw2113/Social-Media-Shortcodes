<?php
/*
Plugin Name: Social Media Shortcode Pack
Plugin URI: http://michaelbox.net
Description: Plugin that declares shortcodes for several different social media website user profiles.
Version: 1.1
Author: Michael Beckwith
Author URI: http://michaelbox.net
*/

class Social_Media_Shortcodes {

    public $default_sites       = array();
    public $all_sites           = array();

	public function __construct() {
		$this->set_default_sites();

		$this->set_all_sites();

		$this->register_shortcodes();
	}

	public function set_default_sites() {
		$this->default_sites = array(
			'colourlovers'      => array( 'Colourlovers', 'http://www.colourlovers.com/lover' ),
			'delicious'         => array( 'Delicious', 'http://www.delicious.com' ),
			'digg'              => array( 'Digg', 'http://www.digg.com' ),
			'dribbble'          => array( 'Dribbble', 'http://www.dribbble.com' ),
			'facebook'          => array( 'Facebook', 'http://www.facebook.com' ),
			'favstarfm'         => array( 'Favstar.FM', 'http://www.favstar.fm/users' ),
			'flickr'            => array( 'Flickr', 'http://www.flickr.com/photos' ),
			'forrst'            => array( 'Forrst', 'http://www.forrst.com/people' ),
			'foursquare'        => array( 'Foursquare', 'http://foursquare.com' ),
			'github'            => array( 'GitHub', 'https://github.com' ),
			'lastfm'            => array( 'Last.FM', 'http://www.last.fm/user' ),
			'linkedin'          => array( 'LinkedIn', 'http://www.linkedin.com/in' ),
			'myspace'           => array( 'Myspace', 'http://www.myspace.com' ),
			'okcupid'           => array( 'OkCupid', 'http://www.okcupid.com/profile' ),
			'programmableweb'   => array( 'Programmable Web', 'http://www.programmableweb.com/profile' ),
			'reddit'            => array( 'Reddit', 'http://www.reddit.com/user' ),
			'scribd'            => array( 'Scribd', 'http://www.scribd.com' ),
			'slideshare'        => array( 'SlideShare', 'http://www.slideshare.net' ),
			'stumbleupon'       => array( 'StumbleUpon', 'http://www.stumbleupon.com/stumbler' ),
			'twitter'           => array( 'Twitter', 'http://twitter.com' ),
			'vimeo'             => array( 'Vimeo', 'http://www.vimeo.com' ),
			'youtube'           => array( 'YouTube', 'http://www.youtube.com' ),
		);
	}

	public function set_all_sites() {
		$defaults = $this->default_sites;
		$this->all_sites = apply_filters( 'smsc_shortcodes', $defaults );
	}

	public function register_shortcodes() {
		$sites = $this->all_sites;

		//wp_die(print_r($sites));

		foreach( array_keys( $sites ) as $shortcode ) {
			add_shortcode( $shortcode, array( $this, 'shortcode_handler' ) );
		}
	}

	public function get_link_target( $target = '' ) {
		return ( in_array( $target, $this->get_available_link_targets() ) ) ? $target : '_self';
	}

	public function get_available_link_targets() {
		return array( '_self', '_blank', '_parent', '_top' );
	}

	public function get_classes( $service ) {
		$classes = apply_filters( 'smsc_classes',
			array(
				'smsc',
				strtolower( $service ) . '_smsc'
			),
			$service
		);

		return implode( ' ', $classes );
	}

	public function shortcode_handler( $atts, $enclosed, $shortcode ) {
		$args = shortcode_atts(
			array(
				'name'          => '',
				'text'          => '',
				'target'        => '_self',
			),
			$atts
		);


		$service = $this->all_sites[ $shortcode ][0];
		$link = $this->all_sites[ $shortcode ][1];
		$classes = $this->get_classes( $shortcode );
		$target = $this->get_link_target( $args['target'] );

		if ( empty( $args['name'] ) ) {
			return sprintf( __( 'You forgot a username for the %s shortcode', 'smsc' ), $service );
		}

		$text = ( !empty( $args['text'] ) ) ? $args['text'] : $args['name'] . ' (' . $service . ')';

		$output = sprintf( '<a href="%s" title="%s" class="%s" target="%s">%s</a>',
			trailingslashit( $link ) . $args['name'],
			$args['name'] .'\'s ' . $service . ' profile',
			$classes,
			$target,
			$text
		);

		return apply_filters( 'smsc_final_link', $output, $shortcode );
	}
}

function smsc_init() {
	$get_social = new Social_Media_Shortcodes();
}
add_action( 'init', 'smsc_init' );
