<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title><?php //Print the <title> tag based on what is being viewed
		global $page, $paged;

		wp_title( '|', true, 'right' );

		// Add the blog name
		bloginfo( 'name' );

		// Add the blog description for the home/front page
		//$site_description = get_bloginfo( 'description', 'display' );
		//if ( $site_description && ( is_home() || is_front_page() ) )
		//	echo " | $site_description";

		// Add a page number if necessary
		//if ( $paged >= 2 || $page >= 2 )
		//	echo ' | ' . sprintf( __( 'Page %s', 'twentyten' ), max( $paged, $page ) );
		?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php //We add some JavaScript to pages with the comment form to support sites with threaded comments (when in use)
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
	?>

	<!--[if lte IE 8]>
	<style type="text/css">
		/* css for IE 8 and below */
	#access .menu li {
		padding-right:10px;
	}
	</style>
	<![endif]-->
</head>
<body <?php body_class(); ?>>
	<div id="top-border"></div>
	<div id="bottom-border"></div>
	<div id="white-background"></div>

	<div class="container" id="header">
		<div id="masthead">
			<div id="header-widgets">
				<a id="mobile-menu-a" href="#"><div id="mobile-menu-btn">&nbsp;</div></a>
				<?php get_search_form(); ?>
				<a href="http://comm.renci.org" target="_blank" style="float:left;display:inline;background:#008DA8;color:white;padding:10px;font-size:14px;font-weight:bold;">For Employees</a>
			</div><!-- #header-widgets -->
			<div id="branding" role="banner">
				<h1 id="site-title">
					 <a href="<?php bloginfo('url'); ?>"><img id="site-logo" src="<?php bloginfo( 'template_url' ); ?>/images/renci-logo.png" /></a>
				</h1>
				<div id="site-description"><?php //bloginfo( 'description' ); ?></div>

					<?php // Check if this is a post or page, if it has a thumbnail, and if it's a big one
					if ( is_singular() && current_theme_supports( 'post-thumbnails' ) &&
							has_post_thumbnail( $post->ID ) &&
							( /* $src, $width, $height */ $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'post-thumbnail' ) ) &&
							$image[1] >= HEADER_IMAGE_WIDTH ) :
						// Houston, we have a new header image!
						//echo get_the_post_thumbnail( $post->ID );
					elseif ( get_header_image() ) : ?>
						<img src="<?php header_image(); ?>" width="<?php echo HEADER_IMAGE_WIDTH; ?>" height="<?php echo HEADER_IMAGE_HEIGHT; ?>" alt="" />
					<?php endif; ?>
			</div><!-- #branding -->
			<div id="access" role="navigation" class="access-js">
			  <?php //Allow screen readers/text browsers to skip the navigation menu and get right to the good stuff ?>
				<div class="skip-link screen-reader-text">
					<a href="#content" title="<?php esc_attr_e( 'Skip to content', 'twentyten' ); ?>"><?php _e( 'Skip to content', 'twentyten' ); ?></a>
				</div>
				<?php /* Our navigation menu.  If one isn't filled out, wp_nav_menu falls back to wp_page_menu.  The menu assiged to the primary position is the one used.  If none is assigned, the menu with the lowest ID is used.  */ ?>
				<?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary' ) ); ?>

			</div><!-- #access -->
		</div><!-- #masthead -->
		<?php if (is_front_page()) { ?>
		<style>@media screen and (max-width: 767px) {#footer-widget-area #first {display:none !important;}}</style>
		<div id="mobile-welcome-box" class="widget-area seven columns">
			<ul class="xoxo">
				<?php dynamic_sidebar( 'first-footer-widget-area' ); ?>
			</ul>
		</div><!-- #first .widget-area -->
		<?php } ?>
	</div><!-- #header -->
