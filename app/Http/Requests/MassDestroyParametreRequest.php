<?php

namespace App\Http\Requests;

use App\Parametre;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyParametreRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('parametre_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:parametres,id',
        ];
    }
}
