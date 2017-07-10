<?php include '../views/partials/head.php' ?>

<div class="url-form">
    <h1>Enter a URL to shorten:</h1>
    <input type="text" value="<?php echo (! empty($urlInput) ? $urlInput : '')  ?>" class="url-form-input">
    <?php if ( ! empty($errors)): ?>
        <span class="url-form-errors"><?php echo $errors ?></span>
    <?php endif; ?>
    <button class="url-form-submit">Shorten URL</button>
</div>

<?php include '../views/partials/foot.php' ?>