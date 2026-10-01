```
PHP HTTP Custom Error Pages

A professional, framework-independent HTTP error page system for PHP websites and shared hosting environments.

This project provides clean, responsive, customizable error pages for common HTTP errors such as 403, 404, 500, and 503.

It is designed to be simple to deploy, easy to customize, and suitable for both personal and production websites.

1. Features

- Custom HTTP error pages
- Supports 403, 404, 500, and 503
- Framework-independent PHP architecture
- Apache ErrorDocument integration
- Responsive layout
- Flexbox-based CSS layout
- No CSS framework dependency
- No JavaScript framework dependency
- Local font assets
- Local SVG icons
- Automatic asset versioning using file modification timestamps
- Automatic site-name detection from the current hostname
- Centralized reusable layout
- Separate templates for each HTTP status code
- Safe HTML output escaping
- Suitable for shared hosting and cPanel environments

2. Supported HTTP Status Codes

| Status Code | Description |
|-------------|-------------|
| 403 | Access Denied |
| 404 | Page Not Found |
| 500 | Internal Server Error |
| 503 | Service Unavailable |

The routing logic supports HTTP status codes from 400 through 599. Additional error templates can be added when needed.

3. How It Works

The system uses the web server's error handling mechanism to route HTTP errors to a central PHP entry point.

HTTP Error
    ↓
Apache ErrorDocument
    ↓
/errors/index.php
    ↓
includes/lib.php
    ↓
Detect HTTP Status Code
    ↓
template-parts/{code}/index.php
    ↓
includes/index.php
    ↓
header.php
    ↓
Error Content
    ↓
footer.php

This keeps error detection, templates, layout, assets, and reusable functionality separated.

4. Project Structure

errors/
├── assets/
│   ├── component/
│   │   └── global.js
│   ├── fonts/
│   │   ├── Inter/
│   │   ├── JetBrainsMono/
│   │   └── Manrope/
│   └── styles/
│       └── global.css
├── includes/
│   ├── functions.php
│   ├── icons.php
│   ├── index.php
│   └── lib.php
├── template-parts/
│   ├── 403/
│   │   └── index.php
│   ├── 404/
│   │   └── index.php
│   ├── 500/
│   │   └── index.php
│   └── 503/
│       └── index.php
├── footer.php
├── header.php
├── index.php
├── THIRD-PARTY-NOTICES.md
├── LICENSE
└── README.md

5. Requirements

- PHP 7.4 or newer
- Apache HTTP Server
- Apache support for ErrorDocument
- A web-accessible directory for the project

No Composer, Node.js, npm, or external PHP package is required.

6. Installation

6.1 Upload the Project

Upload the project directory to your website's document root.

For example:

/public_html/errors/

The exact filesystem path may be different depending on your hosting environment.

The important requirement is that the project is publicly accessible through a URL such as:

https://example.com/errors/

6.2 Configure Apache ErrorDocument

The .htaccess file belongs to your website's document root, not inside this project.

For example:

/public_html/.htaccess

Add the following configuration to the .htaccess file in your website's document root:

# Begin Custom Error Pages.
ErrorDocument 403 /errors/index.php
ErrorDocument 404 /errors/index.php
ErrorDocument 500 /errors/index.php
ErrorDocument 503 /errors/index.php
# End Custom Error Pages.

The /errors/index.php path must match the public URL path where this project was uploaded.

For example, if the project is available at:

https://example.com/errors/

then the corresponding Apache configuration is:

ErrorDocument 404 /errors/index.php

If you upload the project to a different public directory, change the ErrorDocument path accordingly.

The .htaccess configuration is a server-level deployment requirement and is intentionally not included in this repository.

6.3 Test the Error Pages

After configuring Apache, test the error pages.

For example:

https://example.com/non-existent-page

should display the custom 404 page.

The other configured error pages can be tested through appropriate server or application scenarios.

7. Configuration

The main reusable functionality is located in:

includes/functions.php

The system automatically derives the site name from the current hostname.

For example:

example.com

can be displayed as:

Example

The site-name generation logic can be customized in includes/functions.php when a project requires specific branding or naming rules.

8. Error Templates

Each HTTP error has its own template directory:

template-parts/
├── 403/
├── 404/
├── 500/
└── 503/

Each template defines its status code, icon, title, and message before loading the shared layout.

Example:

$error = [
'code' => 404,
'icon' => 'compass',
'title' => 'Page Not Found',
'message' => 'The page you are looking for could not be found.',
];

The shared layout is then loaded through:

includes/index.php

9. Adding a New Error Page

To add another HTTP error page, create a directory for the status code.

For example, to add 429:

template-parts/
└── 429/
    └── index.php

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

The existing routing logic already supports status codes from 400 through 599.

You can then configure Apache if the server or application needs to route that status code to the custom error entry point:

ErrorDocument 429 /errors/index.php

10. Icons

SVG icons are centralized in:

includes/icons.php

The current system includes icons for:

- Access restriction
- Navigation / missing page
- Server error
- Service unavailable
- Security / return action
- Generic alert

Additional icons can be added to the same file and referenced by the error templates.

11. Assets

Frontend assets are organized into separate directories:

assets/
├── component/
├── fonts/
└── styles/

11.1 CSS

The main stylesheet is:

assets/styles/global.css

The layout uses Flexbox and does not depend on a CSS framework.

11.2 JavaScript

The project currently includes a minimal JavaScript entry point:

assets/component/global.js

No JavaScript framework or external runtime dependency is required.

11.3 Asset Versioning

CSS and JavaScript files are automatically appended with their file modification timestamp.

For example:

/assets/styles/global.css?ver=1234567890

This helps prevent browsers from serving an outdated cached version after an asset is updated.

12. Fonts

The project includes local font assets for:

- Inter
- Manrope
- JetBrains Mono

The included font files are distributed under their respective third-party licenses.

See THIRD-PARTY-NOTICES.md for source and licensing information.

13. Design

The interface combines:

- Corporate visual structure
- Modern editorial typography
- Developer / engineering aesthetics
- Premium product-style presentation

The design intentionally avoids:

- Excessive gradients
- Glassmorphism
- Glow-heavy effects
- Generic centered cards
- CSS framework dependencies

The layout is responsive and adapts to smaller screens through CSS media queries.

14. Security Considerations

The project follows several basic security practices:

- Dynamic values rendered into HTML are escaped.
- No user input is executed as PHP.
- No external JavaScript dependency is required.
- Error messages are defined explicitly by templates.
- Server configuration is kept separate from application files.
- The project does not expose sensitive application configuration.

This project is an error-page presentation system and should be deployed alongside normal server and application security controls.

15. Browser Compatibility

The frontend uses standard HTML, CSS, and JavaScript features supported by modern browsers.

Local font formats are included to provide broader compatibility with different environments.

16. Deployment Notes

The project can be deployed on:

- Shared hosting
- cPanel hosting
- Apache-based PHP hosting
- Traditional PHP web servers

The project does not require a framework-specific deployment process.

For Apache deployments, the server must be configured to route the desired HTTP error responses to the project's index.php.

17. Third-Party Notices

Third-party assets included in this repository remain subject to their respective licenses.

See THIRD-PARTY-NOTICES.md for the currently included third-party font sources and license information.

18. License

This project is released under the MIT License.

See LICENSE for the full license text.

Third-party assets may be distributed under different licenses. Their respective license terms continue to apply.

19. Contributing

Contributions, improvements, bug fixes, and suggestions are welcome.

Before submitting a change:

1. Keep the existing project structure consistent.
2. Avoid introducing unnecessary dependencies.
3. Keep the error templates independent from application-specific business logic.
4. Test the affected HTTP error scenarios.
5. Keep security considerations in mind.

20. Issues

If you find a bug or have a feature request, please open an issue in the GitHub repository.

21. Author

Abolfazl Shoja Dizaj

22. Repository

https://github.com/abolfazlshojadev/php-http-custom-error-pages
```
