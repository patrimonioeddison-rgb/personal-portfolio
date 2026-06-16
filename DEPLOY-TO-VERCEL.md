# 🚀 Deploy to Vercel (Static)

This portfolio is designed to work on **Vercel** even though it uses PHP concepts.

## Quick Deploy Steps

1. **Push your code to GitHub** (make sure these files are included):
   - All `*.html` files (index, about, projects, experience, contact, php-architecture)
   - `data/config.js`
   - `assets/js/portfolio.js`
   - `vercel.json`

2. Go to [https://vercel.com](https://vercel.com) → **Add New Project** → Import your GitHub repo.

3. Vercel will auto-detect it's a static site. Just click **Deploy**.

4. Done! Your site will be live at something like `https://your-repo.vercel.app`

## How Static Version Works

- **No PHP runs on Vercel** (Vercel doesn't support PHP on the free tier easily)
- We use a **static mirror** using pure HTML + JavaScript
- All your data (images, projects, experience, skills) lives in **`data/config.js`**
- This file is an exact mirror of the PHP `includes/config.php`

## Updating Content / Images

**Best way (recommended):**

Edit `data/config.js`:

```js
window.PORTFOLIO_CONFIG = {
  images: {
    hero: "YOUR_NEW_HERO_URL_HERE",
    profile: "YOUR_NEW_PROFILE_URL_HERE"
  },
  projects: [
    {
      id: 1,
      img: "NEW_PROJECT_IMAGE_URL",
      ...
    }
  ]
}
```

Then commit and push. Vercel will redeploy automatically.

You can also use the **Live Image Editor** on the "PHP OOP" page of your deployed site.

## Clean URLs

Thanks to `vercel.json`, these work:
- `/about`
- `/projects`
- `/contact`
- `/php-architecture`

## PHP Version (for later)

The real PHP files (`index.php`, `includes/config.php`, `ContactFormHandler.php`, etc.) are still in the repo.

You can use them anytime on:
- Traditional PHP hosting
- Heroku (with PHP buildpack)
- DigitalOcean App Platform
- Any VPS with Apache/Nginx + PHP

## Contact Form Behavior

- On **Vercel (static)**: Form is simulated. Shows success message.
- On **real PHP server**: Uses the OOP `ContactFormHandler.php` class.

## Need Help?

Everything is self-contained. No build step required.

Enjoy your portfolio! 🎉
