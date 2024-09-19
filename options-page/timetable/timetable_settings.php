<?php
function register_timetable_settings() {
    register_setting('timetable_group', 'timetable_', 'sanitize_timetable');

    add_settings_section(
        'timetable_section',
        __('Timetable Settings', 'text-domain'),
        '__return_null',
        'timetable'
    );

    add_settings_field(
        'timetable_field',
        __('Timetable Entries', 'text-domain'),
        'timetable_field_callback',
        'timetable',
        'timetable_section'
    );
}

add_action('admin_init', 'register_timetable_settings');
