<?php
namespace Pawan\RolesPerm\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Console\Events\CommandStarting;
use Pawan\RolesPerm\Listeners\ModelCreatedListener;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        CommandStarting::class => [
            ModelCreatedListener::class,
        ],
    ];
}
