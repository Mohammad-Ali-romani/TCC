<?php
namespace routes;

use App\Http\Controllers\Dashborde\PostController;
use App\Http\Controllers\Dashborde\SubjectController;
use App\Http\Controllers\Dashborde\UserController;
use Illuminate\Support\Facades\Auth;
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


//define('PAGINATION_COUNT',10);

//Route::get('/',[UserController::class,'login'])->name('login');


Route::get('/',[PostController::class,'indexAdvertisment']);
// Route::get('/', function () {
//     return view('welcome');
// });
//['register' => false]
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['prefix'=>'Advertisment'],function(){

    Route::get('/',[PostController::class,'indexAdvertisment'])->name('Advertisment.index');
    Route::get('create',[PostController::class,'createAdvertisment'])->name('Advertisment.create');
    Route::post('create/store',[PostController::class,'storeAdvertisment'])->name('Advertisment.store');
    Route::get('edit/{Advertisment_id}',[PostController::class,'editAdvertisment'])->name('Advertisment.edit');
    Route::post('update/{Advertisment_id}',[PostController::class,'updateAdvertisment'])->name('Advertisment.update');
    Route::get('delete/{Advertisment_id}',[PostController::class,'destroyAdvertisment'])->name('Advertisment.delete');
});

Route::group(['prefix'=>'Lecture'],function(){
    Route::get('/',[PostController::class,'indexLecture'])->name('Lecture.index');
    Route::get('create',[PostController::class,'createLecture'])->name('Lecture.create');
    Route::post('create/store',[PostController::class,'storeLecture'])->name('Lecture.store');
    Route::get('edit/{Lecture_id}',[PostController::class,'editLecture'])->name('Lecture.edit');
    Route::post('update/{Lecture_id}',[PostController::class,'updateLecture'])->name('Lecture.update');
    Route::get('delete/{Lecture_id}',[PostController::class,'destroyLectrue'])->name('Lecture.delete');
    Route::post('/',[PostController::class,'searchLecture'])->name('Lecture.search');


});

Route::group(['prefix'=>'Mark'],function(){

    Route::get('/',[PostController::class,'indexMark'])->name('Mark.index');
    Route::get('create',[PostController::class,'createMark'])->name('Mark.create');
    Route::post('create/store',[PostController::class,'storeMark'])->name('Mark.store');
    Route::get('edit/{Mark_id}',[PostController::class,'editMark'])->name('Mark.edit');
    Route::post('update/{Mark_id}',[PostController::class,'updateMark'])->name('Mark.update');
    Route::get('delete/{Mark_id}',[PostController::class,'destroyMark'])->name('Mark.delete');

});
Route::group(['prefix'=>'Program'],function(){

    Route::get('/',[PostController::class,'indexProgram'])->name('Program.index');
    Route::get('create',[PostController::class,'createProgram'])->name('Program.create');
    Route::post('create/store',[PostController::class,'storeProgram'])->name('Program.store');
    Route::get('edit/{Program_id}',[PostController::class,'editProgram'])->name('Program.edit');
    Route::post('update/{Program_id}',[PostController::class,'updateProgram'])->name('Program.update');
    Route::get('delete/{Program_id}',[PostController::class,'destroyProgram'])->name('Program.delete');

});

Route::group(['prefix'=>'Subject'],function(){

    Route::get('/',[SubjectController::class,'index'])->name('Subject.index');
    Route::get('create',[SubjectController::class,'create'])->name('Subject.create');
    Route::post('create/store',[SubjectController::class,'store'])->name('Subject.store');
    Route::get('edit/{Subject_id}',[SubjectController::class,'edit'])->name('Subject.edit');
    Route::post('update/{Subject_id}',[SubjectController::class,'update'])->name('Subject.update');
    Route::get('delete/{Subject_id}',[SubjectController::class,'destroy'])->name('Subject.delete');

});

Route::group(['prefix'=>'User'],function() {
    Route::get('All User',[UserController::class,'AllUser'])->name('User.allUser');
    Route::get('Active User',[UserController::class,'ActiveUser'])->name('User.activeUser');
    Route::get('Not Active User',[UserController::class,'NotActiveUser'])->name('User.notActiveUser');
    Route::get('create',[UserController::class,'create'])->name('User.create');
    Route::post('create/store',[UserController::class,'store'])->name('User.store');
    Route::get('edit/{User_id}',[UserController::class,'edit'])->name('User.edit');
    Route::post('update/{User_id}',[UserController::class,'update'])->name('User.update');
    Route::get('delete/{User_id}',[UserController::class,'destroy'])->name('User.delete');
    Route::get('active/{User_id}',[UserController::class,'activate'])->name('User.activate');
    Route::get('unactive/{User_id}',[UserController::class,'unactivate'])->name('User.unactivate');
<<<<<<< HEAD
    Route::post('All User',[UserController::class,'search'])->name('User.search');

=======
>>>>>>> 27d8d22fbc37f55342ccd9ff7688f9283ba00d1e
});

Route::get('test',[PostController::class,'test'])->name('test');






