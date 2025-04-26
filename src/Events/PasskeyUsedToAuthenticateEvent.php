<?php

namespace Spatie\LaravelPasskeys\Events;

use Spatie\LaravelPasskeys\Models\Passkey;
use Spatie\LaravelPasskeys\Http\Requests\AuthenticateUsingPasskeysRequest;

class PasskeyUsedToAuthenticateEvent
{
    public function __construct(
        public Passkey $passkey,
        public AuthenticateUsingPasskeysRequest $request,
    ) {}
}
