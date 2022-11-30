<?php

namespace App\Providers;


use App\Http\IRepositories\ILoginRepository;
use App\Http\Repository\LoginRepository;
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

        $this->app->bind(ILoginRepository::class, LoginRepository::class);



    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
