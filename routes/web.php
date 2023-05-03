<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\TransactionController;
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
    return view(view:'welcome');
});

Auth::routes();

Route::get('/home', [
    App\Http\Controllers\HomeController::class,
    'index',
])->name('home');

Route::get('/Transaction', [
    App\Http\Controllers\TransactionController::class,
    'index',
])->name('Transaction');

// Route::get('/Member', [
//     App\Http\Controllers\MemberController::class,
//     'index',
// ])->name('Member');

// Route::get('/Publisher', [
//     App\Http\Controllers\PublisherController::class,
//     'index',
// ])->name('Publisher');


// Route::get('/book', [
//     App\Http\Controllers\BookController::class,
//     'index',
// ])->name('Book');

// Route::get('/catalog', [CatalogController::class, 'index'])->name('catalogIndex');
// Route::get('/catalog/create', [CatalogController::class, 'create'])->name('catalogCreate');
// Route::post('/catalog', [CatalogController::class, 'store'])->name('catalogStore');
// Route::get('/catalog/{id}/edit', [CatalogController::class, 'edit'])->name('catalogEdit');
// Route::put('/catalog/{id}', [CatalogController::class, 'update'])->name('catalogUpdate');
// Route::delete('/catalog/{id}', [CatalogController::class, 'destroy'])->name('catalogDestroy');


Route::get('/catalogs', [
    App\Http\Controllers\CatalogController::class,
    'index',
]);

Route::get('catalogs/create', [
    App\Http\Controllers\CatalogController::class,
    'create',
]);

Route::post('/catalogs', [
    App\Http\Controllers\CatalogController::class,
    'store',
]);

Route::get('catalogs/{catalog}/edit', [
    App\Http\Controllers\CatalogController::class,
    'edit',
]);
Route::put('/catalogs/{catalog}', [
    App\Http\Controllers\CatalogController::class,
    'update',
]);
Route::delete('/catalogs/{catalog}', [
    App\Http\Controllers\CatalogController::class,
    'destroy',
]);






// Route::get('/Author', [
//     App\Http\Controllers\AuthorController::class,
//     'index',
// ])->name('Author');

// Route::put('/Author/{Author}', [
//     App\Http\Controllers\AuthorController::class,
//     'update',
// ])->name('Author');

// Route::post('/Author', [
//     App\Http\Controllers\AuthorController::class,
//     'store',
// ])->name('Author');

Route::get('/api/authors', [
    App\Http\Controllers\AuthorController::class,
    'api',
]);

Route::get('/api/publisher', [
    App\Http\Controllers\PublisherController::class,
    'api',
]);
 
Route::get('/api/member', [
    App\Http\Controllers\MemberController::class,
    'api',
]);

Route::get('/api/books', [
    App\Http\Controllers\BookController::class,
    'api',
]);

// Route::delete('/Author/{Author}', [
//     App\Http\Controllers\AuthorController::class,
//     'destroy',
// ])->name('Author');

//Route::resource('/catalog',App\Http\Controllers\CatalogController::class);
Route::resource('/authors',App\Http\Controllers\AuthorController::class);

Route::resource('/Publisher',App\Http\Controllers\PublisherController::class);

Route::resource('/member',App\Http\Controllers\MemberController::class);

Route::resource('/books',App\Http\Controllers\BookController::class);

// Route::get('list/books', [BookController::class, 'index']);
// Route::get('get-books', [BookController::class, 'get_data']);

// Route::get('/books',[App\Http\Controllers\BookController::class,'index']);
// Route::post('/books/store',[App\Http\Controllers\BookController::class ,'store']);
// Route::get('/books/edit/{id}',[App\Http\Controllers\BookController::class ,'editbooks']);
// Route::put('/books/update/{id}',[App\Http\Controllers\BookController::class ,'updatebooks']);
// Route::delete('/books/delete/{id}',[App\Http\Controllers\BookController::class,'deletebooks']);

//Route::get('/api/Author',App\Http\Controllers\AuthorController::class,'api');


// Route::get('{any}', function () {
//     return view('layouts.app');
// })->where('any', '.*');
?>
