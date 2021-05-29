<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

final class JobRequest extends FormRequest
{
    public function rules()
    {
        $rules = [
            'main' => [
                'category' => [
                    'string', 'nullable'
                ],

                'region_id' => [
                    'integer', 'nullable'
                ],

                'search' => [
                    'string', 'nullable'
                ]
            ],

            'jobs.index' => [
                'category' => [
                    'string', 'nullable'
                ],

                'region_id' => [
                    'integer', 'nullable'
                ],

                'skill_id' => [
                    'integer', 'nullable'
                ],

                'employeer_id' => [
                    'integer', 'nullable'
                ],

                'experience' => [
                    'string', 'nullable'
                ],

                'job_type' => [
                    'string', 'nullable'
                ],

                'search' =>[
                    'string', 'nullable'
                ]
            ]
        ];
        return $rules[$this->route()->getName()];
    }

    public function authorize()
    {
        return true;
    }
}
