<?php

declare(strict_types=1);

require_once __DIR__ . '/includes/lib.php';

$code = error_code();

if (!is_valid_error_code($code)) {
$code = 500;
}

$template = __DIR__ . '/template-parts/' . $code . '/index.php';

if (is_file($template)) {
require $template;
exit;
}

http_response_code(500);

$template = __DIR__ . '/template-parts/500/index.php';

if (is_file($template)) {
require $template;
exit;
}

exit;