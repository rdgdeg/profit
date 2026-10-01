<article class="page">
    <header class="page-hero">
        <p class="kicker"><?= e($C['pages']['contact']['kicker']) ?></p>
        <h1><?= e($C['contact']['title']) ?></h1>
        <p class="lead"><?= e($C['contact']['lead']) ?></p>
    </header>
    <div class="contact-grid">
        <form method="post" action="<?= e(url_to('contact')) ?>">
            <?php if (($_GET['ok'] ?? '') === '1'): ?><p class="notice ok"><?= e($C['contact']['success']) ?></p><?php endif; ?>
            <?php if (($_GET['err'] ?? '') === '1'): ?><p class="notice bad"><?= e($C['contact']['error']) ?></p><?php endif; ?>
            <input type="hidden" name="csrf" value="<?= e(csrf_token()) ?>">
            <label class="hp">Company<input name="company" tabindex="-1" autocomplete="off"></label>
            <label><?= e($C['contact']['name']) ?><input name="name" required autocomplete="name"></label>
            <label><?= e($C['contact']['email']) ?><input name="email" type="email" required autocomplete="email"></label>
            <label><?= e($C['contact']['phone']) ?><input name="phone" autocomplete="tel"></label>
            <label><?= e($C['contact']['message']) ?><textarea name="message" rows="6" required></textarea></label>
            <button class="btn" type="submit"><?= e($C['contact']['send']) ?></button>
        </form>
        <aside>
            <p><a href="<?= e($C['links']['maps']) ?>" target="_blank" rel="noopener"><?= e($C['contact']['address']) ?></a></p>
            <p><strong>Adrien Gain</strong><br>
                <a href="<?= e($C['links']['adrien_tel']) ?>">+32 474 48 82 73</a><br>
                <a href="<?= e($C['links']['adrien_mail']) ?>">gain.adrien@gmail.com</a>
            </p>
            <p><strong>Marion Van Genechten</strong><br>
                <a href="<?= e($C['links']['marion_tel']) ?>">+32 494 10 88 13</a><br>
                <a href="<?= e($C['links']['marion_mail']) ?>">marionvege@hotmail.com</a>
            </p>
            <p><a class="btn" href="<?= e($C['links']['book']) ?>" target="_blank" rel="noopener"><?= e($C['book']) ?></a></p>
            <p><a href="<?= e($C['links']['maps']) ?>" target="_blank" rel="noopener"><?= e($C['map']) ?></a></p>
        </aside>
    </div>
</article>
