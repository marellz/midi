<?php

use App\Http\Controllers\entity\EntityContribution;
use App\Http\Controllers\entity\EntityContributionController;
use App\Http\Controllers\entity\EntityController;
use App\Http\Controllers\entity\EntityMemberContributionController;
use App\Http\Controllers\entity\EntityMemberController;
use App\Http\Controllers\entity\EntityProductController;
use App\Http\Controllers\entity\EntityProductPurchaseController;
use App\Http\Controllers\EntityLoanController;
use App\Http\Controllers\GlobalProductController;
use App\Http\Controllers\user\UserController;
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


Route::resources([
    'entities' => EntityController::class,
    'users' => UserController::class
]);

# entities
Route::group(['prefix' => 'entities/{id}'], function () {


    # entity members
    Route::group(['prefix' => '/members'], function () {
        Route::get('', [EntityMemberController::class, 'index']);
        Route::get('/{member}', [EntityMemberController::class, 'show']);
    });

    #contribution -> setting by entities
    Route::group(['prefix' => '/entity-contributions'], function () {
        Route::get('/', [EntityContributionController::class, 'index']);

        #contributions -> contributions by members
        Route::group(['prefix' => '/{contribution}/member-contributions'], function () {
            Route::get('/', [EntityMemberContributionController::class, 'index']);
        });
    });

    # products
    Route::group(['prefix' => '/products'], function () {
        Route::get('/', [EntityProductController::class, 'index']);
        Route::get('/{productId}', [EntityProductController::class, 'show']);
        Route::get('/{productId}/purchases', [EntityProductPurchaseController::class, 'index']);
    });

    # loans
    Route::group(['prefix' => '/loans'], function () {
        Route::get('/', [EntityLoanController::class, 'index']);
        Route::get('/{loanId}', [EntityLoanController::class, 'show']);
    });
});

# global-products
Route::group(['prefix' => 'global-products/'], function () {

    Route::get('/', [GlobalProductController::class, 'index']);
    Route::get('/{id}', [GlobalProductController::class, 'show']);
});
