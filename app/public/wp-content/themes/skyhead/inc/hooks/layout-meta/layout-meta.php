<?php
/**
 * Implement theme metabox.
 *
 * @package skyhead
 */

if ( ! function_exists( 'skyhead_add_theme_meta_box' ) ) :

	/**
	 * Add the Meta Box
	 *
	 * @since 1.0.0
	 */
	function skyhead_add_theme_meta_box() {

		$apply_metabox_post_types = array( 'post', 'page' );

		foreach ( $apply_metabox_post_types as $key => $type ) {
			add_meta_box(
				'theme-settings',
				esc_html__( 'Single Page/Post Settings', 'skyhead' ),
				'skyhead_render_theme_settings_metabox',
				$type
			);
		}

	}

endif;

add_action( 'add_meta_boxes', 'skyhead_add_theme_meta_box' );

if ( ! function_exists( 'skyhead_render_theme_settings_metabox' ) ) :

	/**
	 * Render theme settings meta box.
	 *
	 * @since 1.0.0
	 */
	function skyhead_render_theme_settings_metabox( $post, $metabox ) {

		$post_id = $post->ID;
		$skyhead_post_meta_value = get_post_meta($post_id);

		// Meta box nonce for verification.
		wp_nonce_field( basename( __FILE__ ), 'skyhead_meta_box_nonce' );
		// Fetch Options list.
		$skyhead_global_layout = skyhead_get_option('global_layout');
		$skyhead_single_image_layout = skyhead_get_option('single_post_image_layout');
	?>
	<div id="skyhead-settings-metabox-container" class="skyhead-settings-metabox-container">
		<div id="skyhead-settings-metabox-tab-layout">
			<h4><?php echo __( 'Layout Settings', 'skyhead' ); ?></h4>
			<div class="skyhead-row-content">
				 <!-- Checkbox Field-->
				     <p>
				     <div class="skyhead-row-content">
				         <label for="skyhead-meta-checkbox">
				             <input type="checkbox" name="skyhead-meta-checkbox" id="skyhead-meta-checkbox" value="yes" <?php if ( isset ( $skyhead_post_meta_value['skyhead-meta-checkbox'] ) ) checked( $skyhead_post_meta_value['skyhead-meta-checkbox'][0], 'yes' ); ?> />
				             <?php _e( 'Check To Use Featured Image As Banner Image', 'skyhead' )?>
				         </label>
				     </div>
				     </p>
			     <!-- Select Field-->
			        <p>
			            <label for="skyhead-meta-select-layout" class="skyhead-row-title">
			                <?php _e( 'Single Page/Post Layout', 'skyhead' )?>
			            </label>
			            <select name="skyhead-meta-select-layout" id="skyhead-meta-select-layout">
			            	<?php if ($skyhead_global_layout == 'right-sidebar') { ?>
			                	<option value="right-sidebar" <?php if ( isset ( $skyhead_post_meta_value['skyhead-meta-select-layout'] ) ) selected( $skyhead_post_meta_value['skyhead-meta-select-layout'][0], 'right-sidebar' ); ?>><?php _e( 'Content - Primary Sidebar', 'skyhead' )?></option>';
				                <option value="left-sidebar" <?php if ( isset ( $skyhead_post_meta_value['skyhead-meta-select-layout'] ) ) selected( $skyhead_post_meta_value['skyhead-meta-select-layout'][0], 'left-sidebar' ); ?>><?php _e( 'Primary Sidebar - Content', 'skyhead' )?></option>';
				                <option value="no-sidebar" <?php if ( isset ( $skyhead_post_meta_value['skyhead-meta-select-layout'] ) ) selected( $skyhead_post_meta_value['skyhead-meta-select-layout'][0], 'no-sidebar' ); ?>><?php _e( 'No Sidebar', 'skyhead' )?></option>';
			            	<?php }
			            		elseif ($skyhead_global_layout == 'left-sidebar') { ?>
				                <option value="left-sidebar" <?php if ( isset ( $skyhead_post_meta_value['skyhead-meta-select-layout'] ) ) selected( $skyhead_post_meta_value['skyhead-meta-select-layout'][0], 'left-sidebar' ); ?>><?php _e( 'Primary Sidebar - Content', 'skyhead' )?></option>';
			                	<option value="right-sidebar" <?php if ( isset ( $skyhead_post_meta_value['skyhead-meta-select-layout'] ) ) selected( $skyhead_post_meta_value['skyhead-meta-select-layout'][0], 'right-sidebar' ); ?>><?php _e( 'Content - Primary Sidebar', 'skyhead' )?></option>';
				                <option value="no-sidebar" <?php if ( isset ( $skyhead_post_meta_value['skyhead-meta-select-layout'] ) ) selected( $skyhead_post_meta_value['skyhead-meta-select-layout'][0], 'no-sidebar' ); ?>><?php _e( 'No Sidebar', 'skyhead' )?></option>';
			            	<?php }
			            		elseif ($skyhead_global_layout == 'no-sidebar'){ ?>
				                <option value="no-sidebar" <?php if ( isset ( $skyhead_post_meta_value['skyhead-meta-select-layout'] ) ) selected( $skyhead_post_meta_value['skyhead-meta-select-layout'][0], 'no-sidebar' ); ?>><?php _e( 'No Sidebar', 'skyhead' )?></option>';
			            	    <option value="left-sidebar" <?php if ( isset ( $skyhead_post_meta_value['skyhead-meta-select-layout'] ) ) selected( $skyhead_post_meta_value['skyhead-meta-select-layout'][0], 'left-sidebar' ); ?>><?php _e( 'Primary Sidebar - Content', 'skyhead' )?></option>';
			                	<option value="right-sidebar" <?php if ( isset ( $skyhead_post_meta_value['skyhead-meta-select-layout'] ) ) selected( $skyhead_post_meta_value['skyhead-meta-select-layout'][0], 'right-sidebar' ); ?>><?php _e( 'Content - Primary Sidebar', 'skyhead' )?></option>';
			            	<?php } ?>
			            </select>
			        </p>

		         <!-- Select Field-->
		            <p>
		                <label for="skyhead-meta-image-layout" class="skyhead-row-title">
		                    <?php _e( 'Single Page/Post Image Layout', 'skyhead' )?>
		                </label>
		                <select name="skyhead-meta-image-layout" id="skyhead-meta-image-layout">
		                	<?php if ($skyhead_single_image_layout == 'full') { ?>
		                    	<option value="full" <?php if ( isset ( $skyhead_post_meta_value['skyhead-meta-image-layout'] ) ) selected( $skyhead_post_meta_value['skyhead-meta-image-layout'][0], 'full' ); ?>><?php _e( 'Full', 'skyhead' )?></option>';
		    	                <option value="right" <?php if ( isset ( $skyhead_post_meta_value['skyhead-meta-image-layout'] ) ) selected( $skyhead_post_meta_value['skyhead-meta-image-layout'][0], 'right' ); ?>><?php _e( 'Right', 'skyhead' )?></option>';
		    	                <option value="left" <?php if ( isset ( $skyhead_post_meta_value['skyhead-meta-image-layout'] ) ) selected( $skyhead_post_meta_value['skyhead-meta-image-layout'][0], 'left' ); ?>><?php _e( 'Left', 'skyhead' )?></option>';
		    	                <option value="no-image" <?php if ( isset ( $skyhead_post_meta_value['skyhead-meta-image-layout'] ) ) selected( $skyhead_post_meta_value['skyhead-meta-image-layout'][0], 'no-image' ); ?>><?php _e( 'No-Image', 'skyhead' )?></option>';
		                	<?php }
		                		elseif ($skyhead_single_image_layout == 'right') { ?>
		    	                <option value="right" <?php if ( isset ( $skyhead_post_meta_value['skyhead-meta-image-layout'] ) ) selected( $skyhead_post_meta_value['skyhead-meta-image-layout'][0], 'right' ); ?>><?php _e( 'Right', 'skyhead' )?></option>';
		    	                <option value="full" <?php if ( isset ( $skyhead_post_meta_value['skyhead-meta-image-layout'] ) ) selected( $skyhead_post_meta_value['skyhead-meta-image-layout'][0], 'full' ); ?>><?php _e( 'Full', 'skyhead' )?></option>';
		    	                <option value="left" <?php if ( isset ( $skyhead_post_meta_value['skyhead-meta-image-layout'] ) ) selected( $skyhead_post_meta_value['skyhead-meta-image-layout'][0], 'left' ); ?>><?php _e( 'Left', 'skyhead' )?></option>';
		    	                <option value="no-image" <?php if ( isset ( $skyhead_post_meta_value['skyhead-meta-image-layout'] ) ) selected( $skyhead_post_meta_value['skyhead-meta-image-layout'][0], 'no-image' ); ?>><?php _e( 'No-Image', 'skyhead' )?></option>';
		                	<?php }
		                		elseif ($skyhead_single_image_layout == 'left'){ ?>
		                		<option value="left" <?php if ( isset ( $skyhead_post_meta_value['skyhead-meta-image-layout'] ) ) selected( $skyhead_post_meta_value['skyhead-meta-image-layout'][0], 'left' ); ?>><?php _e( 'Left', 'skyhead' )?></option>';
		                		<option value="right" <?php if ( isset ( $skyhead_post_meta_value['skyhead-meta-image-layout'] ) ) selected( $skyhead_post_meta_value['skyhead-meta-image-layout'][0], 'right' ); ?>><?php _e( 'Right', 'skyhead' )?></option>';
		                		<option value="full" <?php if ( isset ( $skyhead_post_meta_value['skyhead-meta-image-layout'] ) ) selected( $skyhead_post_meta_value['skyhead-meta-image-layout'][0], 'full' ); ?>><?php _e( 'Full', 'skyhead' )?></option>';
		                		<option value="no-image" <?php if ( isset ( $skyhead_post_meta_value['skyhead-meta-image-layout'] ) ) selected( $skyhead_post_meta_value['skyhead-meta-image-layout'][0], 'no-image' ); ?>><?php _e( 'No-Image', 'skyhead' )?></option>';
		                	<?php }
		                		elseif ($skyhead_single_image_layout == 'no-image'){ ?>
		                		<option value="no-image" <?php if ( isset ( $skyhead_post_meta_value['skyhead-meta-image-layout'] ) ) selected( $skyhead_post_meta_value['skyhead-meta-image-layout'][0], 'no-image' ); ?>><?php _e( 'No-Image', 'skyhead' )?></option>';
		                		<option value="right" <?php if ( isset ( $skyhead_post_meta_value['skyhead-meta-image-layout'] ) ) selected( $skyhead_post_meta_value['skyhead-meta-image-layout'][0], 'right' ); ?>><?php _e( 'Right', 'skyhead' )?></option>';
		                		<option value="full" <?php if ( isset ( $skyhead_post_meta_value['skyhead-meta-image-layout'] ) ) selected( $skyhead_post_meta_value['skyhead-meta-image-layout'][0], 'full' ); ?>><?php _e( 'Full', 'skyhead' )?></option>';
		                		<option value="left" <?php if ( isset ( $skyhead_post_meta_value['skyhead-meta-image-layout'] ) ) selected( $skyhead_post_meta_value['skyhead-meta-image-layout'][0], 'left' ); ?>><?php _e( 'Left', 'skyhead' )?></option>';
		                	<?php } ?>
		                </select>
		            </p> 
			</div><!-- .skyhead-row-content -->
		</div><!-- #skyhead-settings-metabox-tab-layout -->
	</div><!-- #skyhead-settings-metabox-container -->

    <?php
	}

endif;



if ( ! function_exists( 'skyhead_save_theme_settings_meta' ) ) :

	/**
	 * Save theme settings meta box value.
	 *
	 * @since 1.0.0
	 *
	 * @param int     $post_id Post ID.
	 * @param WP_Post $post Post object.
	 */
	function skyhead_save_theme_settings_meta( $post_id, $post ) {

		// Verify nonce.
		if ( ! isset( $_POST['skyhead_meta_box_nonce'] ) || ! wp_verify_nonce( $_POST['skyhead_meta_box_nonce'], basename( __FILE__ ) ) ) {
			  return; }

		// Bail if auto save or revision.
		if ( defined( 'DOING_AUTOSAVE' ) || is_int( wp_is_post_revision( $post ) ) || is_int( wp_is_post_autosave( $post ) ) ) {
			return;
		}

		// Check the post being saved == the $post_id to prevent triggering this call for other save_post events.
		if ( empty( $_POST['post_ID'] ) || $_POST['post_ID'] != $post_id ) {
			return;
		}

		// Check permission.
		if ( 'page' === $_POST['post_type'] ) {
			if ( ! current_user_can( 'edit_page', $post_id ) ) {
				return; }
		} else if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}

			// Checks for input and saves (checkbox)
			    if( isset( $_POST[ 'skyhead-meta-checkbox' ] ) ) {
			    	   $valid_values = array(
                       'yes',
                       '',
   						);
			    	$new = sanitize_text_field($_POST['skyhead-meta-checkbox'],'yes');
			    	if( in_array( $new, $valid_values ) ) {
				    	update_post_meta($post_id, 'skyhead-meta-checkbox', $new);
			    	}
			    } else {
			    	$valid_values = array(
                       'yes',
                       '',
   					);
			    	$new = sanitize_text_field($_POST['skyhead-meta-checkbox'],'');
			    	if( in_array( $new, $valid_values ) ) {
			    		update_post_meta($post_id, 'skyhead-meta-checkbox', $new);
			    	}
			    }

			// Checks for input and saves if needed (select field)
			  	if( isset( $_POST[ 'skyhead-meta-select-layout' ] ) ) {
			  		$valid_values = array(
                       'right-sidebar',
                       'left-sidebar',
                       'no-sidebar',
   					);
			  		$new = sanitize_text_field($_POST['skyhead-meta-select-layout']);
			  		if( in_array( $new, $valid_values ) ) {
			  			update_post_meta($post_id, 'skyhead-meta-select-layout', $new);
			  		}
			  	}
			// Checks for input and saves if needed (select field)
			  	if( isset( $_POST[ 'skyhead-meta-image-layout' ] ) ) {
			  		$valid_values = array(
                       'full',
                       'right',
                       'left',
                       'no-image',
   					);
			  		$new = sanitize_text_field($_POST['skyhead-meta-image-layout']);
			  		if( in_array( $new, $valid_values ) ) {
				  		update_post_meta($post_id, 'skyhead-meta-image-layout', $new);
			  		}
			  	}
	}

endif;

add_action( 'save_post', 'skyhead_save_theme_settings_meta', 10, 3 );