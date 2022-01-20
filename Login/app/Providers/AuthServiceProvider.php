<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('is-admin', function($user){
            return $user->email === 'mpenas@cifpfbmoll.eu' ? true : false;
        });

        Gate::define('check-language', function($user, $locale){

            if (! in_array($locale, ['en', 'es', 'ca'])) {
                abort(403);
            }

            App::setLocale($locale);

            return true;
        });
    }
}
