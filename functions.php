<?php

function moumoucow_enqueue_style() {
	wp_enqueue_style( 'style', get_stylesheet_uri(), false );
	wp_enqueue_style( 'style-google-font-japanese', "https://fonts.googleapis.com/earlyaccess/roundedmplus1c.css", false );	
}

function moumoucow_enqueue_script() {
	/*wp_enqueue_script( 'myjs', get_template_directory_uri() . '/js/myjs.js', false );*/
}

add_action( 'wp_enqueue_scripts', 'moumoucow_enqueue_style' );
add_action( 'wp_enqueue_scripts', 'moumoucow_enqueue_script' );


/**
 * for enabling translations
 */
function after_setup_theme_callback_setup_textdomain(){
    load_theme_textdomain('moumoucow', get_template_directory().'/languages');
}
add_action('after_setup_theme', 'after_setup_theme_callback_setup_textdomain');


/**
 * enables custom header support in theme customization section in dashboar
 */
$custom_header_options = array(
	'width' => 950,
	'height' => 295,
	'flex-height' => true,
	'flex-width'  => true,
	'header-text' => false,
	'default-image' => '%s/assets/images/header1.jpg',
);
	
add_theme_support('custom-header', $custom_header_options);

/**
 * enables custom logo support in theme customization section in dashboar
 */
$custom_logo_options = array(
	'height'      => 100,
	'width'       => 400,
	'flex-height' => true,
	'flex-width'  => true,
	'header-text' => array( 'site-title', 'site-description' ),
);
add_theme_support('custom-logo', $custom_logo_options);

add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 500, 500 );




function moumoucow_print_title($title) {
		
	if ( !is_main_query() || !in_the_loop() ) {
		return $title;
	}		

	ob_start();
	?>
	<h1>
		<span class="title-underlined title-hasbgimages">
		<span class="title-text">
				<?php echo $title; ?>
				</span>
			<span class="title-left-img">
			</span>
			<span class="title-right-img">
			</span>			
			<span class="title-back-img">
			</span>												
		</span>
	</h1>
	<?php
	return ob_get_clean();				
}
					
add_filter('the_title', 'moumoucow_print_title');

/**
 * Tempalte tag for use in the theme files header
 */
function moumoucow_the_title() {
	wp_title('|', true, 'right');
	bloginfo('name');	
	if (is_front_page()) {
		echo ' | ';
		bloginfo('description');
	}
	if (get_query_var( 'paged' ) >= 2 || get_query_var( 'page' ) >= 2) {
		echo ' | '.sprintf('P%s', max(get_query_var( 'paged' ), get_query_var( 'page' )));	
	}

}

function moumou_get_lang() {
	
	return 'japanese';
}


add_image_size( 'fdm-item-thumb-cover', 420, 420, array( 'center', 'center' ) ); // Hard crop left top




/*
  for menu cut-outs

*/


function xg_edit_featured_category_field( $term ){
    $term_id = $term->term_id;
    $term_meta = get_option( "fdm-menu-section_$term_id" );
    error_log(var_export($term, true));	
	    error_log(var_export($term_meta, true));	
			//add_term_meta ($term_id, $meta_key, $meta_value, $unique);
			$unique = true;
			$meta_key = "featured";
			get_term_meta ($term_id, $meta_key, $unique);

?>
    <tr class="form-field">
        <th scope="row">
            <label for="term_meta[featured]"><?php echo _e('Home Featured') ?></label>
            <td>
            	<select name="term_meta[featured]" id="term_meta[featured]">
                	<option value="0" <?=($term_meta['featured'] == 0) ? 'selected': ''?>><?php echo _e('No'); ?></option>
                	<option value="1" <?=($term_meta['featured'] == 1) ? 'selected': ''?>><?php echo _e('Yes'); ?></option>
            	</select>                   
            </td>
        </th>
    </tr>
<?php
} 
add_action( 'fdm-menu-section_edit_form_fields', 'xg_edit_featured_category_field' );

function xg_save_tax_meta( $term_id ){ 
  
	    if ( isset( $_POST['term_meta'] ) ) {
	    	 
	        $term_meta = array();
 
	        // Be careful with the intval here. If it's text you could use sanitize_text_field()
	        $term_meta['featured'] = isset ( $_POST['term_meta']['featured'] ) ? intval( $_POST['term_meta']['featured'] ) : '';
	
			// Save the option array.
	        //update_option( "taxonomy_$term_id", $term_meta );
			$unique = true;
			$meta_key = "featured";
			$meta_value = $term_meta;
			update_term_meta ($term_id, $meta_key, $meta_value, $unique);
	 
	    } 
	} // save_tax_meta
	
add_action( 'edited_fdm-menu-section', 'xg_save_tax_meta', 10, 2 ); 



 
 
