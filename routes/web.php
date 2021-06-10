<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use Illuminate\Http\Request;

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

Route::get('/', function (Request $request) {
    $perPage = $request->get('per_page', 15);
    $posts = Post::with('author')->paginate($perPage);
    if (request()->wantsJson()) {
        return $posts;
    }

    return view('index', compact('posts'));
});


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
