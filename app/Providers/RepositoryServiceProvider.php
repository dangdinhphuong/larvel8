<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(\App\Repositories\Interfaces\UserRepository::class, \App\Repositories\Eloquent\UserRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Interfaces\CategoryRepository::class, \App\Repositories\Eloquent\CategoryRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Interfaces\PostRepository::class, \App\Repositories\Eloquent\PostRepositoryEloquent::class);

        $this->app->bind(\App\Repositories\Interfaces\ContactRepository::class, \App\Repositories\Eloquent\ContactRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Interfaces\ContactInfoRepository::class, \App\Repositories\Eloquent\ContactInfoRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Interfaces\PostTranslationRepository::class, \App\Repositories\Eloquent\PostTranslationRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Interfaces\CategoryTranslationRepository::class, \App\Repositories\Eloquent\CategoryTranslationRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Interfaces\ContactInfoTranslationRepository::class, \App\Repositories\Eloquent\ContactInfoTranslationRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Interfaces\PartnerRepository::class, \App\Repositories\Eloquent\PartnerRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Interfaces\PermissionRepository::class, \App\Repositories\Eloquent\PermissionRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Interfaces\RoleRepository::class, \App\Repositories\Eloquent\RoleRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Interfaces\PasswordResetRepository::class, \App\Repositories\Eloquent\PasswordResetRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Interfaces\ConfigRepository::class, \App\Repositories\Eloquent\ConfigRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Interfaces\ConfigTranslationRepository::class, \App\Repositories\Eloquent\ConfigTranslationRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Interfaces\SliderTranslationRepository::class, \App\Repositories\Eloquent\SliderTranslationRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Interfaces\SliderRepository::class, \App\Repositories\Eloquent\SliderRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Interfaces\EmailSubscriberRepository::class, \App\Repositories\Eloquent\EmailSubscriberRepositoryEloquent::class);
        //:end-bindings:
    }
}
