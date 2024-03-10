<?php
require_once 'Functions/FormatTitle.php';
require_once 'Functions/GetLinkScraper.php';
require_once 'Functions/ProcessArticle.php';

$siteToScrape = 'https://www.hotnews.ro/sitemap-recent.xml';
$links = getLinkScrape($siteToScrape);

$output = [];
foreach ($links as $index => $link) {
    $article = processArticle($link['URL']);
    $output[] = [
        'No' => $index+1,
        'URL' => $link['URL'],
        'Date' => $article['date'],
        'Body' => $article['body']
    ];
}

$jsonOutput = json_encode($output, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);

$file = 'output.json';
file_put_contents($file, $jsonOutput);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    echo '<pre>';
    print_r($output);
    echo '</pre>';
?>
</body>
</html>