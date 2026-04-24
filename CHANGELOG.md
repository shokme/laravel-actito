# Changelog
## 2.0.0
### Breaking Changes
- `Profile::updateOrCreate()` migrated to v5 API (`PUT v5/entities/.../profile-tables/.../profiles`)
  - Payload format changed: `attributes` is now a flat `{key: value}` object (was an array of `{name, value}`)
  - Subscriptions format changed: flat `{name: bool}` object (was an array of `{name, subscribe}`)
  - A `key` field is now required and auto-detected from `emailAddress` or `userId` in attributes
### Fixed
- `Table::all()` and `Table::find()` had a misplaced parenthesis in the `config()` call that produced broken URLs
### Notes
- `Profile::find()`, `firstOrCreate()`, `delete()`, `subscribe()`, `unsubscribe()`, `subscriptions()` still use v4 endpoints — pending full v5 migration

## 1.0.4
### What's Changed
- Caching the authorization token for 14 minutes (15 minutes is the default Actito validity)
## 1.0.3
### Added
- When creating the profile, you can now add the subscriptions
```php
$data = [
    'attributes' => [ ... ],
    'subscriptions' => [
        'Newsletter' => true,
        'Retargeting' => false,
    ],
];

Actito::profile()->updateOrCreate($data);
```
## 1.0.0 - 2022-06-03
### What's Changed
- Initial release
### Features
#### CRUD
- Profile
- Table
- Webhook
- Action

#### Others
- Send transactional email
- Send user email
- See form participation
- Import data to profile or table
