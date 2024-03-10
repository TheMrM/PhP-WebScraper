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

$output = "";
foreach ($links as $index => $link) {
    $date = processLinkContent($link['URL']);
    $articleBodyContent = processContentArticleBody($link['URL']);
    $articleBodyContent = htmlspecialchars($articleBodyContent, ENT_QUOTES | ENT_HTML5, 'UTF-8');

    $output .= ($index + 1) . ": " . "<br>" . 
               "<span>Title: </span>" . htmlspecialchars($link['Title'], ENT_QUOTES | ENT_HTML5, 'UTF-8') . "<br>" .
               "<span>URL: </span>" . 
               '<a href="' . $link['URL'] . '" target="_blank">' . $link['URL'] . '</a>' . "<br>" .
               "<span>Date: </span>" . $date . "<br>" . 
               "<span>Article Body:</span>" . $articleBodyContent . "<br><br>";
}

$jsonOutput = json_encode($output, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
$file = 'output.json';
file_put_contents($file, $jsonOutput);

echo $output;
?>
</body>
</html>