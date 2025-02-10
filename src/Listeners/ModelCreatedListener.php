<?
namespace Pawan\RolesPerm\Listeners;

use Illuminate\Console\Events\CommandStarting;
use Illuminate\Support\Facades\Log;
use Pawan\RolesPerm\Models\Permission; // Reference your Permission model
use Pawan\RolesPerm\Services\PermissionService;
class ModelCreatedListener
{
    public function handle(CommandStarting $event)
    {
        if ($event->command === 'make:model') {
            $arguments = $event->input;
            $modelName = $arguments[0] ?? null;

        $excluded_models = [
        'Group','GroupPermission','Permission','UserGroup','UserPermission'];
            if ($modelName) {
                if(!in_array($modelName,$excluded_models))
                    $this->createPermission($modelName);
            }
        }
    }

    protected function createPermission($modelName)
    {
        // $permission_type=['create', 'update', 'delete','read'];
        $permissionService = new PermissionService();
        $permissionService->createPermissionForModel($modelName);
        Log::info("Permission created for model: $modelName");
    }
}
