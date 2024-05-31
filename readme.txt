=== Social Media Shortcodes ===
Contributors: tw2113
Tags: social media, shortcodes
Requires at least: 5.2
Tested up to: 6.5.3
Stable tag: 1.3.0
License: WTFPL
License URI: http://sam.zoy.org/wtfpl/
Requires PHP: 5.6

Registers shortcodes for your posts, pages, or post types that display user profile links to various social media websites.

== Description ==

This plugin registers shortcodes for the following websites, social service on the left, format for the shortcode on the right:

Service / shortcode version

* Blogger [blogger]
* BookHype [bookhype]
* Colourlovers [colourlovers]
* DeviantArt [deviantart]
* Digg [digg]
* Dribbble [dribbble]
* Etsy [etsy]
* Facebook [facebook]
* Flickr [flickr]
* Flipboard [flipboard]
* GitHub [github]
* Goodreads [goodreads]
* HackerNews [hackernews]
* IMDb [imdb]
* Instagram [instagram]
* Last.FM [lastfm]
* LinkedIn [linkedin]
* Myspace [myspace]
* Patreon [patreon]
* Pinterest [pinterest]
* Reddit [reddit]
* Slideshare [slideshare]
* SpaceHey [spacehey]
* Soundcloud [soundcloud]
* TikTok [tiktok]
* Twitch [twitch]
* Twitter [twitter]
* Vimeo [vimeo]
* X [x]
* Yelp [yelp]
* YouTube [youtube]

All examples updated for v1.1

Example 1:

`[twitter name="JoeSomeone" text="some text you want the link to appear as"]`

results in this on your post/page:

`<a href="http://www.twitter.com/JoeSomeone" title="JoeSomeone's Twitter profile" class="twitter_smsc">some text you want the link to appear as</a>`

Example 2:

`[twitter name="JoeSomeone"]`

results in this on your post/page.

`<a href="http://www.twitter.com/JoeSomeone" title="JoeSomeone's Twitter profile" class="twitter_smsc">JoeSomeone (Twitter)</a>`

Example 3:

`[twitter name="JoeSomeone" target="_blank"]`

results in on your post/page.:

`<a href="http://www.twitter.com/JoeSomeone" title="JoeSomeone's Twitter profile" target="_blank" class="twitter_smsc">JoeSomeone (Twitter)</a>`

Filters:

`
function example_add_site( $sites ) {
	$sites['somesite'] = array( 'Some Site', 'http://www.somesite.com/user/' );

	//Return the $sites array
	return $sites;
}
add_filter( 'smsc_shortcodes', 'example_add_site' );

function example_add_classes( $classes ) {
	$classes[] = 'someclass';

	return $classes;
}
add_filter( 'smsc_classes', 'example_add_classes' );

function example_change_final_link( $output, $shortcode ) {
	if ( 'somesite' == $shortcode ) {
		$output_new = $output . ' <--Awesome profile!';
	}

	return $output_new;
}
add_filter( 'smsc_final_link', 'example_change_final_link', 10, 2 );
`

== Installation ==

1. Search for "Social Media Shortcodes" via your WP Admin plugin installer and activate.
1. Write some blog posts.
1. Link some social media sites profiles.
1. You look very nice today, did you get your hair did?
1. Ignore what Grumpy Cat thinks of your post. It's wonderful.

== Screenshots ==

None

== Changelog ==

= 1.3.0 =
* Added: X and SpaceHey.
* Updated: confirmed 6.5.3 compatibility.

= 1.2.1 =
* Updated: confirmed WP 6.2.2 compatibility.

= 1.2.0 =
* Added: Blogger, BookHype, DeviantArt, Etsy, Flipboard, Goodreads, HackerNews, IMDb, Instagram, Patreon, Pinterest, Soundcloud, TikTok, Twitch, Yelp
* Removed: Foursquare, OKCupid, ProgrammableWeb, Scribd
* Updated: Cleaned up more code to modernize.

= 1.1.1 =
* Cleaned up code. Should not affect anything.
* Removed: delicious, Favstar.FM, forrst, StumbleUpon.

= 1.1 =
* Rewrote the plugin as a PHP Class.
* Added or amended three filters for developers to use: "smsc_shortcodes", "smsc_classes", "smsc_final_link"
* Updated default site list

= 1.0.3 =
* Added classes to the link markup based on social media site. Twitter will get 'class="twitter_smsc"' and so on. Added optional target parameter to shortcode in case someone wants to open in different browser windows.

= 1.0.2 =
* Added is_array() check after filter and some function documentation.

= 1.0.1 =
* Added filter for users to add their own sites.

= 1.0 =
* Initial upload

== Upgrade Notice ==

= 1.3.0 =
* Added: X and SpaceHey.
* Updated: confirmed 6.5.3 compatibility.

= 1.2.1 =
* Updated: confirmed WP 6.2.2 compatibility.

= 1.2.0 =
* Added: Blogger, BookHype, DeviantArt, Etsy, Flipboard, Goodreads, HackerNews, IMDb, Instagram, Patreon, Pinterest, Soundcloud, TikTok, Twitch, Yelp
* Removed: Foursquare, OKCupid, ProgrammableWeb, Scribd
* Updated: Cleaned up more code to modernize.

= 1.1.1 =
* Cleaned up code. Should not affect anything.
* Removed: delicious, Favstar.FM, forrst, StumbleUpon.

= 1.1 =
* Rewrote the plugin as a PHP Class.
* Added or amended three filters for developers to use: "smsc_shortcodes", "smsc_classes", "smsc_final_link"
* Updated default site list

= 1.01 =
Just a new filter to add your own sites with.

= 1.0.2 =
* Added is_array() check after filter and some function documentation.

= 1.0.3 =
* Added class output for the links and optional browser window target for shortcode.
