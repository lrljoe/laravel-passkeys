---
title: Styling the components
weight: 4
---

The `authenticate-passkey` component can be styled and customized however you want, by passing HTML it's slot.

```html
<x-authenticate-passkey>
    <button class="bg-blue-500 text-white px-4 py-2 rounded">Authenticate using passkey</button>
</x-authenticate-passkey>
```

This will render a button that, when clicked, will start the passkey authentication process.

All other styling can be done by publishing the package's views and modifying them as needed. You can publish the views using the following command:

```bash
php artisan vendor:publish --tag=passkeys-views
```

