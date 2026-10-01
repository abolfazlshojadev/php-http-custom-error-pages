<?php

declare(strict_types=1);

require_once __DIR__ . '/includes/functions.php';

$site_name = strtoupper(error_site_name());
$error_title = $error['title'] ?? 'Error';

?><!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= htmlspecialchars($site_name . ' - ' . $error_title, ENT_QUOTES, 'UTF-8') ?></title>
<?php error_styles(); ?>
</head>
<body>