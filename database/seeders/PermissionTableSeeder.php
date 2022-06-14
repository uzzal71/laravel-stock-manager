<?php
  
namespace Database\Seeders;
  
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
  
class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
           'organizations.index',
           'organizations.show',
           'organizations.create',
           'organizations.edit',
           'organizations.delete',
           'users.index',
           'users.show',
           'users.create',
           'users.edit',
           'users.delete',
           'roles.index',
           'roles.show',
           'roles.create',
           'roles.edit',
           'roles.delete',
           'categories.index',
           'categories.show',
           'categories.create',
           'categories.edit',
           'categories.delete',
           'brands.index',
           'brands.show',
           'brands.create',
           'brands.edit',
           'brands.delete',
           'barcodes.index',
           'barcodes.show',
           'barcodes.create',
           'barcodes.edit',
           'barcodes.delete',
           'customers.index',
           'customers.show',
           'customers.create',
           'customers.edit',
           'customers.delete',
           'suppliers.index',
           'suppliers.show',
           'suppliers.create',
           'suppliers.edit',
           'suppliers.delete',
           'items.index',
           'items.show',
           'items.create',
           'items.edit',
           'items.delete',
           'checkins.index',
           'checkins.show',
           'checkins.create',
           'checkins.edit',
           'checkins.delete',
           'checkouts.index',
           'checkouts.show',
           'checkouts.create',
           'checkouts.edit',
           'checkouts.delete',
        ];
     
        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}