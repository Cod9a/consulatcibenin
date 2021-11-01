<x-app-layout>
  <section
    class="max-w-7xl mx-auto px-4 md:px-6 lg:px-8"
    x-data="{
            step: 1,
            nSteps: 4,
            nextStep() {
                step++;
            }
        }"
    x-init="console.log( $refs.form.querySelectorAll('fieldset').length)">
    <h3 class="font-medium text-2xl">
      Formulaire de création d'une Carte Consulaire Biométrique
    </h3>
    <div class="my-8 flex justify-between gap-5">
      <template x-for="i in nSteps">
        <div
          :class="i === nSteps ? 'relative flex-shrink-0' : 'relative flex-grow'">
          <button
            :class="
            i === nSteps ?  'w-6 h-6 bg-blue-500 inline-flex items-center justify-center rounded-full font-semibold text-white ' : 'w-6 h-6 bg-blue-500 inline-flex items-center justify-center rounded-full font-semibold text-white after:absolute after:w-full after:h-px after:bg-black after:left-7' "
            x-text="i"
            @click="step = i"></button>
        </div>
      </template>
    </div>
    <form x-ref="form">
      <fieldset
        x-cloak
        class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5"
        x-show="step === 1">
        <div class="flex flex-col">
          <label for="last-name">Nom</label>
          <x-input
            :error="$errors->has('last_name')"
            id="last-name"
            type="text"
            :value="old('last_name')"
            name="last_name"
            required
            autocomplete="family-name"
            autofocus />
          <x-validation-errors name="last_name"></x-validation-errors>
        </div>
        <div class="flex flex-col">
          <label for="first-name">Prénom(s)</label>
          <x-input
            :error="$errors->has('first_name')"
            id="first-name"
            type="text"
            :value="old('first_name')"
            name="first_name"
            required
            autocomplete="given-name" />
          <x-validation-errors name="first_name"></x-validation-errors>
        </div>
        <div class="flex flex-col">
          <label for="birthdate">Date de naissance</label>
          <x-input
            :error="$errors->has('birthdate')"
            id="birthdate"
            type="date"
            :value="old('birthdate')"
            name="birthdate"
            required
            autocomplete="bday" />
          <x-validation-errors name="birthdate"></x-validation-errors>
        </div>
        <div class="flex flex-col">
          <label for="origin-country">Pays de naissance</label>
          <x-input
            :error="$errors->has('origin_country')"
            id="origin-country"
            type="text"
            :value="old('origin_country')"
            name="origin_country"
            required
            autocomplete="country-name" />
          <x-validation-errors name="first_name"></x-validation-errors>
        </div>
        <div class="flex flex-col">
          <label for="origin-commune">Commune de naissance</label>
          <x-input
            :error="$errors->has('origine_commune')"
            id="origin-commune"
            type="text"
            :value="old('origin_commune')"
            name="origin_commune"
            required />
          <x-validation-errors name="origin_commune"></x-validation-errors>
        </div>
        <div class="flex flex-col">
          <label for="job">Profession</label>
          <x-input
            :error="$errors->has('job')"
            id="job"
            type="text"
            :value="old('job')"
            name="job"
            required
            autocomplete="organization-title" />
          <x-validation-errors name="job"></x-validation-errors>
        </div>
        <div class="flex flex-col">
          <label for="diploma">Diplôme</label>
          <x-input
            :error="$errors->has('diploma')"
            id="diploma"
            type="text"
            :value="old('diploma')"
            name="diploma"
            required
            autocomplete="organization-title" />
          <x-validation-errors name="diploma"></x-validation-errors>
        </div>
        <div class="flex flex-col">
          <label for="phone">Numéro de téléphone</label>
          <x-input
            :error="$errors->has('phone')"
            id="phone"
            type="text"
            :value="old('phone')"
            name="phone"
            required
            autocomplete="tel" />
          <x-validation-errors name="phone"></x-validation-errors>
        </div>
        <div class="flex flex-col">
          <label for="phone-alt">Numéro de téléphone alternatif</label>
          <x-input
            :error="$errors->has('phone_alt')"
            id="phone-alt"
            type="text"
            :value="old('phone_alt')"
            name="phone_alt"
            required
            autocomplete="tel" />
          <x-validation-errors name="phone_alt"></x-validation-errors>
        </div>
        <div class="flex flex-col">
          <label for="spouse-name">Nom de votre époux</label>
          <x-input
            :error="$errors->has('spouse_name')"
            id="spouse-name"
            type="text"
            :value="old('spouse_name')"
            name="spouse_name"
            required
            autocomplete="family-name" />
          <span class="text-sm text-gray-600"
            >Uniquement si vous êtes mariée légalement</span
          >
          <x-validation-errors name="spouse_name"></x-validation-errors>
        </div>
        <div class="flex flex-col">
          <label for="genre">Sexe</label>
          <div class="grid grid-cols-2 mt-4">
            <div>
              <input type="radio" id="male" name="genre" value="male" />
              <label for="male">Masculin</label>
            </div>
            <div>
              <input type="radio" id="female" name="genre" value="female" />
              <label for="female">Féminin</label>
            </div>
          </div>
          <x-validation-errors name="spouse_name"></x-validation-errors>
        </div>
        <div class="flex flex-col">
          <label for="email">Email</label>
          <x-input
            :error="$errors->has('email')"
            id="email"
            type="text"
            :value="old('email')"
            name="email"
            required
            autocomplete="email" />
          <x-validation-errors name="email"></x-validation-errors>
        </div>
        <div class="flex flex-col">
          <label for="mailbox">Boîte Postale</label>
          <x-input
            :error="$errors->has('mailbox')"
            id="mailbox"
            type="text"
            :value="old('mailbox')"
            name="mailbox"
            required />
          <x-validation-errors name="mailbox"></x-validation-errors>
        </div>
        <div class="flex items-end">
          <button class="bg-amber-500 px-3 py-2 text-white" @click="step++">
            Suivant
          </button>
        </div>
      </fieldset>
      <fieldset
        x-cloak
        class="grid grid-cols-1 md:grid-cols-2 gap-5"
        x-show="step === 2">
        <div class="flex flex-col">
          <label for="father-last-name">Nom du père</label>
          <x-input
            :error="$errors->has('father_last_name')"
            id="father-last-name"
            type="text"
            :value="old('father_last_name')"
            name="father_last_name"
            required
            autocomplete="family-name"
            autofocus />
          <x-validation-errors name="father_last_name"></x-validation-errors>
        </div>
        <div class="flex flex-col">
          <label for="father-first-name">Prénom du père(s)</label>
          <x-input
            :error="$errors->has('father_first_name')"
            id="father-first-name"
            type="text"
            :value="old('father_first_name')"
            name="father_first_name"
            required
            autocomplete="given-name" />
          <x-validation-errors name="father_first_name"></x-validation-errors>
        </div>
        <div class="flex flex-col">
          <label for="mother-last-name">Nom de la mère</label>
          <x-input
            :error="$errors->has('mother_last_name')"
            id="mother-last-name"
            type="text"
            :value="old('mother_last_name')"
            name="mother_last_name"
            required
            autocomplete="family-name"
            autofocus />
          <x-validation-errors name="mother_last_name"></x-validation-errors>
        </div>
        <div class="flex flex-col">
          <label for="mother-first-name">Prénom de la mère(s)</label>
          <x-input
            :error="$errors->has('mother_first_name')"
            id="mother-first-name"
            type="text"
            :value="old('mother_first_name')"
            name="mother_first_name"
            required
            autocomplete="given-name" />
          <x-validation-errors name="mother_first_name"></x-validation-errors>
        </div>
        <div class="flex flex-col">
          <label for="ethnic-grp">Ethnie</label>
          <x-input
            :error="$errors->has('ethnic_grp')"
            id="ethnic-grp"
            type="text"
            :value="old('ethnic_grp')"
            name="ethnic_grp"
            required />
          <x-validation-errors name="ethnic_grp"></x-validation-errors>
        </div>
        <div class="flex flex-col">
          <label for="arrival-date-ci">Date d'arrivée en Côte d'Ivoire</label>
          <x-input
            :error="$errors->has('arrival_date_ci')"
            id="arrival-date-ci"
            type="date"
            :value="old('arrival_date_ci')"
            name="arrival_date_ci"
            required />
          <x-validation-errors name="arrival_date_ci"></x-validation-errors>
        </div>
        <div class="flex flex-col">
          <label for="residence-commune">Commune de résidence</label>
          <x-input
            :error="$errors->has('residence_commune')"
            id="residence-commune"
            type="text"
            :value="old('residence_commune')"
            name="residence_commune"
            required />
          <x-validation-errors name="residence_commune"></x-validation-errors>
        </div>
        <div class="flex flex-col">
          <label>Situation matrimoniale</label>
          <div class="grid grid-cols-2 mt-4">
            <div>
              <input
                type="radio"
                id="single"
                name="marital_situation"
                value="single" />
              <label for="single">Célibataire</label>
            </div>
            <div>
              <input
                type="radio"
                id="couple"
                name="marital_situation"
                value="couple" />
              <label for="couple">Marié</label>
            </div>
          </div>
          <x-validation-errors name="marital_situation"></x-validation-errors>
        </div>
        <div class="flex flex-col">
          <label for="n-children">Nombre d'enfants</label>
          <x-input
            :error="$errors->has('n_children')"
            id="n-children"
            type="number"
            :value="old('n_children')"
            name="n_children"
            required />
          <x-validation-errors name="email"></x-validation-errors>
        </div>
        <div class="flex flex-col">
          <label for="ravip-number">Numéro d'enrôlement Ravip</label>
          <x-input
            :error="$errors->has('ravip_number')"
            id="ravip-number"
            type="text"
            :value="old('ravip_number')"
            name="ravip_number"
            required />
          <x-validation-errors name="ravip_number"></x-validation-errors>
        </div>
        <div class="flex space-x-4">
          <button class="bg-amber-500 px-3 py-2 text-white" @click="step--">
            Précédent
          </button>
          <button class="bg-amber-500 px-3 py-2 text-white" @click="step++">
            Suivant
          </button>
        </div>
      </fieldset>
      <fieldset
        x-cloak
        class="grid grid-cols-1 md:grid-cols-2 gap-5"
        x-show="step === 3">
        <div class="flex flex-col">
          <label for="benin-contact-fullname">Contact au Bénin</label>
          <x-input
            :error="$errors->has('benin_contact_fullname')"
            id="benin-contact-fullname"
            type="text"
            :value="old('benin_contact_fullname')"
            name="benin_contact_fullname"
            required />
          <x-validation-errors
            name="benin_contact_fullname"></x-validation-errors>
        </div>
        <div class="flex flex-col">
          <label for="benin-contact-phone"
            >Numéro de téléphone du contact</label
          >
          <x-input
            :error="$errors->has('benin_contact_phone')"
            id="benin-contact-phone"
            type="text"
            :value="old('benin_contact_phone')"
            name="benin_contact_phone"
            required />
          <x-validation-errors name="benin_contact_phone"></x-validation-errors>
        </div>
        <div class="flex flex-col">
          <label for="ci-contact-fullname">Contact en Côte d'Ivoire</label>
          <x-input
            :error="$errors->has('ci_contact_fullname')"
            id="ci-contact-fullname"
            type="text"
            :value="old('ci_contact_fullname')"
            name="ci_contact_fullname"
            required />
          <x-validation-errors name="ci_contact_fullname"></x-validation-errors>
        </div>
        <div class="flex flex-col">
          <label for="ci-contact-phone">Numéro de téléphone du contact</label>
          <x-input
            :error="$errors->has('ci_contact_phone')"
            id="ci-contact-phone"
            type="text"
            :value="old('ci_contact_phone')"
            name="ci_contact_phone"
            required />
          <x-validation-errors name="ci_contact_phone"></x-validation-errors>
        </div>
        <div class="flex space-x-4">
          <button class="bg-amber-500 px-3 py-2 text-white" @click="step--">
            Précédent
          </button>
          <button class="bg-amber-500 px-3 py-2 text-white" @click="step++">
            Suivant
          </button>
        </div>
      </fieldset>
      <fieldset
        x-cloak
        class="grid grid-cols-1 md:grid-cols-2 gap-5"
        x-show="step === 4">
        <div class="flex flex-col">
          <label for="eye-color">Couleur des Yeux</label>
          <x-input
            :error="$errors->has('eye_color')"
            id="eye-color"
            type="text"
            :value="old('eye_color')"
            name="eye_color"
            required />
          <x-validation-errors name="eye_color"></x-validation-errors>
        </div>
        <div class="flex flex-col">
          <label for="hair-color">Couleur des cheveux</label>
          <x-input
            :error="$errors->has('hair_color')"
            id="hair-color"
            type="text"
            :value="old('hair_color')"
            name="hair_color"
            required />
          <x-validation-errors name="hair_color"></x-validation-errors>
        </div>
        <div class="flex flex-col">
          <label for="complexion-color">Teint</label>
          <x-input
            :error="$errors->has('complexion_color')"
            id="complexion-color"
            type="text"
            :value="old('complexion_color')"
            name="complexion_color"
            required />
          <x-validation-errors name="complexion_color"></x-validation-errors>
        </div>
        <div class="flex flex-col">
          <label for="height">Taille (en cm)</label>
          <x-input
            :error="$errors->has('height')"
            id="height"
            type="number"
            :value="old('height')"
            name="height"
            required />
          <x-validation-errors name="height"></x-validation-errors>
        </div>
        <div class="flex flex-col md:col-span-2">
          <label for="other-signs">Autres signes</label>
          <x-textarea
            :error="$errors->has('other_signs')"
            id="other-signs"
            type="text"
            name="other_signs"
            required
            >{{ old('other_signs') }}</x-textarea
          >
          <x-validation-errors name="other_signs"></x-validation-errors>
        </div>
        <div class="flex space-x-4">
          <button class="bg-amber-500 px-3 py-2 text-white" @click="step--">
            Précédent
          </button>
        </div>
      </fieldset>
    </form>
  </section>
</x-app-layout>
