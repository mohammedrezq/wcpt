<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header alignwide">
		<?php the_title('<h1 class="entry-title">', '</h1>'); ?>
	</header>
	<div class="entry-content">
		<?php
		// the_content();

		if (class_exists('ACF')) {
			/**
			 * 
			 * First check is Advanced custom fields (ACF plugin) is active
			 * If ACF ative display feature image and the rest of fields from
			 * ACF
			 * 		
			 * */
			echo '<div class="writer-details">';

			/* Custom Fields For Writer Details per Required */
		?>

			<table>
				<tr>
					<th>*</th>
					<th>Writer's Details</th>
				</tr>
				<tr>
					<td>Feature Image</td>

					<td>
						<?php
						$FeaturedImgACF = get_field('featured_image');
						if (!empty($FeaturedImgACF)) { ?>
							<img src="<?php echo $FeaturedImgACF ?>" />
						<?php } ?>
					</td>
				</tr>
				<tr>

					<td>First Name</td>
					<td>
						<?php
						$FirstNameACF = get_field('first_name');
						if (!empty($FirstNameACF)) { ?>
						<?php echo '<div> <span class="custom-meta-box">First name: </span>' . $FirstNameACF . '</div>';
						} ?>
					</td>
				</tr>
				<tr>

					<td>Last Name</td>
					<td>
						<?php
						$LastNameACF = get_field('last_name');
						if (!empty($LastNameACF)) { ?>
						<?php echo '<div> <span class="custom-meta-box">Last name: </span>' . $LastNameACF . '</div>';
						} ?>
					</td>
				</tr>
				<tr>

					<td>Biography</td>
					<td>
						<?php
						$biography = get_field('biography');
						if (!empty($biography)) { ?>
						<?php echo '<div> <span class="custom-meta-box">Biograhpy: </span>' . $biography . '</div>';
						} ?>
					</td>
				</tr>
				<tr>

					<td><span class="custom-meta-box">Facebook URL</span></td>
					<td>
						<?php
						$facebookUrlACF = get_field('facebook_url');
						if (!empty($facebookUrlACF)) { ?>
							<div class="writer-facebookUrl"><a href="<?php echo $facebookUrlACF ?>">Writer's Facebook URL</a></div>
						<?php	} ?>
					</td>
				</tr>
				<tr>

					<td><span class="custom-meta-box">LinkedIn URL</span></td>
					<td>
						<?php
						$LinkedIn_UrlACF = get_field('linkedin_url');
						if (!empty($LinkedIn_UrlACF)) { ?>
							<div class="writer-LinkedInUrl"><a href="<?php echo $LinkedIn_UrlACF ?>">Writer's LinkedIn URL</a></div>
						<?php
						} ?>
					</td>
				</tr>
			</table>
		<?php
		} else {
			/**
			 * 
			 * IF (ACF plugin) is NOT active
			 * Use Post Meta Data (built-in WordPress), also use built-in feature image (post thumbail image)
			 * 
			 * */

			echo '<div class="writer-details">';
			/* Custom Fields For Writer Details per Required */

		?>
			<table>
				<tr>
					<th>*</th>
					<th>Writer's Details</th>
				</tr>
				<tr>
					<td>Feature Image</td>

					<td>
						<?php  //Limit the size of image thumbnail to 400px at most 
						?>
						<div style="max-width: 400px;">
							<?php twenty_twenty_one_post_thumbnail(); ?>
						</div>
					</td>
				</tr>
				<tr>

					<td>First Name</td>
					<td>
						<?php
						$FirstName = get_post_meta($post->ID, 'First name', true);
						if (!empty($FirstName)) {
							echo '<div class="writer-firstName"> <span class="custom-meta-box">First name:</span> ' . $FirstName . '</div>';
						} ?>
					</td>
				</tr>
				<tr>

					<td>Last Name</td>
					<td>
						<?php
						$LastName = get_post_meta($post->ID, 'Last name', true);
						if (!empty($LastName)) {
							echo '<div class="writer-lastName"> <span class="custom-meta-box">Last name:</span> ' . $LastName . '</div>';
						} ?>
					</td>
				</tr>
				<tr>

					<td>Biography</td>
					<td>
						<?php
						$Biography = get_post_meta($post->ID, 'Biography', true);
						if (!empty($Biography)) {
							echo '<div class="writer-biography"> <span class="custom-meta-box">Biograhpy:</span> ' . $Biography . '</div>';
						} ?>
					</td>
				</tr>
				<tr>

					<td><span class="custom-meta-box">Facebook URL</span></td>
					<td>
						<?php
						$Facebook_URL = get_post_meta($post->ID, 'Facebook URL', true);
						if (!empty($Facebook_URL)) { ?>
							<div class="writer-facebookUrl"><span class="custom-meta-box">Facebook URL:</span> <a href="<?php echo $Facebook_URL ?>">Writer's Facebook URL</a></div>
						<?php
						} ?>
					</td>
				</tr>
				<tr>

					<td><span class="custom-meta-box">LinkedIn URL</span></td>
					<td>
						<?php $LinkedIn_URL = get_post_meta($post->ID, 'LinkedIn URL', true);
						if (!empty($LinkedIn_URL)) { ?>
							<div class="writer-linkedInUrl"><span class="custom-meta-box">LinkedIn URL:</span> <a href="<?php echo $LinkedIn_URL ?>">Writer's LinkedIn URL</a></div>
						<?php
						}; ?>
					</td>
				</tr>
			</table>
		<?php
		}


		get_template_part('template-parts/content/writers');

		wp_link_pages(
			array(
				'before'   => '<nav class="page-links" aria-label="' . esc_attr__('Page', 'twentytwentyone') . '">',
				'after'    => '</nav>',
				/* translators: %: page number. */
				'pagelink' => esc_html__('Page %', 'twentytwentyone'),
			)
		);
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer default-max-width">
		<?php twenty_twenty_one_entry_meta_footer(); ?>
	</footer><!-- .entry-footer -->

	<?php if (!is_singular('attachment')) : ?>
		<?php get_template_part('template-parts/post/author-bio'); ?>
	<?php endif; ?>

</article><!-- #post-<?php the_ID(); ?> -->