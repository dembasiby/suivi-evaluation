<?php

namespace App\Http\Requests;

use App\Indicateur;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreIndicateurRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('indicateur_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'code_indicateur' => [
                [
                    'string',
                    'max:20',
                    'required',
                    'unique:indicateurs',
                ],
            ],
            'description'     => [
                [
                    'string',
                    'required',
                ],
            ],
            'organisations.*' => [
                [
                    'integer',
                ],
            ],
            'organisations'   => [
                [
                    'required',
                    'array',
                ],
            ],
        ];
    }
}
