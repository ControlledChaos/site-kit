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
 * Icons path
 *
 * @since  1.0.0
 * @param  string $path Path to (including) icons directory.
 * @return string
 */
function icons_path( $path = 'svg' ) {
	return $path;
}

/**
 * Icons path for ClassicPress/WordPress
 *
 * @since  1.0.0
 * @param  string $path Path to (including) icons directory.
 * @return string
 */
function icons_path( $path = 'svg' ) {

	if ( ! function_exists( 'apply_filters' ) ) {
		return $path;
	}
	return apply_filters( 'svg_icons_path', $path );
}

/**
 * SVG icon
 *
 * Returns the path and filename.
 *
 * @example `theme/assets/svg/slab-regular/arrow-right.svg`
 *
 * @since  1.0.0
 * @param  array $params
 *               'path'  => Path to (including) icons directory.
 *               'style' => Icon style directory (e.g. `slab-regular`).
 *               'name'  => Filename of the SVG icon, no extension.
 * @param  boolean Whether to return the path/file or the SVG code.
 * @return mixed Returns $path/$to/$svg/$icon.svg or false.
 */
function icon( $params = [ 'path' => false, 'style' => '', 'name' => '' ], $print = false ) {

	// Maybe use default path.
	if ( ! $params['path'] ) {
		$path = icons_path();
	} else {
		$path = $params['path'];
	}

	// Concatenate file path parts.
	$file = sprintf(
		'%1s/%2s/%3s.svg',
		$path,
		$params['style'],
		$params['name']
	);

	// Return how you like it.
	if ( is_file( $file ) ) {
		if ( $print ) {
			return file_get_contents( $file );
		}
		return $file;
	}
	return false;
}
