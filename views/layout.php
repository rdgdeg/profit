<?php
$switchPage = $page === 'article'
    ? 'blog/' . ($article['slug'] ?? '')
    : ($page === 'home' || $page === '404' ? 'home' : $page);
$switchHref = url_to($switchPage === 'home' ? 'home' : $switchPage, $other);
?>
<!DOCTYPE html>
<html lang="<?= e($lang) ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= e($title) ?></title>
    <meta name="description" content="<?= e($description) ?>">
    <link rel="canonical" href="https://www.pro-fit.be<?= e($canonicalPath) ?>">
    <link rel="alternate" hreflang="fr" href="https://www.pro-fit.be<?= e(str_replace('/' . $lang, '/fr', $canonicalPath)) ?>">
    <link rel="alternate" hreflang="en" href="https://www.pro-fit.be<?= e(str_replace('/' . $lang, '/en', $canonicalPath)) ?>">
    <meta property="og:title" content="<?= e($title) ?>">
    <meta property="og:description" content="<?= e($description) ?>">
    <meta property="og:image" content="https://www.pro-fit.be/assets/img/logo.png">
    <link rel="icon" href="<?= e(asset('img/logo.png')) ?>">
    <link rel="stylesheet" href="<?= e(asset('css/app.css')) ?>">
</head>
<body>
<div id="haut"></div>
<a class="skip" href="#content"><?= $lang === 'fr' ? 'Aller au contenu' : 'Skip to content' ?></a>
<header class="site-header">
    <a class="brand" href="<?= e(url_to('home')) ?>">
        <img src="<?= e(asset('img/logo.svg')) ?>" alt="Pro-Fit.be" width="168" height="86">
    </a>
    <button class="nav-toggle" type="button" aria-expanded="false" aria-controls="site-nav">Menu</button>
    <nav id="site-nav" class="site-nav">
        <?php foreach ($C['nav'] as [$slug, $label]): ?>
            <a href="<?= e(url_to($slug)) ?>" <?= ($page === $slug || ($page === 'article' && $slug === 'blog')) ? 'aria-current="page"' : '' ?>><?= e($label) ?></a>
        <?php endforeach; ?>
        <a class="lang" href="<?= e($switchHref) ?>"><?= $other === 'en' ? 'EN' : 'FR' ?></a>
        <a class="book" href="<?= e($C['links']['book']) ?>" target="_blank" rel="noopener"><?= e($C['book']) ?></a>
    </nav>
</header>
<main id="content">
    <?= $body ?>
</main>
<footer class="site-footer">
    <div class="footer-inner">
        <div class="footer-brand">
            <span class="footer-logo"><img src="<?= e(asset('img/logo.svg')) ?>" alt="" width="140" height="72"></span>
            <p>Pro-Fit.be<br><?= e($C['footer']) ?></p>
        </div>
        <nav>
            <?php foreach ($C['nav'] as [$slug, $label]): ?>
                <a href="<?= e(url_to($slug)) ?>"><?= e($label) ?></a>
            <?php endforeach; ?>
            <a href="<?= e(url_to('contact')) ?>"><?= e($C['pages']['contact']['title']) ?></a>
            <a href="<?= e(url_to('mentions')) ?>"><?= e($C['pages']['mentions']['title']) ?></a>
        </nav>
        <div class="footer-contact">
            <a href="<?= e($C['links']['maps']) ?>" target="_blank" rel="noopener"><?= e($C['contact']['address']) ?></a>
            <a href="<?= e($C['links']['adrien_tel']) ?>">+32 474 48 82 73</a>
            <a href="<?= e($C['links']['adrien_mail']) ?>">gain.adrien@gmail.com</a>
            <div class="socials">
                <a href="<?= e($C['links']['instagram']) ?>" target="_blank" rel="noopener">Instagram</a>
                <a href="<?= e($C['links']['facebook']) ?>" target="_blank" rel="noopener">Facebook</a>
                <a href="<?= e($C['links']['linkedin']) ?>" target="_blank" rel="noopener">LinkedIn</a>
            </div>
            <button type="button" class="cookie-manage" data-cookie-manage><?= e($C['cookies_manage']) ?></button>
        </div>
    </div>
    <div class="footer-bar">
        <p>© <?= date('Y') ?> · <a href="<?= e($C['links']['ldmedia']) ?>" target="_blank" rel="noopener">LD Media</a></p>
    </div>
</footer>
<div class="cookie" data-cookie role="dialog" aria-labelledby="cookie-title">
    <p id="cookie-title"><?= e($C['cookies']) ?></p>
    <div class="cookie-actions">
        <button type="button" data-cookie-choice="refused"><?= e($C['cookies_no']) ?></button>
        <button type="button" data-cookie-choice="accepted"><?= e($C['cookies_ok']) ?></button>
    </div>
</div>
<a class="to-top" href="#haut"><?= $lang === 'fr' ? 'Haut de page' : 'Back to top' ?></a>
<script src="<?= e(asset('js/app.js')) ?>"></script>
</body>
</html>
