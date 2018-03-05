<?php
/**
 * Template Name: Homepage
 */
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
get_header(); ?>
<div class="container">
	<div id="content" role="main">
		<div class = "slideshow">
			<?php echo do_shortcode('[smartslider3 slider=1]'); ?>
		</div>
		<ul id="homepage-widgets">
			<?php //First widget column
			if ( is_active_sidebar( 'homepage-widget-area1' ) ) : ?>
				<li >
				    <div class="widget-area homepage-widget-area1" >
			            <ul class="widget-area1 three columns">
							<?php dynamic_sidebar( 'homepage-widget-area1' ); ?>
						</ul>
					</div><!-- .widget-area .homepage-widget-area1 -->		
	        	</li>
			<?php endif; ?>
			<?php //Second widget column
			if ( is_active_sidebar( 'homepage-widget-area2' ) ) : ?>
				<li>
					<div class="widget-area homepage-widget-area3" >
			 	 		<ul class = "widget-area2 five columns">
			 	 			<div class="recent-news" >
								<?php dynamic_sidebar( 'homepage-widget-area2' ); ?>
							</div>
						</ul>
					</div>
				</li>
			<?php endif; ?>
			<?php //Third widget column 
			if ( is_active_sidebar( 'homepage-widget-area3' ) ) : ?>
				<li>
					<div class="widget-area homepage-widget-area2" >
			 	 		<ul class = "widget-area3 four columns">
							<div class="events" >
								<?php dynamic_sidebar( 'homepage-widget-area3' ); ?>
							</div>
						</ul>
					</div>
				</li>
			<?php endif; ?>
			<?php //Fourth widget column 
			if ( is_active_sidebar( 'homepage-widget-area4' ) ) : ?>
				<li>
					<div class="widget-area homepage-widget-area2" >
			 	 		<ul class = "widget-area4 five columns">
							<div class="feature" >
								<?php dynamic_sidebar( 'homepage-widget-area4' ); ?>
							</div>
						 </ul>
					</div>
				</li>
			<?php endif; ?>
		</ul><!-- #homepage-widgets -->		
	</div><!-- #content -->
</div><!-- .container -->
<?php get_footer(); ?>