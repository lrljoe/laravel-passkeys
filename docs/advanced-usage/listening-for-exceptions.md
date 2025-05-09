---
title: Listening for exceptions
weight: 4
---

There are several exceptions that may be thrown by the package:

## InvalidActionClass
This is thrown if you configure an Action that does not extend the default action

## InvalidAuthenticatableModel
This is thrown if your Authenticatable Model does not:
  - Implement HasPasskeys
  - Use the InteractsWithPasskeys trait

## InvalidPasskey
This is thrown if the Passkey model cannot be obtained/stored, due to invalid JSON, invalid AuthenticatorAttestationResponse, invalid Public Key Credentials etc

## InvalidPasskeyModel
This is thrown if the Passkey model does not extend Spatie\LaravelPasskeys\Models\Passkey::class

## InvalidPasskeyOptions
This is thrown if an invalid response is returned when trying to obtain the Authentication Options