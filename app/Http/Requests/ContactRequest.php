<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

final class ContactRequest extends FormRequest
{
    public function rules()
    {
        $rules = [

            'contact.post' => [
                'name' => [
                    'string', 'required'
                ],

                'email' => [
                    'email', 'required'
                ],

                'message' => [
                    'string', 'required'
                ],

                'subject' =>[
                    'string', 'required'
                ]
            ],

        ];

        return $rules[$this->route()->getName()];
    }

    public function authorize()
    {
        return true;
    }
}
