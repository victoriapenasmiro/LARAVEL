<?php

namespace App\Providers;

use App\Models\Contacto;
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
        'App\Models\Contacto' => 'App\Policies\ContactoPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        //cuando se llama a una gate de este listado se ejecutan primero las que ponen before
        //Si un Gate::before devuelve false, significa que directamente se abortará la ejecución
        //Si un gate devuelve true, luego se verifica el Gate::after. Pero si devolviera false, ya no se ejecutaría
        //el Gate::after
        //ver repo rafa --> https://github.com/Randionfernandez/comunidades/blob/randion/app/Providers/AuthServiceProvider.php
        $this->registerPolicies();

        //controlado a través de policies
        //Gate::define('is-admin', function($user){
            //return $user->email === 'mpenas@cifpfbmoll.eu' ? true : false;

            //optimizado + seguro
            //almacenamos en una variable el email del admin para que no pueda acceder nadie desde GIT
            //return $user->email === env('IS_ADMIN');
        //});

        Gate::define('check-language', function($user, $locale){

            if (! in_array($locale, ['en', 'es', 'ca'])) {
                abort(404);
            }

            App::setLocale($locale);

            return true;
        });
    }
}
