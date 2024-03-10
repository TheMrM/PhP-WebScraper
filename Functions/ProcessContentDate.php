<?php

require_once 'Functions/GetLinkScraper.php';

function processLinkContent($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 30); // Timeout in seconds
    $htmlContent = curl_exec($ch);
    curl_close($ch);

    if ($htmlContent) {
        $doc = new DOMDocument();
        @$doc->loadHTML($htmlContent);
        $xpath = new DOMXPath($doc);

        // Search for the date within <span class="ora">
        $dateNode = $xpath->query("//span[contains(@class, 'ora')]");
        $date = $dateNode->length > 0 ? trim($dateNode->item(0)->nodeValue) : 'Date not found';

        return $date;
    } else {
        // Handle error; could not fetch content
        return false;
    }
}