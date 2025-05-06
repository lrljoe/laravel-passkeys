---
title: Customizing behaviour
weight: 2
---

The core functionality of this package is implemented in action classes. You can override the default behaviour by creating your own action classes and registering them in the `config/passkeys.php` config file.

Here's an example where we override the `StorePasskey` action to add custom logic after a passkey is stored:

First, let's create the custom class.

```php
namespace App\Actions;

use Spatie\LaravelPasskeys\Actions\StorePasskeyAction

class CustomStorePasskeyAction extends StorePasskeyAction
{
    public function handle($user, $passkey)
    {
        // Call the parent method to store the passkey
        parent::handle($user, $passkey);

        // Add your custom logic here
    }
}
```

Next, register the custom action in the `config/passkeys.php` config file:

```php
// config/passkeys.php

return [
    // ...
    'actions' => [
        'store_passkey' => App\Actions\CustomStorePasskeyAction::class,
    ],
];
```

