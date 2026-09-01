# Contributing to the April UI docs

The April UI docs site explains the package and provides live examples. Keep the site focused on Laravel workflows and keep package behavior in the April UI package repository.

## Branches

Use `main` as the deployable docs branch.

Create short-lived branches from `main`:

- `feature/<name>` for a new site feature.
- `fix/<name>` for a site or example bug.
- `docs/<name>` for copy, navigation, or documentation changes.
- `chore/<name>` for maintenance and dependency work.

Use `release/<version>` only for release checks. Do not use release branches for normal development.

## Development

Install the dependencies and prepare the local environment:

```sh
composer install
npm ci
```

Run the site checks before you open a pull request:

```sh
npm run build
php artisan view:cache
php artisan test --no-coverage
```

Use the screenshot workflow for block changes. Capture both light and dark variants at the documented mobile size.

Do not edit `vendor/yungifez/april-ui` directly. Update the package repository first, then update the Composer dependency and its documentation snapshot here.

## Pull requests

Open pull requests against `main`. Use an imperative commit title under 50 characters. Explain the change, the reason for the change, and the checks that you ran.

Keep marketing copy direct and specific. Describe April UI as a Laravel-first package. Attribute inspirations when a page uses their ideas.

## Releases

Maintainers update the April UI package constraint, refresh the docs dependency, run the site checks, and create a matching semantic version tag such as `v1.0.0`.
