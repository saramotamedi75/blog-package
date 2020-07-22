<?php

$namespace = 'Blog\Http\Controllers';
use sara\Blog\BlogServiceprovider;

Route::group([
    'namespace' => $namespace,
    'prefix' => 'blog',
], function () {
    Route::get('/posts/add' , 'blogController@add');
    Route::post('/posts/store' , 'blogController@store');
    Route::get('/posts/edit/{post}' , 'blogController@edit');
    Route::post('/posts/update/{post}' , 'blogController@update');
    Route::get('/posts/all' , 'blogController@all');
    Route::get('/posts/delete/{post}' , 'blogController@delete');
    Route::get('/blog/{url}' , 'blogController@view');
    Route::get('/blog', "postController@index");
    Route::post('/blog/{url}/edit' , 'blogController@edit');
//    });
});
