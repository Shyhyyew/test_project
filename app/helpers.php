<?php

function calculateExecutionTime(): float
{
    return (microtime(true) -  LARAVEL_START) * 1000;
}

function formatBytes($bytes, $precision = 2): string
{
    $units = ['B', 'KB', 'MB', 'GB'];

    $bytes = max($bytes, 0);
    $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
    $pow = min($pow, count($units) - 1);

    $bytes /= pow(1024, $pow);

    return round($bytes, $precision) . ' ' . $units[$pow];
}
