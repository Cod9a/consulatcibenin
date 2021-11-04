<x-app-layout>
  <section
    class="max-w-7xl mx-auto px-4 md:px-6 lg:px-8"
    x-data="carteConsulaireDocumentForm({{ $document->id}}, `{{ route('payment.callback') }}`)"
    @photo-updated.window="fields.photo = $event.detail">
    <h3 class="font-medium text-2xl">
      Formulaire de création d'une Carte Consulaire Biométrique
    </h3>

    <div class="my-8 flex justify-between gap-5">
      <template x-for="i in nSteps">
        <div
          :class="i === nSteps ? 'relative flex-shrink-0' : 'relative flex-grow'">
          <button
            :class="
            i === nSteps ?  `w-6 h-6 disabled:bg-gray-500 ${!errors[i - 1] ? 'bg-blue-500' : 'bg-red-500'} inline-flex items-center justify-center rounded-full font-semibold text-white ` : `w-6 h-6 disabled:bg-gray-500 ${!errors[i - 1] ? 'bg-blue-500' : 'bg-red-500'} inline-flex items-center justify-center rounded-full font-semibold text-white after:absolute after:w-full after:h-px after:bg-black after:left-7` "
            x-text="i"
            @click="step = i"
            :disabled="!visited[i - 1]"></button>
        </div>
      </template>
    </div>
    <form x-ref="form" @submit.prevent="onSubmit()">
      <fieldset
        x-cloak
        class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5"
        x-show="step === 1"
        data-step="1">
        <div class="flex flex-col">
          <label for="last-name">Nom</label>
          <x-input
            :error="$errors->has('last_name')"
            id="last-name"
            type="text"
            :value="old('last_name')"
            name="last_name"
            x-model="fields.last_name"
            autocomplete="family-name"
            autofocus
            required />
          <span
            class="text-red-500 text-sm"
            x-text="fieldErrors.last_name"></span>
        </div>
        <div class="flex flex-col">
          <label for="first-name">Prénom(s)</label>
          <x-input
            :error="$errors->has('first_name')"
            id="first-name"
            type="text"
            :value="old('first_name')"
            name="first_name"
            x-model="fields.first_name"
            required
            autocomplete="given-name" />
          <span
            class="text-red-500 text-sm"
            x-text="fieldErrors.first_name"></span>
        </div>
        <div class="flex flex-col">
          <label for="birthdate">Date de naissance</label>
          <x-input
            :error="$errors->has('birthdate')"
            id="birthdate"
            type="date"
            :value="old('birthdate')"
            name="birthdate"
            x-model="fields.birthdate"
            required
            autocomplete="bday" />
          <span
            class="text-red-500 text-sm"
            x-text="fieldErrors.birthdate"></span>
        </div>
        <div class="flex flex-col">
          <label for="origin-country">Pays de naissance</label>
          <x-input
            :error="$errors->has('origin_country')"
            id="origin-country"
            type="text"
            :value="old('origin_country')"
            name="origin_country"
            x-model="fields.origin_country"
            required
            autocomplete="country-name" />
          <span
            class="text-red-500 text-sm"
            x-text="fieldErrors.origin_country"></span>
        </div>
        <div class="flex flex-col">
          <label for="origin-commune">Commune de naissance</label>
          <x-input
            :error="$errors->has('origine_commune')"
            id="origin-commune"
            type="text"
            :value="old('origin_commune')"
            name="origin_commune"
            x-model="fields.origin_commune"
            required />
          <span
            class="text-red-500 text-sm"
            x-text="fieldErrors.origin_commune"></span>
        </div>
        <div class="flex flex-col">
          <label for="job">Profession</label>
          <x-input
            :error="$errors->has('job')"
            id="job"
            type="text"
            :value="old('job')"
            name="job"
            x-model="fields.job"
            required
            autocomplete="organization-title" />
          <span class="text-red-500 text-sm" x-text="fieldErrors.job"></span>
        </div>
        <div class="flex flex-col">
          <label for="diploma">Diplôme</label>
          <x-input
            :error="$errors->has('diploma')"
            id="diploma"
            type="text"
            :value="old('diploma')"
            name="diploma"
            x-model="fields.diploma"
            required />
          <span
            class="text-red-500 text-sm"
            x-text="fieldErrors.diploma"></span>
        </div>
        <div class="flex flex-col">
          <label for="phone">Numéro de téléphone</label>
          <x-input
            :error="$errors->has('phone')"
            id="phone"
            type="text"
            :value="old('phone')"
            name="phone"
            x-model="fields.phone"
            required
            autocomplete="tel" />
          <span class="text-red-500 text-sm" x-text="fieldErrors.phone"></span>
        </div>
        <div class="flex flex-col">
          <label for="phone-alt">Numéro de téléphone alternatif</label>
          <x-input
            :error="$errors->has('phone_alt')"
            id="phone-alt"
            type="text"
            :value="old('phone_alt')"
            name="phone_alt"
            x-model="fields.phone_alt"
            autocomplete="tel" />
          <span
            class="text-red-500 text-sm"
            x-text="fieldErrors.phone_alt"></span>
        </div>
        <div class="flex flex-col">
          <label for="genre">Sexe</label>
          <div class="grid grid-cols-2 mt-4">
            <div>
              <input
                type="radio"
                id="male"
                name="genre"
                value="male"
                x-model="fields.genre" />
              <label for="male">Masculin</label>
            </div>
            <div>
              <input
                type="radio"
                id="female"
                name="genre"
                value="female"
                x-model="fields.genre" />
              <label for="female">Féminin</label>
            </div>
          </div>
          <span class="text-red-500 text-sm" x-text="fieldErrors.genre"></span>
        </div>
        <div class="flex flex-col">
          <label for="spouse-name">Nom de votre époux</label>
          <x-input
            :error="$errors->has('spouse_name')"
            id="spouse-name"
            type="text"
            :value="old('spouse_name')"
            name="spouse_name"
            x-model="fields.spouse_name"
            ::disabled="fields.genre === 'male'"
            autocomplete="family-name" />
          <span class="text-sm text-gray-600"
            >Uniquement si vous êtes mariée légalement</span
          >
          <span
            class="text-red-500 text-sm"
            x-text="fieldErrors.spouse_name"></span>
        </div>
        <div class="flex flex-col">
          <label for="email">Email</label>
          <x-input
            :error="$errors->has('email')"
            id="email"
            type="text"
            :value="old('email')"
            name="email"
            x-model="fields.email"
            required
            autocomplete="email" />
          <span class="text-red-500 text-sm" x-text="fieldErrors.email"></span>
        </div>
        <div class="flex flex-col">
          <label for="mailbox">Boîte Postale</label>
          <x-input
            :error="$errors->has('mailbox')"
            id="mailbox"
            type="text"
            :value="old('mailbox')"
            name="mailbox"
            x-model="fields.mailbox" />
          <span
            class="text-red-500 text-sm"
            x-text="fieldErrors.mailbox"></span>
        </div>
        <div class="lg:col-span-2"></div>
      </fieldset>
      <fieldset
        x-cloak
        class="grid grid-cols-1 md:grid-cols-2 gap-5"
        x-show="step === 2"
        data-step="2">
        <div class="flex flex-col">
          <label for="father-last-name">Nom du père</label>
          <x-input
            :error="$errors->has('father_last_name')"
            id="father-last-name"
            type="text"
            :value="old('father_last_name')"
            name="father_last_name"
            x-model="fields.father_last_name"
            required
            autocomplete="family-name" />
          <span
            class="text-red-500 text-sm"
            x-text="fieldErrors.father_last_name"></span>
        </div>
        <div class="flex flex-col">
          <label for="father-first-name">Prénom du père(s)</label>
          <x-input
            :error="$errors->has('father_first_name')"
            id="father-first-name"
            type="text"
            :value="old('father_first_name')"
            name="father_first_name"
            x-model="fields.father_first_name"
            required
            autocomplete="given-name" />
          <span
            class="text-red-500 text-sm"
            x-text="fieldErrors.father_first_name"></span>
        </div>
        <div class="flex flex-col">
          <label for="mother-last-name">Nom de la mère</label>
          <x-input
            :error="$errors->has('mother_last_name')"
            id="mother-last-name"
            type="text"
            :value="old('mother_last_name')"
            name="mother_last_name"
            x-model="fields.mother_last_name"
            required
            autocomplete="family-name" />
          <span
            class="text-red-500 text-sm"
            x-text="fieldErrors.mother_last_name"></span>
        </div>
        <div class="flex flex-col">
          <label for="mother-first-name">Prénom de la mère(s)</label>
          <x-input
            :error="$errors->has('mother_first_name')"
            id="mother-first-name"
            type="text"
            :value="old('mother_first_name')"
            name="mother_first_name"
            x-model="fields.mother_first_name"
            required
            autocomplete="given-name" />
          <span
            class="text-red-500 text-sm"
            x-text="fieldErrors.mother_first_name"></span>
        </div>
        <div class="flex flex-col">
          <label for="ethnic-grp">Ethnie</label>
          <x-input
            :error="$errors->has('ethnic_grp')"
            id="ethnic-grp"
            type="text"
            :value="old('ethnic_grp')"
            name="ethnic_grp"
            x-model="fields.ethnic_grp"
            required />
          <span
            class="text-red-500 text-sm"
            x-text="fieldErrors.ethnic_grp"></span>
        </div>
        <div class="flex flex-col">
          <label for="arrival-date-ci">Date d'arrivée en Côte d'Ivoire</label>
          <x-input
            :error="$errors->has('arrival_date_ci')"
            id="arrival-date-ci"
            type="date"
            :value="old('arrival_date_ci')"
            name="arrival_date_ci"
            x-model="fields.arrival_date_ci"
            required />
          <span
            class="text-red-500 text-sm"
            x-text="fieldErrors.arrival_date_ci"></span>
        </div>
        <div class="flex flex-col">
          <label for="residence-commune">Commune de résidence</label>
          <x-input
            :error="$errors->has('residence_commune')"
            id="residence-commune"
            type="text"
            :value="old('residence_commune')"
            name="residence_commune"
            x-model="fields.residence_commune"
            required />
          <span
            class="text-red-500 text-sm"
            x-text="fieldErrors.residence_commune"></span>
        </div>
        <div class="flex flex-col">
          <label>Situation matrimoniale</label>
          <div class="grid grid-cols-2 mt-4">
            <div>
              <input
                type="radio"
                id="single"
                name="marital_situationformData"
                x-model="fields.marital_situation"
                checked
                value="single" />
              <label for="single">Célibataire</label>
            </div>
            <div>
              <input
                type="radio"
                id="couple"
                name="marital_situation"
                x-model="fields.marital_situation"
                value="couple" />
              <label for="couple">Marié</label>
            </div>
          </div>
          <span
            class="text-red-500 text-sm"
            x-text="fieldErrors.marital_situation"></span>
        </div>
        <div class="flex flex-col">
          <label for="n-children">Nombre d'enfants</label>
          <x-input
            :error="$errors->has('n_children')"
            id="n-children"
            type="number"
            :value="old('n_children')"
            name="n_children"
            x-model="fields.n_children"
            required />
          <span
            class="text-red-500 text-sm"
            x-text="fieldErrors.n_children"></span>
        </div>
        <div class="flex flex-col">
          <label for="ravip-number">Numéro d'enrôlement Ravip</label>
          <x-input
            :error="$errors->has('ravip_number')"
            id="ravip-number"
            type="text"
            :value="old('ravip_number')"
            name="ravip_number"
            x-model="fields.ravip_number"
            required />
          <span
            class="text-red-500 text-sm"
            x-text="fieldErrors.ravip_number"></span>
        </div>
      </fieldset>
      <fieldset
        x-cloak
        class="grid grid-cols-1 md:grid-cols-2 gap-5"
        x-show="step === 3"
        data-step="3">
        <div class="flex flex-col">
          <label for="benin-contact-fullname">Contact au Bénin</label>
          <x-input
            :error="$errors->has('benin_contact_fullname')"
            id="benin-contact-fullname"
            type="text"
            :value="old('benin_contact_fullname')"
            name="benin_contact_fullname"
            x-model="fields.benin_contact_fullname"
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
            x-model="fields.benin_contact_phone"
            required />
          <span
            class="text-red-500 text-sm"
            x-text="fieldErrors.benin_contact_phone"></span>
        </div>
        <div class="flex flex-col">
          <label for="ci-contact-fullname">Contact en Côte d'Ivoire</label>
          <x-input
            :error="$errors->has('ci_contact_fullname')"
            id="ci-contact-fullname"
            type="text"
            :value="old('ci_contact_fullname')"
            name="ci_contact_fullname"
            x-model="fields.ci_contact_fullname"
            required />
          <span
            class="text-red-500 text-sm"
            x-text="fieldErrors.ci_contact_fullname"></span>
        </div>
        <div class="flex flex-col">
          <label for="ci-contact-phone">Numéro de téléphone du contact</label>
          <x-input
            :error="$errors->has('ci_contact_phone')"
            id="ci-contact-phone"
            type="text"
            :value="old('ci_contact_phone')"
            name="ci_contact_phone"
            x-model="fields.ci_contact_phone"
            required />
          <span
            class="text-red-500 text-sm"
            x-text="fieldErrors.ci_contact_phone"></span>
        </div>
      </fieldset>
      <fieldset
        x-cloak
        class="grid grid-cols-1 md:grid-cols-2 gap-5"
        x-show="step === 4"
        data-step="4">
        <div
          x-data="{photoName: null, photoPreview: null, photo: null}"
          class="row-span-1 sm:row-span-2"
          x-model="photo">
          <!-- Profile Photo File Input -->
          <input
            type="file"
            class="hidden"
            x-ref="photo"
            x-on:change="
                photoName = $refs.photo.files[0].name;
                $dispatch('photo-updated', $refs.photo.files[0]);
                console.log($refs.photo.files[0])
                const reader = new FileReader();
                reader.onload = (e) => {
                    photoPreview = e.target.result;
                };
                reader.readAsDataURL($refs.photo.files[0]);
            " />

          <label for="photo">Photo</label>

          <!-- Current Profile Photo -->
          <div class="mt-2" x-show="photoPreview">
            <img
              src=""
              alt=""
              class="rounded-full h-20 w-20 object-cover object-center"
              x-bind:style="'background-image: url(\'' + photoPreview + '\');'" />
          </div>

          <!-- New Profile Photo Preview -->
          <div class="mt-2" x-show="! photoPreview">
            <span
              class="
                block
                rounded-full
                w-20
                h-20
                bg-white
                inline-flex
                items-center
                justify-center
                border
              ">
              <svg
                class="w-8 h-8 text-gray-700"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
              </svg>
            </span>
          </div>

          <button
            type="button"
            class="
              mt-2
              mr-2
              inline-flex
              items-center
              px-4
              py-2
              bg-white
              border border-gray-300
              rounded-md
              font-semibold
              text-xs text-gray-700
              uppercase
              tracking-widest
              shadow-sm
              hover:text-gray-500
              focus:outline-none
              focus:border-blue-300
              focus:ring
              focus:ring-blue-200
              active:text-gray-800 active:bg-gray-50
              disabled:opacity-25
              transition
            "
            x-on:click.prevent="$refs.photo.click()">
            Choisir une nouvelle photo
          </button>

          <span
            class="text-red-500 text-sm block mt-2"
            x-text="fieldErrors.photo"></span>
        </div>
        <div class="flex flex-col">
          <label for="eye-color">Couleur des Yeux</label>
          <x-input
            :error="$errors->has('eye_color')"
            id="eye-color"
            type="text"
            :value="old('eye_color')"
            name="eye_color"
            x-model="fields.eye_color"
            required />
          <span
            class="text-red-500 text-sm"
            x-text="fieldErrors.eye_color"></span>
        </div>
        <div class="flex flex-col">
          <label for="hair-color">Couleur des cheveux</label>
          <x-input
            :error="$errors->has('hair_color')"
            id="hair-color"
            type="text"
            :value="old('hair_color')"
            name="hair_color"
            x-model="fields.hair_color"
            required />
          <span
            class="text-red-500 text-sm"
            x-text="fieldErrors.hair_color"></span>
        </div>
        <div class="flex flex-col">
          <label for="complexion-color">Teint</label>
          <x-input
            :error="$errors->has('complexion_color')"
            id="complexion-color"
            type="text"
            :value="old('complexion_color')"
            name="complexion_color"
            x-model="fields.complexion_color"
            required />
          <span
            class="text-red-500 text-sm"
            x-text="fieldErrors.complexion_color"></span>
        </div>
        <div class="flex flex-col">
          <label for="height">Taille (en cm)</label>
          <x-input
            :error="$errors->has('height')"
            id="height"
            type="number"
            :value="old('height')"
            name="height"
            x-model="fields.height"
            required />
          <span class="text-red-500 text-sm" x-text="fieldErrors.height"></span>
        </div>
        <div class="flex flex-col md:col-span-2">
          <label for="other-signs">Autres signes</label>
          <x-textarea
            :error="$errors->has('other_signs')"
            id="other-signs"
            type="text"
            name="other_signs"
            x-model="fields.other_signs"
            >{{ old('other_signs') }}</x-textarea
          >
          <span
            class="text-red-500 text-sm"
            x-text="fieldErrors.other_signs"></span>
        </div>
        <div>
          <button type="submit" class="px-4 py-2 bg-blue-500 text-white mt-2">
            Procéder au paiement
          </button>
        </div>
      </fieldset>

      <div class="flex space-x-4 mt-12">
        <button
          class="bg-amber-500 px-3 py-2 text-white disabled:opacity-50"
          @click.prevent="step--"
          :disabled="step <= 1">
          Précédent
        </button>
        <button
          class="bg-amber-500 px-3 py-2 text-white disabled:opacity-50"
          @click.prevent="nextStep()"
          :disabled="step >= 4">
          Suivant
        </button>
      </div>

      <x-sucess-modal x-show="successModal">
        <x-slot name="title"> Demande créé avec succès </x-slot>
        <x-slot name="description">
          Votre demande a été créé avec succès. Les informations supplémentaires
          vous ont été communiqué au mail sus-mentionné.
        </x-slot>
        <x-slot name="actions">
          <a
            href="/"
            class="
              w-full
              inline-flex
              justify-center
              rounded-md
              border border-transparent
              shadow-sm
              px-4
              py-2
              bg-blue-600
              text-base
              font-medium
              text-white
              hover:bg-blue-700
              focus:outline-none
              focus:ring-2
              focus:ring-offset-2
              focus:ring-blue-500
              sm:ml-3 sm:text-sm
            ">
            Retourner à l'accueil
          </a>
        </x-slot>
      </x-sucess-modal>
    </form>
  </section>
</x-app-layout>
