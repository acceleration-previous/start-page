<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SetupPermissions extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// Create the basic roles and permissions
		$admin = new Role;
		$admin->name = 'Administrator';
		$admin->save();

		$user = new Role;
		$user->name = 'Standard User';
		$user->save();

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		// Remove Roles and Permissions
		DB::statement("SET foreign_key_checks = 0");
		DB::table('assigned_roles')->truncate();
		DB::table('permission_role')->truncate();
		DB::table('roles')->truncate();
		DB::table('permissions')->truncate();
		DB::statement("SET foreign_key_checks = 1");
	}

}
