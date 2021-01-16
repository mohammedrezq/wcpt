<?php

/**
 * Show 3 random writers in a grid flexbox
 */
$post = get_post();

$args = [
    'post_type' => 'Writer',
    'post__not_in' => array($post->ID), // To make sure that the current writer (id of the writer post) isn't in the list of the writers
    'posts_per_page' => 3,
    'orderby' => 'rand', // Random
];
$writers = new WP_Query($args);

echo '<h3 class="writers-header">Most Famous Writers</h3>';
echo '<div id="writers-list-footer" class"writers-list">';
while ($writers->have_posts()) : $writers->the_post();
    echo '<div class="writer-item">';
    echo '<figure class="writer-feature-image">';
    if (has_post_thumbnail()) { // if the post doesn't have thumbnail use Advanced custom fields feature image 
        the_post_thumbnail('medium');
    } else {
        $FeaturedImgACF = get_field('featured_image');
        if (!empty($FeaturedImgACF)) { ?>
            <img src="<?php echo $FeaturedImgACF ?>" />
        <?php } ?>
    <?php
    }
    echo '</figure>';
    echo '<h4>' . get_the_title() . '</h4>';
    // The writer post link ?>
    Visit <a href="<?php the_permalink() ?>"><?php echo '<strong>' . get_the_title() . '</strong>' ?></a>
<?php
    echo '</div>';
endwhile;
echo '</div>';

wp_reset_query();
