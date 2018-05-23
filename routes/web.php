<?php

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

Route::get('/', 'PagesController@index')->name('pages.index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Admins
Route::get('/admins/home', 'AdminsController@index')->name('admins.index');
Route::get('/admins/getlogin', 'Auth\AdminsLoginController@getLogin')->name('admins.getlogin');
Route::post('/admin-login', 'Auth\AdminsLoginController@login')->name('admin-login');

//News
Route::resource('/news', 'NewsController');
Route::get('/news/delete/{slug}', 'NewsController@delete')->name('news.delete');
Route::get('/news-public', 'NewsController@news')->name('news.public');

//News Categories
Route::resource('/news-category', 'NewsCategories');
Route::get('/news-category/delete/{id}', 'NewsCategories@delete')->name('news-category.delete');

//News Tags
Route::resource('/news-tags', 'NewsTagsController');
Route::get('/news-tags/delete/{id}', 'NewsTagsController@delete')->name('news-tags.delete');

//Users Posts
Route::resource('/posts', 'PostsController');
Route::get('/posts/delete/{id}', 'PostsController@delete')->name('posts.delete');
Route::get('/searched-posts', 'PostsController@searchPosts')->name('searched-posts');

//Categories For Users Posts
Route::resource('/category', 'CategoriesController');
Route::get('/category/delte/{id}', 'CategoriesController@delete')->name('category.delete');

//Tags For Users Posts
Route::resource('/tags', 'TagsController');
Route::get('/tags/delete/{id}', 'TagsController@delete')->name('tags.delete');

//Comerce Landing Pages
Route::get('/landing', 'LandingPageController@index')->name('landing.index');

//Shop Controller
Route::resource('/shop', 'ShopController');
Route::get('/all-products', 'ShopController@allProducts')->name('all-products');
Route::get('/most-wanted', 'ShopController@mostWantedProducts')->name('most-wanted-products');
Route::get('/wated-by-category', 'ShopController@watedByCategory')->name('wanted-by-category');
Route::get('/show-product/{id}', 'ShopController@showProduct')->name('show-product');
Route::get('/show-product-delete/{id}', 'ShopController@delete')->name('delete-product');

//Cart
Route::resource('/cart', 'CartController');
Route::get('/cart-delete/{slug}', 'CartController@delete')->name('cart.delete');
Route::get('/allCartProducts', 'AdminsController@allCartProducts')->name('allCartProducts');
//Check Purchasing View
Route::get('/purchasing', 'CartController@checkPurchasing')->name('show-purchasing');

//Paymant
Route::resource('/payment', 'PaymentController');

//Save Products
Route::post('/saveproduct', 'SaveProducts@saveProducts')->name('saveproduct');
Route::delete('/saveproduct/delete', 'SaveProducts@destroy')->name('saveproduct.destroy');

//Product Categories
Route::resource('/product-categories', 'ProductCategoryController');

//Profiles routes
Route::get('/profile', 'ProfilesController@index')->name('profile.index');
Route::post('/about-me', 'ProfilesController@aboutMe')->name('aboutme');
Route::get('/users-profile/{name}', 'ProfilesController@show')->name('profile.show');
Route::post('/profile-image', 'ProfilesController@uploadImage')->name('profile-image');
Route::post('/follow-user', 'ProfilesController@follow')->name('follow');
Route::get('/following-users', 'ProfilesController@getUsers')->name('following-users');
Route::get('/followers', 'ProfilesController@getFollowers')->name('followers');
Route::get('/users-profiles/{name}', 'ProfilesController@showProfile')->name('get-profiles');

//Comments for users posts
Route::resource('/comments', 'CommentsController');






