<?php
function enqueue_events_scripts() {
    if (is_archive('events') || is_singular('events')) {
        wp_enqueue_script('ajax-script', get_template_directory_uri() . '/dist/js/EventsAjax.bundle.js', array('jquery'), null, true);
        wp_localize_script('ajax-script', 'ajax_vars', array('ajaxurl' => admin_url('admin-ajax.php')));
    }
}
add_action('wp_enqueue_scripts', 'enqueue_events_scripts');
