---
title: Authentication using passkeys
weight: 3
---

To let your users authenticate using a passkey, you can include the `authenticate-passkey` Blade component in your view, typically on your login view. 


```html 
<x-authenticate-passkey />
```

Make sure to add this component outside any form, as under the hood the component will render a form element of its own.

Here's what the component looks like by default:

![image](/docs/laravel-passkeys/v1/images/login-link.png)

The layout is intentionally very basic, you can [style it](/docs/laravel-passkeys/v1/basic-usage/styling-the-components) as you like it yourself.

This component will show a link that, when clicked, will start the passkey authentication process.

![image](/docs/laravel-passkeys/v1/images/passkey-offered.png)

## Redirection after login

If the authentication is successful, the user will be redirected to the URL specified in the  `redirect_to_after_login` key of the `passkeys` config file.

Alternatively, you can pass a URL to the `redirect` prop of the component.

```html
<x-authenticate-passkey redirect="/dashboard" />
```    
