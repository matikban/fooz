# Twenty Twenty Child Theme for Book Features

A child theme for the [Twenty Twenty](https://wordpress.org/themes/twentytwenty/) WordPress theme that adds custom templates and shortcodes to manage and display book-related content, while keeping full compatibility with the parent theme.

---

## Table of Contents

- [Overview](#overview)
- [Installation](#installation)
- [Features & Usage](#features--usage)
  - [Custom Templates](#custom-templates)
  - [Shortcodes](#shortcodes)
- [Custom Styles](#custom-styles)
- [Notes](#notes)
- [Support](#support)

---

## Overview

This child theme safely extends the Twenty Twenty theme by adding:

- Custom single book page and book genre taxonomy templates.
- Shortcodes for dynamic book data display:
  - `[most_recent_book_title]` — shows the most recent book title.
  - `[books_by_genre term_id="3"]` — lists books from the specified genre (category ID).
- Easy style additions via the child theme's `style.css`.
- Minimal changes from the parent templates, ensuring the original design and functionality are preserved.

---

## Features & Usage

### Custom Templates

- **Single Book Page**  
  Based on `singular.php` from Twenty Twenty with minor modifications to display book-specific content.

- **Book Genre Taxonomy Page**  
  Based on the `index.php` template with tweaks to showcase books filtered by genre taxonomy.

### Shortcodes

Use these shortcodes in posts, pages, or widgets:

- `[most_recent_book_title]`  
  Outputs the title of the latest published book.

- `[books_by_genre term_id="X"]`  
  Replace `X` with a genre/category ID to display books from that genre. Example: `[books_by_genre term_id="3"]`

---

## Custom Styles

All additional styling should be added to the child theme’s `style.css`. This maintains separation from the parent theme and ensures updates won't overwrite your customizations.

---

## Notes

- The child theme inherits all functionality and styling from Twenty Twenty.
- Custom templates modify only a few lines for book-related features.
- Always use a child theme for customization to protect changes from parent theme updates.

---
