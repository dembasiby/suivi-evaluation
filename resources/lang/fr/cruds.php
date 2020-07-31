<?php

return [
    'userManagement'        => [
        'title'          => 'Gestion des utilisateurs',
        'title_singular' => 'Gestion des utilisateurs',
    ],
    'permission'            => [
        'title'          => 'Permissions',
        'title_singular' => 'Permission',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'title'             => 'Title',
            'title_helper'      => '',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => '',
        ],
    ],
    'role'                  => [
        'title'          => 'Rôles',
        'title_singular' => 'Rôle',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => '',
            'title'              => 'Title',
            'title_helper'       => '',
            'permissions'        => 'Permissions',
            'permissions_helper' => '',
            'created_at'         => 'Created at',
            'created_at_helper'  => '',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => '',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => '',
        ],
    ],
    'user'                  => [
        'title'          => 'Utilisateurs',
        'title_singular' => 'Utilisateur',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => '',
            'name'                     => 'Nom',
            'name_helper'              => '',
            'email'                    => 'Email',
            'email_helper'             => '',
            'email_verified_at'        => 'Email verified at',
            'email_verified_at_helper' => '',
            'password'                 => 'Password',
            'password_helper'          => '',
            'roles'                    => 'Roles',
            'roles_helper'             => '',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => '',
            'created_at'               => 'Created at',
            'created_at_helper'        => '',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => '',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => '',
            'prenom'                   => 'Prénom',
            'prenom_helper'            => '',
            'approved'                 => 'Approved',
            'approved_helper'          => '',
        ],
    ],
    'auditLog'              => [
        'title'          => 'Audit Logs',
        'title_singular' => 'Audit Log',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => '',
            'description'         => 'Description',
            'description_helper'  => '',
            'subject_id'          => 'Subject ID',
            'subject_id_helper'   => '',
            'subject_type'        => 'Subject Type',
            'subject_type_helper' => '',
            'user_id'             => 'User ID',
            'user_id_helper'      => '',
            'properties'          => 'Properties',
            'properties_helper'   => '',
            'host'                => 'Host',
            'host_helper'         => '',
            'created_at'          => 'Created at',
            'created_at_helper'   => '',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => '',
        ],
    ],
    'strategie'             => [
        'title'          => 'Stratégie',
        'title_singular' => 'Stratégie',
    ],
    'effetIntermediaire'    => [
        'title'          => 'Effets Intermediaires',
        'title_singular' => 'Effets Intermediaire',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => '',
            'code'               => 'Code',
            'code_helper'        => '',
            'description'        => 'Description',
            'description_helper' => '',
            'created_at'         => 'Created at',
            'created_at_helper'  => '',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => '',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => '',
        ],
    ],
    'effetImmediat'         => [
        'title'          => 'Effets Immediats',
        'title_singular' => 'Effets Immediat',
        'fields'         => [
            'id'                         => 'ID',
            'id_helper'                  => '',
            'code_effet_immediat'        => 'Code Effet Immediat',
            'code_effet_immediat_helper' => '',
            'description'                => 'Description',
            'description_helper'         => '',
            'effet_intermediaire'        => 'Effet Intermediaire',
            'effet_intermediaire_helper' => '',
            'created_at'                 => 'Created at',
            'created_at_helper'          => '',
            'updated_at'                 => 'Updated at',
            'updated_at_helper'          => '',
            'deleted_at'                 => 'Deleted at',
            'deleted_at_helper'          => '',
        ],
    ],
    'extrant'               => [
        'title'          => 'Extrants',
        'title_singular' => 'Extrant',
        'fields'         => [
            'id'                    => 'ID',
            'id_helper'             => '',
            'code_extrant'          => 'Code Extrant',
            'code_extrant_helper'   => '',
            'description'           => 'Description',
            'description_helper'    => '',
            'effet_immediat'        => 'Effet Immédiat',
            'effet_immediat_helper' => '',
            'created_at'            => 'Created at',
            'created_at_helper'     => '',
            'updated_at'            => 'Updated at',
            'updated_at_helper'     => '',
            'deleted_at'            => 'Deleted at',
            'deleted_at_helper'     => '',
        ],
    ],
    'gafI'                  => [
        'title'          => 'GAFI',
        'title_singular' => 'GAFI',
    ],
    'resultatIntermediaire' => [
        'title'          => 'Résultat Intermédiaire',
        'title_singular' => 'Résultat Intermédiaire',
        'fields'         => [
            'id'                                 => 'ID',
            'id_helper'                          => '',
            'code_resultat_intermediaire'        => 'Code Resultat Intermediaire',
            'code_resultat_intermediaire_helper' => '',
            'description'                        => 'Description',
            'description_helper'                 => '',
            'created_at'                         => 'Created at',
            'created_at_helper'                  => '',
            'updated_at'                         => 'Updated at',
            'updated_at_helper'                  => '',
            'deleted_at'                         => 'Deleted at',
            'deleted_at_helper'                  => '',
        ],
    ],
    'problemeCentral'       => [
        'title'          => 'Problèmes Centraux',
        'title_singular' => 'Problèmes Centraux',
        'fields'         => [
            'id'                            => 'ID',
            'id_helper'                     => '',
            'code_probleme_central'         => 'Code Problème Central',
            'code_probleme_central_helper'  => '',
            'description'                   => 'Description',
            'description_helper'            => '',
            'resultat_intermediaire'        => 'Résultat Intermédiaire',
            'resultat_intermediaire_helper' => '',
            'created_at'                    => 'Created at',
            'created_at_helper'             => '',
            'updated_at'                    => 'Updated at',
            'updated_at_helper'             => '',
            'deleted_at'                    => 'Deleted at',
            'deleted_at_helper'             => '',
        ],
    ],
    'recueilDeDonnee'       => [
        'title'          => 'Recueil De Données',
        'title_singular' => 'Recueil De Donnée',
    ],
    'indicateur'            => [
        'title'          => 'Indicateurs',
        'title_singular' => 'Indicateur',
        'fields'         => [
            'id'                      => 'ID',
            'id_helper'               => '',
            'code_indicateur'         => 'Code Indicateur',
            'code_indicateur_helper'  => '',
            'description'             => 'Description',
            'description_helper'      => '',
            'created_at'              => 'Created at',
            'created_at_helper'       => '',
            'updated_at'              => 'Updated at',
            'updated_at_helper'       => '',
            'deleted_at'              => 'Deleted at',
            'deleted_at_helper'       => '',
            'probleme_central'        => 'Problème Central',
            'probleme_central_helper' => '',
            'extrant'                 => 'Extrant',
            'extrant_helper'          => '',
            'organisation'            => 'Organisation',
            'organisation_helper'     => '',
        ],
    ],
    'parametre'             => [
        'title'          => 'Parametres',
        'title_singular' => 'Parametre',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => '',
            'description'        => 'Description',
            'description_helper' => '',
            'indicateur'         => 'Indicateur',
            'indicateur_helper'  => '',
            'created_at'         => 'Created at',
            'created_at_helper'  => '',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => '',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => '',
        ],
    ],
    'question'              => [
        'title'          => 'Questions',
        'title_singular' => 'Question',
        'fields'         => [
            'id'                   => 'ID',
            'id_helper'            => '',
            'description'          => 'Description',
            'description_helper'   => '',
            'parametre'            => 'Paramètre',
            'parametre_helper'     => '',
            'created_at'           => 'Created at',
            'created_at_helper'    => '',
            'updated_at'           => 'Updated at',
            'updated_at_helper'    => '',
            'deleted_at'           => 'Deleted at',
            'deleted_at_helper'    => '',
            'type_question'        => 'Type de question',
            'type_question_helper' => '',
            'recurrence'           => 'Recurrence',
            'recurrence_helper'    => '',
        ],
    ],
    'typeQuestion'          => [
        'title'          => 'Type Questions',
        'title_singular' => 'Type Question',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'type'              => 'Type',
            'type_helper'       => '',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => '',
        ],
    ],
    'questionnaire'         => [
        'title'          => 'Questionnaires',
        'title_singular' => 'Questionnaire',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => '',
            'description'         => 'Description',
            'description_helper'  => '',
            'annee'               => 'Année',
            'annee_helper'        => 'Période concernée par les données (année)',
            'trimestre'           => 'Trimestre',
            'trimestre_helper'    => '',
            'created_at'          => 'Created at',
            'created_at_helper'   => '',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => '',
            'deleted_at'          => 'Deleted at',
            'deleted_at_helper'   => '',
            'question'            => 'Question',
            'question_helper'     => '',
            'organisation'        => 'Organisation',
            'organisation_helper' => '',
        ],
    ],
    'reponse'               => [
        'title'          => 'Réponses',
        'title_singular' => 'Réponse',
        'fields'         => [
            'id'                   => 'ID',
            'id_helper'            => '',
            'description'          => 'Description',
            'description_helper'   => '',
            'question'             => 'Question',
            'question_helper'      => '',
            'questionnaire'        => 'Questionnaire',
            'questionnaire_helper' => '',
            'created_at'           => 'Created at',
            'created_at_helper'    => '',
            'updated_at'           => 'Updated at',
            'updated_at_helper'    => '',
            'deleted_at'           => 'Deleted at',
            'deleted_at_helper'    => '',
        ],
    ],
    'organisation'          => [
        'title'          => 'Organisations',
        'title_singular' => 'Organisation',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'nom'               => 'Nom',
            'nom_helper'        => '',
            'sigle'             => 'Sigle',
            'sigle_helper'      => '',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => '',
        ],
    ],
    'pointFocal'            => [
        'title'          => 'Point Focaux',
        'title_singular' => 'Point Focaux',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => '',
            'descritpion'        => 'Descritpion',
            'descritpion_helper' => '',
            'user'               => 'Utilisateur',
            'user_helper'        => '',
            'created_at'         => 'Created at',
            'created_at_helper'  => '',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => '',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => '',
        ],
    ],
    'fournisseurDonnee'     => [
        'title'          => 'Fournisseur de données',
        'title_singular' => 'Fournisseur de donnée',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => '',
            'user'                => 'Utilisateur',
            'user_helper'         => '',
            'organisation'        => 'Organisation',
            'organisation_helper' => '',
            'point_focal'         => 'Point Focal',
            'point_focal_helper'  => '',
            'created_at'          => 'Created at',
            'created_at_helper'   => '',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => '',
            'deleted_at'          => 'Deleted at',
            'deleted_at_helper'   => '',
        ],
    ],
    'coordonnateur'         => [
        'title'          => 'Coordonnateurs',
        'title_singular' => 'Coordonnateur',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => '',
            'description'        => 'Description',
            'description_helper' => '',
            'user'               => 'Utilisateur',
            'user_helper'        => '',
            'created_at'         => 'Created at',
            'created_at_helper'  => '',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => '',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => '',
        ],
    ],
];
