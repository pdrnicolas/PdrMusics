<?php

namespace App\Providers;

use App\Models\Playlist;
use App\Repositories\Playlist\PlaylistEloquentRepository;
use App\Repositories\Playlist\PlaylistRepository;
use Illuminate\Support\ServiceProvider;

class PlaylistServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            PlaylistRepository::class,
            fn () => new PlaylistEloquentRepository(new Playlist())
        );

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
