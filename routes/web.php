<?php

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Spatie\QueryBuilder\QueryBuilder;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users', function () {

    // Advance queries endpoints
    //-------------------------
    // including role model
    // select fields from user model
    // select fields from role model

    $users = QueryBuilder::for(User::class)->allowedFilters('name')
        ->allowedSorts('name')
        ->allowedAppends(['name_in_uppercase'])
        ->allowedFields(['name', 'email', 'role_id', 'role.id', 'role.name'])
        ->allowedIncludes(['role'])
        ->jsonPaginate();

    return UserResource::collection($users);

});
