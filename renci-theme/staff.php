<?php 
/**
 * Template Name: Staff Index
 */
?>

<?php get_header(); ?>
<div class="container">

  <div class= "section-banner">
    <img src="<?php echo get_bloginfo('stylesheet_directory');?>/images/about.jpg" />
  </div>
	
	<div id="content" class="eleven columns">
		<table id="staff-list">
		<?php
		$alpha_array = array("a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z");
		$i = 0;
		$staff_loop = new WP_Query(array('orderby' => 'meta_value', 'meta_key' => 'l_name', 'order' => 'ASC','post_type' => 'staff', 'posts_per_page' => -1)); 
		$rowCounter = 0;
		while ( $staff_loop->have_posts() ) : $staff_loop->the_post();
		$first_letter = strtolower(substr(get_post_meta(get_the_ID(),'l_name',true),0,1));
		$alpha_index = array_search($first_letter,$alpha_array);
			$rowCounter++;
			if($rowCounter %2 != 0)
				echo "<tr class='alternateRow-" . ($rowCounter %4) . "'>";
			if($alpha_index==$i) {
				?><td class="record" id="<?php echo strtolower(substr(get_post_meta(get_the_ID(),'l_name',true),0,1)); ?>"><?php 
				$i++;
			}
			elseif ($alpha_index>$i) {
				$i = $alpha_index;
				?><td class="record" id="<?php echo strtolower(substr(get_post_meta(get_the_ID(),'l_name',true),0,1)); ?>"><?php 
			}
			else {?>
			<td class="record"><?php }	
				$custom = get_post_custom($post->ID);
				$l_name = $custom["l_name"][0];
				$staff_title = $custom["staff_title"][0];
				$staff_email = $custom["staff_email"][0];
				$staff_phone = $custom["staff_phone"][0];
				$more_info_url = $custom["more_info_url"][0];
				$expertise = $custom["expertise"][0];
				$academic_department = $custom["academic_department"][0]; ?>
				<div class="profile-photo"><img src="<?php the_post_thumbnail_url(); ?>"/></div><?php

			?>
<!--			<h2><a class="staff_content name_only" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>-->
			<b><?php the_title(); ?></b>
			<br />
			<?php 
				if ($staff_title){
					echo "Staff Title: <span class=\"staff_content\">$staff_title</span>"; echo "<br />";
				}
				if ($staff_email){
					echo "Email: <span class=\"staff_content\">$staff_email</span>"; echo "<br />";
				}
				if ($staff_phone.length > 1){
					echo "Phone: <span class=\"staff_content\">$staff_phone</span>"; echo "<br />";
				}
				if ($more_info_url){
					echo "Biography Page: <a class=\"staff_content\" href=\"$more_info_url\">$more_info_url</a>"; echo "<br />";
				}
				if ($expertise){
					echo "Expertise: <span class=\"staff_content\">$expertise</span>";
				}
				if ($academic_department){
					echo "Academic Department: <span class=\"staff_content\">$academic_department</span>";
				}
			?>
			</td>
			
			<?php if($rowCounter %1 == 0)
				echo "</tr>";?>

	    <?php endwhile; ?>
		</table>
	</div><!-- #content -->
	<div id="sidebar-left" class="five columns">
	
		<div class= "breadcrumbs">
		<a title="Go to Home." href="<?php bloginfo('url'); ?>" class="site-home">Home</a>
		 > 
		<a title="Go to About." href="<?php bloginfo('url'); ?>/about/" class="page">About</a>
		 > 
		<a title="Go to Staff Directory." href="<?php bloginfo('url'); ?>/about/staff-directory/" class="post-page current-item">Staff Directory</a>
		</div>
		
		<?php get_sidebar(); ?>
		
	</div><!-- #sidebar-left -->
</div><!-- .container -->

<?php get_footer(); ?>