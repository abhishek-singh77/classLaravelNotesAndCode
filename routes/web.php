<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UriController;
use App\Http\Controllers\UserRegistration;
use App\Http\Controllers\ViewerController;
use App\Http\Controllers\CookieController;
use App\Http\Controllers\SessionController;
// use then directory of the controller then the name of controller


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

Route::get('/register',function(){
    return view('register');
});

Route::get('/testlocali/{lang}',function($lang){
    App::setlocale($lang);
    return view('testlocali');
});

Route::post('/user/register',
[UserRegistration::class,'postRegister']
);



/* Route::post('/user/register',[
    'uses' => 'UserRegistration@postRegister',
    'as' => 'register'
]);
 */

Route::get('/ourproducts', function(){
    $products = [['type'=>'Smartphone', 'model'=>"iPhone X", 'price'=>"$999.99"],
    ['type'=>'Watch', 'model'=>"FastTrack", 'price'=>"$1,199.99"],
    ['type'=>'Laptop', 'model'=>"MacBook Pro", 'price'=>"$1,999.99"]];
    return view('products', compact('products'));

});

Route::get('/user/{id}/{name}/profile', function($id, $name){
    return "I am a user ".$name." And my Id is".$id;
})->name('userProfile');

Route::get('/check', [ProfileController::class, 'check']);
Route::get('/check1/{id}/{name}', [ProfileController::class, 'check1']);

#Route::get('/user/profile', [ProfileController::class, 'show'])->name('profile');
#Route::get('/verifyuser', [ProfileController::class, 'verifyuser']);


Route::prefix('admin')->group(function () {
    Route::get('/users', function () {
        // Matches The "/admin/users" URL
        echo "This is the admin/users page";
    });
    Route::get('/faculties', function () {
        // Matches The "/admin/posts" URL
        echo "Hey faculties";
    });
});


Route::name('admin.')->group(function () {
    Route::get('/users', function () {
        // Route assigned name "admin.users"...
        echo "This is the admin/users page";
    })->name('users');

    Route::get('/faculties', function () {
        // Route assigned name "admin.faculties"...
        echo "Hey faculties";
    })->name('faculties');

});

Route::get('adminredirect', function () {
    return redirect()->route('admin.users');
});

Route::get('adminredirect2', function () {
    return redirect()->route('admin.faculties');
});

Route::get('/foo/bar', [UriController::class, 'index'])->name('random'); 

Route::get('/fooo/bar', [UriController::class, 'index']);

//for viewer controller

Route::get('/viewer', [ViewerController::class, 'index']);
//for viewer controller with optional parameter
Route::get('/viewer/{name?}{class?}', [ViewerController::class, 'index']);

Route::get('/cookie/set', [CookieController::class, 'setCookie']);
Route::get('/cookie/get', [CookieController::class, 'getCookie']);
Route::get('/cookie/delete', [CookieController::class, 'deleteCookie']);


//Route for sessoin controller with get put post delete
Route::get('/session/get', [SessionController::class, 'getSessionData']);
Route::get('/session/set', [SessionController::class, 'storeSessionData']);
Route::get('/session/delete', [SessionController::class, 'deleteSessionData']);
