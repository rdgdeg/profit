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
    <?php if (empty($service['sections']) && $photos): ?>
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
        <?php
        $questions = [];
        $prose = [];
        foreach ($service['paragraphs'] as $paragraph) {
            if (str_ends_with(rtrim($paragraph), '?')) {
                $questions[] = $paragraph;
            } else {
                $prose[] = $paragraph;
            }
        }
        ?>
        <?php if (count($questions) >= 2): ?>
            <div class="question-grid">
                <?php foreach ($questions as $paragraph): ?>
                    <p><?= e($paragraph) ?></p>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <?php foreach ($service['paragraphs'] as $paragraph): ?>
                <p><?= e($paragraph) ?></p>
            <?php endforeach; ?>
        <?php endif; ?>
        <?php foreach ($prose as $paragraph): ?>
            <?php if (count($questions) >= 2): ?><p><?= e($paragraph) ?></p><?php endif; ?>
        <?php endforeach; ?>
        <?php foreach ($service['sections'] ?? [] as $section): ?>
            <?php $count = count($section['photos'] ?? []); ?>
            <section class="mosaic">
                <div class="story-copy">
                    <h2><?= e($section['title']) ?></h2>
                    <?php foreach ($section['paragraphs'] ?? [] as $paragraph): ?>
                        <p><?= e($paragraph) ?></p>
                    <?php endforeach; ?>
                    <?php if (!empty($section['list'])): ?>
                        <ul class="point-grid">
                            <?php foreach ($section['list'] as $item): ?>
                                <li><?= e($item) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </div>
                <?php if ($count): ?>
                    <div class="mosaic-photos mosaic-photos-<?= $count >= 3 ? '3' : $count ?>">
                        <?php foreach ($section['photos'] as [$file, $caption]): ?>
                            <figure>
                                <img src="<?= e(asset('img/' . $file)) ?>" alt="<?= e($caption) ?>" width="900" height="600">
                                <?php if ($caption !== ''): ?><figcaption><?= e($caption) ?></figcaption><?php endif; ?>
                            </figure>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </section>
        <?php endforeach; ?>
        <?php if (!empty($service['groups'])): ?>
            <?php if (!empty($service['list_title'])): ?><h2><?= e($service['list_title']) ?></h2><?php endif; ?>
            <div class="group-board">
            <?php foreach ($service['groups'] as $index => [$heading, $items]): ?>
                <section class="group tone-<?= ($index % 3) + 1 ?>">
                    <h3><?= e($heading) ?></h3>
                    <ul class="point-grid">
                        <?php foreach ($items as $item): ?>
                            <li><?= e($item) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </section>
            <?php endforeach; ?>
            </div>
        <?php elseif (!empty($service['list'])): ?>
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
        <?php if (!empty($service['booking'])): ?>
            <?php $book = $service['booking']; ?>
            <section class="booking">
                <h2><?= e($book['title']) ?></h2>
                <p class="booking-name"><?= e($book['name']) ?></p>
                <ul>
                    <li>
                        <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M8.2 3.8h2.1l1.2 3.1-1.5 1.1a12.4 12.4 0 0 0 5.9 5.9l1.1-1.5 3.1 1.2v2.1c0 .8-.6 1.5-1.4 1.6A15.2 15.2 0 0 1 3.6 6.2c.1-.8.8-1.4 1.6-1.4h3z"/></svg>
                        <a href="<?= e($C['links'][$book['phone_href']]) ?>"><?= e($book['phone']) ?></a>
                    </li>
                    <li>
                        <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 6.5h16a1 1 0 0 1 1 1v9a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1v-9a1 1 0 0 1 1-1zm8 6.2 7-4.4H5z"/></svg>
                        <a href="<?= e($C['links'][$book['mail_href']]) ?>"><?= e($book['mail']) ?></a>
                    </li>
                    <li>
                        <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2.8a6.2 6.2 0 0 0-6.2 6.2c0 4.6 6.2 12.2 6.2 12.2s6.2-7.6 6.2-12.2A6.2 6.2 0 0 0 12 2.8zm0 8.4a2.2 2.2 0 1 1 2.2-2.2A2.2 2.2 0 0 1 12 11.2z"/></svg>
                        <a href="<?= e($C['links']['maps']) ?>" target="_blank" rel="noopener"><?= e($book['address']) ?></a>
                    </li>
                    <li>
                        <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 10.5 12 4l8 6.5V20a1 1 0 0 1-1 1h-5.2v-6.2H10.2V21H5a1 1 0 0 1-1-1z"/></svg>
                        <span><?= e($book['note']) ?></span>
                    </li>
                </ul>
            </section>
        <?php endif; ?>
        <?php if (!empty($service['close'])): ?>
            <p class="close-line"><?= e($service['close']) ?></p>
        <?php endif; ?>
    </div>
</article>
