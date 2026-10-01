<?php

declare(strict_types=1);

require __DIR__ . '/icons.php';
require __DIR__ . '/../header.php';

?>

<main class="error-page">
<div class="error-shell">
<div class="error-topbar">
<div class="error-brand error-no-select">
<?= htmlspecialchars(error_site_name(), ENT_QUOTES, 'UTF-8') ?>
</div>

<div class="error-status error-no-select">
HTTP <?= htmlspecialchars((string) ($error['code'] ?? 500), ENT_QUOTES, 'UTF-8') ?>
</div>
</div>

<div class="error-main">
<div class="error-visual">
<div class="error-icon">
<?= error_icon($error['icon'] ?? 'circle-alert') ?>
</div>

<div class="error-code">
<?= htmlspecialchars((string) ($error['code'] ?? 500), ENT_QUOTES, 'UTF-8') ?>
</div>
</div>

<div class="error-content">
<div class="error-label">REQUEST ERROR</div>

<h1>
<?= htmlspecialchars($error['title'] ?? 'Internal Server Error', ENT_QUOTES, 'UTF-8') ?>
</h1>

<p>
<?= htmlspecialchars($error['message'] ?? 'Something went wrong while processing your request.', ENT_QUOTES, 'UTF-8') ?>
</p>

<a class="error-button" href="/">
<span class="error-button-icon">
<?= error_icon('shield') ?>
</span>

<span>Return to Homepage</span>

<span class="error-button-arrow" aria-hidden="true">→</span>
</a>
</div>
</div>

<footer class="error-footer">
<div class="error-no-select">
<?= htmlspecialchars(error_site_name(), ENT_QUOTES, 'UTF-8') ?>
</div>

<div class="error-no-select">
HTTP Error System
</div>

<div class="error-no-select error-ip">
Your IP: <?= htmlspecialchars(error_client_ip(), ENT_QUOTES, 'UTF-8') ?>
</div>
</footer>
</div>
</main>

<?php

require __DIR__ . '/../footer.php';