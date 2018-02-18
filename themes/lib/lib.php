<?php
/*
	project: PWAMP
	file:    ABSPATH/wp-content/plugins/pwamp/themes/library.php
	version: 1.0.0
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


	protected function update_content(&$page, $home_url, $permalink_structure)
	{
		$page = preg_replace('#^<!DOCTYPE html>$#im', '<!doctype html>', $page, 1);
		$page = preg_replace('#^<html #im', '<html amp ', $page, 1);


		// Only AMP runtime 'script' tags are allowed, and only in the document head.
		$page = preg_replace('#^[\s\t]*<script[^>]*>.*</script>$#imsU', '', $page);

		// The mandatory attribute 'amp-custom' is missing in tag 'style amp-custom'.
		$page = preg_replace('#^[\s\t]*<style[^>]*>.*</style>$#imsU', '', $page);

		// Remove <!--[if lt IE 9]> ...... <![endif]--> .
		$page = preg_replace('#^[\s\t]*<!--.*-->$#imsU', '', $page);


		// The attribute 'onclick' may not appear in tag 'a'.
		$page = preg_replace('#<a ([^>]+) onclick=\'[^\']*\' ([^>]+)>#i', '<a $1 $2>', $page);

		// The inline 'style' attribute is not allowed in AMP documents. Use 'style amp-custom' tag instead.
		$page = preg_replace('#<a ([^>]+) style="[^"]*">#i', '<a $1>', $page);

		// The attribute 'action' may not appear in tag 'FORM [method=POST]'.
		$page = preg_replace('#<form action=#i', '<form action-xhr=', $page);

		// The mandatory attribute 'target' is missing in tag 'FORM [method=GET]'.
		$page = preg_replace('#<form ([^>]+)>#i', '<form $1 target="_top">', $page);

		// The tag 'img' may only appear as a descendant of tag 'noscript'. Did you mean 'amp-img'?
		$page = preg_replace('#<img #i', '<amp-img ', $page);


		$amp_serviceworker = '<body${1}>' . "\n";
		$amp_serviceworker .= '<amp-install-serviceworker
	src="' . $home_url . '/' . ( !empty($permalink_structure) ? 'pwamp-sw.js' : '?pwamp=sw-js' ) . '"
	data-iframe-src="' . $home_url . '/' . ( !empty($permalink_structure) ? 'pwamp-sw.html' : '?pwamp=sw-html' ) . '"
	layout="nodisplay">
</amp-install-serviceworker>';
		$page = preg_replace('#^<body([^>]*)>#im', $amp_serviceworker, $page, 1);

		$page = preg_replace('#^[\s\t]*</head>#im', '</head>', $page, 1);

		// The tag 'link rel=canonical' appears more than once in the document.
		$page = preg_replace('#^<link rel="canonical" .+ />$#im', '', $page, 1);

		// The attribute 'href' in tag 'link rel=stylesheet for fonts' is set to the invalid value...
		$page = preg_replace('#^<link rel=\'stylesheet\' id=\'genericons-css\' .+ />$#im', '', $page, 1);

		$page = preg_replace('#^[\s\t]*<link #im', '<link ', $page);

		$page = preg_replace('#^[\s\t]*<meta #im', '<meta ', $page);


		// Temporary solution for comments icon overlap with title and date.
		$page = preg_replace('#<amp-img alt=\'\' [^>]+>[\s\t]*#i', '', $page);


		// Remove blank lines.
		$page = preg_replace('#(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+#', "\n", $page);

		return $page;
	}

	protected function update_header(&$page, $canonical)
	{
		// The mandatory tag 'amphtml engine v0.js script' is missing or incorrect.
		$amp_header = '<script async src="https://cdn.ampproject.org/v0.js"></script>' . "\n";

		// The mandatory tag 'link rel=canonical' is missing or incorrect.
		$amp_header .= $canonical . "\n";

		// The property 'minimum-scale' is missing from attribute 'content' in tag 'meta name=viewport'.
		$amp_header .= '<meta name="viewport" content="width=device-width, minimum-scale=1, initial-scale=1">' . "\n";

		// The mandatory tag 'noscript enclosure for boilerplate' is missing or incorrect.
		$amp_header .= '<style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style><noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>' . "\n";

		$amp_header .= '<script async custom-element="amp-install-serviceworker" src="https://cdn.ampproject.org/v0/amp-install-serviceworker-0.1.js"></script>' . "\n";

		// The tag 'FORM [method=GET]' requires including the 'amp-form' extension JavaScript.
		$amp_header .= '<script async custom-element="amp-form" src="https://cdn.ampproject.org/v0/amp-form-0.1.js"></script>' . "\n";

		// amp-custom style
		$amp_header .= '<style amp-custom>' . $this->amp_style . '</style>';

		$page = preg_replace('#^[\s\t]*<meta name="viewport" content="width=device-width[^"]*">$#im', $amp_header, $page, 1);

		return $page;
	}
}