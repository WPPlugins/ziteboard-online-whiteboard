<?php
/*
Plugin Name: Ziteboard Online Whiteboard
Plugin URI: https://wordpress.org/plugins/ziteboard-online-whiteboard/
Description: Embed an infinite, zoomable whiteboard from Ziteboard (https://ziteboard.com) - an online whiteboard with real-time collaboration.
Version: 2.5.0
Author: Ziteboard <hello@ziteboard.com>
Author URI: https://ziteboard.com
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl.html
Text Domain: ziteboard-online-whiteboard
*/

function ziteboard_online_whiteboard_shortcode( $atts ) {
	$defaults = array(
		'src' => 'https://view.ziteboard.com/shared/cUEJg5uORd2HxI5GjMi',
		'width' => '600px',
		'height' => '400px',
		'class' => 'ziteboard-class',
		'style' => ''
	);

	foreach ( $defaults as $default => $value ) { // add defaults
		if ( ! @array_key_exists( $default, $atts ) ) { // mute warning with "@" when no params at all
			$atts[$default] = $value;
		}
	}

	$style = 'width:'.$atts['width'].';height:'.$atts['height'].';border:1px solid #ccc;'.$atts['style'];

	$html = "\n".'<!-- ziteboard plugin started -->'."\n";
	$html .= '<div class="'.$atts["class"].'" style="'.$style.'">'."\n";
	$html .= '<div style="position:relative;z-index:10;height:40px;padding-left:4px;width:150px;"><a style="text-decoration:none;color:#CCC;font-size:20px;font-family:Dosis;" href="https://ziteboard.com" target="_blank">Zoom & Move</a></div>'."\n";
	$html .= '<iframe frameborder="0" scrolling="no" seamless="seamless" allowfullscreen style="position:relative;width: 100%; height: 100%;top:-40px;"';
	$html .= ' src="'.$atts['src'].'" name="ziteboard-online-whiteboard-wp-plugin"></iframe>'."\n";
	$html .= '</div>'."\n";
	$html .= '<!-- ziteboard plugin ended -->'."\n";
	return $html;
}
add_shortcode( 'ZITEBOARD', 'ziteboard_online_whiteboard_shortcode' );
