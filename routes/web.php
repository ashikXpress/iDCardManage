<?php


use Illuminate\Support\Facades\Route;

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


Auth::routes(['register'=>false]);

Route::get('/', 'HomeController@index')->name('home');


//Route::group(['middleware' => ['auth']], function() {
//    Route::resource('roles','RoleController');
//    Route::resource('users','UserController');
//
//});
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('dashboard', 'HomeController@dashboard')->name('dashboard');
    Route::get('add-id-card-category', 'IdCardController@addIdCardCategory')->name('add.id.card.category');
    Route::post('add-id-card-category', 'IdCardController@addIdCardCategorySave')->name('add.id.card.category.save');
    Route::get('category', 'IdCardController@allCategory')->name('all.category');
    Route::get('id-card-category-edit', 'IdCardController@idCardCategoryEdit')->name('id.card.category.edit');
    Route::post('id-card-category-update', 'IdCardController@idCardCategoryUpdate')->name('id.card.category.update');
    Route::post('id-card-category-delete', 'IdCardController@idCardCategoryDelete')->name('id.card.category.delete');

    Route::get('add-unit', 'IdCardController@addUnit')->name('add.unit');
    Route::post('add-unit', 'IdCardController@addUnitSave')->name('add.unit.save');
    Route::get('unit', 'IdCardController@allUnit')->name('all.unit');
    Route::get('unit-edit', 'IdCardController@unitEdit')->name('unit.edit');
    Route::post('unit-update', 'IdCardController@unitUpdate')->name('unit.update');
    Route::post('unit-delete', 'IdCardController@unitDelete')->name('unit.delete');

    Route::get('add-officer', 'IdCardController@addOfficer')->name('add.officer');
    Route::post('add-officer', 'IdCardController@addOfficerSave')->name('add.officer.save');
    Route::get('officer', 'IdCardController@allOfficer')->name('all.officer');
    Route::get('officer-edit', 'IdCardController@officerEdit')->name('officer.edit');
    Route::post('officer-update', 'IdCardController@officerUpdate')->name('officer.update');
    Route::post('officer-delete', 'IdCardController@officerDelete')->name('officer.delete');

    Route::get('add-officer-worker', 'IdCardController@addOfficerWorker')->name('add.officer.worker');
    Route::post('add-officer-worker', 'IdCardController@addOfficerWorkerSave')->name('add.officer.worker.save');
    Route::get('officer-worker-category', 'IdCardController@officerWorkerCategory')->name('all.officer.worker.category');
    Route::get('officer-worker-unit', 'IdCardController@officerWorkerUnit')->name('all.officer.worker.unit');
    Route::get('officer-worker-edit', 'IdCardController@officerWorkerEdit')->name('officer.worker.edit');
    Route::post('officer-worker-update', 'IdCardController@officerWorkerUpdate')->name('officer.worker.update');
    Route::post('officer-worker-delete', 'IdCardController@officerWorkerDelete')->name('officer.worker.delete');
    Route::get('officer-worker-photo-link', 'IdCardController@officerWorkerPhotoLink')->name('officer.worker.photo.link');
    Route::get('unit-worker-photo-link', 'IdCardController@unitWorkerPhotoLink')->name('unit.worker.photo.link');
});
