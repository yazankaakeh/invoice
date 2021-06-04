<?php
use Illuminate\Database\Seeder;
use App\models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class CreateAdminUserSeeder extends Seeder
{
/**
* Run the database seeds.
*
* @return void
*/
public function run()
{
$user = User::create([
'name' => 'Yazan1 Kaakeh',
'email' => 'admin1@admin.com',
'status' => 'مفعل',
'password' => bcrypt('asd123asd')
]);
$role = Role::create(['name' => 'Admin']);
$permissions = Permission::pluck('id','id')->all();
$role->syncPermissions($permissions);
$user->assignRole([$role->id]);

$user = User::create([
'name' => 'Yazan1 Kaakeh',
'email' => 'yazaka187@gmail.com',
'status' => 'مفعل',
'password' => bcrypt('asd123asd')
]);

}
}
