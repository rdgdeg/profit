<article class="page article">
    <header class="page-hero">
        <p class="kicker"><?= e($article['category']) ?> · <time datetime="<?= e($article['date']) ?>"><?= e($article['date']) ?></time></p>
        <h1><?= e($article['title']) ?></h1>
    </header>
    <figure class="article-cover">
        <img src="<?= e(asset('img/' . $article['image'])) ?>" alt="">
    </figure>
    <div class="prose narrow">
        <?php foreach ($article['body'] as $paragraph): ?>
            <p><?= e($paragraph) ?></p>
        <?php endforeach; ?>
        <p><a href="<?= e(url_to('blog')) ?>"><?= e($C['blog']['back']) ?></a></p>
    </div>
</article>
