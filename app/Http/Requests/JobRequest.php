<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

final class JobRequest extends FormRequest
{
    public function rules()
    {
        $rules = [

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
            ],

            'jobs.store' => [
                'category' => 'required',
                'job_context' => 'required',
                'keywords' => 'required',
                'title' => 'required',
                'vacancy' => 'required',
                'deadline' => 'required',
                'employment_type' => 'required',
                'region_id' => 'required',
                'gender' => 'required',
                'age' => 'required',
                'responsibilities' => 'required',
                'education' => 'required',
                'requirements' => 'required',
                'additional_requirements' => 'required',
                'salary' => 'required',
                'benifits' => 'required',
                'apply_instruction' => 'required',
            ],

            'jobs.update' => [
                'category' => 'required',
                'job_context' => 'required',
                'keywords' => 'required',
                'title' => 'required',
                'vacancy' => 'required',
                'deadline' => 'required',
                'employment_type' => 'required',
                'region_id' => 'required',
                'gender' => 'required',
                'age' => 'required',
                'responsibilities' => 'required',
                'education' => 'required',
                'requirements' => 'required',
                'additional_requirements' => 'required',
                'salary' => 'required',
                'benifits' => 'required',
                'apply_instruction' => 'required',
            ],


        ];

        return $rules[$this->route()->getName()];
    }

    public function authorize()
    {
        return true;
    }
}
