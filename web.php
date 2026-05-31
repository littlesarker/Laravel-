<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


// basic routing 
Route::get('/rahim',function(){

 return 'Assalamualaykum Rahim sarker';

});


//Available HTTP verbs

// Route::get($uri, $callback);
// Route::post($uri, $callback);
// Route::put($uri, $callback);
// Route::patch($uri, $callback);
// Route::delete($uri, $callback);
// Route::options($uri, $callback);



// Match & Any

// If you need to register a route that 
// responds to several HTTP methods, use match

Route::match(['get', 'post'], '/submit', function () {
    // handles GET and POST
});

// To respond to all HTTP verbs

Route::any('/webhook', function () {
    // catches everything
});


//returing view 

Route::get('/returningview',function(){
 
  return view ('returningview'); 
});


// Redirect routes

Route::redirect('/rahim', '/returningview', 301);


// If your route only needs to return a view without any logic:
Route::view('/welcome', 'welcome', ['name' => 'Taylor']);


//Route Parameters
//Visiting /user/42 will display “Showing user: 42”.
Route::get('/user/{id}', function ($id) {
    return "Showing user: " . $id;
});


//multiple parameters

Route::get('/post/{postId}/comment/{commentId}', function ($postId, $commentId) {
    return "Post {$postId}, Comment {$commentId}";
});


// optional parameters 
//Now /user/john shows “Hello, john”, while /user shows “Hello, Guest”.
Route::get('/user/{name?}', function ($name = 'Guest') {
    return "Hello, " . $name;
});


//Regular expression constraints

Route::get('/user/{id}', function ($id) {
    //
})->where('id', '[0-9]+');


//multiple constraints

Route::get('/user/{name}/{id}', function ($name, $id) {
})->where([
    'name' => '[A-Za-z]+',
    'id'   => '[0-9]+',
]);



// Named Routes
Route::get('/profile', function () {
    return 'Your profile';
})->name('profile');

//for controllers 
