---
title: Usage in Inertia
weight: 5
---

Currently, the package doesn't provide dedicated components for Inertia-based apps. However, you can still use the
package's features in your Inertia applications by creating your own components that utilize the package's action
classes.

Here’s a simple guide on how package user [Dan Matthews](https://bsky.app/profile/danmatthews.me) [added passkeys to this InertiaJS app](https://danmatthews.me/posts/implementing-passkeys-in-inertiajs-using-spaties-new-passkeys-package-eb480). The guide uses Svelte, but the same principles apply to Vue or React.

## Listing, creating and deleting the user's passkeys

In your user’s settings area, or on a page of your choosing, return the user’s current passkeys to your inertia
component.

Make sure you don't return the data or credential_id columns as they can play havoc with JSON encoding:

```php
$user = auth()->user();

return Inertia::render('Profile/Settings', [
    'user' => $user,
    'passkeys' => 'passkeys' => $user->passkeys()
			->get()
			->map(fn ($key) => $key->only(['id', 'name', 'last_used_at'])),
]);
```

To create and delete passkeys you need to add a few more methods and routes to your profile controller or to a new Passkeys specific controller. Also make sure to protect the routes with the `auth` middleware. 

```php
// POST profile.passkeys.create
public function storePassKey();

// DELETE profile.passkeys.delete
public function deletePasskey(string $id); 

// GET profile.passkeys.generate-options
public function generatePasskeyOptions(); 
```

In your `Settings` component, add a section for passkeys which list out the existing ones, and also have a button for adding a new one.

```js
<script>
    import {router} from '@inertiajs/svelte';

    async function addPassKey() {
        const response = await fetch(window.route("profile.passkeys.generate-options"));
        const options = await response.json();
        const startAuthenticationResponse = await window.startRegistration(options);
        router.post(
            window.route("profile.passkeys.store"),
            {
                options: JSON.stringify(options),
                passkey: JSON.stringify(startAuthenticationResponse)
            }
        );
    }

    function deletePasskey(id) {
        if (confirm("Are you SURE you want to delete this passkey?")) {
            router.delete(
                window.route("profile.passkeys.delete", {id})
            );
        }
    }
</script>

{#if passkeys?.length > 0}
    <h2 class="mb-4 font-bold">Your passkeys:</h2>
    <div class=" divide-y">
        {#each passkeys as passkey}
            <div class="flex justify-between items-center py-2">
                <div>
                    <p>Name: {passkey.name}</p>
                    <p>Last used at: {passkey.last_used_at || 'Never'}</p>
                </div>
                <button on:click={() => deletePasskey(passkey.id)}>Delete</button>
            </div>
        {/each}
    </div>
{/if}

<button
        class="btn"
        on:click|preventDefault={addPassKey}
>
    Add a passkey
</button>
```

First, you’ll need to implement the `profile.passkeys.generate-options route`. This routes generates a JSON string of credentials **contextual to the logged in user** that are used to generate and store the passkeys.

Implement the generatePasskeyOptions function in your controller:

```php
public function generatePasskeyOptions()
{
    $generatePassKeyOptionsAction = app(GeneratePasskeyRegisterOptionsAction::class);
    
    return $generatePassKeyOptionsAction->execute(auth()->user());
}
```

This generates and returns the options to your front-end. Once this is returned to the front-end, you can pass this to your `profile.passkeys.create` route:

```js
router.post(
    window.route("profile.passkeys.store"),
    {
        options: JSON.stringify(options),
        passkey: JSON.stringify(startAuthenticationResponse)
    }
);
```

It might look slightly strange that we’re calling `JSON.stringify` here, but on the server side, there are a few methods that expect these values as JSON strings, rather than objects.

Now you can store the passkey:

```php
$data = request()->validate([
    'passkey' => 'required|json',
    'options' => 'required|json',
]);

$user = auth()->user();
$storePasskeyAction = app(StorePasskeyAction::class);

try {
    $storePasskeyAction->execute(
        $user,
        $data['passkey'],
        $data['options'],
        request()->getHost(),
        ['name' => Str::random(10)],
    );

	// Redirect back
	return redirect()->back();

} catch (Throwable $e) {
    throw ValidationException::withMessages([
        'name' => __('passkeys::passkeys.error_something_went_wrong_generating_the_passkey'),
    ]);
}
```

And that’s it! the passkey should now appear in the `passkeys` table, attached to your user.

Now you should add a route for deleting a passkey, so a user can remove one if it’s no longer in use:

```php
public function deletePasskey(string $id)
{
    auth()->user()->passkeys()->where('id', $id)->delete();
    flash()->success('Passkey deleted successfully');

    return redirect()->back();
}
```

## Allowing people to log in using passkeys

Add a new button in your `Login` component to allow people to log in using passkeys.

```js
<button on:click={withPassKey}>Authenticate with a passkey</button>
```

And make it call the following function:

```js
async function withPassKey() {
    const response = await fetch(window.route("passkeys.authentication_options"));

    const options = await response.json();

    const startAuthenticationResponse = await window.startAuthentication({ optionsJSON: options });

    router.post(window.route("passkeys.login"), {
        start_authentication_response: JSON.stringify(
            startAuthenticationResponse
        )
    });
}
```

`passkeys.login` is a route provided by the package that accepts a POST request with the `start_authentication_response` parameter (also, again, a JSON string).

This should log your user in using their passkey, and redirect you to the URL set in the `config/passkeys.php` file.
