<?php

declare(strict_types=1);

function error_code(): int
{
$status = $_SERVER['REDIRECT_STATUS'] ?? null;

if (is_numeric($status)) {
$status = (int) $status;

if ($status >= 400 && $status <= 599) {
return $status;
}
}

$code = http_response_code();

if ($code >= 400 && $code <= 599) {
return $code;
}

return 500;
}

function is_valid_error_code(int $code): bool
{
return $code >= 400 && $code <= 599;
}