<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PizzaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => "required |max: 80 | min: 5",
            'price' => "required | numeric ",
            'popularity' => "required | numeric ",
            'ingredients' => "required | max: 255 | min: 5",
            'is_veggie' => "required |",
            'description' => "required |max: 255 | min: 5",

        ];
    }

    public function messages()
    {
        return [
            'name.required' => "Obbligatorio",
            'name.max' => "Massimo :max caratteri",
            'name.min' => "Minimo :min caraetteri",
            'price.required' => "Obbligatorio",
            'price.numeric' => "Deve essere un numero",
            // 'price.max' => "Massimo :max caratteri",
            // 'price.min' => "Minimo :min caraetteri",
            'popularity.required' => "Obbligatorio",
            // 'popularity.max' => "Massimo :max caratteri",
            // 'popularity.min' => "Minimo :min caraetteri",
            'ingredients.required' => "Obbligatorio",
            'ingredients.max' => "Massimo :max caratteri",
            'ingredients.min' => "Minimo :min caraetteri",
            'is_veggie.required' => "Obbligatorio",
            'description.required' => "Obbligatorio",
            'description.max' => "Massimo :max caratteri",
            'description.min' => "Minimo :min caraetteri",
        ];
    }
}
