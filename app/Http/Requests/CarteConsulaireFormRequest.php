<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarteConsulaireFormRequest extends FormRequest
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
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'birthdate' => ['required', 'date', 'before:now'],
            'origin_country' => ['required', 'string', 'max:255'],
            'origin_commune' => ['required', 'string', 'max:255'],
            'job' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255', 'min:8'],
            'phone_alt' => ['required', 'string', 'max:255', 'min:8'],
            'email' => ['required', 'email'],
            'genre' => ['required', 'string', 'max:255', 'in:male,female'],
            'mailbox' => ['required', 'string', 'max:255'],
            'spouse_name' => ['nullable', 'string', 'max:255'],
            'diploma' => ['nullable', 'string', 'max:255'],
            // That's it for the first form
            'father_first_name' => ['required', 'string', 'max:255'],
            'mother_first_name' => ['required', 'string', 'max:255'],
            'father_last_name' => ['required', 'string', 'max:255'],
            'mother_last_name' => ['required', 'string', 'max:255'],
            'ethnic_grp' => ['required', 'string', 'max:255'],
            'arrival_date_ci' => ['required', 'date', 'before:now'],
            'residence_commune' => ['required', 'string', 'max:255'],
            'marital_situation' => ['required', 'string', 'max:255', 'in:single,couple'],
            'n_children' => ['required', 'numeric', 'min:0'],
            'ravip_number' => ['required', 'string', 'max:255'],
            // That's it for the second form
            'benin_contact_fullname' => ['required', 'string', 'max:255'],
            'ci_contact_fullname' => ['required', 'string', 'max:255'],
            'benin_contact_phone' => ['required', 'string', 'max:255', 'min:8'],
            'ci_contact_phone' => ['required', 'string', 'max:255', 'min:8'],
            // That's it for the third form
            'eye_color' => ['required', 'string', 'max:255'],
            'hair_color' => ['required', 'string', 'max:255'],
            'complexion_color' => ['required', 'string', 'max:255'],
            'other_signs' => ['required', 'string'],
            'height' => ['required', 'min:0', 'numeric'],
        ];
    }
}
