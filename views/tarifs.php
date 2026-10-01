<?php $T = $C['tarifs']; ?>
<article class="page">
    <header class="page-hero">
        <p class="kicker"><?= e($T['updated']) ?></p>
        <h1><?= e($T['title']) ?></h1>
    </header>
    <section class="price-grid">
        <?php foreach ($T['offers'] as $offer): ?>
            <article class="price-card">
                <p class="kicker"><?= e($T['from']) ?> <?= e($offer['from']) ?></p>
                <h2><?= e($offer['name']) ?></h2>
                <table>
                    <?php foreach ($offer['rows'] as [$period, $total, $per]): ?>
                        <tr>
                            <th><?= e($period) ?></th>
                            <td><?= e($total) ?></td>
                            <td><?= e($per) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
                <h3><?= e($T['includes']) ?></h3>
                <ul>
                    <?php foreach ($T['online'] as $item): ?>
                        <li><?= e($item) ?></li>
                    <?php endforeach; ?>
                </ul>
            </article>
        <?php endforeach; ?>
    </section>

    <section class="fit-block">
        <div>
            <p class="kicker"><?= e($T['from']) ?> <?= e($T['fit']['from']) ?></p>
            <h2><?= e($T['fit']['title']) ?></h2>
            <p><strong><?= e($T['fit']['road']) ?></strong></p>
            <ul>
                <?php foreach ($T['fit']['points'] as $item): ?>
                    <li><?= e($item) ?></li>
                <?php endforeach; ?>
            </ul>
            <p><?= e($T['fit']['aero']) ?> <a href="<?= e($C['links']['bioracer']) ?>" target="_blank" rel="noopener">Bioracer</a></p>
            <p><?= e($T['fit']['second']) ?></p>
            <p><?= e($T['fit']['cleats']) ?></p>
            <p><a class="btn" href="<?= e($C['links']['book']) ?>" target="_blank" rel="noopener"><?= e($C['book']) ?></a></p>
        </div>
        <figure><img src="<?= e(asset('img/photo-bikefit.jpg')) ?>" alt="Étude posturale dynamique sur vélo"></figure>
    </section>

    <section class="case-block">
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

    <section class="plans">
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
