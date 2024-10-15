<?php 

To migrate the provided PHP script to Laravel’s MVC structure for a static CMS asset management project, you will follow these steps:

1. Setup Models and Migration

First, create a model for the User and Reseller entities.

Migration for Users Table

php artisan make:migration create_users_table --create=users

Migration File: database/migrations/xxxx_xx_xx_create_users_table.php

public function up()
{
    Schema::create('users', function (Blueprint $table) {
        $table->id();
        $table->string('username')->unique();
        $table->string('password');
        $table->string('email')->unique();
        $table->decimal('balance', 10, 2)->default(0);
        $table->text('ipurchassed')->nullable();
        $table->text('ip')->nullable();
        $table->timestamp('lastlogin')->nullable();
        $table->boolean('resseller')->default(0);
        $table->string('img')->nullable();
        $table->string('testemail')->nullable();
        $table->integer('resetpin')->default(0);
        $table->timestamps();
    });
}

Migration for Resellers Table

php artisan make:migration create_resellers_table --create=ressellers

Migration File: database/migrations/xxxx_xx_xx_create_resellers_table.php

public function up()
{
    Schema::create('ressellers', function (Blueprint $table) {
        $table->id();
        $table->string('username');
        $table->integer('unsoldb')->default(0);
        $table->integer('soldb')->default(0);
        $table->integer('isold')->default(0);
        $table->integer('iunsold')->default(0);
        $table->timestamp('activate');
        $table->string('btc')->nullable();
        $table->string('withdrawal')->nullable();
        $table->integer('allsales')->nullable();
        $table->integer('lastweek')->nullable();
        $table->timestamps();
    });
}

2. Create the Controller

Create a controller to handle the reseller activation logic.

php artisan make:controller Admin/ResellerController

Controller File: app/Http/Controllers/Admin/ResellerController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Reseller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResellerController extends Controller
{
    public function activate($id)
    {
        $user = User::findOrFail($id);

        if ($user->resseller) {
            return response()->json(['message' => 'Already a seller'], 400);
        }

        $user->resseller = 1;
        if ($user->save()) {
            $reseller = new Reseller();
            $reseller->username = $user->username;
            $reseller->activate = now();
            $reseller->save();

            return response()->json(['message' => 'Seller system is activated. Congrats!'], 200);
        }

        return response()->json(['message' => 'Error: System not activated'], 500);
    }
}

3. Define Routes

Add the necessary routes in routes/admin.php.

use App\Http\Controllers\Admin\ResellerController;

Route::post('/resellers/{id}/activate', [ResellerController::class, 'activate'])->middleware(['auth', 'isAdmin']);

4. Frontend Handling (Optional)

If you want to provide feedback to the user in the frontend, you can create a form that triggers this endpoint.

<form action="{{ route('admin.resellers.activate', $user->id) }}" method="POST">
    @csrf
    <button type="submit">Activate Reseller</button>
</form>

5. Documentation

Document your code properly for better understanding and maintenance. Here’s a basic format:

# Reseller Activation Documentation

## Overview
This functionality allows admins to activate a user as a reseller.

## Model
- **User**: Represents a user in the system.
- **Reseller**: Represents the reseller information.

## Controller
### `ResellerController`
- **activate($id)**: Activates a user as a reseller.

## Routes
- **POST /admin/resellers/{id}/activate**: Activates a reseller by ID.

## Usage
Make a POST request to activate a reseller.

Conclusion

This setup aligns with Laravel’s MVC structure and allows for proper management of reseller activation while maintaining best practices in code organization.
