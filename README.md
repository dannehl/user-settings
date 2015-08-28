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

##Usage


```php

// Get a value:

\UserSet::get('key');


// Set a value

\UserSet::set('key','my_value');

```