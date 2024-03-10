<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
require_once 'Functions/FormatTitle.php';
require_once 'Functions/GetLinkScraper.php';
require_once 'Functions/ProcessContentDate.php';
require_once 'Functions/ProcessContentArticleBody.php';

$siteToScrape = 'https://www.hotnews.ro/sitemap-recent.xml';
$links = getLinkScrape($siteToScrape);

// Initialize an array to hold structured data for JSON
$dataForJson = [];

foreach ($links as $index => $link) {
    $date = processLinkContent($link['URL']);
    $articleBodyContent = processContentArticleBody($link['URL']);
    $articleBodyContent = str_replace("\n", " ", $articleBodyContent);
    $articleBodyContent = htmlspecialchars($articleBodyContent, ENT_QUOTES | ENT_HTML5, 'UTF-8');

    $trimmedURL = preg_replace('/\.html?$/', '', $link['URL']);

    // Display on webpage
    echo ($index + 1) . ": <br>" .
         "<span>Title: </span>" . htmlspecialchars($link['Title'], ENT_QUOTES | ENT_HTML5, 'UTF-8') . "<br>" .
         "<span>URL: </span>" .
         '<a href="' . $trimmedURL . '" target="_blank">' . $trimmedURL . '</a><br>' .
         "<span>Date: </span>" . $date . "<br>" .
         "<span>Article Body:</span>" . $articleBodyContent . "<br><br>";

    // Add structured data for JSON
    $dataForJson[] = [
        'index' => $index + 1,
        'title' => $link['Title'],
        'URL' => $trimmedURL,
        'date' => $date,
        'articleBody' => strip_tags($articleBodyContent) // Remove HTML tags for JSON
    ];
}

// Encode structured data as JSON
$jsonOutput = json_encode($dataForJson, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
$file = 'output.json';

// Save JSON to file
file_put_contents($file, $jsonOutput);

// Optional: If you also want to display the JSON on the webpage, uncomment the next line
echo "<pre>" . htmlspecialchars($jsonOutput) . "</pre>";
?>
</body>
</html>