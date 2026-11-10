# Bright Cloud Studio's Article Page Selector

Adds a **Selected Page** picker to an article's settings in the Contao back end,
so an article can be rendered as a teaser tile that links through to the chosen
page.

This package is **general-purpose and reusable** — it is not client-specific.

## What it does

It adds a single field, `selected_page`, to `tl_article`:

- A `pageTree` picker limited to one page (`fieldType` `radio`)
- Stored as an unsigned integer page ID, with a `hasOne` relation to `tl_page`
- Shown in its own **Article Page Selector Settings** legend, between
  *Syndication* and *Template settings*

That is the whole package. It provides the **back-end input only** — see
*Usage* below for how to render it.

## Requirements

- PHP 8.2 – 8.4
- Contao 5.7

Verified on Contao 5.7 alongside Isotope 3.0.0-RC1. The package itself has no
Isotope dependency and works on any Contao 5.7 site.

## Installation

Via the Contao Manager, or with Composer:

```
composer require bright-cloud-studio/article-page-selector
```

Then run a database update so the `tl_article.selected_page` column is created.

## Usage

Edit any article, open **Article Page Selector Settings**, and pick the page the
article should link to.

The package deliberately ships **no template**. Contao exposes every
`tl_article` column to the article template automatically (`Module::generate()`
calls `setData()` on the template), so `selected_page` is available in a custom
`mod_article_*` template with no further wiring.

Create a custom article template, select it under **Template settings** on the
article, and wrap the content in a link:

```php
<a href="{{link_url::<?= $this->selected_page ?>}}"
   class="article_link article_<?= $this->selected_page ?>"
   aria-label="<?= $this->headline ?>">
    <div class="<?= $this->class ?> block"<?= $this->cssID ?>>
        <?php $this->block('content'); ?>
            <?= implode('', $this->elements) ?>
        <?php $this->endblock(); ?>
    </div>
</a>
```

The page ID is also useful as a CSS hook (`article_12` above), for styling
individual tiles.

Two things worth getting right in your own template:

- **Give the link an accessible name.** A link wrapping only images or
  decorative markup has no text for screen readers — set an `aria-label`, or
  use `{{link_name::<?= $this->selected_page ?>}}` for the target page's title.
- **Guard the empty case.** `selected_page` is `0` when nothing is picked, so
  check it before emitting the wrapper if the template is shared with articles
  that have no target page.

## License

MIT — see [LICENSE](LICENSE).
