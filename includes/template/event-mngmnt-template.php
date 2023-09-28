<div class="container">
    <div class="row">
        <div class="sponsor-images">
            <?php
            $args = array(
                'post_type' => 'sponsor',
                'posts_per_page' => -1,
            );

            $sponsor_query = new WP_Query($args);

            // Display the sponsor images
            if ($sponsor_query->have_posts()) :
                while ($sponsor_query->have_posts()) : $sponsor_query->the_post();
                    // Get the sponsor image URL from a custom field
                    $sponsor_image = get_the_post_thumbnail(get_the_ID(), 'large');

                    // Display the sponsor image
                    if ($sponsor_image) {
                        echo $sponsor_image;
                    }
                endwhile;
                wp_reset_query(); // Restore the global post data
            else :
                echo 'No sponsor found.';
            endif;
            ?>
        </div>
    </div>
</div>