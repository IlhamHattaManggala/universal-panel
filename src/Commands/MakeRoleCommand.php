<?php

namespace Manggala\UniversalPanel\Commands;

use Illuminate\Console\Command;

class MakeRoleCommand extends Command
{
    protected $signature = 'make:role {names? : The name(s) of the role(s), comma-separated} {--permissions= : Optional initial permissions, comma-separated}';

    protected $description = 'Create one or multiple new roles for Universal Panel';

    public function handle(): int
    {
        $namesInput = $this->argument('names');

        if (empty($namesInput)) {
            $namesInput = $this->ask('Enter role name(s) (comma-separated for multiple)');
        }

        if (empty($namesInput)) {
            $this->error('Role name(s) cannot be empty!');
            return self::FAILURE;
        }

        $roles = array_filter(array_map('trim', explode(',', $namesInput)));

        if (empty($roles)) {
            $this->error('No valid role names provided!');
            return self::FAILURE;
        }

        $permissionsInput = $this->option('permissions');
        $permissions = [];
        if (! empty($permissionsInput)) {
            $permissions = array_filter(array_map('trim', explode(',', $permissionsInput)));
        }

        $roleModel = config('universal-panel.role_model', 'Manggala\\UniversalPanel\\Models\\Role');

        foreach ($roles as $roleName) {
            if (class_exists($roleModel)) {
                $roleModel::firstOrCreate(['name' => $roleName]);
            }
            $this->info(" [✓] Role [{$roleName}] created successfully!");
        }

        if (! empty($permissions)) {
            $this->info(' [i] Assigned permissions: ' . implode(', ', $permissions));
        }

        return self::SUCCESS;
    }
}
