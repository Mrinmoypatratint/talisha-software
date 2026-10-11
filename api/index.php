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

// Force HTTPS in serverless environment to prevent mixed-content blocking
$_SERVER['HTTPS'] = 'on';
$_SERVER['SERVER_PORT'] = 443;

// Copy seeded SQLite database to /tmp if not yet present, empty, or missing tables
$targetDb = $tmp . '/database.sqlite';
$sourceDb = __DIR__ . '/../database/database.sqlite';

$needsInit = !file_exists($targetDb) || @filesize($targetDb) === 0;

if (!$needsInit && file_exists($sourceDb) && file_exists($targetDb)) {
    if (@filemtime($sourceDb) > @filemtime($targetDb)) {
        $needsInit = true;
    }
}

if (!$needsInit && file_exists($targetDb)) {
    try {
        $pdo = new PDO('sqlite:' . $targetDb);
        $res = $pdo->query("SELECT name FROM sqlite_master WHERE type='table' AND name='partners'")->fetch();
        if (!$res) {
            $needsInit = true;
        }
    } catch (\Throwable $e) {
        $needsInit = true;
    }
}

if ($needsInit && file_exists($sourceDb) && @filesize($sourceDb) > 0) {
    @copy($sourceDb, $targetDb);
    @chmod($targetDb, 0666);
} elseif (!file_exists($targetDb)) {
    @touch($targetDb);
    @chmod($targetDb, 0666);
}

// Forward to public/index.php
require __DIR__ . '/../public/index.php';
