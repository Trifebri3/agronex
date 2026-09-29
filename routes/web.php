<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\WriterController;

/*
|--------------------------------------------------------------------------
| Public Frontend Routes
|--------------------------------------------------------------------------
*/
Route::get('/', [PublicController::class, 'home'])->name('home');
Route::post('/contact/submit', [PublicController::class, 'submitContact'])->name('contact.submit');
Route::get('/esg', [PublicController::class, 'esg'])->name('esg');
Route::get('/knowledge', [PublicController::class, 'knowledge'])->name('knowledge');
Route::get('/knowledge/{slug}', [PublicController::class, 'knowledgeDetail'])->name('knowledge.detail');
Route::get('/investors', [PublicController::class, 'investors'])->name('investors');
Route::post('/investors/request', [PublicController::class, 'requestInvestorAccess'])->name('investors.request');
Route::get('/journey', [PublicController::class, 'journey'])->name('journey');
Route::get('/credibility', [PublicController::class, 'credibility'])->name('credibility');
Route::get('/lang/{locale}', function ($locale) {
    if (in_array($locale, ['id', 'en'])) {
        session(['locale' => $locale]);
    }
    return redirect()->back();
})->name('set-locale');

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::any('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| Writer CMS Panel Routes (Penulis)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:penulis,admin'])->prefix('writer')->name('writer.')->group(function () {
    Route::get('/dashboard', [WriterController::class, 'dashboard'])->name('dashboard');

    // Field Stories (Suara Lapangan)
    Route::get('/stories', [WriterController::class, 'storiesIndex'])->name('stories');
    Route::get('/stories/create', [WriterController::class, 'storiesCreate'])->name('stories.create');
    Route::post('/stories/store', [WriterController::class, 'storiesStore'])->name('stories.store');
    Route::get('/stories/edit/{id}', [WriterController::class, 'storiesEdit'])->name('stories.edit');
    Route::post('/stories/update/{id}', [WriterController::class, 'storiesUpdate'])->name('stories.update');
    Route::post('/stories/destroy/{id}', [WriterController::class, 'storiesDestroy'])->name('stories.destroy');

    // Activities
    Route::get('/activities', [WriterController::class, 'activitiesIndex'])->name('activities');
    Route::get('/activities/create', [WriterController::class, 'activitiesCreate'])->name('activities.create');
    Route::post('/activities/store', [WriterController::class, 'activitiesStore'])->name('activities.store');
    Route::get('/activities/edit/{id}', [WriterController::class, 'activitiesEdit'])->name('activities.edit');
    Route::post('/activities/update/{id}', [WriterController::class, 'activitiesUpdate'])->name('activities.update');
    Route::post('/activities/destroy/{id}', [WriterController::class, 'activitiesDestroy'])->name('activities.destroy');

    // Gallery
    Route::get('/gallery', [WriterController::class, 'galleryIndex'])->name('gallery');
    Route::get('/gallery/create', [WriterController::class, 'galleryCreate'])->name('gallery.create');
    Route::post('/gallery/store', [WriterController::class, 'galleryStore'])->name('gallery.store');
    Route::post('/gallery/destroy/{id}', [WriterController::class, 'galleryDestroy'])->name('gallery.destroy');

    // Knowledge
    Route::get('/knowledge', [WriterController::class, 'knowledgeIndex'])->name('knowledge');
    Route::get('/knowledge/create', [WriterController::class, 'knowledgeCreate'])->name('knowledge.create');
    Route::post('/knowledge/store', [WriterController::class, 'knowledgeStore'])->name('knowledge.store');
    Route::get('/knowledge/edit/{id}', [WriterController::class, 'knowledgeEdit'])->name('knowledge.edit');
    Route::post('/knowledge/update/{id}', [WriterController::class, 'knowledgeUpdate'])->name('knowledge.update');
    Route::post('/knowledge/destroy/{id}', [WriterController::class, 'knowledgeDestroy'])->name('knowledge.destroy');

    // News
    Route::get('/news', [WriterController::class, 'newsIndex'])->name('news');
    Route::get('/news/create', [WriterController::class, 'newsCreate'])->name('news.create');
    Route::post('/news/store', [WriterController::class, 'newsStore'])->name('news.store');
    Route::get('/news/edit/{id}', [WriterController::class, 'newsEdit'])->name('news.edit');
    Route::post('/news/update/{id}', [WriterController::class, 'newsUpdate'])->name('news.update');
    Route::post('/news/destroy/{id}', [WriterController::class, 'newsDestroy'])->name('news.destroy');

    // Map Markers
    Route::get('/map', [WriterController::class, 'mapIndex'])->name('map');
    Route::get('/map/create', [WriterController::class, 'mapCreate'])->name('map.create');
    Route::post('/map/store', [WriterController::class, 'mapStore'])->name('map.store');
    Route::get('/map/edit/{id}', [WriterController::class, 'mapEdit'])->name('map.edit');
    Route::post('/map/update/{id}', [WriterController::class, 'mapUpdate'])->name('map.update');
    Route::post('/map/destroy/{id}', [WriterController::class, 'mapDestroy'])->name('map.destroy');
});

/*
|--------------------------------------------------------------------------
| Admin CMS Panel Routes (Super Admin)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    
    // Settings & Dynamic fields
    Route::get('/settings', [AdminController::class, 'settings'])->name('settings');
    Route::post('/settings/update', [AdminController::class, 'updateSettings'])->name('settings.update');
    Route::post('/settings/impacts/update', [AdminController::class, 'updateImpacts'])->name('settings.impacts.update');
    Route::post('/settings/esg/update', [AdminController::class, 'updateEsg'])->name('settings.esg.update');

    // Ecosystem
    Route::get('/ecosystem', [AdminController::class, 'ecosystemIndex'])->name('ecosystem');
    Route::get('/ecosystem/edit/{id}', [AdminController::class, 'ecosystemEdit'])->name('ecosystem.edit');
    Route::post('/ecosystem/update/{id}', [AdminController::class, 'ecosystemUpdate'])->name('ecosystem.update');

    // Products
    Route::get('/products', [AdminController::class, 'productIndex'])->name('products');
    Route::get('/products/create', [AdminController::class, 'productCreate'])->name('products.create');
    Route::post('/products/store', [AdminController::class, 'productStore'])->name('products.store');
    Route::get('/products/edit/{id}', [AdminController::class, 'productEdit'])->name('products.edit');
    Route::post('/products/update/{id}', [AdminController::class, 'productUpdate'])->name('products.update');
    Route::post('/products/destroy/{id}', [AdminController::class, 'productDestroy'])->name('products.destroy');

    // Partners
    Route::get('/partners', [AdminController::class, 'partnerIndex'])->name('partners');
    Route::get('/partners/edit/{id}', [AdminController::class, 'partnerEdit'])->name('partners.edit');
    Route::post('/partners/update/{id}', [AdminController::class, 'partnerUpdate'])->name('partners.update');

    // Haki Items
    Route::get('/haki', [AdminController::class, 'hakiIndex'])->name('haki');
    Route::get('/haki/create', [AdminController::class, 'hakiCreate'])->name('haki.create');
    Route::post('/haki/store', [AdminController::class, 'hakiStore'])->name('haki.store');
    Route::get('/haki/edit/{id}', [AdminController::class, 'hakiEdit'])->name('haki.edit');
    Route::post('/haki/update/{id}', [AdminController::class, 'hakiUpdate'])->name('haki.update');
    Route::post('/haki/destroy/{id}', [AdminController::class, 'hakiDestroy'])->name('haki.destroy');

    // Team Profiles
    Route::get('/team', [AdminController::class, 'teamIndex'])->name('team');
    Route::get('/team/create', [AdminController::class, 'teamCreate'])->name('team.create');
    Route::post('/team/store', [AdminController::class, 'teamStore'])->name('team.store');
    Route::get('/team/edit/{id}', [AdminController::class, 'teamEdit'])->name('team.edit');
    Route::post('/team/update/{id}', [AdminController::class, 'teamUpdate'])->name('team.update');
    Route::post('/team/destroy/{id}', [AdminController::class, 'teamDestroy'])->name('team.destroy');

    // Journey Chapters
    Route::get('/journey', [AdminController::class, 'journeyIndex'])->name('journey');
    Route::get('/journey/create', [AdminController::class, 'journeyCreate'])->name('journey.create');
    Route::post('/journey/store', [AdminController::class, 'journeyStore'])->name('journey.store');
    Route::get('/journey/edit/{id}', [AdminController::class, 'journeyEdit'])->name('journey.edit');
    Route::post('/journey/update/{id}', [AdminController::class, 'journeyUpdate'])->name('journey.update');
    Route::post('/journey/destroy/{id}', [AdminController::class, 'journeyDestroy'])->name('journey.destroy');

    // Recognitions CRUD
    Route::get('/recognitions', [AdminController::class, 'recognitionIndex'])->name('recognitions');
    Route::get('/recognitions/create', [AdminController::class, 'recognitionCreate'])->name('recognitions.create');
    Route::post('/recognitions/store', [AdminController::class, 'recognitionStore'])->name('recognitions.store');
    Route::get('/recognitions/edit/{id}', [AdminController::class, 'recognitionEdit'])->name('recognitions.edit');
    Route::post('/recognitions/update/{id}', [AdminController::class, 'recognitionUpdate'])->name('recognitions.update');
    Route::post('/recognitions/destroy/{id}', [AdminController::class, 'recognitionDestroy'])->name('recognitions.destroy');

    // Milestones CRUD
    Route::get('/milestones', [AdminController::class, 'milestoneIndex'])->name('milestones');
    Route::get('/milestones/create', [AdminController::class, 'milestoneCreate'])->name('milestones.create');
    Route::post('/milestones/store', [AdminController::class, 'milestoneStore'])->name('milestones.store');
    Route::get('/milestones/edit/{id}', [AdminController::class, 'milestoneEdit'])->name('milestones.edit');
    Route::post('/milestones/update/{id}', [AdminController::class, 'milestoneUpdate'])->name('milestones.update');
    Route::post('/milestones/destroy/{id}', [AdminController::class, 'milestoneDestroy'])->name('milestones.destroy');

    // Leads & Inquiries
    Route::get('/leads', [AdminController::class, 'leadsIndex'])->name('leads');

    // Users
    Route::get('/users', [AdminController::class, 'usersIndex'])->name('users');
    Route::get('/users/create', [AdminController::class, 'usersCreate'])->name('users.create');
    Route::post('/users/store', [AdminController::class, 'usersStore'])->name('users.store');
    Route::post('/users/destroy/{id}', [AdminController::class, 'usersDestroy'])->name('users.destroy');
});
