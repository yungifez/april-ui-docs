# April UI docs

## Screenshot workflow

- Use `npm run screenshots:blocks` to refresh the dashboard block previews.
- Capture light and dark variants at a 390px viewport and 2x device scale.
- Keep the mobile captures in `public/images/blocks/` and reference both theme variants from `config/blocks.php`.
- Dashboard previews use screenshots on small screens and live Blade components from the `md` breakpoint upward.
- Run `npm run build`, `php artisan view:cache`, and the focused application test after changes.
- Preserve unrelated working-tree changes when staging or committing.
