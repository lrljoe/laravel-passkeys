---
title: Using a custom passkey model
weight: 1
---

By default, the package uses the `Spatie\Passkeys\Models\Passkey` model to store passkeys. If you want to use a custom model, you can do so by following these steps.

## Step 1: Create a custom model

Create a new model that extends the `Spatie\Passkeys\Models\Passkey` model. 

```php
namespace App\Models;

use Spatie\Passkeys\Models\Passkey as BasePasskey;

class Passkey extends BasePasskey
{
    // Add any custom properties or methods here
}
```

## Step 2: Update the configuration

Next, you need to update the `config/passkeys.php` configuration file to use your custom model. 

```php
// config/passkeys.php

return [
    // ...
    'models' => [
        // The model used to store passkeys
        'passkey_model' => App\Models\Passkey::class,
    ],
];
```
