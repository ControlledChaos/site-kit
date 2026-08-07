<?php
/**
 * Functions for SVG icons
 *
 * @package  SVG_Icons
 * @category Functions
 * @version  1.0.0
 */

namespace SVG_Icons;

/**
 * Get SVG icon
 *
 * Returns the path and filename.
 *
 * @example `theme/assets/svg/slab-regular/arrow-right.svg`
 *
 * @since  1.0.0
 * @param  string $path Path to (including) icons directory.
 * @param  string $style Icon style directory (e.g. `slab-regular`).
 * @param  string $name Filename of the SVG icon, no extension.
 * @return mixed  Returns $path/$to/$svg/$icon.svg or false.
 */
function get_icon( $path = '', $style = '', $name = '' ) {

	// Concatenate file path parts.
	$file = sprintf(
		'%1s/%2s/%3s.svg',
		$path,
		$style,
		$name
	);

	// Return path/file.svg or false.
	if ( is_file( $file ) ) {
		return $file;
	}
	return false;
}
