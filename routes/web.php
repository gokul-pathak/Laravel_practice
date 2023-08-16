<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Models\Post;
use App\Models\User;
use App\Models\Country;
use App\Models\Photo;
use App\Models\Tag;


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
    $posts = Post::where('id', 3)->orderBy('id', 'desc')->take(1)->get();
    return $posts;

});

Route::get('/findmore', function(){
    // $posts = Post::findOrFail(1);
    // return $posts;
    $posts = Post::where('users_count', '<', 50)-> firstOrFail();
    return $posts;
});


Route::get('/basicinsert', function(){
    $post = new Post;
    $post->title = 'new eloquent title insert';
    $post->content = 'wow eloquent pretty cool. visible inserted content is here';
    $post->save();

});

Route::get('/basicinsert2', function(){
    $post = Post::find(2);
    $post->title = 'new eloquent title insert 2';
    $post->content = 'wow eloquent pretty cool. visible inserted content is here 2';
    $post->save();

});

Route::get('/create', function(){

    Post::create(['title'=>'the create method','content'=>'wow this is working']);
});


Route::get('/update2', function(){
    Post::where('id', 2)->where('is_admin', 0)->update(['title'=>'New PHP Title', 'Content'=>'Wow content is displayed']);
});


Route::get('/delete2', function(){
    $post = Post::find(3);
    $post->delete();


});


Route::get('/delete3', function(){
    //Post::destroy(4); //single delete
    Post::destroy([6,7]); //multiple delete
    //Post::where('is_admin',0)->delete();

});


Route::get('/softdelete', function(){
    Post::find(14)->delete();
});

Route::get('/Readsoftdelete', function(){
    // $post=Post::find(3);
    // return $post;

    // $post = Post::withTrashed()->where('id', 2)->get();
    // return $post;
    $post = Post::onlyTrashed()->where('is_admin', 0)->get();
    return $post;
});

Route::get('/restore', function(){
    Post::withTrashed()->where('is_admin',0)->restore();
});

Route::get('/forcedelete', function(){
    Post::onlyTrashed()->where('is_admin',0)->forceDelete();

});


/*
|--------------------------------------------------------------------------
| Eloquent relationships
|--------------------------------------------------------------------------
*/
//1 to 1 relationship

Route::get('/user/{id}/post', function($id){
    // return User::find($id)->post->title;
    return User::find($id)->post->content;
});

//inverse relationship

Route::get('/user/{id}/post', function($id){
    return Post::find($id)->user->name;
});

//1 to many relationship
Route::get('/postsr', function(){
    $user = User::find(1);
    foreach ($user->posts as $post) {
        echo $post->title. "</br>"; //return return only 1 value where echo return all
    }
});


// many to many relationship

Route::get('/user/{id}/role', function($id){
    // $user= User::find(1)->roles()->orderBy('id', 'desc')->get();
    // return $user;
    $user= User::find($id);
    foreach($user->roles as $role){
        return $role->name;
    }
});


// accessing the intermediate table / pivot table
Route::get('/user/pivot', function(){
    $user = User::find(1);

    foreach($user->roles as $role){
        echo $role->pivot->created_at;
        // echo $role->pivot->created_at;
    }
});

//has many through relation
Route::get('/user/country', function(){
    $country = Country::find(2);
    foreach($country->posts as $post){
        return $post->title;
        // echo "Country Name: ".$post->user->name."</br> ";
    }

});


// polymorphics relations

Route::get('/user/photos', function(){
    $user = User::find(1);
    foreach($user->photos as $photo){
        return $photo->path;
    }
});


Route::get('/post/{id}/photos', function($id){
    $post = Post::find($id);
    foreach($post->photos as $photo){
        // return $photo->path;
        echo $photo->path. "</br> ";
    }
});

Route::get('/photo/{id}/post', function($id){
    $photo = Photo::findOrFail($id);
    // $imageable = $photo->imageable_id;
    return $photo->imageable;
});


// polymorphics many to many

Route::get('/post/tag', function(){
    $post = Post::find(1);
    foreach($post->tags as $tag){
        echo $tag->name;
    }
});

Route::get('tag/post', function(){
    $tag = Tag::find(2);
    // return $tag->posts;
    foreach($tag->posts as $post){
        return $post->title;
    }
});
