<?php

namespace App\Http\Requests;

use App\FournisseurDonnee;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreFournisseurDonneeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('fournisseur_donnee_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'user_id'         => [
                [
                    'required',
                    'integer',
                ],
            ],
            'organisation_id' => [
                [
                    'required',
                    'integer',
                ],
            ],
            'point_focal_id'  => [
                [
                    'required',
                    'integer',
                ],
            ],
        ];
    }
}
