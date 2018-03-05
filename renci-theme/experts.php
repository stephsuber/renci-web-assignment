<?php 
/**
 * Template Name: Experts Index
 */
?>

<?php get_header(); ?>
<div class="container">
	<div id="sidebar-left" class="five columns">
		<h2>Staff Search</h2>
		<div id="staff_alphas">
			<a href="#a">A</a>
			<a href="#b">B</a>
			<a href="#c">C</a>
			<a href="#d">D</a>
			<a href="#e">E</a>
			<a href="#f">F</a>
			<a href="#g">G</a>
			<a href="#h">H</a>
			<a href="#i">I</a>
			<a href="#j">J</a>
			<a href="#k">K</a>
			<a href="#l">L</a>
			<a href="#m">M</a>
			<a href="#n">N</a>
			<a href="#o">O</a>
			<a href="#p">P</a>
			<a href="#q">Q</a>
			<a href="#r">R</a>
			<a href="#s">S</a>
			<a href="#t">T</a>
			<a href="#u">U</a>
			<a href="#v">V</a>
			<a href="#w">W</a>
			<a href="#x">X</a>
			<a href="#y">Y</a>
			<a href="#z">Z</a>
		</div><br/>
		<div id="staff_search_input">
			<form>
				Search: <input type="text" name="staff_search_input" /><br/>
				<input type="checkbox" name="search_names_only" id="search_names_only" />Search names only
			</form><br/>
		</div><!-- #staff_search_input -->
	</div><!-- #sidebar-left -->
	<div id="content" class="six columns">
		<ul>
		<?php
		$alpha_array = array("a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z");
		$i = 0;
		$experts_loop = new WP_Query(array('orderby' => 'title', 'order' => 'ASC', 'post_type' => 'staff', 'posts_per_page' => 100, 'meta_key' => 'expert_status', 'meta_value' => 'true'));
		while ( $experts_loop->have_posts() ) : $experts_loop->the_post();
			if($alpha_array[$i] == strtolower(substr(get_the_title(),0,1))) {
				?><li class="record" id="<?php echo strtolower(substr(get_the_title(),0,1)); ?>"><?php 
				$i++;
			}
			else {?>
			<li class="record"><?php }	
				$custom = get_post_custom($post->ID);
				$l_name = $custom["l_name"][0];
				$staff_title = $custom["staff_title"][0];
				$staff_phone = $custom["staff_phone"][0];
				$more_info_url = $custom["more_info_url"][0];
				//$expert_status = $custom["expert_status"][0];	
			?>
			<?php echo "<br />"; ?>
			<h2><a class="staff_content name_only" href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
			<?php 
				echo "Staff Title: <span class=\"staff_content\">$staff_title</span>";echo "<br />";
				echo "Phone: <span class=\"staff_content\">$staff_phone</span>"; echo "<br />";
				echo "More Info: <a class=\"staff_content\" href=\"$more_info_url\">$more_info_url</a>";
			?>

			<div class="entry-content">
				<?php the_content() ?>
			</div> 
			</li>    
	    <?php endwhile; ?>
	</div><!-- #content -->
	<div id="sidebar-right" class="five columns">
		<?php get_sidebar(); ?>
	</div><!-- #sidebar-right -->
</div><!-- .container -->

<?php get_footer(); ?>