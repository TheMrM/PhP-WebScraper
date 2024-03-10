<?php
// Correct the include path to be relative, ensuring it points to the Functions directory correctly
include 'Functions/FormatTitle.php';
include 'Functions/GetLinkScrape.php';

// Define $siteToScrape before using it
$siteToScrape = 'https://www.hotnews.ro/sitemap-recent.xml';
$links = getLinkScrape($siteToScrape);

$output = "";
foreach ($links as $index => $link) {
    $output .= ($index + 1) . ": " . 
               "<span>Title: </span>" . $link['Title'] . "<br>" .
               "<span>URL: </span>" . 
               '<a href="' . $link['URL'] . '" target="_blank">' . $link['URL'] . '</a>' . "<br>"; 
}

echo $output;
?>