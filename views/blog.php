<article class="page">
    <header class="page-hero">
        <p class="kicker">Pro-Fit.be</p>
        <h1><?= e($C['blog']['title']) ?></h1>
        <p class="lead"><?= e($C['blog']['lead']) ?></p>
    </header>
    <div class="blog-list">
        <?php foreach ($C['articles'] as $item): ?>
            <a class="blog-card" href="<?= e(url_to('blog/' . $item['slug'])) ?>">
                <img src="<?= e(asset('img/' . $item['image'])) ?>" alt="">
                <div>
                    <p><?= e($item['category']) ?> · <time datetime="<?= e($item['date']) ?>"><?= e($item['date']) ?></time></p>
                    <h2><?= e($item['title']) ?></h2>
                    <span><?= e($item['excerpt']) ?></span>
                </div>
            </a>
        <?php endforeach; ?>
    </div>
</article>
