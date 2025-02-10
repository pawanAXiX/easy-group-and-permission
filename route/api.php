<?php
use Illuminate\Support\Facades\Route;
use Pawan\RolesPerm\Models\Permission;

Route::get('/permissions', function () {
    return Permission::all();
});
