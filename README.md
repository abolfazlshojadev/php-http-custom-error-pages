PHP HTTP Custom Error Pages

A lightweight and framework-independent HTTP error page system for PHP websites and shared hosting environments.

This project provides clean, responsive, and customizable error pages for common HTTP errors such as 403, 404, 500, and 503.

It is designed to be easy to deploy, simple to customize, and suitable for personal websites, client projects, and production environments.

1. Features

- Custom HTTP error pages
- Support for HTTP status codes 403, 404, 500, and 503
- Framework-independent PHP architecture
- Apache ErrorDocument integration
- Responsive design
- Flexbox-based CSS layout
- No CSS framework required
- No JavaScript framework required
- Local font assets
- Local SVG icons
- Automatic asset cache versioning
- Automatic site-name detection from the current hostname
- Automatic client IP detection and display
- Centralized reusable layout
- Separate templates for each HTTP error
- Safe HTML output escaping
- Suitable for shared hosting and cPanel environments
- No Composer or external PHP dependencies

2. Supported HTTP Status Codes

The project currently provides custom templates for the following HTTP status codes:

- 403 — Access Denied
- 404 — Page Not Found
- 500 — Internal Server Error
- 503 — Service Unavailable

The routing system supports HTTP status codes from 400 through 599, allowing additional error templates to be added when needed.

3. Requirements

- PHP 7.4 or newer
- Apache HTTP Server
- Apache ErrorDocument support
- A publicly accessible project directory

The project does not require Composer, Node.js, npm, or any external PHP package.

4. Installation

4.1 Upload the Project

Upload the project directory to a publicly accessible location on your server.

For example:

    /public_html/errors/

The project should then be accessible through a URL such as:

    https://example.com/errors/

4.2 Configure Apache

The Apache configuration should be placed in the .htaccess file located in your website's document root.

For example:

    /public_html/.htaccess

Add the following configuration:

    ErrorDocument 403 /errors/index.php
    ErrorDocument 404 /errors/index.php
    ErrorDocument 500 /errors/index.php
    ErrorDocument 503 /errors/index.php

The /errors/index.php path must match the public URL location of the project.

The .htaccess configuration is intentionally not included in this repository because it depends on the deployment structure of the host server.

4.3 Test the Installation

After configuring Apache, open a URL that does not exist.

For example:

    https://example.com/this-page-does-not-exist

Apache should route the request to the custom 404 error page.

The error page will also display the client IP address associated with the request.

Other HTTP error pages can be tested using appropriate server or application scenarios.

5. Configuration

The main reusable functionality is located in:

    includes/functions.php

The system automatically detects the website hostname and uses it to generate the displayed site name.

For example, example.com can be displayed as Example.

The site-name generation logic can be customized in includes/functions.php when a project requires specific branding.

Client IP detection is also handled through includes/functions.php.

The detected client IP is displayed on the error page and is not added to the URL.

6. Error Templates

Each supported HTTP error has its own template inside the template-parts directory.

The current templates are:

- template-parts/403/index.php
- template-parts/404/index.php
- template-parts/500/index.php
- template-parts/503/index.php

Each template defines the error status, icon, title, and message.

The shared page layout is loaded through:

    includes/index.php

This structure keeps individual error messages separate from the common page layout.

7. Adding a New Error Page

The routing system supports status codes from 400 through 599.

To add a new error page, create a template for the required status code.

For example, to add HTTP 429, create:

    template-parts/429/index.php

The template should define the appropriate status code, icon, title, and message, then load the shared layout from:

    includes/index.php

If Apache needs to route HTTP 429 responses to the custom error system, add the corresponding ErrorDocument directive to the .htaccess file:

    ErrorDocument 429 /errors/index.php

8. Icons

SVG icons are centralized in:

    includes/icons.php

The project includes icons for common error and navigation states, including access restriction, missing pages, server errors, service unavailability, security actions, and generic alerts.

Additional icons can be added to the same file and referenced by individual error templates.

9. Assets

Frontend assets are organized into separate directories for styles, JavaScript, and fonts.

9.1 CSS

The main stylesheet is:

    assets/styles/global.css

The interface uses standard CSS and Flexbox without requiring a CSS framework.

9.2 JavaScript

The project includes a minimal JavaScript entry point:

    assets/component/global.js

No JavaScript framework or external runtime dependency is required.

9.3 Asset Versioning

CSS and JavaScript assets are automatically appended with their file modification timestamp.

This helps prevent browsers from using an outdated cached version after an asset has been modified.

10. Fonts

The project includes local font assets for:

- Inter
- Manrope
- JetBrains Mono

These fonts are distributed under their respective third-party licenses.

See THIRD-PARTY-NOTICES.md for the relevant source and licensing information.

11. Design

The interface combines a clean corporate structure with modern editorial typography and developer-oriented visual elements.

The design focuses on clarity, simplicity, responsiveness, and professional presentation.

It intentionally avoids excessive gradients, glassmorphism, heavy glow effects, generic centered-card layouts, and unnecessary framework dependencies.

The layout adapts to smaller screens using standard CSS media queries.

12. Client IP Display

The system automatically detects the client IP address using the server-provided request address.

The detected IP is displayed directly on the error page as part of the request information.

The IP address is not added to the URL and does not require manual configuration.

The displayed value is escaped before being rendered into HTML.

13. Security

The project follows several basic security practices:

- Dynamic values rendered into HTML are escaped.
- User input is not executed as PHP.
- Client IP output is escaped before rendering.
- Error messages are explicitly defined by templates.
- No external JavaScript dependency is required.
- Server configuration is kept separate from application files.
- Sensitive application configuration is not exposed by the project.

This project is an HTTP error-page presentation system and should be deployed alongside the normal security controls of the web server and application.

The client IP display is intended for informational and request-identification purposes. Projects with specific privacy or regulatory requirements should apply their own policies regarding IP address processing and disclosure.

14. Browser Compatibility

The frontend uses standard HTML, CSS, and JavaScript features supported by modern browsers.

Local font assets are included to provide consistent typography across supported environments.

15. Deployment

The project can be deployed on shared hosting, cPanel hosting, Apache-based PHP hosting, and traditional PHP web servers.

No framework-specific deployment process is required.

For Apache deployments, the server must be configured to route the required HTTP error responses to the project's index.php entry point.

16. Third-Party Notices

Third-party assets included in this repository remain subject to their respective licenses.

See THIRD-PARTY-NOTICES.md for information about the included third-party fonts and their licensing terms.

17. License

This project is released under the PHP HTTP Custom Error Pages License.

The software may be used, studied, modified, and incorporated into personal, educational, development, and commercial projects.

Standalone resale, commercial redistribution, sublicensing, or distribution of modified versions as a competing or standalone product is not permitted without prior written permission from the copyright holder.

The original copyright notice must remain intact.

See LICENSE for the complete license terms.

Third-party assets included in this repository may be distributed under their own licenses. Their respective license terms continue to apply.

18. Contributing

Contributions, improvements, bug fixes, and suggestions are welcome.

Before submitting a change:

- Keep the existing project structure consistent.
- Avoid unnecessary dependencies.
- Keep error templates independent from application-specific business logic.
- Test affected HTTP error scenarios.
- Keep security considerations in mind.

19. Issues

If you find a bug or have a feature request, please open an issue in the GitHub repository.

20. Author

Abolfazl Shoja Dizaj

21. Repository

https://github.com/abolfazlshojadev/php-http-custom-error-pages
