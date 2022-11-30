<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Spatie\Honeypot\ProtectAgainstSpam;


Route::group(['prefix' => 'user', 'middleware' => 'auth','middleware' => 'Lang'],

	function () {
		//Route::any('logout', 'Auth\LoginController@logout')->name('web.logout');
        Route::POST('/logout', [App\Http\Controllers\User\LoginController::class, 'logoutUser'])->name('user.logout');

		Route::get('/eth/signature', [App\Http\Controllers\Web3\Web3AuthController::class, 'signature'])->name('metamask.signature');
		Route::post('/eth/authenticate', [App\Http\Controllers\Web3\Web3AuthController::class, 'authenticate'])->name('metamask.authenticate');

		Route::get('/eth/getKuroBalance', [App\Http\Controllers\Web3\Web3AuthController::class, 'getKuroBalance'])->name('metamask.getKuroBalance');


		Route::group(['middleware' => 'admin:web'], function () {

		Route::resource('/voteplans','User\UserVotePlans');
		Route::resource('/bfotplans','User\UserBFOTPlans');
		Route::resource('/icousers','User\UserICOsUsers');

		Route::get('/dashboard', 'User\Dashboard@home');

		    ///reaction in blogs
            Route::post('/addLike/{id}', [App\Http\Controllers\User\BlogController::class, 'createLike'])->name('user.add.like');
            Route::post('/addDislike/{id}', [App\Http\Controllers\User\BlogController::class, 'createDisLike'])->name('user.add.dislike');
             ///add comment in blog
            Route::post('/addComment/{id}', [App\Http\Controllers\User\BlogController::class, 'createComment'])->name('user.add.comment');

            ///send email
            Route::post('/sendMessage', [\App\Http\Controllers\MailController::class, 'user_send_message'])->name('user_send_message');
            ///join Vote  Plan
            Route::post('/joinVotePlan', [\App\Http\Controllers\User\UserVotePlans::class, 'joinVotePlan'])->name('user_join_vote_plan');
            ///join b_f_o_t_plan
            Route::post('/joinBfotPlan', [\App\Http\Controllers\User\UserBFOTPlans::class, 'joinBfotPlan'])->name('user_join_b_f_o_t_plan');

            ///join ICO
            Route::post('/joinICO', [\App\Http\Controllers\User\UserICOsUsers::class, 'joinICO'])->name('user_join_ico');

        });
	}

);
Route::get('/metamask-login', function () {
	/*if (Auth::check()) {
		return redirect('login');
	}*/
	return view('auth.metamask-login');
});
Route::resource('/voteplans','User\UserVotePlans');
Route::resource('/bfotplans','User\UserBFOTPlans');
Route::resource('/icos','User\ICOs', ['only' => ['index','show', 'store']]);

Route::view('need/permission', 'user.no_permission');
Route::get('/', function () {
	return view('welcome');
});


Route::get('/home', [App\Http\Controllers\User\HomeController::class, 'index'])->name('home');
Route::get('/blog', [App\Http\Controllers\User\HomeController::class, 'blog'])->name('blog');
Route::get('/ICO', [App\Http\Controllers\User\HomeController::class, 'ICO'])->name('ICO');
Route::get('/vote', [App\Http\Controllers\User\HomeController::class, 'vote'])->name('vote');
Route::get('/about', [App\Http\Controllers\User\HomeController::class, 'about'])->name('about');
Route::get('/Beteam', [App\Http\Controllers\User\HomeController::class, 'Beteam'])->name('Beteam');

//login
Route::group(['middleware' => ['guest:web']], function () {
    Route::get('user/login',  [App\Http\Controllers\User\LoginController::class, 'getLogin'])->name('user.getLogin');
    Route::post('user/login',  [App\Http\Controllers\User\LoginController::class, 'login'])->name('user.login');

});
//register
Route::get('user/register', [App\Http\Controllers\User\RegisterController::class, 'register'])->name('user.getRegister');
Route::post('user/register/create', [App\Http\Controllers\User\RegisterController::class, 'create'])->name('user.register.create');


//Auth::routes();



