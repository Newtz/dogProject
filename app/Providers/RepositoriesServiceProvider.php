<?php

namespace App\Providers;

use App\Interfaces\PostRepositoryInterface;
use App\Repositories\PostRepository;
use App\Interfaces\ImageRepositoryInterface;
use App\Repositories\ImageRepository;
use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider
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
        $this->app->bind(PostRepositoryInterface::class, PostRepository::class);
        $this->app->bind(ImageRepositoryInterface::class, ImageRepository::class);
    }
}
