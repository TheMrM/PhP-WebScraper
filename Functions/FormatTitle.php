<?php

function formatTitleFromUrl($url) {
    // Remove protocol and www from URL
    $url = str_replace(['http://', 'https://', 'www.'], '', $url);

    // Extract path from URL
    $path = parse_url($url, PHP_URL_PATH);

    // Remove slashes from the beginning and end of the path
    $path = trim($path, '/');

    // Split the path into parts using slashes as separators
    $parts = explode('/', $path);

    // Extract the last part of the path as the title
    $title = end($parts);

    // Remove ".htm" extension from the title
    $title = str_replace('.htm', '', $title);

    // Remove numbers with length 8 from the title
    $title = preg_replace('/\b\d{8}\b/', '', $title);

    // Replace dashes with spaces and capitalize words
    $formattedTitle = ucwords(str_replace('-', ' ', $title));

    return $formattedTitle;
}
