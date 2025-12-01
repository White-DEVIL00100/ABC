<?php

use App\Http\Controllers\EmploymentController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\TransportRequestController;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

//     |
//     | The default timezone for your application, which will be used by the
//     | PHP date and date-time functions. The timezone is set to "UTC" by
//     | default as it is suitable for most use cases.
//     |
//     */
use Illuminate\Support\Facades\App;


Route::get('/change-locale/{locale}', function ($locale) {
    $supported = ['en', 'ar'];

    if (!in_array($locale, $supported)) {
        abort(400);
    }

    session(['locale' => $locale]);

    return Redirect::back();
})->name('change_locale');


Route::get('/login', function () {
    return redirect()->away('https://app.abclogistic.com/login');
});
Route::get('/clear-cache', function () {
    Artisan::call('optimize:clear');

    return "Cache cleared successfully";
});
Route::get('/', function () {
    return view('landing.index');
});
Route::get('/about', function () {
    return view('landing.about');
});
Route::get('/visitor', function () {
    return view('landing.visitors');
})->name('visitors');
Route::get('/services', function () {
    return view('landing.services');
});
Route::get('/international-transport', function () {
    return view('landing.international-transport');
});
Route::get('/track-transport', function () {
    return view('landing.track-transport');
});
Route::get('/personal-delivery', function () {
    return view('landing.personal-delivery');
});
Route::get('/ocean-transport', function () {
    return view('landing.ocean-transport');
});
Route::get('/warehouse-facility', function () {
    return view('landing.warehouse-facility');
});
Route::get('/emergency-transport', function () {
    return view('landing.emergency-transport');
});
Route::get('/certificates', function () {
    return view('landing.certificates');
});
Route::get('/contact', function () {
    return view('landing.contact');
});
Route::get('/new-jobs', function () {
    return view('landing.jobs');
});
Route::get('/e-services', function () {
    return view('landing.e-services');
});
Route::get('/trackorder', function () {
    return view('landing.trackorder');
});
Route::get('/game/list', function () {
    return view('landing.games.layouts');
})->name('games_list');
Route::get('/game1', function () {
    return view('landing.games.game1');
})->name('game1');
Route::get('/game2', function () {
    return view('landing.games.game2');
})->name('game2');
Route::post('/working/store', [JobController::class, 'store'])->name('job.store');
Route::post('/transport_request/store', [TransportRequestController::class, 'store'])->name('transport_request.store');
Route::post('/contact/store', [ContactController::class, 'store'])->name('contact.store');
Route::post('/visitors/store', [VisitorController::class, 'store'])->name('visitors.store');
Route::get('/visitors/transport', [VisitorController::class, 'transport'])->name('visitors.transport');
