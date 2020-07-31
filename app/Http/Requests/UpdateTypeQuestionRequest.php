<?php

namespace App\Http\Requests;

use App\TypeQuestion;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateTypeQuestionRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('type_question_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'type' => [
                [
                    'string',
                    'required',
                ],
            ],
        ];
    }
}
