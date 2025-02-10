<?php
namespace Pawan\RolesPerm\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Pawan\RolesPerm\Services\PermissionService;
class CreatePermissionsForExistingModels extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'permissions:create-existing'; // Custom command

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create permissions for all existing models in the app/Models directory';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $this->info("Starting to create permissions for existing models...");

        $modelsDirectory = app_path('Models');
        
        $modelFiles = File::allFiles($modelsDirectory);

        foreach ($modelFiles as $modelFile) {
            $modelClass = 'App\\Models\\' . pathinfo($modelFile, PATHINFO_FILENAME);

            if (class_exists($modelClass)) {
                $this->createPermissionForModel($modelClass);
            }
        }

        $this->info("Permissions for existing models created successfully.");
    }

    /**
     * Create permissions for the given model class.
     *
     * @param string $modelClass
     * @return void
     */
    protected function createPermissionForModel($modelClass)
    {
        // Assuming you have a permission service that handles permission creation
        $permissionService = new PermissionService();
        $permissionService->createPermissionForModel($modelClass);

    }
}
