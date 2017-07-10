<?php include '../views/partials/head.php' ?>

<form action="/create" method="POST" class="url-form">
    <h1>Enter a URL to shorten:</h1>
    <h2>Remember to include http:// or https://</h2>
    <input name="url" type="text" value="<?php echo (! empty($urlInput) ? $urlInput : '')  ?>" class="url-form-input">
    <button class="url-form-submit">Shorten URL</button>

    <?php if ( ! empty($errors)): ?>
        <br>
        <span class="url-form-errors"><?php echo $errors ?></span>
    <?php endif; ?>
    <?php if ( ! empty($_SESSION['myUrls'])): ?>
    <br><br><br>
        <a href="/my-urls">View your shortened URLs</a>
    <?php endif; ?>
</form>

<?php include '../views/partials/foot.php' ?>