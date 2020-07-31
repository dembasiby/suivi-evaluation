<?php

namespace App\Http\Requests;

use App\Questionnaire;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreQuestionnaireRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('questionnaire_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'description'     => [
                [
                    'string',
                    'required',
                ],
            ],
            'annee'           => [
                [
                    'required',
                    'integer',
                    'min:-2147483648',
                    'max:2147483647',
                ],
            ],
            'trimestre'       => [
                [
                    'string',
                    'required',
                ],
            ],
            'questions.*'     => [
                [
                    'integer',
                ],
            ],
            'questions'       => [
                [
                    'required',
                    'array',
                ],
            ],
            'organisation_id' => [
                [
                    'required',
                    'integer',
                ],
            ],
        ];
    }
}
