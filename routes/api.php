<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:api']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Effet Intermediaires
    Route::apiResource('effet-intermediaires', 'EffetIntermediairesApiController');

    // Effet Immediats
    Route::apiResource('effet-immediats', 'EffetImmediatsApiController');

    // Extrants
    Route::apiResource('extrants', 'ExtrantsApiController');

    // Resultat Intermediaires
    Route::apiResource('resultat-intermediaires', 'ResultatIntermediairesApiController');

    // Probleme Centrals
    Route::apiResource('probleme-centrals', 'ProblemeCentralsApiController');

    // Indicateurs
    Route::apiResource('indicateurs', 'IndicateursApiController');

    // Parametres
    Route::apiResource('parametres', 'ParametresApiController');

    // Questions
    Route::apiResource('questions', 'QuestionsApiController');

    // Type Questions
    Route::apiResource('type-questions', 'TypeQuestionsApiController');

    // Questionnaires
    Route::apiResource('questionnaires', 'QuestionnairesApiController');

    // Reponses
    Route::apiResource('reponses', 'ReponsesApiController');

    // Organisations
    Route::apiResource('organisations', 'OrganisationsApiController');

    // Point Focals
    Route::apiResource('point-focals', 'PointFocalsApiController');

    // Fournisseur Donnees
    Route::apiResource('fournisseur-donnees', 'FournisseurDonneesApiController');

    // Coordonnateurs
    Route::apiResource('coordonnateurs', 'CoordonnateursApiController');
});
