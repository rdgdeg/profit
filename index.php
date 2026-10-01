<?php

declare(strict_types=1);

require __DIR__ . '/src/bootstrap.php';

if (isset($_GET['__path']) && is_string($_GET['__path'])) {
    $uri = '/' . ltrim($_GET['__path'], '/');
} else {
    $uri = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?? '/';
}
$path = trim($uri, '/');

if ($path === 'robots.txt') {
    header('Content-Type: text/plain; charset=UTF-8');
    echo "User-agent: *\nAllow: /\nSitemap: /sitemap.xml\n";
    exit;
}

if ($path === 'sitemap.xml') {
    header('Content-Type: application/xml; charset=UTF-8');
    $pages = ['', 'coaching', 'velo', 'entreprise', 'kinesitherapie', 'tarifs', 'blog', 'contact', 'mentions'];
    echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
    echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";
    foreach (['fr', 'en'] as $code) {
        foreach ($pages as $page) {
            $loc = $page === '' ? '/' . $code : '/' . $code . '/' . $page;
            echo '  <url><loc>https://www.pro-fit.be' . $loc . '</loc></url>' . "\n";
        }
    }
    echo '</urlset>';
    exit;
}

$segments = $path === '' ? [] : explode('/', $path);
$langs = ['fr', 'en'];

if (!$segments) {
    header('Location: /fr', true, 302);
    exit;
}

$lang = $segments[0];
if (!in_array($lang, $langs, true)) {
    http_response_code(404);
    $lang = 'fr';
    $page = '404';
} else {
    $page = $segments[1] ?? 'home';
    if (($segments[1] ?? '') === 'blog' && isset($segments[2])) {
        $page = 'article';
        $slug = $segments[2];
    }
}

$GLOBALS['lang'] = $lang;
$content = require ROOT . '/src/content.php';
$C = $content[$lang];
$other = $lang === 'fr' ? 'en' : 'fr';

if ($page === 'contact' && ($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST') {
    handle_contact($C);
}

$known = ['home', 'coaching', 'velo', 'entreprise', 'kinesitherapie', 'tarifs', 'blog', 'article', 'contact', 'mentions', '404'];
if (!in_array($page, $known, true)) {
    http_response_code(404);
    $page = '404';
}

if ($page === 'article') {
    $article = null;
    foreach ($C['articles'] as $item) {
        if ($item['slug'] === ($slug ?? '')) {
            $article = $item;
            break;
        }
    }
    if (!$article) {
        http_response_code(404);
        $page = '404';
    }
}

$title = match ($page) {
    'home' => $C['meta']['home_title'],
    '404' => '404 | Pro-Fit.be',
    'article' => ($article['title'] ?? 'Blog') . ' | Pro-Fit.be',
    'blog' => $C['blog']['title'] . ' | Pro-Fit.be',
    'tarifs' => $C['tarifs']['title'] . ' | Pro-Fit.be',
    default => ($C['pages'][$page]['title'] ?? 'Pro-Fit.be') . ' | Pro-Fit.be',
};
$description = $C['meta']['description'];
$canonicalPath = $page === 'article'
    ? '/' . $lang . '/blog/' . ($article['slug'] ?? '')
    : ($page === 'home' ? '/' . $lang : '/' . $lang . '/' . $page);

ob_start();
$view = ROOT . '/views/' . ($page === '404' ? '404' : $page) . '.php';
if (!is_file($view)) {
    $view = ROOT . '/views/404.php';
}
require $view;
$body = ob_get_clean();
require ROOT . '/views/layout.php';

function handle_contact(array $C): void
{
    if (!csrf_ok($_POST['csrf'] ?? null) || trim((string) ($_POST['company'] ?? '')) !== '') {
        header('Location: ' . url_to('contact', null, ['err' => '1']));
        exit;
    }
    $name = trim((string) ($_POST['name'] ?? ''));
    $email = trim((string) ($_POST['email'] ?? ''));
    $phone = trim((string) ($_POST['phone'] ?? ''));
    $message = trim((string) ($_POST['message'] ?? ''));
    if ($name === '' || !filter_var($email, FILTER_VALIDATE_EMAIL) || mb_strlen($message) < 8) {
        header('Location: ' . url_to('contact', null, ['err' => '1']));
        exit;
    }
    $line = json_encode([
        'at' => date('c'),
        'lang' => lang(),
        'name' => $name,
        'email' => $email,
        'phone' => $phone,
        'message' => $message,
    ], JSON_UNESCAPED_UNICODE);
    $store = ROOT . '/data/messages.jsonl';
    if (is_writable(dirname($store))) {
        file_put_contents($store, $line . "\n", FILE_APPEND | LOCK_EX);
    }
    $subject = 'Message site Pro-Fit — ' . $name;
    $body = $name . "\n" . $email . "\n" . $phone . "\n\n" . $message;
    @mail('gain.adrien@gmail.com', $subject, $body, 'From: info@pro-fit.be' . "\r\n" . 'Reply-To: ' . $email);
    header('Location: ' . url_to('contact', null, ['ok' => '1']));
    exit;
}
