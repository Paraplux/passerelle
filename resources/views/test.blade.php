<?php

$array = array();

foreach($events as $event) {
    $date = $event->calendarDate();
    $content = '<span>' . $event->name . '</span>';

    if(array_key_exists($date, $array)) {
        $array[$date] .= $content;
    } else {
        $array[$date] = $content;
    }
}
?>


