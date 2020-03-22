<?php
function formatDate($date) {
    return date('F j Y, g:i a', strtotime($date));
}

function textShortener($text, $chars = 400) {
    $text .= " ";
    $text = substr($text, 0, $chars);
    $text = substr($text, 0, strrpos($text, ' '));
    $text .= "...";
    return $text;
}