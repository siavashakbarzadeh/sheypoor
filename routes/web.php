<?php


Route::get('/','SiteController@index');

Route::get('/all','SiteController@all');
Route::get('/SinglePost/{slug}','SiteController@SinglePost');
Route::get('cat/{persian_cat}','SiteController@getPostsOfEachCat');

Route::get('subcat/{persian_cat}/{persian_subcat}','SiteController@getPostsOfEachSubcat');
Route::post('ajax/set_filter_product','SiteController@ajax_search');
Route::post('favorites','SiteController@addFavorites');
Route::get('myfavorites','SiteController@myfavorites');
Route::post('delfav','SiteController@delfav');
Route::get('myposts','SiteController@myposts');
Route::get('forgetpass','SiteController@forgetpass');
Route::post('sendnewpass','SiteController@sendnewpass');

Route::get('admin','admin\AdminController@index');
Route::resource('admin/category','admin\CategoryController');
Route::resource('admin/user','admin\UserController');
Route::resource('admin/post','admin\PostController');
Route::get('admin/filter','admin\FilterController@index');
Route::post('admin/filter','admin\FilterController@create');

Auth::routes();
Route::get('refresh_captcha', 'SiteController@refreshCaptcha')->name('refresh_captcha');

Route::get('/home', 'HomeController@index')->name('home');


Route::get('contactus', 'ContactUsController@getContactus');
Route::post('contactus', 'ContactUsController@postContactus')->name('contactus');

Route::get('pay','SiteController@pay');


Route::get('admin/post/filter/{id}','admin\PostController@add_filter_form');
Route::post('admin/product/add_filter','admin\PostController@add_filter_post');
Route::get('post/getCity','admin\PostController@getCity');

Route::get('ajax/state','SiteController@stateSearch');
Route::get('mainsearch','SiteController@mainSearch');
Route::get('freeregister','SiteController@freeRegister');
Route::post('subCatFreeRegister','SiteController@subCatFreeRegister');
Route::post('GetNameOfSubCategory','SiteController@getNameOfSubCategory');
Route::post('newPost','SiteController@storePost');