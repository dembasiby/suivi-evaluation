<?php

namespace App\Http\Requests;

use App\Extrant;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyExtrantRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('extrant_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:extrants,id',
        ];
    }
}
