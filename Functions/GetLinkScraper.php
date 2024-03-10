<?php

$siteToScrape = 'https://www.hotnews.ro/sitemap-recent.xml';
$links = getLinkScrape($siteToScrape);

function getLinkScrape($siteToScrape) {
    $xmlContent = file_get_contents($siteToScrape);
    if ($xmlContent === false) { return 'We cannot access XML'; }

    try {
        $xml = new SimpleXMLElement($xmlContent, 0, false);
        $namespaces = $xml->getNamespaces(true);
        if (!empty($namespaces)) {
            $namespace = array_values($namespaces)[0];
            $xml->registerXPathNamespace('x', $namespace);
            $sitemapElements = $xml->xpath('/x:urlset/x:url/x:loc');
        } else {
            $sitemapElements = $xml->xpath('/urlset/url/loc');
        }
    } catch (Exception $e) {
        return "Exception: " . $e->getMessage();
    }

    $results = [];
    $counter = 0; // Initialize counter

    foreach ($sitemapElements as $element) {
        if ($counter >= 100) { // Limit to first 100 links
            break; // Exit the loop after processing 100 links
        }

        $url = trim((string)$element);
        $title = formatTitleFromUrl($url); // Use the correct function name

        $results[] = [
            "URL" => $url,
            "Title" => $title,
        ];

        $counter++; // Increment counter after processing each link
    }
    return $results;
}