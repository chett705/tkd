<?php

use App\Http\Controllers\Admin\Auth\SessionController;
use App\Http\Controllers\Admin\Auth\UserController;
use App\Http\Controllers\Admin\Cms\MediaFileController;
use App\Http\Controllers\Admin\Cms\MenuController;
use App\Http\Controllers\Admin\Cms\MenuGroupController;
use App\Http\Controllers\Admin\Cms\PageController;
use App\Http\Controllers\Admin\Cms\PageSectionController;
use App\Http\Controllers\Admin\Cms\SectionItemController;
use App\Http\Controllers\Admin\Cms\SettingController;
use App\Http\Controllers\Admin\Contact\ContactInfoController;
use App\Http\Controllers\Admin\Contact\ContactMessageController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Log\ActivityLogController;
use App\Models\PageSection;
use App\Models\SectionItem;
use App\Models\Setting;
use Illuminate\Support\Facades\Route;



// ================== Auth ==================

Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy'])->name('logout');


// ================== Legal (standalone) ==================

    Route::get('/privacy-policy', function () {
        $page = \App\Models\Page::where('slug', 'privacy-policy')->firstOrFail();
        return view('backend.page.privacy-policy', compact('page'));
    })->name('privacy');

    Route::get('/terms-of-service', function () {
        $page = \App\Models\Page::where('slug', 'terms-of-service')->firstOrFail();
        return view('backend.page.terms', compact('page'));
    })->name('terms');

// ================== Admin ==================

Route::get('/', fn() => redirect()->route('admin.dashboard'))->name('home');

Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth'])
    ->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // ── CMS ───────────────────────────────────────────────
    Route::resource('menu-groups',   MenuGroupController::class);

    Route::resource('menus',         MenuController::class)->except(['show']);


    Route::resource('pages',         PageController::class);
    Route::resource('page-sections', PageSectionController::class);


    // ── section ──────────────────────────
    Route::resource('section-items', SectionItemController::class);
    Route::get('/get-groups/{id}', [SectionItemController::class, 'getGroups'])->name('get-groups');

    Route::resource('media-files',   MediaFileController::class)->only(['index', 'store', 'show', 'destroy']);


     // ── SETTINGS ──────────────────────────
    Route::resource('settings', SettingController::class);
    Route::delete('/admin/settings/{id}', [SettingController::class, 'destroy'])
        ->name('admin.settings.destroy');
    Route::put('settings/{setting}/quick-update', [SettingController::class, 'quickUpdate'])
        ->name('settings.quick-update');



    // ── Users ─────────────────────────────────────────────
    Route::resource('users', UserController::class);
    Route::resource('sessions', SessionController::class);

    // ── Contact ───────────────────────────────────────────
    Route::get('/contact-info',    [ContactInfoController::class, 'index'])->name('contact-info.index');
    Route::put('/contact-info',    [ContactInfoController::class, 'update'])->name('contact-info.update');

    Route::resource('contact-messages', ContactMessageController::class)->only(['index', 'show', 'update', 'destroy']);
    Route::delete('/contact/{id}', [ContactMessageController::class, 'destroy'])
        ->name('contact.destroy');
    // ── Logs ──────────────────────────────────────────────
    Route::resource('activity-logs', ActivityLogController::class)->only(['index', 'show', 'destroy']);
    Route::delete('/activity-logs',  [ActivityLogController::class, 'clear'])->name('activity-logs.clear');

});


Route::resource('page-sections', PageSectionController::class);


// frontend
Route::get('/',function(){

    $hero = PageSection::where('section_key','home')
            ->first();
    $contacts = Setting::where('group_name', 'contact')->get()->keyBy('key_name');

    $products = SectionItem::where('section_key','product')
                ->limit(3)
                ->get();

    $us = SectionItem::where('section_key','why-choose-us')
            ->get();

    $heroUs = PageSection::where('section_key','why-choose-us')
            ->first();

    $productQuantity = SectionItem::where('section_key','production-quantity')
                        ->limit(8)
                        ->get();

    $faq = SectionItem::where('section_key','faq')
            ->limit(10)
            ->get();

    $quote = SectionItem::where('section_key','quote')
            ->first();

    return view('Frontend.pages.HomePage',compact('hero','contacts','products','us','heroUs','productQuantity','faq','quote'));
})->name('home');
Route::get('/about-us',function(){

    $hero = PageSection::where('section_key','about-us')
            ->first();

    $quote = SectionItem::where('section_key','quote')
            ->where('page','about-us')
            ->first();

    $sub = SectionItem::where('section_key','sub')
            ->where('group_title','sub-hero')
            ->get();


    $team = SectionItem::where('section_key','team')
            ->get();

    $certificate = SectionItem::where('section_key','certificate')
                    ->get();

    return view('Frontend.pages.AboutUsPage',compact('hero','quote','sub','team','certificate'));
})->name('about-us');
Route::get('/our-trading-products',function(){

    $hero = PageSection::where('section_key','home')
            ->first();
    $contacts = Setting::where('group_name', 'contact')->get()->keyBy('key_name');

    $images = SectionItem::where('section_key','images')
            ->first();

    $title = SectionItem::where('section_key', 'title')
            ->where('group_title', 'main')
            ->first();

    $sub = SectionItem::where('section_key','sub')
            ->where('group_title','main')
            ->limit(4)
            ->get();

    $technical = SectionItem::where('section_key','technical-specifications')
                ->where('group_title','main')
                ->limit(4)
                ->get();

    $products = SectionItem::where('section_key','product')
                ->limit(3)
                ->get();


    return view('Frontend.pages.ProductPage',compact('hero','contacts','images','title','sub','technical','products'));
})->name('products');
Route::get('/export',function(){
    return view('Frontend.pages.Export');
})->name('export');
Route::get('/blog',function(){
    return view('Frontend.pages.Blogpaage');
})->name('blog');
Route::get('/contact-us',function(){
    return view('Frontend.pages.ContactUsPage');
})->name('contact-us');
Route::get('/activities',function(){
    return view('Frontend.pages.Activities');
})->name('activities');
