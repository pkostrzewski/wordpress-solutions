<?php
function sanitize_timetable($input) {
    $sanitized = array();

    if (isset($input['day'])) {
        $days = array_map('sanitize_text_field', $input['day']);
        $times = isset($input['time']) ? array_map('sanitize_text_field', $input['time']) : array();
        $events = isset($input['event']) ? array_map('sanitize_text_field', $input['event']) : array();

        foreach ($days as $key => $day) {
            if (!empty($day)) {
                $sanitized[] = array(
                    'day' => $day,
                    'time' => isset($times[$key]) ? $times[$key] : '',
                    'event' => isset($events[$key]) ? $events[$key] : '',
                );
            }
        }
    }

    return $sanitized;
}
