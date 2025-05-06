---
title: Styling the components
weight: 4
---

To customize the look and feel of the component, you can pass HTML to the component.

```html
<x-authenticate-passkey>
    <button class="bg-blue-500 text-white px-4 py-2 rounded">Authenticate using passkey</button>
</x-authenticate-passkey>
```

To customize where the user is redirected after a successful login, you can pass a URL to the `redirect` prop of the component.

```html
<x-authenticate-passkey redirect="/dashboard" />
```    
