<article class="page article">
    <header class="page-hero">
        <p class="kicker"><?= e($article['category']) ?> · <time datetime="<?= e($article['date']) ?>"><?= e($article['date']) ?></time></p>
        <h1><?= e($article['title']) ?></h1>
    </header>
    <div class="article-layout">
        <div class="prose">
            <?php foreach ($article['body'] as $paragraph): ?>
                <?php if (preg_match('/^(\S+(?:\s+\S+){0,3})\.\s+(\S.*)$/u', $paragraph, $lead) && mb_strlen($lead[1]) <= 32): ?>
                    <p><strong><?= e($lead[1]) ?>.</strong> <?= e($lead[2]) ?></p>
                <?php else: ?>
                    <p><?= e($paragraph) ?></p>
                <?php endif; ?>
            <?php endforeach; ?>
            <p class="page-cta"><a class="btn btn-ghost" href="<?= e(url_to('blog')) ?>"><?= e($C['blog']['back']) ?></a></p>
        </div>
        <aside class="article-side">
            <figure class="article-cover">
                <img src="<?= e(asset('img/' . $article['image'])) ?>" alt="">
            </figure>
        </aside>
    </div>
</article>
