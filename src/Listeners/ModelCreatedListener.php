<?
namespace Pawan\RolesPerm\Listeners;

use Illuminate\Console\Events\CommandStarting;
use Illuminate\Support\Facades\Log;
use Pawan\RolesPerm\Models\Permission; // Reference your Permission model

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
        $permission_type=['create', 'update', 'delete','read'];
        foreach ($permission_type as $type) {
            Permission::create([
                'name' =>$permission_type.' '.strtolower($modelName).' data',
                'content_type' => $modelName,
                'codename' => $permission_type.'_'.strtolower($modelName),
            ]);
    
        }
        
        Log::info("Permission created for model: $modelName");
    }
}
