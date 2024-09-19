<?php function filter_posts_by_year() {
    $year_id = isset($_POST['year_id']) ? intval($_POST['year_id']) : 0;
    $current_year = date('Y');
    $selected_year = get_term($year_id)->name;

    $args = array(
        'post_type' => 'events',
        'posts_per_page' => -1,
        'tax_query' => array(
            array(
                'taxonomy' => 'year',
                'field'    => 'term_id',
                'terms'    => $year_id,
            ),
        ),
    );

    $custom_query = new WP_Query($args);

    if ($custom_query->have_posts()) :
        while ($custom_query->have_posts()) : $custom_query->the_post();
            ?>
            <div class="post-item">
                <a href="<?php the_permalink(); ?>">
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="thumb">
                            <?php the_post_thumbnail('medium_large'); ?>
                        </div>
                    <?php else : ?>
                        <div class="thumb">
                            <img src="<?php echo get_template_directory_uri() . '/dist/images/webp/default-image.webp'; ?>" alt="<?php the_title(); ?>">
                        </div>
                    <?php endif; ?>
                    <div class="content">
                        <h3><?php the_title(); ?></h3>
                    </div>
                </a>
            </div>
            <?php
        endwhile;
        wp_reset_postdata();
    else :
        if ($selected_year == $current_year) {
            echo '<p class="alert">' . __('W tym roku nie udokumentowano jeszcze wydarzeń, zajrzyj do lat poprzednich.', 'owinska-pl') . '</p>';
        } else {
            echo '<p class="alert">' . __('Brak wydarzeń do wyświetlenia.', 'owinska-pl') . '</p>';
        }
    endif;

    die();
}
add_action('wp_ajax_filter_posts_by_year', 'filter_posts_by_year');
add_action('wp_ajax_nopriv_filter_posts_by_year', 'filter_posts_by_year');
