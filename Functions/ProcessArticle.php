<?php

require_once 'Functions/GetLinkScraper.php';

function processArticle($url) {
    $output = [
        'date' => '',
        'body' => ''
    ];
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_TIMEOUT, 30); // Timeout in seconds
    $htmlContent = curl_exec($ch);
    curl_close($ch);

    if ($htmlContent) {
        $doc = new DOMDocument();
        @$doc->loadHTML(mb_convert_encoding($htmlContent, 'HTML-ENTITIES', 'UTF-8'));
        $xpath = new DOMXPath($doc);

        // Get the article body content
        $articleBodyNode = $xpath->query("//div[contains(@class, 'article-body')]");
        if ($articleBodyNode->length > 0) {
            $articleBodyContent = '';
            foreach ($articleBodyNode as $node) {
                $paragraphs = $node->getElementsByTagName('p');
                foreach ($paragraphs as $paragraph) {
                    $articleBodyContent .= $paragraph->nodeValue . "\n"; // Get only the text content of <p> tags
                }
            }

            $output['body'] = htmlspecialchars($articleBodyContent, ENT_QUOTES | ENT_HTML5, 'UTF-8');
            // Search for the date within <span class="ora">
            $dateNode = $xpath->query("//span[contains(@class, 'ora')]");
            $output['date'] = $dateNode->length > 0 ? trim($dateNode->item(0)->nodeValue) : 'Date not found';

            return $output;
        } else {
            return $output;
        }

    } else {
        // Handle error; could not fetch content
        return false;
    }
}

?>