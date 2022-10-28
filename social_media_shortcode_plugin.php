<?php
/**
 * Social Media Shortcodes.
 *
 * @package Social Media Shortcodes.
 */

/**
 * Plugin Name: Social Media Shortcodes
 * Plugin URI: http://michaelbox.net
 * Description: Easily link to your social media profiles via shortcode.
 * Version: 1.2.0
 * Author: Michael Beckwith
 * Author URI: http://michaelbox.net
 */

/**
 * Class Social_Media_Shortcodes
 */
class Social_Media_Shortcodes {

	/**
	 * Array of default sites.
	 *
	 * @var array Default sites.
	 */
	public $default_sites = [];

	/**
	 * Array of all sites.
	 *
	 * @var array All sites.
	 */
	public $all_sites = [];

	/**
	 * Social_Media_Shortcodes constructor.
	 */
	public function __construct() {
		$this->set_default_sites();

		$this->set_all_sites();

		$this->register_shortcodes();
	}

	/**
	 * Sets the default sites.
	 *
	 * @since 1.1.0
	 */
	public function set_default_sites() {
		$this->default_sites = array(
			'colourlovers'    => array( 'Colourlovers', 'http://www.colourlovers.com/lover' ),
			'digg'            => array( 'Digg', 'http://digg.com/u/' ),
			'dribbble'        => array( 'Dribbble', 'http://dribbble.com' ),
			'facebook'        => array( 'Facebook', 'http://www.facebook.com' ),
			'flickr'          => array( 'Flickr', 'http://www.flickr.com/photos' ),
			'foursquare'      => array( 'Foursquare', 'http://foursquare.com' ),
			'github'          => array( 'GitHub', 'https://github.com' ),
			'lastfm'          => array( 'Last.FM', 'http://www.last.fm/user' ),
			'linkedin'        => array( 'LinkedIn', 'http://www.linkedin.com/in' ),
			'myspace'         => array( 'Myspace', 'http://www.myspace.com' ),
			'okcupid'         => array( 'OkCupid', 'http://www.okcupid.com/profile' ),
			'programmableweb' => array( 'Programmable Web', 'http://www.programmableweb.com/profile' ),
			'reddit'          => array( 'Reddit', 'http://www.reddit.com/user' ),
			'scribd'          => array( 'Scribd', 'http://www.scribd.com' ),
			'slideshare'      => array( 'SlideShare', 'http://www.slideshare.net' ),
			'twitter'         => array( 'Twitter', 'http://twitter.com' ),
			'vimeo'           => array( 'Vimeo', 'http://www.vimeo.com' ),
			'youtube'         => array( 'YouTube', 'http://www.youtube.com' ),
		);
	}

	/**
	 * Sets all sites, as we allow custom filtered in sites.
	 *
	 * @since 1.1.0
	 */
	public function set_all_sites() {
		$defaults        = $this->default_sites;
		$this->all_sites = apply_filters( 'smsc_shortcodes', $defaults );
	}

	/**
	 * Registers the shortcodes.
	 *
	 * @since 1.1.0
	 */
	public function register_shortcodes() {
		$sites = $this->all_sites;

		foreach ( array_keys( $sites ) as $shortcode ) {
			add_shortcode( $shortcode, [ $this, 'shortcode_handler' ] );
		}
	}

	/**
	 * Sets the link target for a given social media site.
	 *
	 * @since 1.1.0
	 *
	 * @param string $target Target type for the link.
	 * @return string
	 */
	public function get_link_target( $target = '' ) {
		return ( in_array( $target, $this->get_available_link_targets(), true ) ) ? $target : '_self';
	}

	/**
	 * Get a default list of possible targets based on W3C specification.
	 *
	 * @since 1.1.0
	 *
	 * @return array
	 */
	public function get_available_link_targets() {
		return [ '_self', '_blank', '_parent', '_top' ];
	}

	/**
	 * Create a string of classes to apply to the generated markup.
	 *
	 * @since 1.1.0
	 *
	 * @param string $service Social media service that is being rendered.
	 * @return string
	 */
	public function get_classes( $service ) {
		$classes = apply_filters( 'smsc_classes',
			array(
				'smsc',
				strtolower( $service ) . '_smsc',
			),
			$service
		);

		return implode( ' ', $classes );
	}

	/**
	 * Creates the final output for a given service and shortcode.
	 *
	 * @since 1.1.0
	 *
	 * @param array  $atts      Array of shortcode attributes.
	 * @param string $enclosed  Shortcode content. Not used.
	 * @param string $shortcode The shortcode tag.
	 *
	 * @return mixed|string
	 */
	public function shortcode_handler( $atts, $enclosed, $shortcode ) {
		$args = shortcode_atts(
			[
				'name'   => '',
				'text'   => '',
				'target' => '_self',
			],
			$atts
		);

		$service = $this->all_sites[ $shortcode ][0];
		$link    = $this->all_sites[ $shortcode ][1];
		$classes = $this->get_classes( $shortcode );
		$target  = $this->get_link_target( $args['target'] );

		if ( empty( $args['name'] ) ) {
			/* Translators: placeholder will have the social media site name. */
			return sprintf( __( 'You forgot a username for the %s shortcode', 'smsc' ), $service );
		}

		$text = ( ! empty( $args['text'] ) ) ? $args['text'] : $args['name'] . ' (' . $service . ')';

		$output = sprintf( '<a href="%s" title="%s" class="%s" target="%s">%s</a>',
			trailingslashit( $link ) . $args['name'],
			$args['name'] . '\'s ' . $service . ' profile',
			$classes,
			$target,
			$text
		);

		return apply_filters( 'smsc_final_link', $output, $shortcode );
	}
}

/**
 * Start things off!
 *
 * @since 1.1.0
 */
function smsc_init() {
	$get_social = new Social_Media_Shortcodes();
}
add_action( 'init', 'smsc_init' );
