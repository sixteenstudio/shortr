<?php

// Require the composer auto-loader
require('../vendor/autoload.php');

$configuration = require('../config.php');

// Instantiate the application instance
$application = new \App\Application($configuration);

// Run the application
$application->run();