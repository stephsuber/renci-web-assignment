<?php
/**
 * Template Name: Page
 *
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
$research_cat = (types_render_field( "research-type", array("raw" => "true") ));
$page_id = get_the_ID();

$page = get_page($page_id);

if($page->post_parent == 0 ) {
	$feat_image = wp_get_attachment_url( get_post_thumbnail_id($page_id));
}
elseif (in_category('computing-and-networking')) {
	$research_page = get_page_by_title('Computing & Networking');
	$feat_image = wp_get_attachment_url( get_post_thumbnail_id($research_page->ID));
}
elseif (in_category('Data Science')) {
	$research_page = get_page_by_title('Data Science');
	$feat_image = wp_get_attachment_url( get_post_thumbnail_id($research_page->ID));
}
elseif (in_category('engagement-and-outreach')) {
	$research_page = get_page_by_title('Engagement & Outreach');
	$feat_image = wp_get_attachment_url( get_post_thumbnail_id($research_page->ID));
}
elseif (in_category('Environmental Research')) {
	$research_page = get_page_by_title('Environmental Research');
	$feat_image = wp_get_attachment_url( get_post_thumbnail_id($research_page->ID));
}
elseif (in_category('health-informatics-and-biosciences')) {
	$research_page = get_page_by_title('Health Informatics & Biosciences');
	$feat_image = wp_get_attachment_url( get_post_thumbnail_id($research_page->ID));
}
else {
	$feat_image = wp_get_attachment_url( get_post_thumbnail_id($page->post_parent));
}



get_header(); ?>

		<div class="container">
			<?php if ($feat_image) {?>
				<div class="section-banner"><img src="<?php echo $feat_image; ?>" /></div>
			<?php } ?>
			<div id="content" class="eleven columns" role="main">

			<?php get_template_part( 'loop', 'page' ); ?>

			</div><!-- #content -->
			<div id="sidebar-left" class="five columns">
				<div class="breadcrumbs">
    				<?php if(function_exists('bcn_display')){
    					bcn_display();
				    }?>
				</div>
				<?php if ('10027' == $post->post_parent) {?>

					<div id="research-nav" class="widget-area" role="complimentary">
						<ul class="xoxo">
							<li id="pages-2" class="widget-container widget_pages">
								<ul>
									<li class="page_item"><a href="<?php echo home_url(); ?>/research">Research</a>
										<ul class="children">

											<?php $the_query = new WP_Query(array('post_type' => 'page', 'posts_per_page' => 15, 'orderby' => 'title', 'order' => 'ASC', 'meta_key' => 'wpcf-research-type', 'meta_value' => null, 'meta_compare' => '!='));

											while ( $the_query->have_posts() ) : 
												$the_query->the_post();
												$cat_slug = basename(get_permalink());
												$cat_obj = get_category_by_slug($cat_slug); 
												$cat_id = $cat_obj->cat_ID;?>
												<li class="page_item<?php if (has_category($cat_id, $page_id)): echo " current_page_item"; endif;?>"><a href="<?php the_permalink(); ?>"><?php the_title();?></a>
												</li>
											<?php endwhile;
											wp_reset_postdata();?>
										</ul>
									</li>
								</ul>
							</li>
						</ul>
					</div><!-- #research-nav .widget-area -->
				<?php } get_sidebar(); ?>
			</div><!-- #sidebar-left -->
		</div><!-- .container -->

<?php get_footer(); ?>
