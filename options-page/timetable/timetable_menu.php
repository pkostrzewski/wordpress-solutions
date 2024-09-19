<?php
function timetable_menu() {
    add_menu_page(
        __('Terminarz', 'text-domain'),
        __('Terminarz', 'text-domain'),
        'manage_options',
        'timetable',
        'timetable_page'
    );
}
add_action('admin_menu', 'timetable_menu');
