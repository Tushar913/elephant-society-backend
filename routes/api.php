<?php

use App\Http\Controllers\Api\V1\AssetController;
use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\BookingController;
use App\Http\Controllers\Api\V1\CommitieController;
use App\Http\Controllers\Api\V1\ComplaintController;
use App\Http\Controllers\Api\V1\DownloadInvoiceController;
use App\Http\Controllers\Api\V1\ExpenseController;
use App\Http\Controllers\Api\V1\FacilityController;
use App\Http\Controllers\Api\V1\GuardController;
use App\Http\Controllers\Api\V1\InvoiceController;
use App\Http\Controllers\Api\V1\MaintainceTemplateController;
use App\Http\Controllers\Api\V1\NoticeController;
use App\Http\Controllers\Api\V1\OwnerController;
use App\Http\Controllers\Api\V1\ParkingController;
use App\Http\Controllers\Api\V1\SocietyController;
use App\Http\Controllers\Api\V1\UserController;
use App\Http\Controllers\Api\V1\VisitorController;
use App\Http\Controllers\Api\V1\VisitorManagementController;
use App\Http\Controllers\Api\V1\WingController;
use Illuminate\Support\Facades\Route;


Route::prefix("v1")
    ->group(function () {

        // un-protected routes ( don't need authentication )
        Route::post("register", [AuthController::class, "register"]);
        Route::post("login", [AuthController::class, "login"]);
        Route::post("forget-password", [AuthController::class, "forgetPassword"]);
        Route::post("update-password", [AuthController::class, "updatePassword"]);
        Route::apiResource("visitors", VisitorController::class);

        // protected routes ( user should be authenticated )
        Route::middleware("auth:sanctum")
            ->namespace("\App\Http\Controllers\Api\V1")
            ->group(function () {

                // logout
                Route::delete("logout", [AuthController::class, "logout"]);

                Route::apiResources([
                    "societies" => SocietyController::class,
                    "wings" => WingController::class,
                    "owners" => OwnerController::class,
                    "users" => UserController::class,
                    "complaints" => ComplaintController::class,
                    "notices" => NoticeController::class,
                    "facilites" => FacilityController::class,
                    "assets" => AssetController::class,
                    "guards" => GuardController::class,
                    "commities" => CommitieController::class,
                    "expenses" => ExpenseController::class,
                    "maintainance-templates" => MaintainceTemplateController::class,
                    "facility-bookings" => BookingController::class,
                    "parkings" => ParkingController::class,
                    "invoices" => InvoiceController::class,
                    "visitor-management" => VisitorManagementController::class,
                ]);

                // download invoice
                Route::get("invoices/{invoice}/download", DownloadInvoiceController::class);

                // INFO: The patch/put requests will not work for complaint, society, sop, visitor and visitor-management
                //       resource controllers because of limitations of laravel or php
            });
    });
