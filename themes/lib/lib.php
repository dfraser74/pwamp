<?php
/*
	project: PWAMP
	file:    ABSPATH/wp-content/plugins/pwamp/themes/library.php
	version: 1.1.0
	author:  Rickey Gu
	web:     https://flexplat.com
	email:   rickey29@gmail.com
*/
if ( !defined( 'ABSPATH' ) ) exit;  // Exit if accessed directly.


class PWAMP_Library
{
	public function __construct()
	{
	}

	public function __destruct()
	{
	}


	protected function minify_css($css)
	{
		$css = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $css);
		$css = preg_replace('#[\s\t]*!important;#i', ';', $css);
		$css = str_replace(' {', '{', $css);
		$css = str_replace(': ', ':', $css);
		$css = str_replace(', ', ',', $css);
		$css = str_replace('; ', ';', $css);
		$css = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $css);

		return $css;
	}


	protected function transcode_html(&$page, $home_url, $permalink)
	{
		// Remove HTML comments.
		$page = preg_replace('#<!--.*-->#isU', '', $page);

		$page = preg_replace('#^<!DOCTYPE([^>]+)>$#im', '<!doctype${1}>', $page, 1);

		// The attribute 'onclick' may not appear in tag 'a'.
		$page = preg_replace('#<a([^>]*)onclick=\'[^\']+\'([^>]*)>#i', '<a${1}${2}>', $page);

		$serviceworker = '<body${1}>' . "\n";
		$serviceworker .= '<amp-install-serviceworker
	src="' . $home_url . '/' . ( $permalink == 'pretty' ? 'pwamp-sw.js' : '?pwamp=sw-js' ) . '"
	data-iframe-src="' . $home_url . '/' . ( $permalink == 'pretty' ? 'pwamp-sw.html' : '?pwamp=sw-html' ) . '"
	layout="nodisplay">
</amp-install-serviceworker>';
		$page = preg_replace('#^<body([^>]*)>$#im', $serviceworker, $page, 1);

		// The attribute 'action' may not appear in tag 'FORM [method=POST]'.
		$page = preg_replace('#<form action=([^>]+)>#i', '<form action-xhr=${1}>', $page);

		// The mandatory attribute 'target' is missing in tag 'FORM [method=GET]'.
		$page = preg_replace('#<form([^>]+)>#i', '<form${1} target="_top">', $page);

		$page = preg_replace('#^[\s\t]*</head>$#im', '</head>', $page, 1);

		$page = preg_replace('#^<html([^>]+)>$#im', '<html amp${1}>', $page, 1);

		// The tag 'link rel=canonical' appears more than once in the document.
		$page = preg_replace('#^<link rel="canonical" href="[^"]+" />$#im', '', $page, 1);

		// The attribute 'href' in tag 'link rel=stylesheet for fonts' is set to the invalid value...
		$page = preg_replace('#^<link rel=\'stylesheet\' id=\'[^\']+\'  href=\'[^\']+\.css[^\']+\' type=\'text/css\' media=\'all\' />$#im', '', $page);

		$page = preg_replace('#^[\s\t]*<link([^>]+)>$#im', '<link${1}>', $page);

		$page = preg_replace('#^[\s\t]*<meta charset="([^"]+)"/>$#im', '<meta charset="${1}"/>', $page);

		// Only AMP runtime 'script' tags are allowed, and only in the document head.
		$page = preg_replace('#^[\s\t]*<script[^>]*>.*</script>$#imsU', '', $page);

		// The mandatory attribute 'amp-custom' is missing in tag 'style amp-custom'.
		$pattern = '#[\s\t]*<style type="text/css"( id="[^"]+")?>(.*)</style>#isU';
		if ( preg_match_all($pattern, $page, $matches) )
		{
			foreach ( $matches[2] as $value )
			{
				if ( empty($value) )
				{
					continue;
				}

				$this->amp_style .= $this->minify_css($value);
			}

			$page = preg_replace($pattern, '', $page);
		}

		$page = preg_replace('#^[\s\t]*<title>(.+)</title>$#im', '<title>${1}</title>', $page, 1);

		return $page;
	}

	protected function transcode_head(&$page, $canonical)
	{
		// Remove blank lines.
		$page = preg_replace('#(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+#', "\n", $page);


		// The mandatory tag 'amphtml engine v0.js script' is missing or incorrect.
		$amp_header = '<script async src="https://cdn.ampproject.org/v0.js"></script>' . "\n";

		// The mandatory tag 'link rel=canonical' is missing or incorrect.
		$amp_header .= $canonical . "\n";

		// The property 'minimum-scale' is missing from attribute 'content' in tag 'meta name=viewport'.
		$amp_header .= '<meta name="viewport" content="width=device-width, minimum-scale=1, initial-scale=1">' . "\n";

		// The mandatory tag 'noscript enclosure for boilerplate' is missing or incorrect.
		$amp_header .= '<style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style><noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>' . "\n";

		// Import the amp-fit-text component.
		$amp_header .= '<script async custom-element="amp-fit-text" src="https://cdn.ampproject.org/v0/amp-fit-text-0.1.js"></script>' . "\n";

		// The tag 'FORM [method=GET]' requires including the 'amp-form' extension JavaScript.
		$amp_header .= '<script async custom-element="amp-form" src="https://cdn.ampproject.org/v0/amp-form-0.1.js"></script>' . "\n";

		// Import amp-install-serviceworker component from AMP project CDN.
		$amp_header .= '<script async custom-element="amp-install-serviceworker" src="https://cdn.ampproject.org/v0/amp-install-serviceworker-0.1.js"></script>' . "\n";

		// Import the amp-sidebar component.
		$amp_header .= '<script async custom-element="amp-sidebar" src="https://cdn.ampproject.org/v0/amp-sidebar-0.1.js"></script>' . "\n";

		// amp-custom style
		$amp_header .= '<style amp-custom>' . "\n";
		$amp_header .= $this->amp_style . "\n";
		$amp_header .= '</style>';

		$page = preg_replace('#^[\s\t]*<meta name="viewport" content="width=device-width[^"]*">$#im', $amp_header, $page, 1);

		return $page;
	}
}