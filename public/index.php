<?php

// Require the composer auto-loader
require('../vendor/autoload.php');

$configuration = require('../config.php');

// Instantiate the application instance
$app = new \App\Application($configuration);

require '../helpers.php';

// Run the application
$app->run();