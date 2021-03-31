<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
// Interfaces
use App\RepositoryInterfaces\BaseRepositoryInterface;
use App\RepositoryInterfaces\Project\ProjectRepositoryInterface;

// repositories
use App\Repositories\BaseRepository;
use App\Repositories\Project\ProjectRepository;

class MainServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        //bind interface with the repository
        $this->app->bind(BaseRepositoryInterface::class, BaseRepository::class);
        $this->app->bind(ProjectRepositoryInterface::class, ProjectRepository::class);
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
