<article class="page">
    <header class="page-hero">
        <h1>404</h1>
        <p class="lead"><?= $lang === 'fr' ? 'Cette page n’existe pas.' : 'This page does not exist.' ?></p>
        <p><a class="btn" href="<?= e(url_to('home')) ?>"><?= e($C['nav'][0][1]) ?></a></p>
    </header>
</article>
