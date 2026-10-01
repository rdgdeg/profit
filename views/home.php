<section class="hero">
    <div class="hero-copy">
        <p class="kicker"><?= e($C['hero']['kicker']) ?></p>
        <h1><?= e($C['hero']['title']) ?></h1>
        <p class="lead"><?= e($C['hero']['lead']) ?></p>
        <div class="hero-actions">
            <a class="btn" href="<?= e($C['links']['book']) ?>" target="_blank" rel="noopener"><?= e($C['book']) ?></a>
            <a class="btn btn-ghost" href="<?= e(url_to('tarifs')) ?>"><?= e($C['tarifs']['title']) ?></a>
        </div>
    </div>
    <figure class="hero-figure">
        <img src="<?= e(asset('img/portrait-a.jpg')) ?>" alt="Adrien Gain" width="800" height="800">
        <span class="bars" aria-hidden="true"></span>
    </figure>
</section>

<section class="services home-band band-white reveal">
    <?php foreach ($C['services'] as $service): ?>
        <?php
        [$slug, $heading, $sub, $text, $image] = $service;
        $action = $service[5] ?? null;
        $href = $slug === 'bikefit' ? url_to('velo') : url_to($slug);
        ?>
        <article class="service-card">
            <a href="<?= e($href) ?>">
                <img src="<?= e(asset('img/' . $image)) ?>" alt=""<?= $image === 'photo-entreprise.jpg' ? ' class="pos-right"' : '' ?>>
                <div>
                    <p><?= e($sub) ?></p>
                    <h2><?= e($heading) ?></h2>
                    <span><?= e($text) ?></span>
                </div>
            </a>
            <?php if ($action === true): ?>
                <a class="btn service-book" href="<?= e($C['links']['book']) ?>" target="_blank" rel="noopener"><?= e($C['book']) ?></a>
            <?php elseif (is_string($action)): ?>
                <a class="btn service-book" href="<?= e($href) ?>"><?= e($action) ?></a>
            <?php endif; ?>
        </article>
    <?php endforeach; ?>
</section>

<section class="team reveal">
    <div class="section-head">
        <h2><?= e($C['team']['title']) ?></h2>
    </div>
    <div class="team-grid">
        <?php foreach ($C['team']['people'] as $person): ?>
            <article>
                <img src="<?= e(asset('img/' . $person['photo'])) ?>" alt="<?= e($person['name']) ?>" width="160" height="160">
                <div>
                    <h3><?= e($person['name']) ?></h3>
                    <p class="role"><?= e($person['role']) ?></p>
                    <p class="place"><?= e($person['place']) ?></p>
                    <p class="person-links">
                        <a href="<?= e($C['links'][$person['tel']]) ?>"><?= e($person['tel_label']) ?></a>
                        <a href="<?= e($C['links'][$person['mail']]) ?>"><?= $lang === 'fr' ? 'Écrire' : 'Email' ?></a>
                    </p>
                    <details>
                        <summary><?= e($person['formations_title']) ?></summary>
                        <ul>
                            <?php foreach ($person['formations'] as $item): ?>
                                <li><?= e($item) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </details>
                </div>
            </article>
        <?php endforeach; ?>
    </div>
</section>

<section class="reviews home-band band-white reveal">
    <div class="section-head">
        <h2><?= e($C['reviews']['title']) ?></h2>
        <p><?= e($C['reviews']['lead']) ?></p>
        <a href="<?= e($C['links']['google']) ?>" target="_blank" rel="noopener"><?= e($C['reviews']['cta']) ?></a>
    </div>
    <div class="review-grid">
        <?php foreach ($C['reviews']['items'] as $review): ?>
            <blockquote>
                <p><?= e($review['text']) ?></p>
                <footer>
                    <strong><?= e($review['name']) ?></strong>
                    <time datetime="<?= e($review['date']) ?>"><?= e((new DateTime($review['date']))->format('d.m.Y')) ?></time>
                    <span>5/5</span>
                </footer>
            </blockquote>
        <?php endforeach; ?>
    </div>
</section>

<section class="instagram reveal">
    <div>
        <p class="kicker">Instagram</p>
        <h2><?= e($C['instagram']['handle']) ?></h2>
        <p><?= e($C['instagram']['bio']) ?></p>
    </div>
    <a class="btn" href="<?= e($C['links']['instagram']) ?>" target="_blank" rel="noopener"><?= e($C['instagram']['cta']) ?></a>
</section>
