<?php

namespace App\Providers;

use Carbon\CarbonImmutable;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Rules\Password;
use Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('admin', function ($user) {
            return $user->hasRole('admin');
        });

        Gate::define('editor', function ($user) {
            // if($user->roles->contains('name', 'admin')){
            //     return true;
            // }
            // return $user->roles->contains('name', 'editor');

            return $user->hasAnyRole(['admin', 'editor']);
        });

        Gate::define('author', function ($user) {
            // if($user->roles->contains('name', 'admin')){
            //     return true;
            // }
            // if($user->roles->contains('name', 'editor')){
            //     return true;
            // }
            // return $user->roles->contains('name', 'author');

            return $user->hasAnyRole(['admin', 'editor', 'author']);
        });

        Gate::define('secret', function($user){
            return request()->input('password') === 'secret';
        });

        $this->configureDefaults();
    }

    protected function configureDefaults(): void
    {
        Date::use(CarbonImmutable::class);

        DB::prohibitDestructiveCommands(
            app()->isProduction(),
        );

        Password::defaults(fn (): ?Password => app()->isProduction()
            ? Password::min(12)
                ->mixedCase()
                ->letters()
                ->numbers()
                ->symbols()
                ->uncompromised()
            : null
        );
    }
}
