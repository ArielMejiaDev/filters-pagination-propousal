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

    // Intermediate queries endpoints
    //-------------------------
    // adding filters with a scope (yesterday_user would search a user created yesterday by name)
    // adding alias to filter scope (nameOfYesterday as yesterday_user)
    // adding alias to sorts (user as username)
    // adding append to an accessor (to show name in uppercase)

    $users = QueryBuilder::for(User::class)->allowedFilters(['name', \Spatie\QueryBuilder\AllowedFilter::scope('yesterday_user', 'nameOfYesterday')])
        ->allowedSorts('name', \Spatie\QueryBuilder\AllowedSort::field('username', 'name'))
        ->allowedFields(['name', 'email'])
        ->allowedAppends(['name_in_uppercase'])
        ->jsonPaginate();

    return UserResource::collection($users);

});
