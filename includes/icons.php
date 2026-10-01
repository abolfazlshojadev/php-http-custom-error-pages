<?php

declare(strict_types=1);

function error_icon(string $name): string
{
$icons = [
'lock' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3.5" y="9" width="17" height="12" rx="2"/><path d="M7 9V6.5a5 5 0 0 1 10 0V9"/><circle cx="12" cy="14.5" r="1.1"/><path d="M12 15.6V18"/></svg>',

'compass' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="9.5"/><path d="m16.5 7.5-3 6.5-6.5 3 3-6.5z"/></svg>',

'server-tool' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="2.5" width="18" height="8" rx="1.5"/><rect x="3" y="13.5" width="18" height="8" rx="1.5"/><path d="M7 6.5h.01"/><path d="M7 17.5h.01"/><path d="m14.5 11.5 2.5 2.5"/><path d="m17 11.5-2.5 2.5"/><path d="m16 10 1.5-1.5"/><path d="m18 8 .5.5"/></svg>',

'server-pause' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="2.5" width="18" height="8" rx="1.5"/><rect x="3" y="13.5" width="18" height="8" rx="1.5"/><path d="M7 6.5h.01"/><path d="M7 17.5h.01"/><path d="M10.5 16v5"/><path d="M13.5 16v5"/></svg>',

'shield' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 3.5 19 6v5.5c0 4.7-2.8 7.7-7 9-4.2-1.3-7-4.3-7-9V6z"/><path d="m9 12 2 2 4-4"/></svg>',

'circle-alert' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="9.5"/><path d="M12 7v6"/><path d="M12 17h.01"/></svg>'
];

return $icons[$name] ?? $icons['circle-alert'];
}