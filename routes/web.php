<?php

// use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\RatingController;
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

// Route::get('/', function () {
//     return view('movie',[
//         'movie' => [
//             [
//             'id'=> 1,
//             'title' => 'heheh'

//         ],[
//             'id' => 2,
//             'title' => 'sooooo'

//         ]
//     ]]);
// });



//            Movies             \\

Route::get('/', [MovieController::class,'index']);
Route::get('/movie/{id}', [MovieController::class,'show']);

Route::get('/movies/similar/{movie}', [MovieController::class,'similar_content']);

Route::get('/movies/manage', [MovieController::class,'manage'])->middleware('auth');

Route::post('/upload_movie', [MovieController::class,'upload'])->name('upload')->middleware('auth');
Route::get('/import_movie', [MovieController::class,'import'])->name('import')->middleware('auth');

Route::post('/movies/{movie}/vote',[MovieController::class,'vote'])->middleware('auth');


Route::post('/moviess',[MovieController::class,'store'])->middleware('auth');
Route::get('/movies/creat',[MovieController::class,'create'])->middleware('auth');

Route::get('/movies/{movie}/editt',[MovieController::class, 'edit'])->middleware('auth');
Route::put('movies/{movie}',[MovieController::class, 'update'])->middleware('auth');

Route::delete('moviies/{movie}',[MovieController::class, 'destroy'])->middleware('auth');


Route::resource('movies', 'MovieController');
Route::get('movies/{id}/download', [MovieController::class, 'download'])->name('movies.download')->middleware('auth');


// Route::get('/hello/{id}',function($id){
//     // ddd($id)
//     return response('<h1>post<h1>'.$id, 200);
//     // -> header('Content-Type','text/plain');
// })->where('id', '[0-9]+');

// Route::get('/search',function(Request $request){
// //    return response($request->names.' '.$request->city);
// return $request->names.' '.$request->city;
// });
Route::get('/listing/{id}', [ListingController::class,'show']);
Route::get('/listings/manage', [ListingController::class,'manage'])->middleware('auth');
Route::post('/listings',[ListingController::class,'store']);
Route::get('/listings/create',[ListingController::class,'create']);




Route::get('/listings/{listing}/edit',[ListingController::class, 'edit']);
Route::put('listings/{listing}',[ListingController::class, 'update']);


Route::delete('listings/{listing}',[ListingController::class, 'destroy']);


//            User            \\

Route::get('/register',[UserController::class, 'create'])->middleware('guest');
Route::post('/users',[UserController::class,'store']);

Route::post('/logout',[UserController::class,'logout'])->middleware('auth');
Route::get('/login', [UserController::class,'login'])->name('login')->middleware('guest');
Route::post('/users/authenticate', [UserController::class,'authenticate']);


Route::get('/users/manage', [UserController::class,'manage'])->middleware('auth');
Route::get('/user/{id}', [UserController::class,'show'])->middleware('auth');

// ->middleware('auth');
Route::delete('users/{user}',[UserController::class, 'destroy'])->middleware('auth');

#########
Route::put('users/{user}/recommended',[UserController::class, 'updateRecommendation']);
###############

Route::get('/users/{user}/edit',[UserController::class, 'edit'])->middleware('auth');
Route::put('users/{user}',[UserController::class, 'update'])->middleware('auth');


Route::post('/upload_user', [UserController::class,'upload'])->name('upload')->middleware('auth');
Route::get('/import_user', [UserController::class,'import'])->name('import')->middleware('auth');

Route::get('/users/{user}/ratings',[UserController::class, 'getRatings'])->middleware('auth');


Route::get('/users/{user}/edit_role',[UserController::class, 'edit_role'])->middleware('auth');
Route::put('users/{user}/update_role',[UserController::class, 'update_role'])->middleware('auth');

//            Rating            \\

Route::put('/ratings/{rating_id}',[RatingController::class,'update'])->middleware('auth');
Route::post('/ratings/{movie}',[RatingController::class,'store'])->middleware('auth');
Route::delete('/ratings/{rating_id}',[RatingController::class,'destroy'])->middleware('auth');
Route::post('/upload_rating', [RatingController::class,'upload'])->name('upload')->middleware('auth');
Route::get('/import_rating', [RatingController::class,'import'])->name('import')->middleware('auth');




// Route::get('/', [MovieController::class,'index']);

