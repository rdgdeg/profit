<?php $form = $C['contact']; ?>
<article class="page">
    <header class="page-hero">
        <p class="kicker"><?= e($C['pages']['contact']['kicker']) ?></p>
        <h1><?= e($form['title']) ?></h1>
        <p class="lead"><?= e($form['lead']) ?></p>
    </header>
    <div class="contact-facts">
        <p><a href="<?= e($C['links']['maps']) ?>" target="_blank" rel="noopener"><?= e($form['address']) ?></a></p>
        <p><strong>Adrien Gain</strong><br>
            <a href="<?= e($C['links']['adrien_tel']) ?>">+32 474 48 82 73</a><br>
            <a href="<?= e($C['links']['adrien_mail']) ?>">gain.adrien@gmail.com</a>
        </p>
        <p><strong>Marion Van Genechten</strong><br>
            <a href="<?= e($C['links']['marion_tel']) ?>">+32 494 10 88 13</a><br>
            <a href="<?= e($C['links']['marion_mail']) ?>">marionvege@hotmail.com</a>
        </p>
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
