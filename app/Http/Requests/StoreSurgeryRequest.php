<?php

namespace App\Http\Requests;

use App\Surgery;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreSurgeryRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('surgery_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'patient_id'      => [
                'required',
                'integer',
            ],
            'date_admit'      => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
            'date_surgery'    => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'date_discharged' => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
            'day_stay'        => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
