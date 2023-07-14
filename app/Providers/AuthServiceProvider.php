<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Auth::viaRequest('custom-auth', function ($request) {
            // Any custom user-lookup logic here. For example:
            if ($request->token === 'asdasd123') {
                Log::debug("broadcast auth success");
                $user = new User();
                $user->id = 1;
                $user->email = 'aldi@mail.com';
                $user->name = 'aldi';
                $user->token = 'asdasd123';

                return $user;
            }

            Log::debug("broadcast auth failed");
            return null;
        });
    }
}
