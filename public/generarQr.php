<?php

require '../vendor/autoload.php';

use BaconQrCode\Renderer\GDLibRenderer;
use BaconQrCode\Writer;

$counterFile = 'counter.txt';

function generateQRCode($url)
{
    global $counterFile;

    $qrCount = file_exists($counterFile) ? (int)file_get_contents($counterFile) : 0;
    $renderer = new GDLibRenderer(400);
    $writer = new Writer($renderer);
    $qrCount++;
    $fileName = 'qr_' . $qrCount . '.png';
    $writer->writeFile($url, $fileName);
    file_put_contents($counterFile, $qrCount);

    return $fileName;
}

function getFaviconUrl($url)
{
    $parsedUrl = parse_url($url);
    $domain = $parsedUrl['scheme'] . '://' . $parsedUrl['host'];

    $highResFaviconUrls = [
        '/favicon-32x32.png',
        '/favicon-96x96.png',
        '/apple-touch-icon.png',
        '/favicon.ico'
    ];

    foreach ($highResFaviconUrls as $path) {
        $faviconUrl = $domain . $path;
        if (get_headers($faviconUrl, 1)[0] === 'HTTP/1.1 200 OK') {
            return $faviconUrl;
        }
    }

    return $domain . '/favicon.ico';
}

if (isset($_POST['url'])) {
    $url = filter_var(trim($_POST['url']), FILTER_VALIDATE_URL);

    if ($url) {
        $fileName = generateQRCode($url);
        $faviconUrl = getFaviconUrl($url); 

        echo "<div style='display: flex; flex-direction: column; align-items: center; height: 100vh;'>";
        echo "<img src='" . htmlspecialchars($faviconUrl) . "' alt='Favicon' style='width: 64px; height: 64px; margin-top: 104px; margin-bottom: 10px;'>";
        echo "<img src='" . htmlspecialchars($fileName) . "' alt='Código QR'>";
        echo "</div>";
    } else {
        echo "URL no válida. Por favor, intenta de nuevo.";
    }
} else {
    echo "No se ha proporcionado ninguna URL.";
}

?>
