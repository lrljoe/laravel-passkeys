---
title: Authentication using passkeys
weight: 3
---

To let your users authenticate using a passkey, you can include the `authenticate-passkey` Blade component in your view, typically on your login view.

```html 
<x-authenticate-passkey />
```

// TODO: insert image

This component will show a link that, when clicked, will start the passkey authentication process.

If the authentication is successful, the user will be redirected to the URL specified in the  `redirect_to_after_login` key of the `passkeys` config file.
