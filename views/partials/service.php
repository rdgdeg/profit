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
                    <p>
                        <svg class="q-icon" viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="10.2" fill="none" stroke="currentColor" stroke-width="1.7"/><path fill="currentColor" d="M12.05 6.1c-2.05 0-3.5 1.2-3.5 2.9h1.95c0-.8.6-1.3 1.5-1.3.85 0 1.45.45 1.45 1.15 0 .65-.35.95-1.15 1.45-.9.5-1.55 1.2-1.55 2.35v.5h1.95v-.4c0-.6.3-.9 1.05-1.35.9-.5 1.75-1.25 1.75-2.7 0-1.75-1.45-3-3.45-3zM12 16.35a1.05 1.05 0 1 0 .02 2.1 1.05 1.05 0 0 0-.02-2.1z"/></svg>
                        <span><?= e($paragraph) ?></span>
                    </p>
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
                        <?php
                        $benefitIcons = [
                            [
                                '<path d="M8.2 11.2a2.7 2.7 0 1 0 0-5.4 2.7 2.7 0 0 0 0 5.4zM3.8 19.2v-.6a3.8 3.8 0 0 1 3.8-3.8h1.2a3.8 3.8 0 0 1 3.8 3.8v.6H3.8z"/><path d="m14.2 10.2 1.4 1.4 3.5-3.7 1.3 1.2-4.8 5-2.7-2.7z"/>',
                                '<path d="M12 3.2 19.2 6v5.4c0 4-2.7 7.1-7.2 8.4-4.5-1.3-7.2-4.4-7.2-8.4V6z"/>',
                                '<path d="M8 11a2.4 2.4 0 1 0 0-4.8A2.4 2.4 0 0 0 8 11zm8 0a2.4 2.4 0 1 0 0-4.8A2.4 2.4 0 0 0 16 11zM3.6 18.6v-.5A3.4 3.4 0 0 1 7 14.7h2a3.4 3.4 0 0 1 3.4 3.4v.5H3.6zm7.2 0v-.5a3.4 3.4 0 0 1 3.4-3.4h2a3.4 3.4 0 0 1 3.4 3.4v.5h-8.8z"/>',
                                '<path d="m12 3.4 2.1 4.4 4.8.7-3.5 3.4.8 4.8L12 14.4 7.8 16.7l.8-4.8L5.1 8.5l4.8-.7z"/>',
                                '<path d="M12 20s-6.4-3.9-6.4-8.2A3.6 3.6 0 0 1 12 9.2a3.6 3.6 0 0 1 6.4 2.6C18.4 16.1 12 20 12 20z"/>',
                                '<path d="M4 9.2 12 4l8 5.2V20H4z"/><path d="M10 20v-5h4v5" fill="none" stroke="currentColor" stroke-width="1.6"/>',
                            ],
                            [
                                '<path d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18z"/><path d="M8.2 13.2c.7 1.4 2.1 2.3 3.8 2.3s3.1-.9 3.8-2.3" fill="none" stroke="#fff" stroke-width="1.5" stroke-linecap="round"/><circle cx="9" cy="10" r="1" fill="#fff"/><circle cx="15" cy="10" r="1" fill="#fff"/>',
                                '<circle cx="12" cy="12" r="7.2"/><circle cx="12" cy="12" r="2.2" fill="#fff"/><path d="M12 3.2v2.2M12 18.6v2.2M3.2 12h2.2M18.6 12h2.2" fill="none" stroke="currentColor" stroke-width="1.6"/>',
                                '<path d="M4 20V9.5L12 4l8 5.5V20H4z"/><path d="M10 20v-6h4v6" fill="none" stroke="#fff" stroke-width="1.5"/>',
                                '<path d="M5 7.2h10.2a2 2 0 0 1 2 2V16a2 2 0 0 1-2 2H8.2L5 20.2z"/><path d="M16.2 8.6h1.6A2 2 0 0 1 19.8 10.6V16l-2.2-1.4"/>',
                                '<path d="M8 11.2V20H5.2v-8.8H8zm2.1-.4 2.4-4.2a1.6 1.6 0 0 1 2.8 1.1V10h3.2a2 2 0 0 1 2 2.3l-1 4.6A2 2 0 0 1 17.6 18.6H10.1z"/>',
                                '<path d="M12 20c4-2.6 6.5-5.6 6.5-9.1A4.4 4.4 0 0 0 12 7.2 4.4 4.4 0 0 0 5.5 10.9C5.5 14.4 8 17.4 12 20z"/>',
                            ],
                            [
                                '<path d="M12 20s-6.2-3.8-6.2-8A3.5 3.5 0 0 1 12 9.4 3.5 3.5 0 0 1 18.2 12C18.2 16.2 12 20 12 20z"/><path d="M12 8.2V4.8M9.6 6.2h4.8" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>',
                                '<circle cx="12" cy="12" r="7.4"/><path d="M12 8.2v8.2M9.4 10.2c.5-.8 1.4-1.2 2.6-1.2 1.5 0 2.5.7 2.5 1.8S13.4 12.4 12 12.4s-2.6.6-2.6 1.8 1.1 1.8 2.6 1.8c1.2 0 2.1-.4 2.6-1.2" fill="none" stroke="#fff" stroke-width="1.5" stroke-linecap="round"/>',
                                '<path d="M4 16.5 9.2 11l3.2 3.1L20 6.8"/><path d="M14.5 6.8H20V12" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>',
                            ],
                        ];
                        ?>
                        <?php foreach ($items as $itemIndex => $item): ?>
                            <li>
                                <?php if (isset($benefitIcons[$index][$itemIndex])): ?>
                                    <svg viewBox="0 0 24 24" aria-hidden="true"><?= $benefitIcons[$index][$itemIndex] ?></svg>
                                <?php endif; ?>
                                <span><?= e($item) ?></span>
                            </li>
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
