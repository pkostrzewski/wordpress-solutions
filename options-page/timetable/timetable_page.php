<?php
function timetable_page() {
    ?>
    <div class="wrap timetable-settings">
        <h1><?php echo esc_html__('Terminarz', 'text-domain'); ?></h1>
        <div class="section">
            <form method="post" action="options.php">
                <?php
                settings_fields('timetable_group');
                do_settings_sections('timetable');
                submit_button();
                ?>
            </form>
        </div>
    </div>
    <?php
}
