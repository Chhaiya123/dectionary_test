<?php

namespace App\Providers;
use Illuminate\Support\ServiceProvider;

use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Contracts\Auth\Authenticatable as UserContract;

class AdminUserProvider extends ServiceProvider
{

     /**
     * Validate a user against the given credentials.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
     * @param  array  $credentials
     * @return bool
     */
    public function validateCredentials(UserContract $user, array $credentials): bool
    {
        if (is_null($plain = $credentials['password'])) {
            return false;
        }

        return $this->hasher->check($plain, $user->getAuthPassword(), ['salt' => $user->salt]);
    }
    /**
     * Register services.
     */
    // public function register(): void
    // {
    //     //
    // }

    /**
     * Bootstrap services.
     */
    // public function boot(): void
    // {
    //     //
    // }
}
