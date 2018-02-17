<?php
/*
Plugin Name: PWAMP
Plugin URI:  https://flexplat.com/pwamp/
Description: PWAMP is a WordPress solution for both lightning fast load time of AMP pages and first load cache-enabled of PWA pages.
Version:     0.1.0
Author:      Rickey Gu
Author URI:  https://flexplat.com
Text Domain: pwamp
Domain Path: /languages
*/
if ( !defined('ABSPATH') ) exit;  // Exit if accessed directly.


class PWAMP
{
	/*
		Current supporting theme list.
	*/
	private $theme_list = array(
		'Twenty Fifteen' => 'twentyfifteen',
		'Twenty Seventeen' => 'twentyseventeen',
		'Twenty Sixteen' => 'twentysixteen',
	);

	/*
		Current activated theme Id (TextDomain).
	*/
	private $theme_id = '';


	/*
		Web browser User Agent data, used for mobile device detection.
	*/
	private $device_list = array(
		// Apple iOS
		'iPad' => 'tablet',
		'iPhone' => 'smartphone',
		'iPod' => 'smartphone',

		// Kindle Fire
		'Kindle Fire' => 'tablet',
		'Kindle/' => 'tablet',
		'KFAPWI' => 'tablet',

		// Nexus
		'Nexus 4' => 'smartphone',
		'Nexus 5' => 'smartphone',
		'Nexus 7' => 'tablet',
		'Nexus 10' => 'tablet',

		// Android
		'Android*Mobile' => 'smartphone',
		'Android' => 'tablet',

		// Chrome
		'Chrome/' => 'desktop',

		// Macintosh
		'Macintosh' => 'desktop',

		// Firefox
		'Firefox/' => 'desktop',

		// Windows Phone
		'Windows Phone' => 'smartphone',

		// Windows Mobile
		'Windows CE' => 'feature-phone',

		// Internet Explorer
		'MSIE ' => 'desktop',
		'Windows NT' => 'desktop',

		// Opera Mobile
		'Opera Mobi*Version/' => 'smartphone',

		// Opera Mini
		'Opera Mini/' => 'smartphone',

		// Opera
		'Opera*Version/' => 'desktop',

		// Palm WebOS
		'webOS/*AppleWebKit' => 'smartphone',
		'TouchPad/' => 'tablet',

		// Meego
		'MeeGo' => 'smartphone',

		// BlackBerry
		'BlackBerry*AppleWebKit*Version/' => 'smartphone',
		'BB*AppleWebKit*Version' => 'smartphone',
		'PlayBook*AppleWebKit' => 'tablet',
		'BlackBerry*/*MIDP' => 'feature-phone',

		// Safari
		'Safari' => 'desktop',

		// Nokia Symbian
		'Symbian/' => 'smartphone',

		// Google
		'googlebot-mobile' => 'mobile-bot',
		'googlebot' => 'bot',

		// Microsoft
		'bingbot' => 'bot',

		// Yahoo!
		'Yahoo! Slurp' => 'bot'
	);

	/*
		More web browser data, used for mobile device detection.
	*/
	private $accept_list = array(
		// application/vnd.wap.xhtml+xml
		'application/vnd.wap.xhtml+xml' => 'feature-phone'
	);


	/*
		Used to collect all output page content.
	*/
	private $page = '';


	public function __construct()
	{
	}

	public function __destruct()
	{
	}


	/*
		This plugin only works on some themes.  ( Check current supporting theme list for detail. )  And it only works for end
		user pages; not for any dashboard and/or wp-login.php pages.
	*/
	public function validate()
	{
		if ( current_user_can( 'manage_options' ) || $GLOBALS['pagenow'] === 'wp-login.php' )
		{
			return false;
		}

		$theme = wp_get_theme();
		$theme_name = esc_html( $theme->get( 'Name' ) );
		$theme_id = esc_html( $theme->get( 'TextDomain' ) );
		foreach ( $this->theme_list as $key => $value )
		{
			if ( $key == $theme_name && $value == $theme_id )
			{
				$this->theme_id = $theme_id;

				return true;
			}
		}

		return false;
	}


	/*
		When end users access from non-mobile device, <link rel="amphtml" href="..."> is added to the page.
	*/
	public function get_amphtml()
	{
		$parts = parse_url(home_url());
		$amphtml_url = $parts['scheme'] . '://' . $parts['host'] . add_query_arg( 'amp', 'on' );
		$amphtml_url = htmlspecialchars($amphtml_url);

		echo '<link rel="amphtml" href="' . $amphtml_url . '" />' . "\n";
	}

	/*
		When end users access from mobile device, <link rel="canonical" href="..."> is added to the page.
	*/
	private function get_canonical()
	{
		$parts = parse_url(home_url());
		$canonical_url = $parts['scheme'] . '://' . $parts['host'] . add_query_arg( 'amp', 'off' );
		$canonical_url = htmlspecialchars($canonical_url);

		return '<link rel="canonical" href="' . $canonical_url . '" />';
	}


	/*
		When installing PWA, this .js should be run from the root directory.
	*/
	private function echo_sw_js()
	{
		header('Content-Type: application/javascript', true);
		echo 'importScripts(\'.' . str_replace(site_url(), '', plugin_dir_url(__FILE__)) . 'lib/sw-toolbox/sw-toolbox.js\');
toolbox.router.default = toolbox.cacheFirst;
self.addEventListener(\'install\', function(event) {
	console.log(\'SW: Installing service worker\');
});';

		exit();
	}

	/*
		When installing PWA, this .html should be run from the root directory.
	*/
	private function echo_sw_html()
	{
		header('Content-Type: text/html; charset=utf-8', true);
		echo '<!doctype html>
<html>
<head>
<title>PWAMP: installing service worker</title>
<script type=\'text/javascript\'>
	var swsource = \'' . home_url() . '/' . ( !empty(get_option('permalink_structure')) ? 'pwamp-sw.js' : '?pwamp=sw-js' ) . '\';
	if ( \'serviceWorker\' in navigator ) {
		navigator.serviceWorker.register(swsource).then(function(reg) {
			console.log(\'ServiceWorker scope: \', reg.scope);
		}).catch(function(err) {
			console.log(\'ServiceWorker registration failed: \', err);
		});
	};
</script>
</head>
<body>
</body>
</html>';

		exit();
	}

	/*
		Install PWA.
	*/
	public function init()
	{
		$parts = parse_url(home_url());
		$current_url = $parts['scheme'] . '://' . $parts['host'] . add_query_arg();

		if ( !empty(get_option('permalink_structure')) )
		{
			if ( $current_url == home_url() . '/pwamp-sw.js' )
			{
				$this->echo_sw_js();
			}
			elseif ( $current_url == home_url() . '/pwamp-sw.html' )
			{
				$this->echo_sw_html();
			}
		}
		else
		{
			if ( $current_url == home_url() . '/?pwamp=sw-js' )
			{
				$this->echo_sw_js();
			}
			elseif ( $current_url == home_url() . '/?pwamp=sw-html' )
			{
				$this->echo_sw_html();
			}
		}
	}


	/*
		Catch any page output.
	*/
	private function callback_catch_page($page)
	{
		$this->page .= $page;
	}

	/*
		There are two scenarios in this function:

		1. If there is any 'Comment Submission Failure' error before, retrieves $message, $title and $args from 
			$_COOKIE['pwamp_message'], $_COOKIE['pwamp_title'] and $_COOKIE['pwamp_args'], then calls
			_default_wp_die_handler() to display the error message;

		2. Otherwise, prepare to catch page output.
	*/
	public function after_setup_theme()
	{
		if ( empty($_COOKIE['pwamp_message']) )
		{
			ob_start(array($this, 'callback_catch_page'));

			return;
		}


		$time = time();

		$message = $_COOKIE['pwamp_message'];
		setcookie('pwamp_message', '', $time - 1, COOKIEPATH, COOKIE_DOMAIN);

		$title = '';
		if ( !empty($_COOKIE['pwamp_title']) )
		{
			$title = $_COOKIE['pwamp_title'];
			setcookie('pwamp_title', '', $time - 1, COOKIEPATH, COOKIE_DOMAIN);
		}

		$args = array();
		if ( !empty($_COOKIE['pwamp_args']) )
		{
			$args = unserialize(stripslashes($_COOKIE['pwamp_args']));
			setcookie('pwamp_args', serialize(array()), $time - 1, COOKIEPATH, COOKIE_DOMAIN);
		}

		_default_wp_die_handler( $message, $title, $args );
	}

	/*
		When page output is finished, updates the page content according to AMP requirement, and then displays it.
	*/
	public function shutdown()
	{
		$page = $this->update_page();
		if ( empty($page) )
		{
			echo $this->page;

			return;
		}

		echo $page;
	}


	/*
		Detect end user's device.
	*/
	public function get_device()
	{
		$user_agent = !empty($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '';
		$accept = !empty($_SERVER['HTTP_ACCEPT']) ? $_SERVER['HTTP_ACCEPT'] : '';
		$profile = !empty($_SERVER['HTTP_PROFILE']) ? $_SERVER['HTTP_PROFILE'] : '';

		if ( !empty($user_agent) )
		{
			foreach ( $this->device_list as $key => $value )
			{
				if ( preg_match('#' . str_replace('\*', '.*?', preg_quote($key, '#')) . '#i', $user_agent) )
				{
					return $value;
				}
			}
		}

		if ( !empty($accept) )
		{
			foreach ( $this->accept_list as $key => $value )
			{
				if ( preg_match('#' . str_replace('\*', '.*?', preg_quote($key, '#')) . '#i', $accept) )
				{
					return $value;
				}
			}
		}

		if ( !empty($profile) )
		{
			return 'feature-phone';
		}

		if ( !empty($user_agent) )
		{
			return 'feature-phone';
		}

		return 'desktop';
	}

	/*
		Updates page content according to AMP requirement.
	*/
	private function update_page()
	{
		$page = $this->page;
		$canonical = $this->get_canonical();
		$home_url = home_url();
		$permalink_structure = get_option('permalink_structure');

		$theme = $this->theme_id;
		$template = 'index';

		$file = plugin_dir_path(__FILE__) . 'themes/' . $theme . '.php';

		if ( !file_exists($file) )
		{
			return;
		}

		include($file);

		$application = new PWAMP_Application();

		if ( !method_exists($application, $template) )
		{
			return;
		}

		try
		{
			$page = $application->$template($page, $canonical, $home_url, $permalink_structure);
		}
		catch ( Exception $e )
		{
			return;
		}

		return $page;
	}


	/*
		When end users submit comments, AMP requests a JSON response;  while WordPress does not support it.  I use this
		function to make an empty JSON response, and redirects to original code scenario.
	*/
	private function json_redirect($redirection)
	{
		$parts = parse_url(home_url());
		$host_url = $parts['scheme'] . '://' . $parts['host'];

		header('Content-type: application/json');
		header('Access-Control-Allow-Credentials: true');
		header('Access-Control-Allow-Origin: *.ampproject.org');
		header('Access-Control-Expose-Headers: AMP-Redirect-To, AMP-Access-Control-Allow-Source-Origin');
		header('AMP-Access-Control-Allow-Source-Origin: ' . $host_url);
		header('AMP-Redirect-To: ' . $redirection);

		$output = [];
		echo json_encode($output);

		exit();
	}

	/*
		When end users submit comments successfully, uses this function to continue.
	*/
	public function comment_post_redirect($location, $comment)
	{
		$status = 302;

		$location = wp_sanitize_redirect( $location );
		$location = wp_validate_redirect( $location, apply_filters( 'wp_safe_redirect_fallback', admin_url(), $status ) );

		$location = apply_filters( 'wp_redirect', $location, $status );
		$status = apply_filters( 'wp_redirect_status', $status, $location );

		$this->json_redirect($location);
	}

	/*
		When end users submit comments failure, used this function to continue.  Save $message, $title and $args in
		$_COOKIE['pwamp_message'], $_COOKIE['pwamp_title'] and $_COOKIE['pwamp_args'].  Then after_setup_theme() within this
		class will retrieve these data, and call _default_wp_die_handler() to continue the handling.
	*/
	public function die_handler($message, $title = '', $args = array())
	{
		if ( $title !== 'Comment Submission Failure' )
		{
			_default_wp_die_handler( $message, $title, $args );

			return;
		}


		$time = time();

		setcookie('pwamp_message', $message, $time + 60, COOKIEPATH, COOKIE_DOMAIN);

		if ( !empty($title) )
		{
			setcookie('pwamp_title', $title, $time + 60, COOKIEPATH, COOKIE_DOMAIN);
		}
		else
		{
			setcookie('pwamp_title', '', $time - 1, COOKIEPATH, COOKIE_DOMAIN);
		}

		if ( !empty($args) )
		{
			setcookie('pwamp_args', serialize($args), $time + 60, COOKIEPATH, COOKIE_DOMAIN);
		}
		else
		{
			setcookie('pwamp_args', serialize(array()), $time - 1, COOKIEPATH, COOKIE_DOMAIN);
		}

		$redirection = site_url();
		$this->json_redirect($redirection);
	}

	/*
		Define personal error handling function.
	*/
	public function wp_die_handler($function)
	{
		$function = array($this, 'die_handler');

		return $function;
	}
}


/*
	The main function of this plugin.
*/
function pwamp_main()
{
	$pwamp = new PWAMP();

	// Check if this plugin is necessary; otherwise, just exits.
	if ( !$pwamp->validate() )
	{
		return;
	}


	$redirection = !empty($_GET['amp']) ? $_GET['amp'] : '';
	$style = !empty($_COOKIE['pwamp_style']) ? $_COOKIE['pwamp_style'] : '';

	// Check if end user forces to activate or deactivate AMP.
	if ( !empty($redirection) )
	{
		$device = $redirection != 'on' ? 'desktop' : 'mobile';
	}

	// Check previous saved mobile device detection result.
	elseif ( !empty($style) )
	{
		$device = $style != 'mobile' ? 'desktop' : 'mobile';
	}

	// Mobile device detection
	else
	{
		// Use web browser User Agent data to detect if end user's device is mobile or not.
		$device = $pwamp->get_device();

		$device = ( $device == 'desktop' || $device == 'bot' ) ? 'desktop' : 'mobile';
	}

	// Save mobile device detection result, so it is not necessary to run the get_device() for every page.
	// Make the cookie expires in 30 days.
	setcookie('pwamp_style', $device, time() + 60 * 60 * 24 * 30, COOKIEPATH, COOKIE_DOMAIN);

	// Mobile device redirection.  If end user does not access from mobile device, exits this plugin.
	if ( $device != 'mobile' )
	{
		// Add <link rel="amphtml" href="..."> for non-mobile pages.  So AMP pages can be found by these amphtml links.
		add_action( 'wp_head', array($pwamp, 'get_amphtml'), 0 );

		return;
	}


	// Install PWA.
	add_action( 'init', array($pwamp, 'init') );


	// Prepare to catch page output.
	add_action( 'after_setup_theme', array($pwamp, 'after_setup_theme') );

	// When page output is finished, updates the page content to make it AMP compliant.
	add_action( 'shutdown', array($pwamp, 'shutdown') );


	// When end users submit comments successfully, continues with comment_post_redirect().
	add_filter( 'comment_post_redirect', array($pwamp, 'comment_post_redirect'), 10, 2 );

	// When end users submit comments failure, continues with wp_die_handler().
	add_filter( 'wp_die_handler', array($pwamp, 'wp_die_handler'), 10, 1 );
}
add_action( 'plugins_loaded', 'pwamp_main', 1 );