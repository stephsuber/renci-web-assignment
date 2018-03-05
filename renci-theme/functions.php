<?php
/**
 * Starter theme functions and definitions
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * Used to set the width of images and content. Should be equal to the width the theme
 * is designed for, generally via the style.css stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 640;

/** Tell WordPress to run twentyten_setup() when the 'after_setup_theme' hook is run. */
add_action( 'after_setup_theme', 'twentyten_setup' );

if ( ! function_exists( 'twentyten_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * To override twentyten_setup() in a child theme, add your own twentyten_setup to your child theme's
 * functions.php file.
 *
 * @uses add_theme_support() To add support for post thumbnails and automatic feed links.
 * @uses register_nav_menus() To add support for navigation menus.
 * @uses add_custom_background() To add support for a custom background.
 * @uses add_editor_style() To style the visual editor.
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_custom_image_header() To add support for a custom header.
 * @uses register_default_headers() To register the default custom header images provided with the theme.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 * @since Twenty Ten 1.0
 */
function twentyten_setup() {

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	// Post Format support. You can also use the legacy "gallery" or "asides" (note the plural) categories.
	//add_theme_support( 'post-formats', array( 'aside', 'gallery' ) );
	remove_action('wp_head', 'start_post_rel_link', 10, 0 );
	remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

	// This theme uses post thumbnails
	add_theme_support( 'post-thumbnails' );

	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

	// Make theme available for translation
	// Translations can be filed in the /languages/ directory
	load_theme_textdomain( 'twentyten', get_template_directory() . '/languages' );

	$locale = get_locale();
	$locale_file = get_template_directory() . "/languages/$locale.php";
	if ( is_readable( $locale_file ) )
		require_once( $locale_file );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Navigation', 'twentyten' ),
	) );

	if ( function_exists( 'add_image_size' ) ) { 
		add_image_size( 'news-large', 640, 9999 ); //300 pixels wide (and unlimited height)
	}
	add_filter( 'image_size_names_choose', 'renci_custom_sizes' );

	function renci_custom_sizes( $sizes ) {
	    return array_merge( $sizes, array(
	        'news-large' => __('News Release Large'),
	    ) );
	}
}
endif;

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 *
 * To override this in a child theme, remove the filter and optionally add
 * your own function tied to the wp_page_menu_args filter hook.
 *
 * @since Twenty Ten 1.0
 */
function twentyten_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'twentyten_page_menu_args' );




/**
 * Register widgetized areas, including two sidebars and four widget-ready columns in the footer.
 *
 * To override twentyten_widgets_init() in a child theme, remove the action hook and add your own
 * function tied to the init hook.
 *
 * @since Twenty Ten 1.0
 * @uses register_sidebar
 */
function twentyten_widgets_init() {

	// Top Area, for search bar
	register_sidebar( array(
		'name' => __( 'Header Widget Area', 'twentyten' ),
		'id' => 'header-widget-area',
		'description' => __( 'Custom widget area to add things to an area in the header', 'twentyten' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Area A, located on the left side of homepage
	register_sidebar( array(
		'name' => __( 'Homepage Widget Area A', 'twentyten' ),
		'id' => 'homepage-widget-area1',
		'description' => __( 'located on the left side of homepage', 'twentyeleven' ),
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	
	// Area B, located on the second left of homepage
	register_sidebar( array(
		'name' => __( 'Homepage Widget Area B', 'twentyten' ),
		'id' => 'homepage-widget-area2',
		'description' => __( 'located on the second left of homepages', 'twentyeleven' ),
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );


// Area C, located on the second right side of homepage
	register_sidebar( array(
		'name' => __( 'Homepage Widget Area C', 'twentyten' ),
		'id' => 'homepage-widget-area3',
		'description' => __( 'located on the second right side of homepage', 'twentyten' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );



// Area D, located on the right side of homepage
	register_sidebar( array(
		'name' => __( 'Homepage Widget Area D', 'twentyten' ),
		'id' => 'homepage-widget-area4',
		'description' => __( 'located on the right side of homepage', 'twentyten' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Area 1, located at the top of the sidebar.
	register_sidebar( array(
		'name' => __( 'Primary Widget Area', 'twentyten' ),
		'id' => 'primary-widget-area',
		'description' => __( 'The primary widget area', 'twentyten' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Area 2, located below the Primary Widget Area in the sidebar. Empty by default.
	register_sidebar( array(
		'name' => __( 'Secondary Widget Area', 'twentyten' ),
		'id' => 'secondary-widget-area',
		'description' => __( 'The secondary widget area', 'twentyten' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Area 3, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'First Footer Widget Area', 'twentyten' ),
		'id' => 'first-footer-widget-area',
		'description' => __( 'The first footer widget area', 'twentyten' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Area 4, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Second Footer Widget Area', 'twentyten' ),
		'id' => 'second-footer-widget-area',
		'description' => __( 'The second footer widget area', 'twentyten' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Area 5, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Third Footer Widget Area', 'twentyten' ),
		'id' => 'third-footer-widget-area',
		'description' => __( 'The third footer widget area', 'twentyten' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Area 6, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Fourth Footer Widget Area', 'twentyten' ),
		'id' => 'fourth-footer-widget-area',
		'description' => __( 'The fourth footer widget area', 'twentyten' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}
/** Register sidebars by running twentyten_widgets_init() on the widgets_init hook. */

add_action( 'widgets_init', 'twentyten_widgets_init' );

//Create The Staff Custom Post Type
	add_action('init', 'create_staff');
	function create_staff() {
    	$labels = array(
        	'name' 				 => _x( 'Staff', 'post type general name' ),
        	'singular_name'      => _x( 'Staff', 'post type singular name' ),
       		'add_new'            => _x( 'Add New', 'staff' ),
        	'add_new_item'       => __( 'Add New Staff' ),
        	'edit_item'          => __( 'Edit Staff' ),
        	'new_item'           => __( 'New Staff' ),
        	'all_items'          => __( 'All Staff' ),
        	'view_item'          => __( 'View Staff' ),
        	'search_items'       => __( 'Search Staff' ),
        	'not_found'          => __( 'No staff found' ),
        	'not_found_in_trash' => __( 'No staff found in the Trash' ),
        	'parent_item_colon'  => '',
        	'menu_name'          => 'Staff'
        );
        $staff_args = array(
        	'labels' => $labels,
        	'description'   => 'Holds staff and experts data',
        	'public' => true,
        	'show_ui' => true,
        	'capability_type' => 'post',
        	'hierarchical' => false,
        	'rewrite' => true,
        	'supports' => array('title', 'thumbnail', 'editor', 'categories', 'custom-fields'),
        	'taxonomies' => array('category', 'post_tag')
        );
    	register_post_type('staff',$staff_args);
	}

//Create The Employment Custom Post Type
	add_action('init', 'create_employment');
	function create_employment() {
    	$labels = array(
        	'name' 				 => _x( 'Employment', 'post type general name' ),
        	'singular_name'      => _x( 'Employment', 'post type singular name' ),
       		'add_new'            => _x( 'Add New', 'employment listing' ),
        	'add_new_item'       => __( 'Add New Employment Listing' ),
        	'edit_item'          => __( 'Edit Employment Listing' ),
        	'new_item'           => __( 'New Employment Listing' ),
        	'all_items'          => __( 'All Employment Listings' ),
        	'view_item'          => __( 'View Employment Listing' ),
        	'search_items'       => __( 'Search Employment Listings' ),
        	'not_found'          => __( 'No employment listings found' ),
        	'not_found_in_trash' => __( 'No employment listings found in the Trash' ),
        	'parent_item_colon'  => '',
        	'menu_name'          => 'Employment'
        );
        $employment_args = array(
        	'labels' => $labels,
        	'description'   => 'Holds employment listings at RENCI',
        	'public' => true,
        	'show_ui' => true,
        	'capability_type' => 'post',
        	'hierarchical' => false,
        	'rewrite' => true,
        	'supports' => array('title', 'thumbnail', 'editor', 'excerpt', 'categories', 'custom-fields'),
        	'taxonomies' => array('category', 'post_tag')
        );
    	register_post_type('employment',$employment_args);
	}	

add_action("admin_init", "add_staff");
function add_staff(){
	add_meta_box("staff_info_box", "Staff Details", "staff_fields", "staff", "normal", "high");
}

add_action("admin_init", "add_employment");
function add_employment(){
	add_meta_box("employment_info_box", "Position Details", "employment_fields", "employment", "normal", "high");
}


function staff_fields(){ //prints the form fields and gets any preexisting custom values
	global $post; //checks for already stored values
	$custom = get_post_custom($post->ID);
	$l_name = $custom["l_name"][0];
	$staff_title = $custom["staff_title"][0];
	$staff_email = $custom["staff_email"][0];
	$staff_phone = $custom["staff_phone"][0];
	$more_info_url = $custom["more_info_url"][0];
	$expertise = $custom["expertise"][0];
	$expert_status = $custom["expert_status"][0];
	$academic_department = $custom["academic_department"][0];
	?>
	<div id="staff_info">
		<ul>
			<li><label>Last Name: </label><input name="l_name" value="<?php echo $l_name; ?>" /> </li>	
			<li><label>Job Title: </label><input name="staff_title" value="<?php echo $staff_title; ?>" /> </li>
			<li><label>Email: </label><input name="staff_email" value="<?php echo $staff_email; ?>" /> </li>
			<li><label>Phone: </label><input name="staff_phone" value="<?php echo $staff_phone; ?>" /> </li>
			<li><label>More Info URL: </label><input name="more_info_url" value="<?php echo $more_info_url; ?>" /> </li>
			<li><label>Area of Expertise: </label><input name="expertise" value="<?php echo $expertise; ?>" /> </li>
			<li><input type="checkbox" name="expert_status" <?php if ($expert_status) {echo 'checked="checked"';}?> /><label>Check box if Expert</label></li>
			<li><label>Academic Department (for students only): </label><input name="academic_department" value="<?php echo $academic_department; ?>" /> </li>
		</ul>
	</div>
	<?php
} 

add_action('save_post', 'update_staff_info');
function update_staff_info(){ //triggered when a post is saved; uses update_post_meta() to add or update custom fields
	if ( get_post_type() == 'staff'){
		global $post; //checks against already stored values
		update_post_meta($post->ID, "l_name", $_POST["l_name"]);
		update_post_meta($post->ID, "staff_title", $_POST["staff_title"]);
		update_post_meta($post->ID, "staff_email", $_POST["staff_email"]);
		update_post_meta($post->ID, "staff_phone", $_POST["staff_phone"]);
		update_post_meta($post->ID, "more_info_url", $_POST["more_info_url"]);
		update_post_meta($post->ID, "expertise", $_POST["expertise"]);
		update_post_meta($post->ID, "academic_department", $_POST["academic_department"]);
		if ($_POST["expert_status"]){
			update_post_meta($post->ID, "expert_status", "true");
		}
		else {
			update_post_meta($post->ID, "expert_status", "");
		}
	}
}

function employment_fields(){
	global $post;
	$custom = get_post_custom($post->ID);
	$job_venue = $custom["job_venue"][0];
	$job_title = $custom["job_title"][0];
	$job_number = $custom["job_number"][0];
	?>
	<div id="employment_info">
		<ul>
			<li><label>Venue: </label><input name="job_venue" value="<?php echo $job_venue; ?>" /></li>
			<li><label>Position Title: </label><input name="job_title" value="<?php echo $job_title; ?>" /></li>	
			<li><label>Position #: </label><input name="job_number" value="<?php echo $job_number; ?>" /></li>
		</ul>
	</div>
	<?php
} 

add_action('save_post', 'update_employment_info');
function update_employment_info(){
	if ( get_post_type() == 'employment'){
		global $post;
		update_post_meta($post->ID, "job_venue", $_POST["job_venue"]);
		update_post_meta($post->ID, "job_title", $_POST["job_title"]);
		update_post_meta($post->ID, "job_number", $_POST["job_number"]);
	}
}



// Set template to be used for custom post types
function custom_page_templates( $page_template ){
	$post_type = get_query_var('post_type');
    	if ( $post_type == 'staff' ) {
        $page_template = dirname( __FILE__ ) . '/single-staff.php';
    	}
    	else if( $post_type == 'employment' ) {
        $page_template = dirname( __FILE__ ) . '/single-employment.php';
    	}
    	return $page_template;
	}
	add_filter( 'single_template', 'custom_page_templates' );

//Move editor below top custom fields for Staff, Employment, News Appearance admin pages
function admin_footer_hook(){
	global $post;
	if ( get_post_type($post) == 'staff') {
	?>
	<script type="text/javascript">
		jQuery('#staff_info_box').insertBefore('#postdivrich');
	</script>
	<?php
	}
	if ( get_post_type($post) == 'employment') {
		?>
	<script type="text/javascript">
		jQuery('#employment_info_box').insertBefore('#postdivrich');
	</script>
	<?php
	}
	if ( get_post_type($post) == 'news-appearance') {
		?>
	<script type="text/javascript">
		jQuery('#appearance_info_box').insertBefore('#postdivrich');
	</script>
	<?php
	}
}
add_action('admin_footer','admin_footer_hook');

//Call staff_search.js when viewing Staff or Experts pages
add_action('wp_enqueue_scripts','staff_page_script');
function staff_page_script($hook) {
    if ( (is_page_template('staff.php'))||(is_page_template('experts.php'))) {
    	wp_enqueue_script('jquery');
        wp_enqueue_script('staff_search', get_bloginfo('template_url') . '/js/staff_search.js', array('jquery'));
    }
}

//Call expand_jobs.js when viewing Employment pages
add_action('wp_enqueue_scripts','employment_page_script');
function employment_page_script($hook) {
    if (is_page_template('employment.php')) {
    	wp_enqueue_script('jquery');
        wp_enqueue_script('expand_jobs', get_bloginfo('template_url') . '/js/expand_jobs.js', array('jquery'));
    }
}

//Use Skeleton (responsive) stylesheets
function skeleton_styles($hook) {
	// wp_enqueue_script('style');
	wp_enqueue_style('call_base_style', get_bloginfo('template_url') . '/css/base.css');
	wp_enqueue_style('call_theme_style', get_bloginfo('stylesheet_url'));
	wp_enqueue_style('call_skeleton_style', get_bloginfo('template_url') . '/css/skeleton.css');
	wp_enqueue_style('call_layout_style', get_bloginfo('template_url') . '/css/layout.css');
}
add_action('wp_enqueue_scripts','skeleton_styles');

//Use jQuery Datepicker for class .datepicker
function datepicker_init() {
	wp_enqueue_script('jquery');
	wp_enqueue_script('jquery-ui-core');
	wp_enqueue_script('jquery-ui-datepicker', get_bloginfo('template_url') . '/js/datepicker/jquery.ui.datepicker.min.js', array('jquery', 'jquery-ui-core') );
	wp_enqueue_style('jquery.ui.theme', get_bloginfo('template_url') . '/js/datepicker/style/jquery-ui.css');
}
// add_action('admin_init', 'datepicker_init');

function datepicker_admin_footer() {
	?>
	<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('.datepicker').datepicker({
			dateFormat : 'yy.mm.dd'
		});
	});
	</script>
	<?php
}
// add_action('admin_footer', 'datepicker_admin_footer');
// Override img caption shortcode to fix 10px issue.
add_filter('img_caption_shortcode', 'fix_img_caption_shortcode', 10, 3);

function fix_img_caption_shortcode($val, $attr, $content = null) {
    extract(shortcode_atts(array(
        'id'    => '',
        'align' => '',
        'width' => '',
        'caption' => ''
    ), $attr));

    if ( 1 > (int) $width || empty($caption) ) return $val;

    return '<div id="' . $id . '" class="wp-caption ' . esc_attr($align) . '" style="width: ' . (0 + (int) $width) . 'px">' . do_shortcode( $content ) . '<p class="wp-caption-text">' . $caption . '</p></div>';
}
//dev site url and name shortcodes
add_shortcode('siteurl', 'siteurl');
function siteurl() {
	return get_bloginfo('url');
}
add_shortcode('sitename', 'sitename');
function sitename() {
	return get_bloginfo('name');
}
add_shortcode('staffsearch', 'staffsearch');
function staffsearch() {
	return '<div id="staff-search">
			
			<div id="staff_alphas">
				<a href="#a">A</a>
				<a href="#b">B</a>
				<a href="#c">C</a>
				<a href="#d">D</a>
				<a href="#e">E</a>
				<a href="#f">F</a>
				<a href="#g">G</a>
				<a href="#h">H</a>
				<a href="#i">I</a>
				<a href="#j">J</a>
				<a href="#k">K</a>
				<a href="#l">L</a>
				<a href="#m">M</a>
				<a href="#n">N</a>
				<a href="#o">O</a>
				<a href="#p">P</a>
				<a href="#q">Q</a>
				<a href="#r">R</a>
				<a href="#s">S</a>
				<a href="#t">T</a>
				<a href="#u">U</a>
				<a href="#v">V</a>
				<a href="#w">W</a>
				<a href="#x">X</a>
				<a href="#y">Y</a>
				<a href="#z">Z</a>
			</div>
			<br/>
			<div id="staff_search_input">
				<form>
					Search: <input type="text" name="staff_search_input" />
					<div id="delete"><span id="clear-search">X</span></div>
					<input type="checkbox" name="search_names_only" id="search_names_only" />Search names only
				</form><br/>
			</div><!-- #staff_search_input -->
		</div><!-- #staff-search -->';
}
//Have widgets execute shortcodes
add_filter('widget_text', 'do_shortcode');


//Adds Javascript Mobile menu support
function mobileMenuJS()
{
	$script = get_template_directory_uri() . '/js/jquery.togglemenu.js';
	?>
	<script type="text/javascript" src="<?php echo $script;?>"></script>
	<script type="text/javascript">
	    jQuery( document ).ready(function() {
		//Mobile menu support
		jQuery('#mobile-menu-a').toggleMobileMenu();
	    });
	</script>
	<?php
}
add_action('wp_footer', 'mobileMenuJS');

//Adds style to page templates

function wpse_enqueue_page_template_styles() {
    if ( is_page_template( 'page-bio.php' ) ) {
        wp_enqueue_style( 'bio-style', get_template_directory_uri() . '/css/bio-style.css' );
    }
}
add_action( 'wp_enqueue_scripts', 'wpse_enqueue_page_template_styles' );

//Adds bootstrap

// function my_scripts_enqueue() {
//     wp_register_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), NULL, true );
//     wp_register_style( 'bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css', false, NULL, 'all' );

//     wp_enqueue_script( 'bootstrap-js' );
//     wp_enqueue_style( 'bootstrap-css' );
// }
// add_action( 'wp_enqueue_scripts', 'my_scripts_enqueue' );

//Adds Staff Directory style
add_action( 'wp_enqueue_scripts', 'enqueue_staff_directory_styles' );
function enqueue_staff_directory_styles() {
	wp_enqueue_style( 'staff-directory-style', get_template_directory_uri().'/staff-directory-style.css' );
}

//Create The Bio Custom Post Type
	add_action('init', 'create_bio');
	function create_bio() {
    	$bio_labels = array(
        	'name' 				 => _x( 'Biographies', 'post type general name' ),
        	'singular_name'      => _x( 'Biography', 'post type singular name' ),
        	'menu_name'          => 'Biography',
       		'add_new'            => _x( 'Add New', 'bio' ),
        	'add_new_item'       => __( 'Add New Biography' ),
        	'edit_item'          => __( 'Edit Biography' ),
        	'new_item'           => __( 'New Biography' ),
        	'all_items'          => __( 'All Biographies' ),
        	'view_item'          => __( 'View Biography' ),
        	'search_items'       => __( 'Search Biographies' ),
        	'not_found'          => __( 'No biography found' ),
        	'not_found_in_trash' => __( 'No biography found in the Trash' ),
        	'parent_item_colon'  => '',
        );
        $bio_args = array(
        	'labels' => $bio_labels,
        	'description'   => 'Holds personal bio page data',
        	'public' => true,
        	'show_ui' => true,
        	'capability_type' => 'post',
        	'hierarchical' => false,
        	'rewrite' => true,
        	'supports' => array('title', 'thumbnail', 'editor', 'categories', 'custom-fields'),
        	'taxonomies' => array('category', 'post_tag')
        );
    	register_post_type('bio',$bio_args);
	}

//Adds Bio custom post type style
add_action( 'wp_enqueue_scripts', 'enqueue_bio_styles' );
function enqueue_bio_styles() {
	wp_enqueue_style( 'bio-style', get_template_directory_uri().'/bio-style.css' );
}