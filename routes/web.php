<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes();
// Admin

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // Effet Intermediaires
    Route::delete('effet-intermediaires/destroy', 'EffetIntermediairesController@massDestroy')->name('effet-intermediaires.massDestroy');
    Route::resource('effet-intermediaires', 'EffetIntermediairesController');

    // Effet Immediats
    Route::delete('effet-immediats/destroy', 'EffetImmediatsController@massDestroy')->name('effet-immediats.massDestroy');
    Route::resource('effet-immediats', 'EffetImmediatsController');

    // Extrants
    Route::delete('extrants/destroy', 'ExtrantsController@massDestroy')->name('extrants.massDestroy');
    Route::resource('extrants', 'ExtrantsController');

    // Resultat Intermediaires
    Route::delete('resultat-intermediaires/destroy', 'ResultatIntermediairesController@massDestroy')->name('resultat-intermediaires.massDestroy');
    Route::resource('resultat-intermediaires', 'ResultatIntermediairesController');

    // Probleme Centrals
    Route::delete('probleme-centrals/destroy', 'ProblemeCentralsController@massDestroy')->name('probleme-centrals.massDestroy');
    Route::resource('probleme-centrals', 'ProblemeCentralsController');

    // Indicateurs
    Route::delete('indicateurs/destroy', 'IndicateursController@massDestroy')->name('indicateurs.massDestroy');
    Route::resource('indicateurs', 'IndicateursController');

    // Parametres
    Route::delete('parametres/destroy', 'ParametresController@massDestroy')->name('parametres.massDestroy');
    Route::resource('parametres', 'ParametresController');

    // Questions
    Route::delete('questions/destroy', 'QuestionsController@massDestroy')->name('questions.massDestroy');
    Route::resource('questions', 'QuestionsController');

    // Type Questions
    Route::delete('type-questions/destroy', 'TypeQuestionsController@massDestroy')->name('type-questions.massDestroy');
    Route::resource('type-questions', 'TypeQuestionsController');

    // Questionnaires
    Route::delete('questionnaires/destroy', 'QuestionnairesController@massDestroy')->name('questionnaires.massDestroy');
    Route::resource('questionnaires', 'QuestionnairesController');

    // Reponses
    Route::delete('reponses/destroy', 'ReponsesController@massDestroy')->name('reponses.massDestroy');
    Route::resource('reponses', 'ReponsesController');

    // Organisations
    Route::delete('organisations/destroy', 'OrganisationsController@massDestroy')->name('organisations.massDestroy');
    Route::resource('organisations', 'OrganisationsController');

    // Point Focals
    Route::delete('point-focals/destroy', 'PointFocalsController@massDestroy')->name('point-focals.massDestroy');
    Route::resource('point-focals', 'PointFocalsController');

    // Fournisseur Donnees
    Route::delete('fournisseur-donnees/destroy', 'FournisseurDonneesController@massDestroy')->name('fournisseur-donnees.massDestroy');
    Route::resource('fournisseur-donnees', 'FournisseurDonneesController');

    // Coordonnateurs
    Route::delete('coordonnateurs/destroy', 'CoordonnateursController@massDestroy')->name('coordonnateurs.massDestroy');
    Route::resource('coordonnateurs', 'CoordonnateursController');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
// Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
    }
});
