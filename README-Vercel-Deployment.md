# Deploying to Vercel (Static Hosting)

This portfolio has **two versions**:

1. **PHP Version** (real PHP + OOP) — Use on any PHP hosting (Heroku, DigitalOcean, XAMPP, etc.)
2. **Static Version** (HTML + JS) — Perfect for Vercel, GitHub Pages, Netlify, etc.

## For Vercel Deployment (Recommended for you)

### Step 1: Push to GitHub
Make sure your repo contains these files (the static ones):

- `index.html`
- `about.html`
- `projects.html`
- `experience.html`
- `contact.html`
- `php-architecture.html`
- `vercel.json`
- `data/config.js`
- `assets/js/portfolio.js`
- (Optional) The `includes/` and `.php` files can stay for future PHP hosting

### Step 2: Connect to Vercel
1. Go to [vercel.com](https://vercel.com)
2. Import your GitHub repository
3. Vercel will automatically detect the static site
4. Click **Deploy**

No build command needed — it's pure static HTML/JS/CSS.

### How the Static Version Works

- All data lives in **`data/config.js`** (easy to edit)
- This file mirrors **`includes/config.php`**
- JavaScript OOP class (`PortfolioApp`) powers modals, filters, and image editing
- The contact form simulates the PHP `ContactFormHandler` (shows success message)

### Updating Images & Content

**Easiest way:**
1. Edit `data/config.js`
2. Change any `img`, `hero`, `profile`, project data, etc.
3. Commit & push → Vercel auto-deploys

You can also use the **Live Image Editor** on the "PHP OOP" page after deploying.

### Clean URLs

`vercel.json` enables nice URLs:
- `yoursite.com/about`
- `yoursite.com/projects`
- `yoursite.com/php-architecture`

### Keeping Both Versions

You can keep the real PHP files in the repo. They won't affect the Vercel deployment.

If you later want to switch to PHP hosting:
- Use the `.php` files + `includes/` folder
- The PHP version uses the same design and `includes/config.php`

## Summary of Files for Vercel

Required for static deployment:
- All `*.html` files (6 pages)
- `data/config.js`
- `assets/js/portfolio.js`
- `vercel.json`

---

You now have a fully working portfolio that can be launched on Vercel while preserving your PHP OOP architecture for future use.