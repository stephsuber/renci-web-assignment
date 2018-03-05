<?php
/*
 * Template Name: Staff Individual
 */
?>

<?php get_header(); ?>
<div class="container">
	<div id="content" class="eleven columns" role="main">
	<?php if (have_posts()) : while (have_posts()) : the_post();?>
	<?php 
		$custom = get_post_custom($post->ID);
		$l_name = $custom["l_name"][0];
		$staff_title = $custom["staff_title"][0];
		$staff_email = $custom["staff_email"][0];
		$staff_phone = $custom["staff_phone"][0];
		$more_info_url = $custom["more_info_url"][0];
		$expertise = $custom["expertise"][0];
		$academic_department = $custom["academic_department"][0];
	?>

	<br />
	<h1><?php the_title(); ?></h1>
	<div class="entry-content">
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
			echo "More Info: <a class=\"staff_content\" href=\"$more_info_url\">$more_info_url</a>"; echo "<br />";
		}
		if ($expertise){
			echo "Area of Expertise: <span class=\"staff_content\">$expertise</span>";
		}
		if ($academic_department){
			echo "Academic Department: <span class=\"staff_content\">$academic_department</span>";
		}
		the_content(); ?>
		</div>
	<?php endwhile; endif; ?>
	</div><!-- #content -->
	<div id="sidebar-left" class="five columns">
		<?php get_sidebar(); ?>
	</div><!-- #sidebar-right -->
</div><!-- .container -->

<?php get_footer(); ?>