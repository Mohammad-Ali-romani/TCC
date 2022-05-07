<?php
namespace routes;

use App\Http\Controllers\api\PostApiController;
use App\Http\Controllers\api\SubjectApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('posts',[PostApiController::class,'index']);
Route::get('posts/advertments/year/{yearId}/dept/{deptId}',[PostApiController::class,'showAdverts']);
Route::get('subjects/year/{yearId}/dept/{deptId}',[SubjectApiController::class,'index']);

Route::get('posts/results',[PostApiController::class,'showResults']);
Route::get('posts/results/{yearId}/dept/{deptId}',[PostApiController::class,'indexResults']);
Route::get('posts/programs',[PostApiController::class,'showPrograms']);
//Route::get('posts/programs',[PostApiController::class,'indexPrograms']);
Route::get('posts/result/{id}',[PostApiController::class,'showResultSingle']);
Route::get('posts/program/{id}',[PostApiController::class,'showProgramSingle']);
Route::get('posts/lectures/{subjectId}',[PostApiController::class,'showLectures']);
Route::get('posts/lecture/{id}',[PostApiController::class,'showLecturesSingle']);
