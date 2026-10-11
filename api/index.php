<?php

// Forward Vercel Serverless Requests to Laravel
$tmp = '/tmp';
$subdirs = [
    $tmp . '/views',
    $tmp . '/cache',
    $tmp . '/sessions',
    $tmp . '/logs',
];

foreach ($subdirs as $dir) {
    if (!is_dir($dir)) {
        @mkdir($dir, 0755, true);
    }
}

// Copy seeded SQLite database to /tmp if not yet present
$targetDb = $tmp . '/database.sqlite';
$sourceDb = __DIR__ . '/../database/database.sqlite';

if (!file_exists($targetDb) && file_exists($sourceDb)) {
    @copy($sourceDb, $targetDb);
} elseif (!file_exists($targetDb)) {
    @touch($targetDb);
}

// Forward to public/index.php
require __DIR__ . '/../public/index.php';
