<?php
namespace Pawan\RolesPerm\Services;

use Pawan\RolesPerm\Models\Permission; // Assuming this is the model for your permissions

class PermissionService
{
    /**
     * Create a permission for a model.
     *
     * @param string $modelClass
     * @return void
     */
    public function createPermissionForModel($modelName)
    {
        // Check if permission already exists for this model
        $permissionExists = Permission::where('model', $modelName)->exists();
        $permission_type=['create', 'update', 'delete','read'];
        if (!$permissionExists) {
            foreach($permission_type as $type){
                Permission::create([
                    'name' =>$permission_type.' '.strtolower($modelName).' data',
                    'content_type' => $modelName,
                    'codename' => $permission_type.'_'.strtolower($modelName),
                ]);
            }
            $this->info("Created permission for model: " . $modelClass);
        }
    }
}
