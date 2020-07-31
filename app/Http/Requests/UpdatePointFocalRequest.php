<?php

namespace App\Http\Requests;

use App\PointFocal;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePointFocalRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('point_focal_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'descritpion' => [
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
