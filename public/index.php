<?php

define('APP_ROOT', realpath(__DIR__ . '/..'));

require_once APP_ROOT . '/vendor/autoload.php';

use App;

// debug
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);

session_start();

// protect from inactivity
if (isset($_SESSION['stamp']) && date('U') - $_SESSION['stamp'] > 1800) {
    $_SESSION = [];
}
$_SESSION['stamp'] = date('U');

// check if is logged in
if (isset($_SESSION['user'])) {
    new App\Controllers\PageApp();
} else {
    new App\Controllers\PageLogin();
}
