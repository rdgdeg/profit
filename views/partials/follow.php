<?php
$fr = lang() === 'fr';
$items = [
    ['facebook', 'follow-facebook', $fr ? 'Nous suivre sur Facebook' : 'Follow us on Facebook', true],
    ['instagram', 'follow-instagram', $fr ? 'Nous suivre sur Instagram' : 'Follow us on Instagram', true],
    ['adrien_mail', 'follow-email', $fr ? 'Nous envoyer un e-mail' : 'Email us', false],
    ['adrien_tel', 'follow-phone', $fr ? 'Appelez-nous' : 'Call us', false],
    ['linkedin', 'follow-linkedin', $fr ? 'Nous suivre sur LinkedIn' : 'Follow us on LinkedIn', true],
];
?>
<nav class="follow" aria-label="<?= $fr ? 'Réseaux et contact' : 'Social and contact' ?>">
    <?php foreach ($items as [$key, $class, $label, $external]): ?>
        <a class="<?= e($class) ?>" href="<?= e($C['links'][$key]) ?>" aria-label="<?= e($label) ?>" title="<?= e($label) ?>"<?= $external ? ' target="_blank" rel="noopener"' : '' ?>>
            <?php if ($key === 'facebook'): ?>
                <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M14.5 8.5V6.8c0-.6.4-.8.8-.8H16V4h-2.2C11.4 4 10.5 5.4 10.5 7.1v1.4H9v2.2h1.5V20h2.4v-7.3h2l.3-2.2h-2.3z"/></svg>
            <?php elseif ($key === 'instagram'): ?>
                <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M8 4h8a4 4 0 0 1 4 4v8a4 4 0 0 1-4 4H8a4 4 0 0 1-4-4V8a4 4 0 0 1 4-4zm8 1.8H8A2.2 2.2 0 0 0 5.8 8v8A2.2 2.2 0 0 0 8 18.2h8a2.2 2.2 0 0 0 2.2-2.2V8A2.2 2.2 0 0 0 16 5.8zM12 8.2A3.8 3.8 0 1 1 8.2 12 3.8 3.8 0 0 1 12 8.2zm0 1.6A2.2 2.2 0 1 0 14.2 12 2.2 2.2 0 0 0 12 9.8zM17.2 7.4a.9.9 0 1 1-.9-.9.9.9 0 0 1 .9.9z"/></svg>
            <?php elseif ($key === 'adrien_mail'): ?>
                <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 6.5h16a1 1 0 0 1 1 1v9a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1v-9a1 1 0 0 1 1-1zm8 6.2 7-4.4H5zM5 16.5h14V10l-7 4.4z"/></svg>
            <?php elseif ($key === 'adrien_tel'): ?>
                <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M8.2 3.8h2.1l1.2 3.1-1.5 1.1a12.4 12.4 0 0 0 5.9 5.9l1.1-1.5 3.1 1.2v2.1c0 .8-.6 1.5-1.4 1.6A15.2 15.2 0 0 1 3.6 6.2c.1-.8.8-1.4 1.6-1.4h3z"/></svg>
            <?php else: ?>
                <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M6.5 9.5H9V19H6.5zM7.7 5a1.6 1.6 0 1 1-1.6 1.6A1.6 1.6 0 0 1 7.7 5zM11 9.5h2.4v1.3h.1a2.6 2.6 0 0 1 2.4-1.3c2.5 0 3 1.6 3 3.7V19H16.4v-4.6c0-1.1 0-2.5-1.5-2.5s-1.8 1.2-1.8 2.4V19H11z"/></svg>
            <?php endif; ?>
        </a>
    <?php endforeach; ?>
</nav>
