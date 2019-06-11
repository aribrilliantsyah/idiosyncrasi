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

Route::get('/', 'FrontOfficeController@index');
Route::get('/blog', 'FrontOfficeController@blog');
Route::get('/detail_blog/{slug}', 'FrontOfficeController@blog_detail');
Route::get('/about', function() {
	return view('frontend.about');
});
Route::get('/contact_us', function() {
	return view('frontend.contact_us');
});

Route::get('/welcome', function () {
     return redirect('/home');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('welcome');

Route::middleware('auth','role:admin|su')->group(function() {
	Route::prefix('admin')->group(function () { 
		//master
		Route::group(['prefix' => 'master'], function(){
			Route::resource('kategori_post','KategoriPostController');
			Route::post('kategori_post/delsel', 'KategoriPostController@delsel');
			Route::resource('kategori_gallery','KategoriGalleryController');
			Route::post('kategori_gallery/delsel', 'KategoriGalleryController@delsel');
		});

		//content
		Route::resource('content_setup','ContentSetupController');
		//blog
		Route::resource('blog_manager','PostController');
		Route::post('blog_manager/delsel', 'PostController@delsel');
		//gallery
		Route::resource('gallery_manager','GalleryController');
		Route::post('gallery_manager/delsel', 'GalleryController@delsel');
		//brand
		Route::resource('brand','BrandLogoController');
		Route::get('brand/{id}/delete','BrandLogoController@destroy');
		//slide
		Route::resource('slide','SlideController');
		Route::get('slide/{id}/delete','SlideController@destroy');
		
		Route::get('profile', function() {
			return view('interface.backend.profile.index');
		    //
		});
		Route::post('profile/update', 'ProfileController@update');
		Route::post('setting/password', ['as'=>'setting.password', 'uses'=>'ProfileController@password']);
	});
});

Route::middleware('auth','role:su')->group(function() {
	Route::prefix('su')->group(function () { 
		Route::get('profile', function() {
			return view('interface.backend.profile.index');
		    //
		});
		Route::post('profile/update', 'ProfileController@update');
		Route::post('setting/password', ['as'=>'setting.password', 'uses'=>'ProfileController@password']);
		
	});
});

Route::middleware('auth')->group(function() {
	
});



//validasi
Route::post('/validasi/email', 'ProfileController@email');
Route::post('/validasi/old', 'ProfileController@old');
Route::post('/validasi/image', 'ProfileController@image');

//redirect
Route::get('/to_profile', 'ProfileController@redirect');

//Api
Route::get('api/kategori_post',['as'=>'api.kategori','uses'=>'KategoriPostController@apiKategori']);
Route::get('api/kategori_gallery',['as'=>'api.kategori','uses'=>'KategoriGalleryController@apiKategori']);
Route::get('api/blog_list',['as'=>'api.kategori','uses'=>'PostController@apiPost']);
Route::get('api/gallery_list',['as'=>'api.kategori','uses'=>'GalleryController@apiGallery']);

//filemanager
Route::group(['middleware' => 'auth'], function () {
	Route::get('/laravel-filemanager', '\Unisharp\Laravelfilemanager\controllers\LfmController@show');
    Route::post('/laravel-filemanager/upload', '\Unisharp\Laravelfilemanager\controllers\UploadController@upload');
});


Route::get('/test',function(){
	return view('test');
});


//Api for android without login
Route::middleware('cors')->group(function() {
	Route::prefix('guest')->group(function () { 

	});
});