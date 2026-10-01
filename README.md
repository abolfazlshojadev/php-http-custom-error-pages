PHP HTTP Custom Error Pages

A professional, framework-independent HTTP error page system for PHP websites and shared hosting environments.

This project provides clean, responsive, and customizable error pages for common HTTP errors such as 403, 404, 500, and 503.

It is designed to be simple to deploy, easy to customize, and suitable for both personal and production websites.

Features

Custom HTTP error pages

Support for HTTP status codes 403, 404, 500, and 503

Framework-independent PHP architecture

Apache ErrorDocument integration

Responsive layout

Flexbox-based CSS layout

No CSS framework dependency

No JavaScript framework dependency

Local font assets

Local SVG icons

Automatic asset versioning using file modification timestamps

Automatic site-name detection from the current hostname

Centralized reusable layout

Separate templates for each HTTP status code

Safe HTML output escaping

Suitable for shared hosting and cPanel environments

Supported HTTP Status Codes
Status Code	Description
403	Access Denied
404	Page Not Found
500	Internal Server Error
503	Service Unavailable

The routing logic supports HTTP status codes from 400 through 599. Additional error templates can be added when needed.

How It Works

The system uses Apache's ErrorDocument mechanism to route HTTP errors to a central PHP entry point.

The requested HTTP status code is detected by the application, and the corresponding error template is loaded. Each error template provides its own status code, icon, title, and message while using the shared application layout.

This approach keeps error detection, templates, layout, assets, and reusable functionality separated.

Requirements

PHP 7.4 or newer

Apache HTTP Server

Apache support for ErrorDocument

A web-accessible directory for the project

No Composer, Node.js, npm, or external PHP package is required.

Installation
Upload the Project

Upload the project directory to your website's document root.

For example:

/public_html/errors/


The exact filesystem path may be different depending on your hosting environment.

The important requirement is that the project is publicly accessible through a URL such as:

https://example.com/errors/

Configure Apache ErrorDocument

The .htaccess file belongs to your website's document root, not inside this project.

For example:

/public_html/.htaccess


Add the following configuration to the .htaccess file in your website's document root:

# Begin Custom Error Pages

ErrorDocument 403 /errors/index.php
ErrorDocument 404 /errors/index.php
ErrorDocument 500 /errors/index.php
ErrorDocument 503 /errors/index.php

# End Custom Error Pages


The /errors/index.php path must match the public URL path where this project was uploaded.

For example, if the project is available at:

https://example.com/errors/


the corresponding Apache configuration is:

ErrorDocument 404 /errors/index.php


If you upload the project to a different public directory, change the ErrorDocument path accordingly.

The .htaccess configuration is a server-level deployment requirement and is intentionally not included in this repository.

Test the Error Pages

After configuring Apache, test the error pages.

For example:

https://example.com/non-existent-page


This should display the custom 404 page.

The other configured error pages can be tested through appropriate server or application scenarios.

Configuration

The main reusable functionality is located in:

includes/functions.php


The system automatically derives the site name from the current hostname.

For example:

example.com


can be displayed as:

Example


The site-name generation logic can be customized in includes/functions.php when a project requires specific branding or naming rules.

Error Templates

Each HTTP error has its own template.

The currently included templates are:

403 — Access Denied

404 — Page Not Found

500 — Internal Server Error

503 — Service Unavailable

Each template defines its status code, icon, title, and message before loading the shared layout.

Example:

$error = [
    'code' => 404,
    'icon' => 'compass',
    'title' => 'Page Not Found',
    'message' => 'The page you are looking for could not be found.',
];


The shared layout is loaded through:

includes/index.php

Adding a New Error Page

The routing logic supports HTTP status codes from 400 through 599.

To add another error page, create a template for the desired status code.

For example, to add HTTP status code 429, create:

template-parts/429/index.php


Then define the error information:

<?php

declare(strict_types=1);

$error = [
    'code' => 429,
    'icon' => 'circle-alert',
    'title' => 'Too Many Requests',
    'message' => 'Too many requests have been sent. Please try again later.',
];

require __DIR__ . '/../../includes/index.php';


If Apache needs to route status code 429 to the custom error system, add:

ErrorDocument 429 /errors/index.php

Icons

SVG icons are centralized in:

includes/icons.php


The current system includes icons for:

Access restriction

Navigation and missing pages

Server errors

Service unavailable

Security and return actions

Generic alerts

Additional icons can be added to the same file and referenced by the error templates.

Assets

Frontend assets are organized into three main areas:

assets/component/ — JavaScript components

assets/fonts/ — Local font files

assets/styles/ — CSS stylesheets

CSS

The main stylesheet is:

assets/styles/global.css


The layout uses Flexbox and does not depend on a CSS framework.

JavaScript

The project includes a minimal JavaScript entry point:

assets/component/global.js


No JavaScript framework or external runtime dependency is required.

Asset Versioning

CSS and JavaScript files are automatically appended with their file modification timestamp.

For example:

/assets/styles/global.css?ver=1234567890


This helps prevent browsers from serving outdated cached assets after a file is updated.

Fonts

The project includes local font assets for:

Inter

Manrope

JetBrains Mono

The included font files are distributed under their respective third-party licenses.

See THIRD-PARTY-NOTICES.md for source and licensing information.

Design

The interface combines:

Corporate visual structure

Modern editorial typography

Developer and engineering aesthetics

Premium product-style presentation

The design intentionally avoids:

Excessive gradients

Glassmorphism

Glow-heavy effects

Generic centered cards

CSS framework dependencies

The layout is responsive and adapts to smaller screens through CSS media queries.

Security Considerations

The project follows several basic security practices:

Dynamic values rendered into HTML are escaped.

No user input is executed as PHP.

No external JavaScript dependency is required.

Error messages are defined explicitly by templates.

Server configuration is kept separate from application files.

The project does not expose sensitive application configuration.

This project is an error-page presentation system and should be deployed alongside normal server and application security controls.

Browser Compatibility

The frontend uses standard HTML, CSS, and JavaScript features supported by modern browsers.

Local font formats are included to provide broader compatibility with different environments.

Deployment Notes

The project can be deployed on:

Shared hosting

cPanel hosting

Apache-based PHP hosting

Traditional PHP web servers

The project does not require a framework-specific deployment process.

For Apache deployments, the server must be configured to route the desired HTTP error responses to the project's index.php.

Third-Party Notices

Third-party assets included in this repository remain subject to their respective licenses.

See THIRD-PARTY-NOTICES.md for the currently included third-party font sources and license information.

License

This project is released under the MIT License.

See LICENSE for the full license text.

Third-party assets may be distributed under different licenses. Their respective license terms continue to apply.

Contributing

Contributions, improvements, bug fixes, and suggestions are welcome.

Before submitting a change:

Keep the existing project structure consistent.

Avoid introducing unnecessary dependencies.

Keep the error templates independent from application-specific business logic.

Test the affected HTTP error scenarios.

Keep security considerations in mind.

Issues

If you find a bug or have a feature request, please open an issue in the GitHub repository.

Author

Abolfazl Shoja Dizaj

Repository

github.com/abolfazlshojadev/php-http-custom-error-pages