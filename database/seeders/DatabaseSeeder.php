<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run() {

		\App\Models\Admin::create([
			'name' => 'admin',
			'email' => 'test@test.com',
			'group_id' => 1,
			'password' => bcrypt(123456),
		]);

		if (class_exists(\App\Models\AdminGroupRole::class)) {
			if (class_exists(\App\Models\AdminGroup::class)) {
				if (\App\Models\AdminGroup::where('id', 1)->count() == 0) {
					\App\Models\AdminGroup::UpdateOrCreate([
						'admin_id' => 1,
						'group_name' => 'Full Permission - Admin',
					]);
				}
				// admingroups Role
				\App\Models\AdminGroupRole::UpdateOrCreate([
					'name' => 'admingroups',
					'admin_groups_id' => 1,
					'show' => 'yes',
					'add' => 'yes',
					'edit' => 'yes',
					'delete' => 'yes',
				]);
				// admins Role
				\App\Models\AdminGroupRole::UpdateOrCreate([
					'name' => 'admins',
					'admin_groups_id' => 1,
					'show' => 'yes',
					'add' => 'yes',
					'edit' => 'yes',
					'delete' => 'yes',
				]);
				// Settings Role
				\App\Models\AdminGroupRole::UpdateOrCreate([
					'name' => 'settings',
					'admin_groups_id' => 1,
					'show' => 'yes',
					'add' => 'no',
					'edit' => 'yes',
					'delete' => 'no',
				]);
				\App\Models\AdminGroupRole::UpdateOrCreate([
					'name' => 'contacts',
					'admin_groups_id' => 1,
					'show' => 'yes',
					'add' => 'no',
					'edit' => 'yes',
					'delete' => 'yes',
				]);
				\App\Models\AdminGroupRole::UpdateOrCreate([
					'name' => 'contacts',
					'admin_groups_id' => 2,
					'show' => 'yes',
					'add' => 'yes',
					'edit' => 'no',
					'delete' => 'no',
				]);
				\App\Models\AdminGroupRole::UpdateOrCreate([
					'name' => 'icousers',
					'admin_groups_id' => 1,
					'show' => 'yes',
					'add' => 'yes',
					'edit' => 'yes',
					'delete' => 'yes',
				]);
				\App\Models\AdminGroupRole::UpdateOrCreate([
					'name' => 'icos',
					'admin_groups_id' => 1,
					'show' => 'yes',
					'add' => 'yes',
					'edit' => 'yes',
					'delete' => 'yes',
				]);
				\App\Models\AdminGroupRole::UpdateOrCreate([
					'name' => 'voteplans',
					'admin_groups_id' => 1,
					'show' => 'yes',
					'add' => 'yes',
					'edit' => 'yes',
					'delete' => 'yes',
				]);
				\App\Models\AdminGroupRole::UpdateOrCreate([
					'name' => 'bfotplans',
					'admin_groups_id' => 1,
					'show' => 'yes',
					'add' => 'yes',
					'edit' => 'yes',
					'delete' => 'yes',
				]);
				\App\Models\AdminGroupRole::UpdateOrCreate([
					'name' => 'users',
					'admin_groups_id' => 1,
					'show' => 'yes',
					'add' => 'yes',
					'edit' => 'yes',
					'delete' => 'yes',
				]);
				\App\Models\AdminGroupRole::UpdateOrCreate([
					'name' => 'reactions',
					'admin_groups_id' => 1,
					'show' => 'yes',
					'add' => 'yes',
					'edit' => 'yes',
					'delete' => 'yes',
				]);
				\App\Models\AdminGroupRole::UpdateOrCreate([
					'name' => 'comments',
					'admin_groups_id' => 1,
					'show' => 'yes',
					'add' => 'yes',
					'edit' => 'yes',
					'delete' => 'yes',
				]);
				\App\Models\AdminGroupRole::UpdateOrCreate([
					'name' => 'blogs',
					'admin_groups_id' => 1,
					'show' => 'yes',
					'add' => 'yes',
					'edit' => 'yes',
					'delete' => 'yes',
				]);
				\App\Models\AdminGroupRole::UpdateOrCreate([
					'name' => 'joinedusers',
					'admin_groups_id' => 1,
					'show' => 'yes',
					'add' => 'yes',
					'edit' => 'yes',
					'delete' => 'yes',
				]);
				\App\Models\AdminGroupRole::UpdateOrCreate([
					'name' => 'socials',
					'admin_groups_id' => 1,
					'show' => 'yes',
					'add' => 'yes',
					'edit' => 'yes',
					'delete' => 'yes',
				]);
				\App\Models\AdminGroupRole::UpdateOrCreate([
					'name' => 'infos',
					'admin_groups_id' => 1,
					'show' => 'yes',
					'add' => 'yes',
					'edit' => 'yes',
					'delete' => 'yes',
				]);
				\App\Models\AdminGroupRole::UpdateOrCreate([
					'name' => 'banners',
					'admin_groups_id' => 1,
					'show' => 'yes',
					'add' => 'yes',
					'edit' => 'yes',
					'delete' => 'yes',
				]);
				\App\Models\AdminGroupRole::UpdateOrCreate([
					'name' => 'slides',
					'admin_groups_id' => 1,
					'show' => 'yes',
					'add' => 'yes',
					'edit' => 'yes',
					'delete' => 'yes',
				]);
				\App\Models\AdminGroupRole::UpdateOrCreate([
					'name' => 'pages',
					'admin_groups_id' => 1,
					'show' => 'yes',
					'add' => 'yes',
					'edit' => 'yes',
					'delete' => 'yes',
				]);
				\App\Models\AdminGroupRole::UpdateOrCreate([
					'name' => 'page',
					'admin_groups_id' => 1,
					'show' => 'yes',
					'add' => 'yes',
					'edit' => 'yes',
					'delete' => 'yes',
				]);
				\App\Models\AdminGroupRole::UpdateOrCreate([
					'name' => 'admin',
					'admin_groups_id' => 1,
					'show' => 'yes',
					'add' => 'yes',
					'edit' => 'yes',
					'delete' => 'yes',
				]);


				\App\Models\AdminGroupRole::UpdateOrCreate([
					'name' => 'icousers',
					'admin_groups_id' => 2,
					'show' => 'yes',
					'add' => 'no',
					'edit' => 'no',
					'delete' => 'no',
				]);
				\App\Models\AdminGroupRole::UpdateOrCreate([
					'name' => 'icos',
					'admin_groups_id' => 2,
					'show' => 'yes',
					'add' => 'no',
					'edit' => 'no',
					'delete' => 'no',
				]);
				\App\Models\AdminGroupRole::UpdateOrCreate([
					'name' => 'voteplans',
					'admin_groups_id' => 2,
					'show' => 'yes',
					'add' => 'no',
					'edit' => 'no',
					'delete' => 'no',
				]);
				\App\Models\AdminGroupRole::UpdateOrCreate([
					'name' => 'bfotplans',
					'admin_groups_id' => 2,
					'show' => 'yes',
					'add' => 'no',
					'edit' => 'no',
					'delete' => 'no',
				]);
				\App\Models\AdminGroupRole::UpdateOrCreate([
					'name' => 'reactions',
					'admin_groups_id' => 2,
					'show' => 'yes',
					'add' => 'no',
					'edit' => 'no',
					'delete' => 'no',
				]);
				\App\Models\AdminGroupRole::UpdateOrCreate([
					'name' => 'comments',
					'admin_groups_id' => 2,
					'show' => 'yes',
					'add' => 'no',
					'edit' => 'no',
					'delete' => 'no',
				]);
				\App\Models\AdminGroupRole::UpdateOrCreate([
					'name' => 'blogs',
					'admin_groups_id' => 2,
					'show' => 'yes',
					'add' => 'no',
					'edit' => 'no',
					'delete' => 'no',
				]);
			}
		}
	}
}
