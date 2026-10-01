<?php

declare(strict_types=1);

function error_site_overrides(): array
{
$host = $_SERVER['HTTP_HOST'] ?? '';

$host = strtolower(trim($host));

$host = preg_replace('/:\d+$/', '', $host);

$host = preg_replace('/^www\./', '', $host);

return [
$host => error_site_name_from_host($host),
];
}

function error_site_name_from_host(string $host): string
{
if ($host === '') {
return 'Website';
}

$parts = explode('.', $host);

$name = count($parts) >= 2
? $parts[count($parts) - 2]
: $parts[0];

$name = str_replace(['-', '_'], ' ', $name);

$name = preg_replace('/\s+/', ' ', $name);

return ucwords(trim($name));
}

function error_asset_version(string $file): string
{
$path = __DIR__ . '/../' . ltrim($file, '/');

if (is_file($path)) {
return (string) filemtime($path);
}

return '1';
}

function error_styles(): void
{
$file = 'assets/styles/global.css';

echo '<link rel="stylesheet" href="/errors/' . $file . '?ver=' . error_asset_version($file) . '">';
}

function error_scripts(): void
{
$file = 'assets/component/global.js';

echo '<script src="/errors/' . $file . '?ver=' . error_asset_version($file) . '"></script>';
}

function error_site_name(): string
{
$overrides = error_site_overrides();

$host = $_SERVER['HTTP_HOST'] ?? '';

$host = strtolower(trim($host));

$host = preg_replace('/:\d+$/', '', $host);

$host = preg_replace('/^www\./', '', $host);

if (isset($overrides[$host])) {
return $overrides[$host];
}

return error_site_name_from_host($host);
}

function error_client_ip(): string
{
$ip = $_SERVER['REMOTE_ADDR'] ?? '';

if (filter_var($ip, FILTER_VALIDATE_IP)) {
return $ip;
}

return 'Unknown';
}