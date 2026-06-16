# Deployment Guide for Vercel + GitHub

This portfolio supports **two deployment targets**:

## 1. Vercel (Static) - Recommended for you right now
- Uses pure HTML + JavaScript
- Fully functional on Vercel (free)
- All pages are separate `.html` files
- Data is in `data/config.js`

## 2. PHP Hosting (Future)
- Full PHP + OOP files are included
- Uses `index.php`, `includes/config.php`, `ContactFormHandler.php`, etc.

---

## How to Deploy on Vercel

### Step-by-step:

1. **Make sure your GitHub repo has these key files**:
   - `index.html`
   - `about.html`, `projects.html`, `experience.html`, `contact.html`, `php-architecture.html`
   - `data/config.js`
   - `assets/js/portfolio.js`
   - `vercel.json`

2. Go to [vercel.com](https://vercel.com) and sign in with GitHub.

3. Click **"Add New Project"** → Import your repository.

4. Vercel should detect it as a **static site**. Leave everything default.

5. Click **Deploy**.

Your site will be live in ~30 seconds at a URL like `https://your-portfolio.vercel.app`

---

## Editing Images & Data (Very Easy)

All content is centralized in **`data/config.js`**:

```js
window.PORTFOLIO_CONFIG = {
  images: {
    hero: "...",
    profile: "..."
  },
  projects: [ ... ]
}
```

After editing:
- Commit and push to GitHub
- Vercel automatically redeploys

You can also use the **Live Image Editor** on the "PHP OOP" page after deployment.

---

## Important Notes

- **Contact form**: On Vercel it shows a success message (simulated).  
  The real OOP PHP handler (`includes/ContactFormHandler.php`) only runs on actual PHP hosting.

- Clean URLs work thanks to `vercel.json` (e.g. `/projects`, `/contact`).

- The PHP files (`*.php` + `includes/`) are kept in the repo but are **ignored** by Vercel.

---

## Switching to Real PHP Later

If you ever move to PHP hosting (Heroku, DigitalOcean, etc.):
- Point your domain to the PHP files
- Delete or ignore the `.html` files
- Use `index.php` as the entry point

The design and data structure are identical.

---

You're all set to launch on Vercel!