<?php

namespace App\Http\Requests;

use App\Question;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreQuestionRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('question_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'description'      => [
                [
                    'string',
                    'required',
                ],
            ],
            'parametre_id'     => [
                [
                    'required',
                    'integer',
                ],
            ],
            'type_question_id' => [
                [
                    'required',
                    'integer',
                ],
            ],
            'recurrence'       => [
                [
                    'required',
                ],
            ],
        ];
    }
}
