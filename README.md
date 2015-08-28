# Simple file based user settings (for Laravel)


##Installation

Add `"dannehl/user-settings"` to composer.

Add the service provider:

```php
Dannehl\UserSettings\UserSettingsServiceProvider::class,
```

Add the Facade:

```php
'UserSetting' => Dannehl\UserSettings\Facade\UserSettings::class,
```

Make sure the folder /storage/userconf exists .

##Usage

```php
// Store a value
\UserSet::set('My_Name','John');

// Get a value
echo \UserSet::get('My_Name');  // -> John
```