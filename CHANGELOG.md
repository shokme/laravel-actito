# Changelog
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
