<?php
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


		<div id="container">
			<div id="content" role="main">

			<?php
			/* Run the loop to output the page.
			 * If you want to overload this in a child theme then include a file
			 * called loop-page.php and that will be used instead.
			 */
			//get_template_part( 'loop', 'page' );
			?>
			
			<div class = "slideshow">
					<?php if (function_exists('simple_nivo_slider')) simple_nivo_slider(); ?>
				</div>
			
			
			<ul id="homepage-widgets"> 		


	<?php
            
		// Left column 
		if ( is_active_sidebar( 'homepage-widget-area1' ) ) : ?>

			<li >
		
			
		    <div class="widget-area homepage-widget-area1" >
            <ul class="widget-area1">
				
				<?php 
				
				dynamic_sidebar( 'homepage-widget-area1' ); ?>
			</ul>
			</div><!-- #secondary .widget-area -->
			
        	</li>
	<?php endif; ?>
            
       
	<?php
	// the second left column 
		if ( is_active_sidebar( 'homepage-widget-area2' ) ) : ?>

		<li><div class="widget-area homepage-widget-area3" >
		 	 <ul class = "widget-area2">
		 		
		 		
		 
				<div class="recent-news" >
					<?php dynamic_sidebar( 'homepage-widget-area2' ); ?>
				</div>
		
			 </ul>
			</div>
		</li>
	<?php endif; ?>
		
      <?php
	// the second right column 
		if ( is_active_sidebar( 'homepage-widget-area3' ) ) : ?>

		<li><div class="widget-area homepage-widget-area2" >
		 	 <ul class = "widget-area3">
		 		
		 
				<div class="events" >
					<?php dynamic_sidebar( 'homepage-widget-area3' ); ?>
				</div>
				
		 	
		
		
			 </ul>
			</div>
		</li>
	<?php endif; ?>
	
	<?php
	// the Right column 
		if ( is_active_sidebar( 'homepage-widget-area4' ) ) : ?>

		<li><div class="widget-area homepage-widget-area2" >
		 	 <ul class = "widget-area4">
		
		 
				<div class="feature" >
				<?php dynamic_sidebar( 'homepage-widget-area4' ); ?>
				
				<?php 
	 //Get first top story
	 
	 //Get latest 3 stories... if first 2 are not top stories end if... else skip top story
	 
	 $my_query = new WP_Query("cat=22&showposts=1"); ?>
    <?php  if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post(); ?>
		<div class="" id="post-<?php the_ID(); $first_post=get_the_ID();?>">
			<div class="fp-title">
            <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
			<?php  $more = 0; ?><a href="<?php the_permalink();?>"><?php the_post_thumbnail('home-page-thumbnail');?></a>
            <?php echo stripcslashes(get_post_meta($post->ID, "blurb",true)); ?>
            
            <p class="read_rest"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">Read More</a></p>
            
            </div><!-- end title -->
		</div><!-- end post --><?php edit_post_link('Edit', '<p class="edit-post">[', ']</p>'); ?>
    <?php endwhile; else : ?>
			<div class="post">
				<div class="title"><h2>Sorry, nothing found!</h2></div>
					<p>Sorry, nothing found! Please use the SEARCH on the sidebar, or visit our ARCHIVES page.</p>
		  </div><!-- end post -->
    <?php endif; ?>


     
				
					
				</div>
			
		
		
			 </ul>
			</div>
		</li>
	<?php endif; ?>
		
				</ul>
				
			</div><!-- #content -->
		</div><!-- #container -->

<?php get_footer(); ?>
