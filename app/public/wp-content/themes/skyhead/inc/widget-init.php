<?php
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function skyhead_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'skyhead' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'skyhead' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	$skyhead_footer_widgets_number = skyhead_get_option('number_of_footer_widget');

	if( $skyhead_footer_widgets_number > 0 ){
	    register_sidebar(array(
	        'name' => __('Footer Column One', 'skyhead'),
	        'id' => 'footer-col-one',
	        'description' => __('Displays items on footer section.','skyhead'),
	        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	        'after_widget' => '</aside>',
	        'before_title'  => '<h1 class="widget-title">',
	        'after_title'   => '</h1>',
	    ));
	    if( $skyhead_footer_widgets_number > 1 ){
	        register_sidebar(array(
	            'name' => __('Footer Column Two', 'skyhead'),
	            'id' => 'footer-col-two',
	            'description' => __('Displays items on footer section.','skyhead'),
	            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	            'after_widget' => '</aside>',
	            'before_title'  => '<h1 class="widget-title">',
	            'after_title'   => '</h1>',
	        ));
	    }
	    if( $skyhead_footer_widgets_number > 2 ){
	        register_sidebar(array(
	            'name' => __('Footer Column Three', 'skyhead'),
	            'id' => 'footer-col-three',
	            'description' => __('Displays items on footer section.','skyhead'),
	            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	            'after_widget' => '</aside>',
	            'before_title'  => '<h1 class="widget-title">',
	            'after_title'   => '</h1>',
	        ));
	    }
	    if( $skyhead_footer_widgets_number > 3 ){
	        register_sidebar(array(
	            'name' => __('Footer Column Four', 'skyhead'),
	            'id' => 'footer-col-four',
	            'description' => __('Displays items on footer section.','skyhead'),
	            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	            'after_widget' => '</aside>',
	            'before_title'  => '<h1 class="widget-title">',
	            'after_title'   => '</h1>',
	        ));
	    }
	}
}
add_action( 'widgets_init', 'skyhead_widgets_init' );
