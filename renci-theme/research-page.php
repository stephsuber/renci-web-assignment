<?php
/**
 * Template Name: Research Index
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
$current_id = get_the_ID();
get_header(); ?>

<?php $research_page = get_page_by_title('Research'); 


function display_items($the_query){
	echo "<table class='research-list'>";
		$item_array = array();
		$queryCount = 0;
		while ( $the_query->have_posts() ) : 
			$item_array[$queryCount] = array(get_permalink(), get_the_title());
			$the_query->the_post(); 
			$queryCount++;
		endwhile;
		wp_reset_postdata();
		
		$i = 0;
		while($i < count($item_array)){
			echo '<tr>';
			echo '<td class="alternateRow-1"><a href="' . $item_array[$i][0] . '">' . $item_array[$i][1]  . '</a></td>';
			echo '<td class="alternateRow-1"><a href="' . $item_array[$i+1][0] . '">' . $item_array[$i+1][1]  . '</a></td>';
			echo '<td class="alternateRow-1"><a href="' . $item_array[$i+2][0] . '">' . $item_array[$i+2][1]  . '</a></td>';
			echo '</tr>';
			if($i+3 < count($item_array)){
				echo '<tr>';
				echo '<td class="alternateRow-3"><a href="' . $item_array[$i+3][0] . '">' . $item_array[$i+3][1]  . '</a></td>';
				echo '<td class="alternateRow-3"><a href="' . $item_array[$i+4][0] . '">' . $item_array[$i+4][1]  . '</a></td>';
				echo '<td class="alternateRow-3"><a href="' . $item_array[$i+5][0] . '">' . $item_array[$i+5][1]  . '</a></td>';
				echo '</tr>';
			}
			$i = $i+6;
		} 
	echo '</table>';
}
?>



		<div class="container">
		<?php if(is_page($research_page->ID)) { ?>
			<div class="section-banner"><img src="<?php echo get_bloginfo('stylesheet_directory');?>/images/header_<?php echo(rand(1,5)); ?>.jpg" /></div>
	<?php } else { 
		$feat_image = wp_get_attachment_url( get_post_thumbnail_id($current_id));
	?>
		<div class="section-banner"><img src="<?php echo $feat_image; ?>" /></div>	
	<?php } ?> 
		
			
			<div id="content" class="eleven columns entry-content" role="main">
				<h1><?php the_title(); ?> Projects</h1>
				
				<?php if(is_page('10027')) {
					if (have_posts()) : while (have_posts()) : the_post();
						the_content();
						endwhile;
					endif;
				} else {
					$the_query = new WP_Query(array('cat' => $research_cat, 'post_type' => 'page', 'posts_per_page' => 100, 'orderby' => 'title', 'order' => 'ASC', 'meta_key' => 'wpcf-archived-research', 'meta_value' => 0));
					display_items($the_query);
					wp_reset_postdata();
					?>
					<br />
					<h1>Archived <?php the_title(); ?> Projects</h1>
						<?php $the_query = new WP_Query(array('cat' => $research_cat, 'post_type' => 'page', 'posts_per_page' => 100, 'orderby' => 'title', 'order' => 'ASC', 'meta_key' => 'wpcf-archived-research', 'meta_value' => 1));
						display_items($the_query);

				} 
				?>
			</div><!-- #content -->
			<div id="sidebar-left" class="five columns">
				<div class="breadcrumbs">
    				<?php if(function_exists('bcn_display')){
    					bcn_display();
				    }?>
				</div>
				<div id="research-nav" class="widget-area" role="complimentary">
					<ul class="xoxo">
						<li id="pages-2" class="widget-container widget_pages">
							<ul>
								<li class="page_item<?php if (is_page('10027')): echo " current_page_item"; endif;?>"><a href="<?php echo home_url(); ?>/research">Research</a>
									<ul class="children">

										<?php $the_query = new WP_Query(array('post_type' => 'page', 'posts_per_page' => 15, 'orderby' => 'title', 'order' => 'ASC', 'meta_key' => 'wpcf-research-type', 'meta_value' => null, 'meta_compare' => '!='));

										while ( $the_query->have_posts() ) : 
											$the_query->the_post();?>
											<li class="page_item<?php if (get_the_ID() == $current_id): echo " current_page_item"; endif;?>"><a href="<?php the_permalink(); ?>"><?php the_title();?></a>
											</li>
										<?php endwhile;
										wp_reset_postdata();?>
									</ul>
								</li>
							</ul>
						</li>
					</ul>
				</div><!-- #research-nav .widget-area -->
				<?php get_sidebar(); ?>
			</div><!-- #sidebar-left -->
		</div><!-- .container -->

<?php get_footer(); ?>
