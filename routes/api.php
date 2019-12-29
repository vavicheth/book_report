<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:api']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Departments
    Route::apiResource('departments', 'DepartmentApiController');

    // Patients
    Route::apiResource('patients', 'PatientApiController');

    // Emergencies
    Route::apiResource('emergencies', 'EmergencyApiController');

    // Ipds
    Route::apiResource('ipds', 'IpdApiController');

    // Surgeries
    Route::apiResource('surgeries', 'SurgeryApiController');
});
