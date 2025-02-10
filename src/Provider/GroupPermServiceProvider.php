<?php
namespace Pawan\RolesPerm\Provider;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Model;
use Pawan\RolesPerm\Middleware\CheckPermission;
use Pawan\RolesPerm\Models\Permission;
use Pawan\RolesPerm\Providers\EventServiceProvider;
use Pawan\RolesPerm\Traits\HasGroupAndPerrmission;
use Illuminate\Database\Eloquent\Model\BelongsToMany;
class GroupPermServiceProvider extends ServiceProvider
{
    public function boot()
    {
       
        $this->publishes([
            __DIR__ . '/../config/rolesgroup.php' => config_path('rolesgroup.php'),
        ], 'config');
        $userModelClass=config('rolesgroup.user_model');

        $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');
        Route::aliasMiddleware('rpm', CheckPermission::class);
        
    }


    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../../config/rolesperm.php', 'rolesperm');
        $this->app->register(EventServiceProvider::class);
    }
}
