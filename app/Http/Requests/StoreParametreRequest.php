<?php

namespace App\Http\Requests;

use App\Parametre;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreParametreRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('parametre_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'description'   => [
                [
                    'string',
                    'required',
                ],
            ],
            'indicateur_id' => [
                [
                    'required',
                    'integer',
                ],
            ],
        ];
    }
}
