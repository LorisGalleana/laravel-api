<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Pagecontroller;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/projects', [Pagecontroller::class, 'index']);
Route::get('/project-by-slug/{slug}', [Pagecontroller::class, 'projectBySlug']);
Route::get('/types', [Pagecontroller::class, 'types']);
Route::get('/technologies', [Pagecontroller::class, 'technologies']);
Route::get('/projects-by-type/{slug}', [Pagecontroller::class, 'projectsByType']);
Route::get('/projects-by-technology/{slug}', [Pagecontroller::class, 'projectsByTechnology']);
