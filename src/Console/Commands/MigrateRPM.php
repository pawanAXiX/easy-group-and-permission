<?php

namespace Pawan\RolesPerm\Console\Commands;


use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class MigrateRpm extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'migrate:rpm'; // This will be the custom command, like "php artisan migrate rpm"

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run migrations for RPM package';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        // You can add any pre-migration logic here if needed

        // Run the migration command
        $this->info('Running RPM migrations...');
        
        Artisan::call('migrate', [
            '--path' => 'vendor/your-package-name/src/database/migrations',  // Path to  migrations
            '--force' => true  // Ensure that migrations run without confirmation (needed in production)
        ]);

        $this->info('RPM migrations completed.');
    }
}
