<?php $T = $C['tarifs']; ?>
<article class="page">
    <header class="page-hero">
        <p class="kicker"><?= e($T['updated']) ?></p>
        <h1><?= e($T['title']) ?></h1>
    </header>
    <nav class="section-jumps" aria-label="<?= $lang === 'fr' ? 'Sections des tarifs' : 'Price sections' ?>">
        <?php foreach ($T['jumps'] as [$id, $label]): ?>
            <a href="#<?= e($id) ?>"><?= e($label) ?></a>
        <?php endforeach; ?>
    </nav>
    <p class="trial-banner"><?= e($T['trial']) ?></p>
    <section class="price-grid" id="coaching">
        <?php foreach ($T['offers'] as $offer): ?>
            <article class="price-card">
                <h2><?= e($offer['name']) ?></h2>
                <table>
                    <thead>
                        <tr>
                            <?php foreach ($T['columns'] as $column): ?>
                                <th><?= e($column) ?></th>
                            <?php endforeach; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($offer['rows'] as $row): ?>
                            <tr<?= !empty($row['best']) ? ' class="best"' : '' ?>>
                                <th>
                                    <?= e($row['period']) ?>
                                    <?php if ($row['note'] !== ''): ?><span class="price-sub"><?= e($row['note']) ?></span><?php endif; ?>
                                </th>
                                <td>
                                    <strong><?= e($row['once']) ?></strong>
                                    <?php if ($row['once_note'] !== ''): ?><span class="price-sub"><?= e($row['once_note']) ?></span><?php endif; ?>
                                </td>
                                <td><strong><?= e($row['month']) ?></strong></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </article>
        <?php endforeach; ?>
    </section>
    <p class="price-note"><?= e($T['note']) ?></p>

    <section class="fit-block" id="fitting">
        <div>
            <h2><?= e($T['fit']['title']) ?></h2>
            <table>
                <?php foreach ($T['fit']['rows'] as [$name, $detail, $price]): ?>
                    <tr>
                        <th>
                            <?= e($name) ?>
                            <?php if (str_contains($name, 'Bioracer')): ?>
                                <a href="<?= e($C['links']['bioracer']) ?>" target="_blank" rel="noopener">Bioracer</a>
                            <?php endif; ?>
                            <?php if ($detail !== ''): ?><span class="price-sub"><?= e($detail) ?></span><?php endif; ?>
                        </th>
                        <td><strong><?= e($price) ?></strong></td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <p><a class="btn" href="<?= e($C['links']['book']) ?>" target="_blank" rel="noopener"><?= e($C['book']) ?></a></p>
        </div>
        <figure><img src="<?= e(asset('img/photo-bikefit.jpg')) ?>" alt="<?= $lang === 'fr' ? 'Étude posturale dynamique sur vélo' : 'Dynamic bike fit' ?>"></figure>
    </section>

    <section class="pack-block price-card" id="packs">
        <h2><?= e($T['packs']['title']) ?></h2>
        <p><?= e($T['packs']['lead']) ?></p>
        <table>
            <thead>
                <tr>
                    <?php foreach ($T['packs']['columns'] as $column): ?>
                        <th><?= e($column) ?></th>
                    <?php endforeach; ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($T['packs']['rows'] as [$length, $discount, $best]): ?>
                    <tr<?= $best ? ' class="best"' : '' ?>>
                        <th><?= e($length) ?></th>
                        <td><strong><?= e($discount) ?></strong></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <p class="price-note"><?= e($T['packs']['note']) ?></p>
    </section>

    <section class="perks" id="avantages">
        <h2><?= e($T['perks']['title']) ?></h2>
        <ul class="point-grid">
            <?php foreach ($T['perks']['items'] as $item): ?>
                <li><?= e($item) ?></li>
            <?php endforeach; ?>
        </ul>
        <p class="price-note"><?= e($T['perks']['note']) ?></p>
    </section>

    <section class="case-block" id="valise">
        <div>
            <p class="kicker"><?= e($T['from']) ?> <?= e($T['case']['from']) ?></p>
            <h2><?= e($T['case']['title']) ?></h2>
            <ul class="rates">
                <?php foreach ($T['case']['rows'] as [$label, $price]): ?>
                    <li><span><?= e($label) ?></span><strong><?= e($price) ?></strong></li>
                <?php endforeach; ?>
            </ul>
            <p><?= e($T['case']['text']) ?> <a href="<?= e($C['links']['scicon']) ?>" target="_blank" rel="noopener">SCICON Aerocomfort 3.0</a></p>
        </div>
    </section>

    <section class="plans" id="plans">
        <h2><?= e($T['ready']['title']) ?></h2>
        <p><?= e($T['ready']['lead']) ?></p>
        <div class="plan-row">
            <?php foreach ($C['plans'] as $plan): ?>
                <a href="<?= e($plan['href']) ?>" target="_blank" rel="noopener">
                    <strong><?= e($plan['label']) ?></strong>
                    <span><?= e($plan['detail']) ?> <?= e($T['ready']['weeks']) ?></span>
                    <em><?= e($plan['price']) ?></em>
                </a>
            <?php endforeach; ?>
        </div>
    </section>
</article>
