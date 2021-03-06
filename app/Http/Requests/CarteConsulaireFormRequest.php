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
            'photo' => ['nullable', 'max:2048'],
            'certificate' => ['nullable', 'max:2048'],
            'ID' => ['nullable', 'max:2048'],
            'first_name' => ['required', 'not_regex:/[0-9]+/', 'string', 'max:255'],
            'last_name' => ['required', 'not_regex:/[0-9]+/', 'string', 'max:255'],
            'birthdate' => ['required', 'date', 'before:now'],
            'origin_country' => ['required', 'string', 'max:255'],
            'origin_commune' => ['required', 'string', 'max:255'],
            'job' => ['required', 'string', 'max:255', 'not_regex:/[0-9]+/'],
            'phone' => ['required', 'string', 'max:255', 'min:8', 'not_regex:/[a-zA-Z]+/'],
            'phone_alt' => ['nullable', 'string', 'max:255', 'min:8', 'not_regex:/[a-zA-Z]+/'],
            'email' => ['required', 'email', 'string'],
            'genre' => ['required', 'string', 'max:255', 'in:male,female'],
            'mailbox' => ['nullable', 'string', 'max:255'],
            'spouse_name' => ['nullable', 'string', 'max:255','not_regex:/[0-9]+/'],
            'diploma' => ['nullable', 'string', 'max:255'],
            // That's it for the first form
            'father_first_name' => ['required','not_regex:/[0-9]+/', 'string', 'max:255'],
            'mother_first_name' => ['required','not_regex:/[0-9]+/', 'string', 'max:255'],
            'father_last_name' => ['required', 'not_regex:/[0-9]+/', 'string', 'max:255'],
            'mother_last_name' => ['required', 'not_regex:/[0-9]+/', 'string', 'max:255'],
            'ethnic_grp' => ['required', 'string', 'max:255', 'not_regex:/[0-9]+/'],
            'arrival_date_ci' => ['required', 'date', 'before:now'],
            'residence_commune' => ['required', 'string', 'max:255', 'not_regex:/[0-9]+/'],
            'marital_situation' => ['required', 'string', 'max:255', 'in:single,maried'],
            'n_children' => ['required', 'numeric', 'min:0'],
            'ravip_number' => ['nullable', 'numeric'],
            // That's it for the second form
            'benin_contact_fullname' => ['required', 'not_regex:/[0-9]+/', 'string', 'max:255'],
            'ci_contact_fullname' => ['required', 'not_regex:/[0-9]+/','string', 'max:255'],
            'benin_contact_phone' => ['required', 'string', 'max:255', 'min:8',  'regex:/^\+229/', 'not_regex:/[a-zA-Z]+/'],
            'ci_contact_phone' => ['required', 'string', 'max:255', 'min:8',  'regex:/^\+225/', 'not_regex:/[a-zA-Z]+/'],
            // That's it for the third form
            'eye_color' => ['required', 'not_regex:/[0-9]+/', 'string', 'max:255'],
            'hair_color' => ['required', 'not_regex:/[0-9]+/', 'string', 'max:255'],
            'complexion_color' => ['required', 'not_regex:/[0-9]+/','string', 'max:255'],
            'other_signs' => ['nullable', 'string'],
            'height' => ['required', 'min:0', 'numeric', 'max:300'],
            'rdv' => ['nullable'],
            'sms' => ['nullable'],
            'mail' => ['nullable'],
            'ship' => ['nullable']
        ];
    }

    public function messages() {
        return [
            'photo.image' => 'La photo doit ??tre une image',
            'photo.max' => 'La photo ne peut pas faire plus de 512 Ko',
            'first_name.required' => 'Le pr??nom est obligatoire',
            'first_name.*' => 'Le format du pr??nom est incorrecte',
            'last_name.required' => 'Le nom est obligatoire',
            'last_name.*' => 'Le format du nom est incorrect',
            'birthdate.required' => 'La date de naissance est obligatoire',
            'birthdate.*' => 'La date de naissance est invalide',
            'origin_country.required' => 'Le pays de naissance est requis',
            'origin_country.*' => 'Le format du pays de naissance est incorrecte',
            'origin_commune.required' => 'La commune d\'origine est requise',
            'origin_commune.*' => 'Le format du champs commune d\'origine est incorrecte',
            'job.required' =>  'La profession est requise',
            'job.*' =>  'Le format du champs profession est incorrecte',
            'phone.required' => 'Le num??ro de t??l??phone est requis',
            'phone.*' => 'Le format du champs num??ro de t??l??phone est incorrecte',
            'phone_alt.*' => 'Le format du champs num??ro de t??l??phone alternatif est incorrecte',
            'email.*' => 'Le format de l\'adresse ??lectronique est incorrecte',
            'mailbox.*' => 'Le format de la bo??te postale est incorrecte',
            'spouse_name.*' => 'Le format du nom de l\'??poux est incorrecte',
            'diploma.*' =>  'Le format du champs dipl??me est incorrecte',
            // That's it for the first form
            'father_first_name.required' => 'Le pr??nom du p??re est obligatoire',
            'father_first_name.*' => 'Le format du pr??nom du p??re est incorrecte',
            'father_last_name.required' => 'Le nom du p??re est obligatoire',
            'father_last_name.*' => 'Le format du nom du p??re est incorrect',
            'mother_first_name.required' => 'Le pr??nom de la m??re est obligatoire',
            'mother_first_name.*' => 'Le format du pr??nom de la m??re  est incorrecte',
            'mother_last_name.required' => 'Le nom de la m??re est obligatoire',
            'mother_last_name.*' => 'Le format du nom de la m??re est incorrecte',
            'ethnic_grp.*' =>  'Le format de l\'ethnie est incorrecte',
            'arrival_date_ci' => ['required', 'date', 'before:now'],
            'arrival_date_ci.required' => 'La date d\'arriv??e est obligatoire',
            'arrival_date_ci.*' => 'La date d\'arriv??e doit ??tre ant??rieure ?? la date d\'aujourd\'hui',
            'residence_commune.required' => 'La commune de r??sidence est obligatoire',
            'residence_commune.*' => 'Le format du champs commune de r??sidence est incorrecte',
            'n_children.required' => 'Le champs nombre d\'enfants est requis',
            'n_children.*' => 'Le format du champs nombre d\'enfants est incorrecte',
            'ravip_number.required' => 'Le champs num??ro ravip est requis',
            'ravip_number.*' => 'Le format du champs num??ro ravip est incorrecte',
            // That's it for the second form
            'benin_contact_fullname.required' => 'Le nom du contact b??ninois est obligatoire',
            'benin_contact_fullname.*' => 'Le format du nom du contact b??ninois est incorrecte',
            'ci_contact_fullname.required' => 'Le nom du contact ivoirien est obligatoire',
            'ci_contact_fullname.*' => 'Le format du nom du contact ivoirien est incorrecte',
            'phone.required' => 'Le num??ro de t??l??phone du contact b??ninois est requis',
            'phone.*' => 'Le format du champs num??ro de t??l??phone du contact b??ninois est incorrecte',
            'phone.required' => 'Le num??ro de t??l??phone du contact ivoirien est requis',
            'phone.*' => 'Le format du champs num??ro de t??l??phone du contact ivoirien est incorrecte',
            // That's it for the third form
            'eye_color.required' => 'Le champs couleur des yeux est obligatoire',
            'hair_color.required' => 'Le champs couleur des cheveux est obligatoire',
            'complexion_color.required' => 'Le champs teint est obligatoire',
            'eye_color.*' => 'Le format du champs couleur des yeux est incorrecte',
            'hair_color.*' => 'Le format du champs couleur des cheveux est incorrecte',
            'complexion_color.*' => 'Le format du champs teint est incorrecte',
            'height.min' => 'La taille doit ??tre comprise entre 67 cm et 272 cm',
            'height.max' => 'La taille doit ??tre comprise entre 67 cm et 272 cm',
            'height.*' => 'Le format du champs taille est incorrecte',
        ];
    }
}
