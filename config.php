<?php
declare(strict_types=1);

use Dotenv\Dotenv;

require __DIR__ . '/vendor/autoload.php';
Dotenv::createImmutable(__DIR__)->load();

define('MYSQL_HOST', $_ENV['DB_HOST']);
define('MYSQL_USER', $_ENV['DB_USER']);
define('MYSQL_PASS', $_ENV['DB_PASSWORD']);
define('MYSQL_DB', $_ENV['DB_NAME']);

define('GOOGLE_CLOUD_PROJECT_ID', $_ENV['GOOGLE_CLOUD_PROJECT_ID']);
define('GOOGLE_APPLICATION_CREDENTIALS', $_ENV['GOOGLE_APPLICATION_CREDENTIALS']);
