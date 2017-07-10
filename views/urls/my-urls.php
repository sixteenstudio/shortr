<?php include '../views/partials/head.php' ?>

<?php if (count($myUrls)): ?>
    <div class="shortened-urls">
        <?php if ( ! empty($messages)): ?><div class="success-message"><?php echo $messages; ?></div><?php endif; ?>
    <h1>Your Shortened URLs</h1>
        <?php foreach ($myUrls as $url): ?>
            <div class="shortened-url">
                <?php echo $url['redirect_to'] ?>
                <br>shortened to:<br>
                <a href="/g/<?php echo $url['slug'] ?>" target="_blank">http://<?php echo $_SERVER['SERVER_NAME']
                    ?>/g/<?php
                    echo $url['slug'] ?></a>
                <div class="url-visited">Times Visited: <strong><?php echo $url['visits'] ?></strong></div>
            </div>
        <?php endforeach; ?>
    </div>
<?php else: ?>
    <h1>You don't currently have any shortened urls</h1>
    <h2><a href="/">Click here to make one</a></h2>
<?php endif; ?>

<?php include '../views/partials/foot.php' ?>