<?php

namespace Manggala\UniversalPanel\Commands;

use Illuminate\Console\Command;

class MakeRoleCommand extends Command
{
    protected $signature = 'make:role {--permissions= : Optional initial permissions, comma-separated} {names* : The name(s) of the role(s)}';

    protected $description = 'Create one or multiple new roles for Universal Panel';

    public function handle(): int
    {
        $namesInput = $this->argument('names');

        if (empty($namesInput)) {
            $input = $this->ask('Enter role name(s) (comma or space separated for multiple)');
            if (! empty($input)) {
                $namesInput = [$input];
            }
        }

        if (empty($namesInput)) {
            $this->error('Role name(s) cannot be empty!');
            return self::FAILURE;
        }

        // Merge array of names and handle both comma and space separation
        $rawString = is_array($namesInput) ? implode(' ', $namesInput) : (string) $namesInput;
        $roles = array_filter(array_map('trim', explode(',', str_replace(' ', ',', $rawString))));
        // Remove duplicates and empty items
        $roles = array_unique(array_filter($roles));

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
