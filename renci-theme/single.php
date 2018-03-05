<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>

		<div class="container">
			<div class="section-banner"><img src="<?php echo get_template_directory_uri(); ?>/images/news.jpg" /></div>
			<div id="content" class="eleven columns" role="main">

			<?php
			/* Run the loop to output the post.
			 * If you want to overload this in a child theme then include a file
			 * called loop-single.php and that will be used instead.
			 */
			get_template_part( 'loop', 'single' );
			?>

			</div><!-- #content -->
			<div id="sidebar-left" class="five columns">
				<div class="breadcrumbs">
    				<?php if(function_exists('bcn_display')){
    					bcn_display();
				    }?>
				</div>
				<?php get_sidebar(); ?>
			</div><!-- #sidebar-right -->
		</div><!-- .container -->

<?php get_footer(); ?>
