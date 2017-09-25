#!/usr/bin/php
<?php

$root = realpath(__DIR__ . '/..');

// JavaScript vendor
$vendor = $root . '/public/.js/vendor/aryelgois';
mkdir($vendor, 0755, true);

$destiny = $vendor . '/utils';
if (!file_exists($destiny)) {
    symlink($root . '/vendor/aryelgois/utils-js/src', $destiny);
}
