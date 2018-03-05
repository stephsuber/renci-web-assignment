<?php 
/**
 * Template Name: Employment Index
 */
?>

<?php get_header(); ?>
<div class="container">

  <div class= "section-banner">
    <img src="<?php echo get_bloginfo('stylesheet_directory');?>/images/about.jpg">
  </div>
	
	<div id="content" class="eleven columns entry-content">
		<h1>Employment</h1>
		<p>Below is a list of current open positions at RENCI. Ideal candidates should enjoy working with internationally known researchers and with the tools and technologies that comprise an advanced cyberinfrastructure. An interest in multidisciplinary research and in collaborating with researchers, including the development of new proposals, projects and programs, is expected. A Ph.D is required for Senior Research Scientist positions; a master degrees and/or a mix of professional experience and a bachelor's degree is required for software development positions.</p>
		<div class="job_listings">
		<?php
		$employment_loop = new WP_Query(array('post_type' => 'employment', 'posts_per_page' => -1)); 
		while ( $employment_loop->have_posts() ) : $employment_loop->the_post();?>
			<div class="job_listing"><?php 	
				$custom = get_post_custom($post->ID);
				$job_venue = $custom["job_venue"][0];
				$job_title = $custom["job_title"][0];
				$job_number = $custom["job_number"][0];	
			?>
			<h2><a href="<?php the_permalink(); ?>" ><?php the_title(); ?></a></h2>
			<p><?php 
				echo $job_venue; echo "<br />";
				echo $job_title; echo "<br />";
				echo "Position #".$job_number; echo "<br />";
			?></p>
				<div class="employment-excerpt">
					<?php 
					if (!empty($post->post_excerpt)) { //if there is an excerpt, show it
					    the_excerpt();
					    echo "<p class=\"see_more\">[See More]</p>";
					}
					else { //if not, show the first 600 words
						$content = get_the_content();
						echo "<p>";
						echo substr($content, 0, 600);
						echo "...";
						echo "</p>";
						echo "<p class=\"see_more\">[See More]";
					}?>
				</div>
				<div class="employment-hidden","employment-full">
					<?php the_content();
					echo "<p class=\"hide_more\">[Hide Details]";?>
				</div>
			</div>
	    <?php endwhile; ?>
		</div>
	</div><!-- #content -->
	<div id="sidebar-left" class="five columns">
	
		<div class= "breadcrumbs">
		<a title="Go to Home." href="<?php bloginfo('url'); ?>" class="site-home">Home</a>
		 > 
		<a title="Go to About." href="<?php bloginfo('url'); ?>/about/" class="page">About</a>
		 > 
		<a title="Go to Employment." href="<?php bloginfo('url'); ?>/about/employment/" class="post-page current-item">Employment</a>
		</div>
	
		<?php get_sidebar(); ?>
	</div><!-- #sidebar-right -->
</div><!-- .container -->

<?php get_footer(); ?>