<?php

use Spatie\LaravelPasskeys\Support\Config;
use Spatie\LaravelPasskeys\Actions\GeneratePasskeyRegisterOptionsAction;
use Spatie\LaravelPasskeys\Actions\StorePasskeyAction;
use Spatie\LaravelPasskeys\Actions\GeneratePasskeyAuthenticationOptionsAction;
use Spatie\LaravelPasskeys\Actions\FindPasskeyToAuthenticateAction;

it('can get the model classes', function () {
    expect(Config::getPassKeyModel())->not()->toBeNull();

    expect(Config::getAuthenticatableModel())->not()->toBeNull();
});

it('can get the default relying party configuration', function () {
    expect(Config::getRelyingPartyName())->not()->toBeNull();

    expect(Config::getRelyingPartyId())->not()->toBeNull();

    expect(Config::getRelyingPartyIcon())->toBeNull();
});

it('can get the default action classes', function () {
    expect(Config::getActionClass('generate_passkey_register_options', GeneratePasskeyRegisterOptionsAction::class))->not->toBeNull()->toBe(GeneratePasskeyRegisterOptionsAction::class);

    expect(Config::getActionClass('store_passkey', StorePasskeyAction::class))->not->toBeNull()->toBe(StorePasskeyAction::class);

    expect(Config::getActionClass('generate_passkey_authentication_options', GeneratePasskeyAuthenticationOptionsAction::class))->not->toBeNull()->toBe(GeneratePasskeyAuthenticationOptionsAction::class);

    expect(Config::getActionClass('find_passkey', FindPasskeyToAuthenticateAction::class))->not->toBeNull()->toBe(FindPasskeyToAuthenticateAction::class);
});
