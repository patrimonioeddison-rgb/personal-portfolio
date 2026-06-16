# Marcus Rivera — Professional Portfolio (PHP + OOP)

A clean, production-oriented personal portfolio built with **real separated PHP files** (not a single-page app).

## ✅ File Structure (True Multi-Page PHP)

```
/
├── index.php                 → Home page
├── about.php                 → About + Skills
├── projects.php              → Projects grid + filters
├── experience.php            → Professional timeline
├── contact.php               → Contact form (real PHP OOP handler)
├── php-architecture.php      → PHP OOP documentation + Live Image Editor
│
├── includes/
│   ├── header.php            → Shared header + navigation + CONFIG injection
│   ├── footer.php            → Shared footer + modal + JS include
│   ├── config.php            → ★ CENTRAL CONFIG (easy image & data edits)
│   └── ContactFormHandler.php → Real OOP PHP contact processor
│
├── assets/
│   └── js/
│       └── portfolio.js      → Shared OOP JavaScript (PortfolioApp class)
│
├── index.html                → Redirect to index.php
└── README.md
```

## Key Features

- **Real separate pages** — Every section is its own `.php` file
- **PHP is the main language** — Full server-side rendering
- **OOP in PHP**:
  - `ContactFormHandler` class (validation, sanitization, DB stub, mailer)
  - Clean `SimpleMailer` class
- **OOP in JavaScript**:
  - `PortfolioApp` class in `assets/js/portfolio.js`
- **Easy Image Modification**:
  - All images controlled from `includes/config.php`
  - Live Image Editor available on `php-architecture.php`
- **jQuery** used for interactivity (modals, filters, mobile menu)
- **Tailwind CSS** via CDN

## How to Edit Images & Content (Very Easy)

1. Open **`includes/config.php`**
2. Edit these sections:

```php
'images' => [
    'hero'    => 'https://picsum.photos/id/1015/1200/1400',
    'profile' => 'https://picsum.photos/id/1005/800/800',
],

'projects' => [
    [
        'id' => 1,
        'img' => 'https://picsum.photos/id/160/800/600',   // ← Change this
        ...
    ]
]
```

You can also use the **Live Image Editor** on the "PHP OOP" page for instant visual feedback.

## Contact Form (Real PHP)

The contact form on `contact.php` uses a real OOP handler:

```php
require_once 'includes/ContactFormHandler.php';
$handler = new ContactFormHandler();
$result = $handler->processSubmission($_POST);
```

It includes:
- Input sanitization
- Validation
- Simulated database save
- Email notification stub (ready for PHPMailer)

## Running the Portfolio

### Option 1: PHP Development Server (Recommended)
```bash
php -S localhost:8000
```

Then open: `http://localhost:8000`

### Option 2: XAMPP / Laragon / Valet / Docker
Place the folder in your web root and visit `index.php`.

### Option 3: Static Preview
You can open `index.php` directly in some environments, but a proper PHP server is required for the contact form to work.

## Architecture Highlights

- **Centralized Data**: `includes/config.php` is the single source of truth.
- **Shared Layout**: `header.php` + `footer.php`
- **Separation of Concerns**: 
  - PHP handles rendering + form processing
  - JavaScript handles UI (modals, filtering, image preview)
- **No React / No Build Step** — Pure PHP + jQuery + Tailwind

## To Convert Further (Production)

You can easily:
- Connect real MySQL via PDO in `ContactFormHandler`
- Use PHPMailer or Symfony Mailer
- Add authentication / admin area
- Move project data to a database

---

**All images and content are easily modifiable in one file (`includes/config.php`).**

Enjoy your clean, professional, PHP-first portfolio!
