<?php

namespace App\Http\Requests;

use App\FournisseurDonnee;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyFournisseurDonneeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('fournisseur_donnee_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:fournisseur_donnees,id',
        ];
    }
}
