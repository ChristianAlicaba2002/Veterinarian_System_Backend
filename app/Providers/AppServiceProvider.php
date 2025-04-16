<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Domain\Client\ClientRepository;
use App\Domain\Pet\PetRepository;
use App\Infrastructure\Persistence\Eloquent\Pet\EloquentPetRepository;
use App\Infrastructure\Persistence\Eloquent\CLient\EloquentClientRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ClientRepository::class, EloquentClientRepository::class);
        $this->app->bind(PetRepository::class, EloquentPetRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
