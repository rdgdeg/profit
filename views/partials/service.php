<?php /** @var array $service */ ?>
<article class="page">
    <header class="page-hero">
        <p class="kicker"><?= e($service['kicker']) ?></p>
        <h1><?= e($service['title']) ?></h1>
    </header>
    <div class="page-layout">
        <div class="prose">
            <?php foreach ($service['paragraphs'] as $paragraph): ?>
                <p><?= e($paragraph) ?></p>
            <?php endforeach; ?>
            <?php if (!empty($service['list'])): ?>
                <h2><?= e($service['list_title']) ?></h2>
                <ul class="point-grid">
                    <?php foreach ($service['list'] as $item): ?>
                        <li><?= e($item) ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
            <?php foreach ($service['blocks'] ?? [] as [$heading, $text]): ?>
                <div class="text-card">
                    <h2><?= e($heading) ?></h2>
                    <p><?= e($text) ?></p>
                </div>
            <?php endforeach; ?>
            <?php if (!empty($service['close'])): ?>
                <p><?= e($service['close']) ?></p>
            <?php endif; ?>
        </div>
        <aside class="page-aside">
            <?php if (!empty($service['image'])): ?>
                <figure>
                    <img src="<?= e(asset('img/' . $service['image'])) ?>" alt="">
                </figure>
            <?php endif; ?>
            <a class="btn" href="<?= e($C['links']['book']) ?>" target="_blank" rel="noopener"><?= e($C['book']) ?></a>
        </aside>
    </div>
</article>
