---
title: Introduction
weight: 1
---

This package provides a simple way to generate passkeys using a Livewire component. It also contains a Blade component that can authenticate your users using passkeys.

## Passkeys in action

Passkeys let you log in without needing a password. Instead of a password, you can generate a passkey which will be stored in 1Pass, MacOS' password app, or alternative app on your favourite OS.

Here's how it looks like when creating a passkey on [Mailcoach](https://mailcoach.app), which uses spatie/laravel-passkeys under the hood.

<video width="640" height="360" controls>
  <source src="https://spatie.be/videos/passkeys/create-passkey.mp4" type="video/mp4">
  Your browser does not support the video tag.
</video>

And here's what logging in on Mailcoach using a passkeys looks like. Note that your don't have to type in your email address or password. You just need to click the "Log in with passkey" and let 1Pass (or alternative app) do the rest.

<video width="640" height="360" controls>
  <source src="https://spatie.be/videos/passkeys/use-passkey.mp4" type="video/mp4">
  Your browser does not support the video tag.
</video>

## Demo application

We've provided [a demo application](https://github.com/spatie/laravel-passkeys-app) that uses this package to log in users using passkeys.

## Learning more

You can learn more about how passkeys work [here](https://www.dashlane.com/blog/what-is-a-passkey-and-how-does-it-work). There's also this wonderful course on Laracasts about [how to implement passkeys in Laravel](https://laracasts.com/series/add-passkeys-to-a-laravel-app).


