<?php

namespace App\Http\Requests;

use App\Coordonnateur;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCoordonnateurRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('coordonnateur_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'description' => [
                [
                    'string',
                    'nullable',
                ],
            ],
            'user_id'     => [
                [
                    'required',
                    'integer',
                ],
            ],
        ];
    }
}
