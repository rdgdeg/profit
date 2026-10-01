<?php /** @var array $service */ ?>
<article class="page">
    <header class="page-hero">
        <p class="kicker"><?= e($service['kicker']) ?></p>
        <h1><?= e($service['title']) ?></h1>
    </header>
    <?php
    $photos = $service['photos'] ?? [];
    if (!$photos && !empty($service['image']) && $service['image'] !== 'logo.png') {
        $photos = [[$service['image'], '']];
    }
    $photos = array_values(array_filter($photos, static fn ($photo) => ($photo[0] ?? '') !== 'logo.png'));
    $photoCount = count($photos);
    ?>
    <?php if ($photos): ?>
        <div class="photo-grid<?= $photoCount === 1 ? ' cols-1' : ($photoCount === 2 ? ' cols-2' : '') ?>">
            <?php foreach ($photos as [$file, $caption]): ?>
                <figure>
                    <img src="<?= e(asset('img/' . $file)) ?>" alt="<?= e($caption) ?>" width="900" height="600">
                    <?php if ($caption !== ''): ?><figcaption><?= e($caption) ?></figcaption><?php endif; ?>
                </figure>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    <div class="page-copy">
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
        <p class="page-cta"><a class="btn" href="<?= e($C['links']['book']) ?>" target="_blank" rel="noopener"><?= e($C['book']) ?></a></p>
    </div>
</article>
