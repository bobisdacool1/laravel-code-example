<?php

use Illuminate\Database\Migrations\Migration;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreateAdministratorPermissions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $role = Role::create(['name' => 'Administrator']);
        $permission = Permission::create(['name' => 'edit article']);

        $role->givePermissionTo($permission);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     * @noinspection PhpUndefinedMethodInspection
     */
    public function down()
    {
        Role::findByName('Administrator')->forceDelete();
        Permission::findByName('edit article')->forceDelete();
    }
}
