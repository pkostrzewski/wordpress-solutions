<?php
function generate_timetable_row() {
    ob_start();
    ?>
    <div class="timetable-row">
        <input type="text" name="timetable_[day][]" class="timetable_day" placeholder="<?php esc_attr_e('Dzień tygodnia/miesiąca', 'text-domain'); ?>" />
        <input type="text" name="timetable_[time][]" class="timetable_time" placeholder="<?php esc_attr_e('Podaj godzinę lub zakres godzin', 'text-domain'); ?>" />
        <input type="text" name="timetable_[event][]" class="timetable_event" placeholder="<?php esc_attr_e('Wydarzenie', 'text-domain'); ?>" />
        <button type="button" class="remove-row button-primary red"><?php esc_html_e('Usuń', 'text-domain'); ?></button>
    </div>
    <?php
    return ob_get_clean();
}

function timetable_field_callback() {
    $values = get_option('timetable_', []);
    if (!is_array($values)) {
        $values = [];
    }
    ?>
    <div id="timetable-fields">
        <?php foreach ($values as $value): ?>
            <div class="timetable-row">
                <input type="text" name="timetable_[day][]" class="timetable_day" value="<?php echo isset($value['day']) ? esc_attr($value['day']) : ''; ?>" placeholder="<?php esc_attr_e('Dzień tygodnia/miesiąca', 'text-domain'); ?>" />
                <input type="text" name="timetable_[time][]" class="timetable_time" value="<?php echo isset($value['time']) ? esc_attr($value['time']) : ''; ?>" placeholder="<?php esc_attr_e('Podaj godzinę', 'text-domain'); ?>" />
                <input type="text" name="timetable_[event][]" class="timetable_event" value="<?php echo isset($value['event']) ? esc_attr($value['event']) : ''; ?>" placeholder="<?php esc_attr_e('Wydarzenie', 'text-domain'); ?>" />
                <button type="button" class="remove-row button-primary red"><?php esc_html_e('Usuń', 'text-domain'); ?></button>
            </div>
        <?php endforeach; ?>
    </div>
    <button type="button" id="add-timetable-row" class="button-primary green"><?php esc_html_e('Dodaj wydarzenie', 'text-domain'); ?></button>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $('#add-timetable-row').click(function() {
                var row = '<?php echo str_replace(["\r", "\n"], '', generate_timetable_row()); ?>';
                $('#timetable-fields').append(row);
            });

            $('#timetable-fields').on('click', '.remove-row', function() {
                $(this).closest('.timetable-row').remove();
            });

            $('form').submit(function(event) {
                var validFormat = true;
                var validFields = true;
                var timeInputs = $('input[name="timetable_[time][]"]');
                
                timeInputs.each(function() {
                    var value = $(this).val().trim();
                    if (value !== '') {
                        var timeRegex = /^([01]?[0-9]|2[0-3]):[0-5][0-9](\s*-\s*([01]?[0-9]|2[0-3]):[0-5][0-9])?$/;
                        if (!timeRegex.test(value)) {
                            validFormat = false;
                            $(this).addClass('invalid');
                        } else {
                            $(this).removeClass('invalid');
                        }
                    }
                });

                if (!validFormat || !validFields) {
                    event.preventDefault();
                    if (!validFields) {
                        showPopup('<?php esc_html_e('Proszę uzupełnić wszystkie pola.', 'text-domain'); ?>');
                    } else {
                        showPopup('<?php esc_html_e('Proszę wprowadzać godziny <br>w formacie HH:MM (np. 08:30)<br> lub HH:MM - HH:MM (np. 09:00-10:00).', 'text-domain'); ?>');
                    }
                }
            });

            function showPopup(message) {
                var popup = $('<div class="popup-overlay"><div class="popup"><svg width="36px" height="36px" viewBox="0 0 1024 1024" class="icon"  version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M452.266667 955.733333l-384-384c-34.133333-34.133333-34.133333-87.466667 0-121.6l384-384c34.133333-34.133333 87.466667-34.133333 121.6 0l384 384c34.133333 34.133333 34.133333 87.466667 0 121.6l-384 384c-34.133333 34.133333-89.6 34.133333-121.6 0z" fill="#F44336" /><path d="M460.8 697.6c0-6.4 2.133333-12.8 4.266667-19.2 2.133333-6.4 6.4-10.666667 10.666666-14.933333 4.266667-4.266667 10.666667-8.533333 17.066667-10.666667s12.8-4.266667 21.333333-4.266667 14.933333 2.133333 21.333334 4.266667c6.4 2.133333 12.8 6.4 17.066666 10.666667 4.266667 4.266667 8.533333 8.533333 10.666667 14.933333 2.133333 6.4 4.266667 12.8 4.266667 19.2s-2.133333 12.8-4.266667 19.2-6.4 10.666667-10.666667 14.933333c-4.266667 4.266667-10.666667 8.533333-17.066666 10.666667-6.4 2.133333-12.8 4.266667-21.333334 4.266667s-14.933333-2.133333-21.333333-4.266667-10.666667-6.4-17.066667-10.666667c-4.266667-4.266667-8.533333-8.533333-10.666666-14.933333s-4.266667-10.666667-4.266667-19.2z m89.6-98.133333h-76.8L462.933333 277.333333h98.133334l-10.666667 322.133334z" fill="#FFFFFF" /></svg><h3>' + message + '</h3></div></div>');
                $('body').append(popup);

                setTimeout(function() {
                    popup.fadeOut('slow', function() {
                        $(this).remove();
                    });
                }, 2800);
            }
        });
    </script>

    <?php
}
require_once __DIR__ . '/sanitizing.php';
