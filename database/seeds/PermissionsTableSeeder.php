<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 18,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 19,
                'title' => 'strategie_access',
            ],
            [
                'id'    => 20,
                'title' => 'effet_intermediaire_create',
            ],
            [
                'id'    => 21,
                'title' => 'effet_intermediaire_edit',
            ],
            [
                'id'    => 22,
                'title' => 'effet_intermediaire_show',
            ],
            [
                'id'    => 23,
                'title' => 'effet_intermediaire_delete',
            ],
            [
                'id'    => 24,
                'title' => 'effet_intermediaire_access',
            ],
            [
                'id'    => 25,
                'title' => 'effet_immediat_create',
            ],
            [
                'id'    => 26,
                'title' => 'effet_immediat_edit',
            ],
            [
                'id'    => 27,
                'title' => 'effet_immediat_show',
            ],
            [
                'id'    => 28,
                'title' => 'effet_immediat_delete',
            ],
            [
                'id'    => 29,
                'title' => 'effet_immediat_access',
            ],
            [
                'id'    => 30,
                'title' => 'extrant_create',
            ],
            [
                'id'    => 31,
                'title' => 'extrant_edit',
            ],
            [
                'id'    => 32,
                'title' => 'extrant_show',
            ],
            [
                'id'    => 33,
                'title' => 'extrant_delete',
            ],
            [
                'id'    => 34,
                'title' => 'extrant_access',
            ],
            [
                'id'    => 35,
                'title' => 'gaf_i_access',
            ],
            [
                'id'    => 36,
                'title' => 'resultat_intermediaire_create',
            ],
            [
                'id'    => 37,
                'title' => 'resultat_intermediaire_edit',
            ],
            [
                'id'    => 38,
                'title' => 'resultat_intermediaire_show',
            ],
            [
                'id'    => 39,
                'title' => 'resultat_intermediaire_delete',
            ],
            [
                'id'    => 40,
                'title' => 'resultat_intermediaire_access',
            ],
            [
                'id'    => 41,
                'title' => 'probleme_central_create',
            ],
            [
                'id'    => 42,
                'title' => 'probleme_central_edit',
            ],
            [
                'id'    => 43,
                'title' => 'probleme_central_show',
            ],
            [
                'id'    => 44,
                'title' => 'probleme_central_delete',
            ],
            [
                'id'    => 45,
                'title' => 'probleme_central_access',
            ],
            [
                'id'    => 46,
                'title' => 'recueil_de_donnee_access',
            ],
            [
                'id'    => 47,
                'title' => 'indicateur_create',
            ],
            [
                'id'    => 48,
                'title' => 'indicateur_edit',
            ],
            [
                'id'    => 49,
                'title' => 'indicateur_show',
            ],
            [
                'id'    => 50,
                'title' => 'indicateur_delete',
            ],
            [
                'id'    => 51,
                'title' => 'indicateur_access',
            ],
            [
                'id'    => 52,
                'title' => 'parametre_create',
            ],
            [
                'id'    => 53,
                'title' => 'parametre_edit',
            ],
            [
                'id'    => 54,
                'title' => 'parametre_show',
            ],
            [
                'id'    => 55,
                'title' => 'parametre_delete',
            ],
            [
                'id'    => 56,
                'title' => 'parametre_access',
            ],
            [
                'id'    => 57,
                'title' => 'question_create',
            ],
            [
                'id'    => 58,
                'title' => 'question_edit',
            ],
            [
                'id'    => 59,
                'title' => 'question_show',
            ],
            [
                'id'    => 60,
                'title' => 'question_delete',
            ],
            [
                'id'    => 61,
                'title' => 'question_access',
            ],
            [
                'id'    => 62,
                'title' => 'type_question_create',
            ],
            [
                'id'    => 63,
                'title' => 'type_question_edit',
            ],
            [
                'id'    => 64,
                'title' => 'type_question_show',
            ],
            [
                'id'    => 65,
                'title' => 'type_question_delete',
            ],
            [
                'id'    => 66,
                'title' => 'type_question_access',
            ],
            [
                'id'    => 67,
                'title' => 'questionnaire_create',
            ],
            [
                'id'    => 68,
                'title' => 'questionnaire_edit',
            ],
            [
                'id'    => 69,
                'title' => 'questionnaire_show',
            ],
            [
                'id'    => 70,
                'title' => 'questionnaire_delete',
            ],
            [
                'id'    => 71,
                'title' => 'questionnaire_access',
            ],
            [
                'id'    => 72,
                'title' => 'reponse_create',
            ],
            [
                'id'    => 73,
                'title' => 'reponse_edit',
            ],
            [
                'id'    => 74,
                'title' => 'reponse_show',
            ],
            [
                'id'    => 75,
                'title' => 'reponse_delete',
            ],
            [
                'id'    => 76,
                'title' => 'reponse_access',
            ],
            [
                'id'    => 77,
                'title' => 'organisation_create',
            ],
            [
                'id'    => 78,
                'title' => 'organisation_edit',
            ],
            [
                'id'    => 79,
                'title' => 'organisation_show',
            ],
            [
                'id'    => 80,
                'title' => 'organisation_delete',
            ],
            [
                'id'    => 81,
                'title' => 'organisation_access',
            ],
            [
                'id'    => 82,
                'title' => 'point_focal_create',
            ],
            [
                'id'    => 83,
                'title' => 'point_focal_edit',
            ],
            [
                'id'    => 84,
                'title' => 'point_focal_show',
            ],
            [
                'id'    => 85,
                'title' => 'point_focal_delete',
            ],
            [
                'id'    => 86,
                'title' => 'point_focal_access',
            ],
            [
                'id'    => 87,
                'title' => 'fournisseur_donnee_create',
            ],
            [
                'id'    => 88,
                'title' => 'fournisseur_donnee_edit',
            ],
            [
                'id'    => 89,
                'title' => 'fournisseur_donnee_show',
            ],
            [
                'id'    => 90,
                'title' => 'fournisseur_donnee_delete',
            ],
            [
                'id'    => 91,
                'title' => 'fournisseur_donnee_access',
            ],
            [
                'id'    => 92,
                'title' => 'coordonnateur_create',
            ],
            [
                'id'    => 93,
                'title' => 'coordonnateur_edit',
            ],
            [
                'id'    => 94,
                'title' => 'coordonnateur_show',
            ],
            [
                'id'    => 95,
                'title' => 'coordonnateur_delete',
            ],
            [
                'id'    => 96,
                'title' => 'coordonnateur_access',
            ],
            [
                'id'    => 97,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
