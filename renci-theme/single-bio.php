<?php
/* Template Name: BioPage
 */

get_header(); ?>

	<!-- <div class="arrow-right"></div> -->
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<?php
		// Start the loop.
		while ( have_posts() ) : the_post(); ?>
		<?php
			$field_name = "publications";
			$publicationsfield = get_field_object($field_name);

			$field_name = "research";
			$researchfield = get_field_object($field_name);

			$field_name = "education";
			$educationfield = get_field_object($field_name);

			$field_name = "collaborations/current_projects";
			$collaborationfield = get_field_object($field_name);

			$resume = get_field('resume_upload');
		?>
		<div class="photo-section">
			<div class="profile-photo">
				<?php the_post_thumbnail(); ?>
			</div>
		</div>
		<div class="summary-section">
			<div id="summary-wrap">
				<h1><?php the_title(); ?></h1>
				<div id="primary-title"><?php the_field('primary_title'); ?></div>
				<div id="secondary-title"><?php the_field('secondary_title'); ?></div>
				<div id="contact-info">
					<div id="email"><?php the_field('bio_email'); ?></div>
					<div id="phone-number"><?php the_field('bio_phone'); ?></div>
				</div>
				<?php
					if( $resume ): ?>
						<a href="<?php the_field('resume_upload'); ?>"><b>View Resume</b></a>
					<?php endif; ?>
				<div id="about-bio"><?php the_field('about'); ?></div>
			</div>
		</div>
		<?php if( get_field('research') ): ?>
		<hr />
		<h3><?php echo $researchfield['label']; ?></h3>
		<div id="research"><?php the_field('research'); ?></div>
		<?php endif; ?>
		<?php if( get_field('publications') ): ?>
		<hr />
		<h3><?php echo $publicationsfield['label']; ?></h3>
		<div id="publications"><?php the_field('publications'); ?></div>
		<?php endif; ?>
		<?php if( get_field('education') ): ?>
		<hr />
		<h3><?php echo $educationfield['label']; ?></h3>
		<div id="education"><?php the_field('education'); ?></div>
		<?php endif; ?>
		<?php if( get_field('collaborations/current_projects') ): ?>
		<hr />
		<h3><?php echo $collaborationfield['label']; ?></h3>
		<div id="collaborations"><?php the_field('collaborations/current_projects'); ?></div>
		<?php endif; ?>
		<?php if( get_field('extra_section_heading') ): ?>
		<hr />
		<h3><?php the_field('extra_section_heading'); ?></h3>
		<?php endif; ?>
		<?php if( get_field('extra_section_content') ): ?>
		<div id="education"><?php the_field('extra_section_content'); ?></div>
		<?php endif; ?>
		<?php if( get_field('extra_section_heading_2') ): ?>
		<hr />
		<h3><?php the_field('extra_section_heading_2'); ?></h3>
		<?php endif; ?>
		<?php if( get_field('extra_section_content_2') ): ?>
		<div id="education"><?php the_field('extra_section_content_2'); ?></div>
		<?php endif; ?>
		<?php if( get_field('extra_section_heading_3') ): ?>
		<hr />
		<h3><?php the_field('extra_section_heading_3'); ?></h3>
		<?php endif; ?>
		<?php if( get_field('extra_section_content_3') ): ?>
		<div id="education"><?php the_field('extra_section_content_3'); ?></div>
		<?php endif; ?>
		<?php if( get_field('extra_section_heading_4') ): ?>
		<hr />
		<h3><?php the_field('extra_section_heading_4'); ?></h3>
		<?php endif; ?>
		<?php if( get_field('extra_section_content_4') ): ?>
		<div id="education"><?php the_field('extra_section_content_4'); ?></div>
		<?php endif; ?>
		
		<?php 
		// End the loop. 
		endwhile; ?>

		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer(); ?>