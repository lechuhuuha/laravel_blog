<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;

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

    return view('posts', [
        'posts' => Post::all()
    ]);
})->name('posts.show');

Route::get('posts/{post}', function ($slug) {
    return view(
        'post',
        [
            'post' => Post::find($slug)
        ]
    );
})->name('post.show')->where('post', '[A-z0-9_\-]+');


// Route::group(
//     [],
//     function () {
//         Route::get('hello', function () {
//             return 'hello';
//         });
//         Route::get('word', function () {
//             return 'word';
//         });
//     }
// );

// Route::middleware('auth')->group(
//     [],
//     function () {
//         Route::get('dashboard', function () {
//             return view('dashboard');
//         });
//         Route::get('account', function () {
//             return view('account');
//         });
//     }
// );

// Route::middleware('auth:api', 'throttle:60,1')->group([], function () {
//     Route::get('/profile', function () {
//     });
// });

// Route::prefix('dashboard')->group([], function () {
//     Route::get('/', function () {
//         // handles the path /dashboard
//     });
//     Route::get('users', function () {
//         // handles the path/dashboard/users
//     });
// });
Route::fallback(function () {
    return abort(404);
});
// Route::domain('api.myapp.com')->group([], function () {
//     Route::get('/', function () {
//     });
// });
