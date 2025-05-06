---
title: Generating passkeys
weight: 2
---

The package provides a Livewire component to generate a passkey. It is able to create a passkey for the currently logged in user. It will also show all generated passkeys.

You can include this component in your views.

```html
<livewire:passkeys />
```

Here's what the component looks like by default:

![image](/docs/laravel-passkeys/v1/images/passkey-list.png)

The layout is intentionally very basic, you can [style it](/docs/laravel-passkeys/v1/basic-usage/styling-the-components) as you like it yourself.

When creating a passkey, your favorite password manager should kick in to save the passkey. 

![image](/docs/laravel-passkeys/v1/images/save-passkey.png)

