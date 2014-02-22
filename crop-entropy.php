<?php
/*
Plugin Name: Crop Entropy
Description: Cropping upload images based on their entropy
Author: Sergej M&uuml;ller
Author URI: http://wpcoder.de
Version: 0.0.3
*/


/* Security */
if ( ! class_exists('WP') ) {
	die();
}


/* Lets fun */
if ( is_admin() && extension_loaded('imagick') ) {
	add_filter(
		'wp_generate_attachment_metadata',
		function ($upload_data, $attachment_id) {
			/* Upload folder */
			$upload_dir = wp_upload_dir();

			/* WP-Bugfix */
			if ( empty($upload_dir['subdir']) ) {
				$upload_path = $upload_dir['path'];
				$upload_url = $upload_dir['url'];
				$upload_file = $upload_data['file'];
			} else {
				$file_info = pathinfo($upload_data['file']);
				$upload_path = path_join($upload_dir['basedir'], $file_info['dirname']);
				$upload_url = path_join($upload_dir['baseurl'], $file_info['dirname']);
				$upload_file = $file_info['basename'];
			}

			/* Original image */
			$original_file = path_join($upload_path, $upload_file);

			/* Images only */
			if ( ! file_is_displayable_image($original_file) ) {
				return $upload_data;
			}

			/* No thumbs? */
			if ( empty($upload_data['sizes']) ) {
				return $upload_data;
			}

			/* Evil */
			@ini_set('max_execution_time', 60);

			/* Require libs */
			require_once (plugin_dir_path(__FILE__). 'src/stojg/crop/Crop.php');
			require_once (plugin_dir_path(__FILE__). 'src/stojg/crop/CropEntropy.php');

			/* Loop the thumbs */
			foreach( $upload_data['sizes'] as $thumb ) {
				$stojg = new \stojg\crop\CropEntropy($original_file);
				$croppedImage = $stojg->resizeAndCrop($thumb['width'], $thumb['height']);
				$croppedImage->writeimage( path_join($upload_path, $thumb['file']) );
			}

			return $upload_data;
		},
		10,
		2
	);
}