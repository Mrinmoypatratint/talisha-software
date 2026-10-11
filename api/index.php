<?php

// Forward Vercel Serverless Requests to Laravel
$tmp = '/tmp';
$storageDirs = [
    $tmp . '/storage/framework/views',
    $tmp . '/storage/framework/cache/data',
    $tmp . '/storage/framework/sessions',
    $tmp . '/storage/logs',
    $tmp . '/storage/app/public',
    $tmp . '/views',
    $tmp . '/cache',
    $tmp . '/sessions',
];

foreach ($storageDirs as $dir) {
    if (!is_dir($dir)) {
        @mkdir($dir, 0777, true);
    }
}

// Copy seeded SQLite database to /tmp if not yet present
$targetDb = $tmp . '/database.sqlite';
$sourceDb = __DIR__ . '/../database/database.sqlite';

if (!file_exists($targetDb) && file_exists($sourceDb)) {
    @copy($sourceDb, $targetDb);
    @chmod($targetDb, 0666);
} elseif (!file_exists($targetDb)) {
    @touch($targetDb);
    @chmod($targetDb, 0666);
}

// Forward to public/index.php
require __DIR__ . '/../public/index.php';
