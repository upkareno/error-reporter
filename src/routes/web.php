<?php
use Illuminate\Support\Facades\Route;
use Upkareno\ErrorReporter\Controllers\ReporterController;
 


Route::get('/error-reports-api/{time}', [ReporterController::class,'reports']);