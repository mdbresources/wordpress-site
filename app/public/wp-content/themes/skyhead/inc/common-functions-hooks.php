<?php
if ( ! function_exists( 'skyhead_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 * @since skyhead 1.0.0
 */
function skyhead_the_custom_logo() {
    if ( function_exists( 'the_custom_logo' ) ) {
        the_custom_logo();
    }
}
endif;


if ( ! function_exists( 'skyhead_body_class' ) ) :

	/**
	 * body class.
	 *
	 * @since 1.0.0
	 */
	function skyhead_body_class($skyhead_body_class) {
		global $post;
		$global_layout = skyhead_get_option( 'global_layout' );

		// Check if single.
		if ( $post && is_singular() ) {
			$post_options = get_post_meta( $post->ID, 'skyhead-meta-select-layout', true );
			if ( empty( $post_options ) ) {
				$global_layout = esc_attr( skyhead_get_option('global_layout') );
			} else{
				$global_layout = esc_attr($post_options);
			}
		}
		if ($global_layout == 'left-sidebar') {
			$skyhead_body_class[]= 'left-sidebar';
		}
		elseif ($global_layout == 'no-sidebar') {
			$skyhead_body_class[]= 'no-sidebar';
		}
		else{
			$skyhead_body_class[]= 'right-sidebar';

		}
		return $skyhead_body_class;

	}
endif;

add_action( 'body_class', 'skyhead_body_class' );
/**
* Returns word count of the sentences.
*
* @since skyhead 1.0.0
*/
if ( ! function_exists( 'skyhead_words_count' ) ) :
	function skyhead_words_count( $length = 25, $skyhead_content = null ) {
		$length = absint( $length );
		$source_content = preg_replace( '`\[[^\]]*\]`', '', $skyhead_content );
		$trimmed_content = wp_trim_words( $source_content, $length, '...' );
		return $trimmed_content;
	}
endif;


if ( ! function_exists( 'skyhead_simple_breadcrumb' ) ) :

	/**
	 * Simple breadcrumb.
	 *
	 * @since 1.0.0
	 */
	function skyhead_simple_breadcrumb() {

		if ( ! function_exists( 'breadcrumb_trail' ) ) {

			require_once get_template_directory() . '/assets/libraries/breadcrumbs/breadcrumbs.php';
		}

		$breadcrumb_args = array(
			'container'   => 'div',
			'show_browse' => false,
		);
		breadcrumb_trail( $breadcrumb_args );

	}

endif;


if ( ! function_exists( 'skyhead_custom_posts_navigation' ) ) :
	/**
	 * Posts navigation.
	 *
	 * @since 1.0.0
	 */
	function skyhead_custom_posts_navigation() {

		$pagination_type = skyhead_get_option( 'pagination_type' );

		switch ( $pagination_type ) {

			case 'default':
				the_posts_navigation();
			break;

			case 'numeric':
				the_posts_pagination();
			break;

			default:
			break;
		}

	}
endif;

add_action( 'skyhead_action_posts_navigation', 'skyhead_custom_posts_navigation' );


if( ! function_exists( 'skyhead_excerpt_length' ) ) :

    /**
     * Excerpt length
     *
     * @since  skyhead 1.0.0
     *
     * @param null
     * @return int
     */
    function skyhead_excerpt_length( $length ){
        $excerpt_length = skyhead_get_option('excerpt_length_global');
        if ( empty( $excerpt_length) ) {
            $excerpt_length = $length;
        }
        return absint( $excerpt_length );

    }

endif;
add_filter( 'excerpt_length', 'skyhead_excerpt_length', 999 );

if ( ! function_exists( 'skyhead_fonts_url' ) ) :

	/**
	 * Return fonts URL.
	 *
	 * @since 1.0.0
	 * @return string Fonts URL.
	 */
	function skyhead_fonts_url() {

		$fonts_url = '';
		$fonts     = array();
		$subsets   = 'latin,latin-ext';

		/* translators: If there are characters in your language that are not supported by Open Sans, translate this to 'off'. Do not translate into your own language. */
		if ( 'off' !== _x( 'on', 'Roboto font: on or off', 'skyhead' ) ) {
			$fonts[] = 'Roboto:100,300,400,400i,500,700';
		}

		/* translators: If there are characters in your language that are not supported by Oswald, translate this to 'off'. Do not translate into your own language. */
		if ( 'off' !== _x( 'on', 'Poppins font: on or off', 'skyhead' ) ) {
			$fonts[] = 'Poppins:300,400,500,600,700';
		}

		if ( $fonts ) {
			$fonts_url = add_query_arg( array(
				'family' => urlencode( implode( '|', $fonts ) ),
				'subset' => urlencode( $subsets ),
			), 'https://fonts.googleapis.com/css' );
		}

		return $fonts_url;

	}

endif;