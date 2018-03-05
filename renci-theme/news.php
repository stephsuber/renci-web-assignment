<?php 
/**
 * Template Name: News Index
 */
?>

<?php get_header(); ?>

<div class="container">
	<div class="section-banner"><img src="<?php echo get_template_directory_uri(); ?>/images/news.jpg" /></div>
	<div id="content" class="eleven columns">
		<?php
	
		$news_loop = new WP_Query(array('category_name' => 'news','posts_per_page' => 10, 'paged' => get_query_var('paged'))); 
		while ( $news_loop->have_posts() ) : $news_loop->the_post();?>
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'starter-theme' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

				<div class="entry-meta">
					  <?php echo 'Published: ';
					  echo get_the_date() ?>
				</div><!-- .entry-meta -->
				<div class="entry-content">
					<?php $more = 0;
					the_content(__('Read more')); ?>
				</div>
				<div class="entry-utility">
					<?php
						$tags_list = get_the_tag_list( '', ', ' );
						if ( $tags_list ):
					?>
						<span class="tag-links">
							<?php printf( __( '<span class="%1$s">Tagged</span> %2$s', 'twentyten' ), 'entry-utility-prep entry-utility-prep-tag-links', $tags_list ); ?>
						</span>
						<span class="meta-sep">|</span>
					<?php endif; ?>
					<!-- <span class="comments-link"><?php comments_popup_link( __( 'Leave a comment' ), __( '1 Comment' ), __( '% Comments' ) ); ?></span> -->
					<?php edit_post_link( __( 'Edit', 'twentyten' ), '<span class="meta-sep">|</span> <span class="edit-link">', '</span>' ); ?>
				</div><!-- .entry-utility -->
			</div><!-- #post-## -->

	    <?php endwhile;
	    wp_pagenavi( array( 'query' => $news_loop ) );

wp_reset_postdata();	// avoid errors further down the page
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