<?php
get_header(); ?>

		<div class="container">
			<div class="section-banner"><img src="<?php echo get_template_directory_uri(); ?>/images/news.jpg" /></div>
			<div id="content" class="eleven columns" role="main">

                            <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<h2 class="entry-title"><?php the_title(); ?></h2>

					<div class="entry-meta">
					   <?php echo 'Published: ';
				  		echo get_the_date() ?>
					   <?php //twentyten_posted_on(); ?>
					</div><!-- .entry-meta -->
					<?php /*
					if ( in_category('releases')){ ?>
						<div class="featured-image">
							<?php 
							$default_size = array(630,380);
							if ( has_post_thumbnail() ) { ?>
								<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
								<?php the_post_thumbnail($default_size); ?>
								</a>
							<?php } 
							?>
						</div>
					<?php } */?>
					<div class="entry-content">
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'twentyten' ), 'after' => '</div>' ) ); ?>
					</div><!-- .entry-content -->

                                        <footer class="entry-meta">
                                                <?php
                                                        /* translators: used between list items, there is a space after the comma */
                                                        $categories_list = get_the_category_list( __( ', ', 'twentyeleven' ) );
                                
                                                        /* translators: used between list items, there is a space after the comma */
                                                        $tag_list = get_the_tag_list( '', __( ', ', 'twentyeleven' ) );
                                                        if ( '' != $tag_list ) {
                                                                $utility_text = __( 'This entry was posted in %1$s and tagged %2$s by <a href="%6$s">%5$s</a>. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'twentyeleven' );
                                                        } elseif ( '' != $categories_list ) {
                                                                $utility_text = __( 'This entry was posted in %1$s by <a href="%6$s">%5$s</a>. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'twentyeleven' );
                                                        } else {
                                                                $utility_text = __( 'This entry was posted by <a href="%6$s">%5$s</a>. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'twentyeleven' );
                                                        }
                                
                                                        printf(
                                                                $utility_text,
                                                                $categories_list,
                                                                $tag_list,
                                                                esc_url( get_permalink() ),
                                                                the_title_attribute( 'echo=0' ),
                                                                get_the_author(),
                                                                esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) )
                                                        );
                                                ?>
                                                <?php edit_post_link( __( 'Edit', 'twentyeleven' ), '<span class="edit-link">', '</span>' ); ?>
                                
                                                <?php if ( get_the_author_meta( 'description' ) && ( ! function_exists( 'is_multi_author' ) || is_multi_author() ) ) : // If a user has filled out their description and this is a multi-author blog, show a bio on their entries ?>
                                                <div id="author-info">
                                                        <div id="author-avatar">
                                                                <?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'twentyeleven_author_bio_avatar_size', 68 ) ); ?>
                                                        </div><!-- #author-avatar -->
                                                        <div id="author-description">
                                                                <h2><?php printf( __( 'About %s', 'twentyeleven' ), get_the_author() ); ?></h2>
                                                                <?php the_author_meta( 'description' ); ?>
                                                                <div id="author-link">
                                                                        <a>" rel="author">
                                                                                <?php printf( __( 'View all posts by %s <span class="meta-nav">?</span>', 'twentyeleven' ), get_the_author() ); ?>
                                                                        </a>
                                                                </div><!-- #author-link	-->
                                                        </div><!-- #author-description -->
                                                </div><!-- #entry-author-info -->
                                                <?php endif; ?>
                                        </footer><!-- .entry-meta -->

					<div class="entry-utility">
					   <?php //twentyten_posted_in(); ?>
						<?php edit_post_link( __( 'Edit', 'twentyten' ), '<span class="edit-link">', '</span>' ); ?>
					</div><!-- .entry-utility -->
				</div><!-- #post-## -->

				<?php //comments_template( '', true ); ?>

                        <?php endwhile; // end of the loop. ?>

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