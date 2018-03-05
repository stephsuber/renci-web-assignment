<?php 
/**
 * Template Name: News Appearances Index
 */
?>

<?php get_header(); ?>
<div class="container">
	<div class="section-banner"><img src="<?php echo get_template_directory_uri(); ?>/images/news.jpg" width="960" height="159" /></div>
	<div id="content" >	
		<div id="appearances-normal-sort" class="eleven columns">
			<ul class="news_appearances">
			<?php
			$appearance_loop = new WP_Query(array('orderby' => 'meta_value', 'meta_key' => 'pub_date', 'order' => 'DESC', 'post_type' => 'news-appearance', 'posts_per_page' => 10)); 
			while ( $appearance_loop->have_posts() ) : $appearance_loop->the_post();
			?>
				<li class="news_appearance">
				<?php	
					$custom = get_post_custom($post->ID);
					$pub_name = $custom["pub_name"][0];
					$pub_date = $custom["pub_date"][0];
					$pub_url = $custom["pub_url"][0];
					$assoc_release = $custom["assoc_release"][0];	
				?>
				<h2><a href="<?php echo $pub_url; ?>" target="_blank"><?php the_title(); ?></a></h2>
					<ul class="appearance_details">
						<li>
							Publication: <a href="<?php echo $pub_url; ?>" target="_blank">
								<?php echo $pub_name ?></a>
								<br/>
								Date Published: <?php echo $pub_date ?>
								<br/>
							<?php echo the_content(); 
							if ($assoc_release !== 'None'){
							?>
							<a href="<?php echo get_permalink($assoc_release);?>">View original RENCI release</a>
							<?php } ?>
						</li>
					</ul>
				</li>
		    <?php endwhile; ?>
			</ul>
		</div><!-- #appearances-normal-sort -->
		<div id="appearances-release-sort" class="hidden">
			<ul class="news_appearances">
			<?php

			//Loop through each Release in reverse-chron order
			$appearance_release_loop = new WP_Query(array('category_name' => 'Releases, Features, Top Story', 'posts_per_page' => 10));
			while ($appearance_release_loop->have_posts() ) : $appearance_release_loop->the_post();
				$release_title = get_the_title();
				$release_url = get_permalink();

				//Only show the release if it has an Appearance with same name
				$appearance_check = new WP_Query(array('post_type' => 'news-appearance'));
				while ( $appearance_check->have_posts() ) : $appearance_check->the_post();
					//Return an array of all custom metadata for each news appearance
					$custom = get_post_custom($post->ID);
					$assoc_release = $custom["assoc_release"][0];
					if ($release_title == get_the_title($assoc_release)){ ?>
						<li class="news_appearance">			
							<h2><a href="<?php echo $release_url; ?>"><?php echo $release_title; ?></a>
							</h2>
							<ul class="appearance_details">
								<?php
								//Show the pub_name and pub_date for any Appearances with same assoc_release as Release
								$appearance_loop = new WP_Query(array('post_type' => 'news-appearance'));
								while ( $appearance_loop->have_posts() ) : $appearance_loop->the_post();
									$custom = get_post_custom($post->ID);
									$pub_name = $custom["pub_name"][0];
									$pub_date = $custom["pub_date"][0];
									$pub_url = $custom["pub_url"][0];
									$assoc_release = $custom["assoc_release"][0];
										
									if ($release_title == get_the_title($assoc_release)){
										?>
										<li>
											Publication: <a href="<?php echo $pub_url; ?>" target="_blank"><?php echo $pub_name; ?></a>
											<br/>
											Date Published: <?php echo $pub_date; ?>
											<br/>
											<?php echo the_content();?>
										</li>
									<?php }
								endwhile; ?>
							</ul>
						</li>
					<?php break; }
				endwhile;
			endwhile; ?>
			</ul>
		</div><!-- #appearances-release-sort -->
	</div><!-- #content -->
	<div id="sidebar-right" class="five columns">
		<div id="news-appearance-sidebar" id="sidebar-right" class="five columns">
			<p>
				<input type="checkbox" name="sort_by_release" id="sort_by_release" />Sort by RENCI press release
			</p>
		</div>
		<?php get_sidebar(); ?>
	</div><!-- #sidebar-right -->
</div><!-- .container -->

<?php get_footer(); ?>