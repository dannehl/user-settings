# Simple file based user settings (for Laravel)


##Installation

Add `"dannehl/user-settings"` to composer.

Add the service provider:

```php
Dannehl\UserSettings\UserSettingsServiceProvider::class,
```

Add the Facade:

```php
'UserSettings' => Dannehl\UserSettings\Facade\UserSettings::class,
```
###Storage
The settings are stored as key value pairs in a file for each user.
Make sure the folder /storage/userconf exists. Filenames are generated from the user id, so this will only work for authenticated users.
The user id is taken from Auth::user()->id;

##Usage

```php
// Store a value
\UserSettings::set('My_Name','John');

// Get a value
echo \UserSettings::get('My_Name');  // -> John
```