# April UI docs

## Repository scope

- This repository contains the published docs site, marketing pages, examples, and blocks.
- The stable docs checkout uses the released April UI Composer package.
- The local checkout at `../april-ui-docs-local` uses a path repository and symlinks to `../april-ui`.
- Do not edit `vendor/yungifez/april-ui` directly.
- Change package components in `../april-ui`, then test them in the local docs checkout.

## Contribution and release workflow

1. Create a short-lived branch from `main`.
2. Change docs pages, previews, or site views in this repository.
3. Run the site build, view cache, application tests, and relevant screenshot checks.
4. Open a pull request against `main`.
5. Merge package updates from Dependabot after reviewing the rendered examples.

Use short imperative commit subjects. Keep marketing copy direct. Attribute
inspiration when a page uses another project’s ideas.

The April UI package controls its own releases through Release Please. Do not
create package tags from this repository. Dependabot opens the package update
pull request after the package GitHub release is available.

## Screenshot workflow

- Use `npm run screenshots:blocks` to refresh the dashboard block previews.
- Capture light and dark variants at a 390px viewport and 2x device scale.
- Keep the mobile captures in `public/images/blocks/` and reference both theme variants from `config/blocks.php`.
- Dashboard previews use screenshots on small screens and live Blade components from the `md` breakpoint upward.
- Run `npm run build`, `php artisan view:cache`, and the focused application test after changes.
- Preserve unrelated working-tree changes when staging or committing.
