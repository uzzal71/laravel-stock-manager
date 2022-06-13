# laravel 9 Stock Manager
This project simple stock management system. Module List here below
1. Item
2. Check-ins
3. Check-outs
4. People
5. Settings
6. Admin

## Step 1 : Laravel 9 project create

```
composer create-project --prefer-dist laravel/laravel laravel-spatie-permission
```
Run your project
```
php artisan serve
```
Goto your favorite browser
```
127.0.0.1:8000
```

## Step 2 : Laravel 9 Create Authentication
Now, we need to generate auth scaffolding in laravel 9 using the laravel UI command.

```
composer require laravel/ui
```
Install bootstrap auth using the below command.
```
php artisan ui bootstrap --auth
```
Now, install npm and run dev for better UI results.
```
npm install
npm run dev
```

## Step 3 : Install Composer Packages
Now, we will install spatie package for ACL.
```
composer require spatie/laravel-permission
```
Also, install the form collection package using the below command.
composer require laravelcollective/html
Optional: The service provider will automatically get registered. Or you may manually add the service provider in your config/app.php file.
```
'providers' => [
	....
	Spatie\Permission\PermissionServiceProvider::class,
],
```
Now, publish this package as below.
```
php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
```

Now you can see permission.php file and one migrations. So, we need to run migration using the following command.

```
php artisan migrate
```

## Step 4 : Create Organization Migration file, factory and seeder file

#### In this step, Create migration for the item table.

```
php artisan make:model Organization -mfs
```

#### Open orgination migration file
```
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organizations', function (Blueprint $table) {
            $table->id();
            $table->string('site_name');
            $table->string('mobile');
            $table->string('email')->nullable();
            $table->text('address')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('organizations');
    }
};

```

#### Open Organization Model File
```
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use HasFactory;

    protected $fillable = ['site_name', 'mobile'];
}

```

#### Open OrganizationFactory

```
<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Organization>
 */
class OrganizationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'site_name' => 'Stock Manager',
            'mobile' => '+880 1788574569',
            'email' => 'stock@gmail.com',
            'address' => 'Uttara, Dhaka, Bangladesh',
        ];
    }
}

```

#### Open OrganizationSeeder

```
<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrganizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Organization::factory()->times(1)->create();
    }
}

```

## Step 5 : Create Category Migration file, factory and seeder file

#### In this step, Create migration for the item table.

```
php artisan make:model Category -mfs
```

## Step 6 : Create Brand Migration file, factory and seeder file

#### In this step, Create migration for the item table.

```
php artisan make:model Brand -mfs
```

## Step 7 : Create Barcode Migration file, factory and seeder file

#### In this step, Create migration for the item table.

```
php artisan make:model Barcode -mfs
```

## Step 8 : Create Customer Migration file, factory and seeder file

#### In this step, Create migration for the item table.

```
php artisan make:model Customer -mfs
```

## Step 9 : Create Supplier Migration file, factory and seeder file

#### In this step, Create migration for the item table.

```
php artisan make:model Supplier -mfs
```

## Step 10 : Create Item Migration file, factory and seeder file

#### In this step, Create migration for the item table.

```
php artisan make:model Item -mfs
```

## Step 11 : Create CheckIn Migration file, factory and seeder file

#### In this step, Create migration for the item table.

```
php artisan make:model CheckIn -mfs
```

## Step 12 : Create CheckInDetail Migration file, factory and seeder file

#### In this step, Create migration for the item table.

```
php artisan make:model CheckInDetail -mfs
```

## Step 13 : Create CheckOut Migration file, factory and seeder file

#### In this step, Create migration for the item table.

```
php artisan make:model CheckOut -mfs
```

## Step 14 : Create CheckOutDetail Migration file, factory and seeder file

#### In this step, Create migration for the item table.

```
php artisan make:model CheckOutDetail -mfs
```
