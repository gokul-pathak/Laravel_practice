<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Posts;
use App\Models\Post;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/about', function(){
//     return "I am about page.";
// });

// Route::get('/contact', function(){
//     return "I am contact page.";
// });

// Route::get('/post/{id}/{name}', function(){
//     return "This is post number ".$id. $name;
// });

//Route::get('/posts/{id}', [PostController::class, 'index']);


//Route::resource('posts', PostController::class);

//Route::get('/contact', [PostController::class, 'contact']);
//Route::get('/posts/{id}/{name}/{passw}', [PostController::class, 'show_post']);

/*
|--------------------------------------------------------------------------
| DB Raw SQL Queries
|--------------------------------------------------------------------------
*/
 use Illuminate\Support\Facades\DB;

// Route::get('/insert', function(){
//     DB::insert('insert into posts(title, content) values(?,?)', ['PHP with laravel', 'laravel is best things that has happened in php ']);

// });


/*
|--------------------------------------------------------------------------
| DB Raw SQL Queries
|--------------------------------------------------------------------------
*/

// Route::get('/read', function(){
//     $results = DB::select('select * from posts where id = ?', [1]);

//     foreach($results as $post){
//         return $post->title;
//     }
// });


// Route::get('/update', function(){
//     $updated = DB::update('update posts set title="updated title" where id=?', [1]);
//     return $updated;
// });


// Route::get('/delete', function(){
//     $deleted = DB::delete('delete from posts where id=?', [1]);
//     return $deleted;
// });



/*
|--------------------------------------------------------------------------
| Eloquent
|--------------------------------------------------------------------------
*/

Route::get('/find', function(){
    $posts = Post::all();
    foreach($posts as $post){
       return $post->title;
    }


});

Route::get('/find2', function(){
    $post = Post::find(3);
    return $post->title;
});


Route::get('/findwhere', function(){
    $posts = Post::where('id', 3)->orderBy('id', 'desc')->get();
    return $posts;

});
