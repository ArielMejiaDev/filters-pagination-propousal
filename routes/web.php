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

    // Simple queries endpoints
    //-------------------------
    // query to filter by name,
    // sort by name,
    // select on query strings name & email,
    // append a scope nameInUppercase
    // & paginate as json api specification requires

    $users = QueryBuilder::for(User::class)->allowedFilters('name')
        ->allowedSorts('name')
        ->allowedFields(['name', 'email'])
        ->allowedAppends(['name_in_uppercase'])
        ->jsonPaginate();

    return UserResource::collection($users);

});
