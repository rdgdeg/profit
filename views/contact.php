<?php $form = $C['contact']; ?>
<article class="page">
    <header class="page-hero">
        <p class="kicker"><?= e($C['pages']['contact']['kicker']) ?></p>
        <h1><?= e($form['title']) ?></h1>
        <p class="lead"><?= e($form['lead']) ?></p>
    </header>
    <div class="contact-facts">
        <article>
            <h2>Studio</h2>
            <p class="fact-line">
                <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2.8a6.2 6.2 0 0 0-6.2 6.2c0 4.6 6.2 12.2 6.2 12.2s6.2-7.6 6.2-12.2A6.2 6.2 0 0 0 12 2.8zm0 8.4a2.2 2.2 0 1 1 2.2-2.2A2.2 2.2 0 0 1 12 11.2z"/></svg>
                <a href="<?= e($C['links']['maps']) ?>" target="_blank" rel="noopener"><?= e($form['address']) ?></a>
            </p>
        </article>
        <article>
            <h2>Adrien Gain</h2>
            <p class="fact-line">
                <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M8.2 3.8h2.1l1.2 3.1-1.5 1.1a12.4 12.4 0 0 0 5.9 5.9l1.1-1.5 3.1 1.2v2.1c0 .8-.6 1.5-1.4 1.6A15.2 15.2 0 0 1 3.6 6.2c.1-.8.8-1.4 1.6-1.4h3z"/></svg>
                <a href="<?= e($C['links']['adrien_tel']) ?>">+32 474 48 82 73</a>
            </p>
            <p class="fact-line">
                <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 6.5h16a1 1 0 0 1 1 1v9a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1v-9a1 1 0 0 1 1-1zm8 6.2 7-4.4H5z"/></svg>
                <a href="<?= e($C['links']['adrien_mail']) ?>">gain.adrien@gmail.com</a>
            </p>
        </article>
        <article>
            <h2>Marion Van Genechten</h2>
            <p class="fact-line">
                <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M8.2 3.8h2.1l1.2 3.1-1.5 1.1a12.4 12.4 0 0 0 5.9 5.9l1.1-1.5 3.1 1.2v2.1c0 .8-.6 1.5-1.4 1.6A15.2 15.2 0 0 1 3.6 6.2c.1-.8.8-1.4 1.6-1.4h3z"/></svg>
                <a href="<?= e($C['links']['marion_tel']) ?>">+32 494 10 88 13</a>
            </p>
            <p class="fact-line">
                <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 6.5h16a1 1 0 0 1 1 1v9a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1v-9a1 1 0 0 1 1-1zm8 6.2 7-4.4H5z"/></svg>
                <a href="<?= e($C['links']['marion_mail']) ?>">marionvege@hotmail.com</a>
            </p>
        </article>
    </div>
    <form class="contact-form" method="post" action="<?= e(url_to('contact')) ?>">
            <?php if (($_GET['ok'] ?? '') === '1'): ?><p class="notice ok"><?= e($form['success']) ?></p><?php endif; ?>
            <?php if (($_GET['err'] ?? '') === '1'): ?><p class="notice bad"><?= e($form['error']) ?></p><?php endif; ?>
            <input type="hidden" name="csrf" value="<?= e(csrf_token()) ?>">
            <label class="hp">Company<input name="company" tabindex="-1" autocomplete="off"></label>
            <div class="field-row">
                <label><?= e($form['name']) ?><input name="name" required autocomplete="name"></label>
                <label><?= e($form['email']) ?><input name="email" type="email" required autocomplete="email"></label>
            </div>
            <label><?= e($form['phone']) ?><input name="phone" autocomplete="tel"></label>
            <fieldset>
                <legend><?= e($form['subject']) ?></legend>
                <div class="choices">
                    <?php foreach ($form['subjects'] as $value => $label): ?>
                        <label class="choice">
                            <input type="radio" name="subject" value="<?= e($value) ?>" required>
                            <span><?= e($label) ?></span>
                        </label>
                    <?php endforeach; ?>
                </div>
            </fieldset>
            <fieldset>
                <legend><?= e($form['reply']) ?></legend>
                <div class="choices choices-2">
                    <label class="choice">
                        <input type="radio" name="reply" value="email" checked>
                        <span><?= e($form['reply_email']) ?></span>
                    </label>
                    <label class="choice">
                        <input type="radio" name="reply" value="phone">
                        <span><?= e($form['reply_phone']) ?></span>
                    </label>
                </div>
            </fieldset>
            <label><?= e($form['message']) ?><textarea name="message" rows="5" required></textarea></label>
            <div class="form-actions">
                <button class="btn" type="submit"><?= e($form['send']) ?></button>
                <a class="btn btn-ghost" href="<?= e($C['links']['book']) ?>" target="_blank" rel="noopener"><?= e($C['book']) ?></a>
            </div>
        </form>
</article>
