---
title: Listening for events
weight: 3
---

The package fires the `Spatie\LaravelPasskeys\Events\PasskeyUsedToAuthenticateEvent` when a passkey is used to authenticate. It has a property `passkey` that contains the `Passkey` model that was used to authenticate, and `request` which contains the `AuthenticateUsingPasskeysRequest`.
