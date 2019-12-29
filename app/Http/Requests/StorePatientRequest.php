<?php

namespace App\Http\Requests;

use App\Patient;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StorePatientRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('patient_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'name'    => [
                'required',
            ],
            'name_kh' => [
                'required',
            ],
            'age'     => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'gender'  => [
                'required',
            ],
        ];
    }
}
