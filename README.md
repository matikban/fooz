# Twenty Twenty Child Theme for Book Features

A child theme for the [Twenty Twenty](https://wordpress.org/themes/twentytwenty/) WordPress theme that adds custom templates and shortcodes to manage and display book-related content, while keeping full compatibility with the parent theme.

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
