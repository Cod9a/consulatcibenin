<x-app-layout>
  <section
    class="max-w-7xl mx-auto px-4 md:px-6 lg:px-8"
    x-data="carteConsulaireDocumentForm({{ $document->id }}, `{{ route('payment.callback') }}`)"
    @photo-updated.window="fields.photo = $event.detail" @certificate-updated.window="fields.certificate = $event.detail" @certificate-ID.window="fields.ID = $event.detail">
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
    <form x-ref="form" @submit.prevent="onSubmit()" x-data="{photoName: null, photoPreview: null, photo: null, certificateName: null, certificatePreview: null, certificate: null, ID: null, IDPreview: null, IDName: null, verify: null}">
      <fieldset
        x-cloak
        class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5"
        x-show="step === 1"
        data-step="1">
        <div class="flex flex-col">
          <label for="last-name">Nom <span
            class="text-red-500 text-sm">*</span></label>
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
          <label for="first-name">Prénom(s) <span
            class="text-red-500 text-sm">*</span></label>
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
          <label for="birthdate">Date de naissance <span
            class="text-red-500 text-sm">*</span></label>
          <x-input
            :error="$errors->has('birthdate')"
            id="birthdate"
            type="date"
            onkeydown="return true"
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
          <label for="origin-country">Pays de naissance <span
            class="text-red-500 text-sm">*</span></label>
            <select class="mt-2" x-model="fields.origin_country" required name="origin_country">
              <option value default hidden>-- Pays d'origine --</option>
              @foreach($countries as $index => $country)
                <option value="{{ $country->country }}">{{ $country->country }}</option>
              @endforeach
            </select>
          <span
            class="text-red-500 text-sm"
            x-text="fieldErrors.origin_country"></span>
        </div>
        <div class="flex flex-col">
          <label for="origin_commune">Commune de naissance <span
            class="text-red-500 text-sm">*</span></label>
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
          <label for="job">Profession <span
            class="text-red-500 text-sm">*</span></label> 
            <x-input
            :error="$errors->has('job')"
            id="diploma"
            type="text"
            :value="old('job')"
            name="job"
            x-model="fields.job"
            required />
          <span class="text-red-500 text-sm" x-text="fieldErrors.job"></span>
        </div>
        <div class="flex flex-col">
          <label for="diploma">Diplôme <span
            class="text-red-500 text-sm">*</span></label>
          <select class="mt-2" x-model="fields.diploma" required name="diploma">
              <option value default hidden>-- Diplôme --</option>
              <option value="BAC">BAC</option>
              <option value="BEPC">BEPC</option>
              <option value="CAP">CAP</option>
              <option value="CEP">CEP</option>
              <option value="Doctorat">Doctorat</option>
              <option value="Licence">Licence</option>
              <option value="Master">Master</option>
              <option value="Pas de diplôme">Pas de diplôme</option>
              <option value="Autres">Autres</option>
            </select>
          <span
            class="text-red-500 text-sm"
            x-text="fieldErrors.diploma"></span>
        </div>
        <div class="flex flex-col">
          <label for="phone">Numéro de téléphone <span
            class="text-red-500 text-sm">*</span></label>
          <x-phone-input
            :error="$errors->has('phone')"
            x-model="fields.phone"
            id="phone"
            name="phone"
            :default="229"
            required
            autocomplete="tel" />
          {{-- <x-input
            :error="$errors->has('phone')"
            id="phone"
            type="text"
            :value="old('phone')"
            name="phone"
            x-model="fields.phone"
            required
            autocomplete="tel" /> --}}
          <span class="text-red-500 text-sm" x-text="fieldErrors.phone"></span>
        </div>
        <div class="flex flex-col">
          <label for="phone-alt">Numéro de téléphone alternatif <span
            class="text-red-500 text-sm">*</span></label>
          <x-phone-input
            :error="$errors->has('phone_alt')"
            id="phone-alt"
            name="phone_alt"
            :default="225"
            x-model="fields.phone_alt"
            required
            autocomplete="tel" />
          <span
            class="text-red-500 text-sm"
            x-text="fieldErrors.phone_alt"></span>
        </div>
        <div class="flex flex-col">
          <label for="genre">Sexe <span
            class="text-red-500 text-sm">*</span></label>
          <div class="grid grid-cols-2 mt-4">
            <div>
              <input
                type="radio"
                id="male"
                name="genre"
                value="male"
                required
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
          <label for="spouse-name">Nom de votre époux </label>
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
          <label for="email">Email <span
            class="text-red-500 text-sm">*</span></label>
          <x-input
            :error="$errors->has('email')"
            id="email"
            type="email"
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
          <label for="father-last-name">Nom du père <span
            class="text-red-500 text-sm">*</span></label>
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
          <label for="father-first-name">Prénom(s) du père <span
            class="text-red-500 text-sm">*</span></label>
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
          <label for="mother-last-name">Nom de la mère <span
            class="text-red-500 text-sm">*</span></label>
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
          <label for="mother-first-name">Prénom(s) de la mère <span
            class="text-red-500 text-sm">*</span></label>
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
          <label for="ethnic-grp">Ethnie <span
            class="text-red-500 text-sm">*</span></label>
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
          <label for="arrival-date-ci">Date d'arrivée en Côte d'Ivoire <span
            class="text-red-500 text-sm">*</span></label>
          <x-input
            :error="$errors->has('arrival_date_ci')"
            id="arrival-date-ci"
            type="date"
            onkeydown="return true"
            class="customInputDate"
            :value="old('arrival_date_ci')"
            name="arrival_date_ci"
            x-model="fields.arrival_date_ci"
            required />
          <span class="text-sm text-gray-600">Elle doit être antérieure à celle d'aujourd'hui</span>
          <span
            class="text-red-500 text-sm"
            x-text="fieldErrors.arrival_date_ci"></span>
        </div>
        <div class="flex flex-col">
          <label for="residence-commune">Commune de résidence <span
            class="text-red-500 text-sm">*</span></label>
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
          <label>Situation matrimoniale </label>
          <div class="grid grid-cols-2 mt-4">
            <div>
              <input
                type="radio"
                id="single"
                name="marital_situation"
                x-model="fields.marital_situation"
                checked
                required
                value="single" />
              <label for="single">Célibataire</label>
            </div>
            <div>
              <input
                type="radio"
                id="couple"
                name="marital_situation"
                x-model="fields.marital_situation"
                value="maried" />
              <label for="couple">Marié</label>
            </div>
          </div>
          <span
            class="text-red-500 text-sm"
            x-text="fieldErrors.marital_situation"></span>
        </div>
        <div class="flex flex-col">
          <label for="n-children">Nombre d'enfants <span
            class="text-red-500 text-sm">*</span></label>
          <x-input
            :error="$errors->has('n_children')"
            id="n-children"
            type="number"
            :value="old('n_children')"
            name="n_children"
            x-model="fields.n_children"
            min=0
            max=30
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
            x-model="fields.ravip_number" />
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
          <label for="benin-contact-fullname">Contact au Bénin (Nom complet) <span
            class="text-red-500 text-sm">*</span></label>
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
            >Numéro de téléphone du contact <span
            class="text-red-500 text-sm">*</span></label
          >
          <x-phone-input
            :error="$errors->has('benin_contact_phone')"
            :default="229"
            id="benin-contact-phone"
            name="benin_contact_phone"
            x-model="fields.benin_contact_phone"
            required />
          <span
            class="text-red-500 text-sm"
            x-text="fieldErrors.benin_contact_phone"></span>
        </div>
        <div class="flex flex-col">
          <label for="ci-contact-fullname">Contact en Côte d'Ivoire (Nom complet) <span
            class="text-red-500 text-sm">*</span></label>
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
          <label for="ci-contact-phone">Numéro de téléphone du contact <span
            class="text-red-500 text-sm">*</span></label>
          <x-phone-input
            :default="225"
            :error="$errors->has('ci_contact_phone')"
            id="ci-contact-phone"
            name="ci_contact_phone"
            required
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
        <div class="flex flex-col">
          <label for="eye-color">Couleur des Yeux<span
            class="text-red-500 text-sm">*</span></label>
            <select x-model="fields.eye_color" required class="mt-2">
              <option value="" default hidden>-- Couleur des yeux --</option>
              <option value="Bleu">Bleu</option>
              <option value="Gris">Gris</option>
              <option value="Marron">Marron</option>
              <option value="Noisette">Noisette</option>
              <option value="Vert">Vert</option>
            </select>
          <!-- <x-input
            :error="$errors->has('eye_color')"
            id="eye-color"
            type="text"
            :value="old('eye_color')"
            name="eye_color"
            x-model="fields.eye_color"
            required /> -->

          <span
            class="text-red-500 text-sm"
            x-text="fieldErrors.eye_color"></span>
        </div>
        <div class="flex flex-col">
          <label for="hair-color">Couleur des cheveux<span
            class="text-red-500 text-sm">*</span></label>
            <select x-model="fields.hair_color" required class="mt-2">
              <option value="" default hidden>-- Couleur des cheveux --</option>
              <option value="Blanc">Blanc</option>
              <option value="Noir">Noir</option>
              <option value="Roux">Roux</option>
            </select>
          <!-- <x-input
            :error="$errors->has('hair_color')"
            id="hair-color"
            type="text"
            :value="old('hair_color')"
            name="hair_color"
            x-model="fields.hair_color"
            required /> -->
          <span
            class="text-red-500 text-sm"
            x-text="fieldErrors.hair_color"></span>
        </div>
        <div class="flex flex-col">
          <label for="complexion-color">Teint<span
            class="text-red-500 text-sm">*</span></label>
          <select x-model="fields.complexion_color" required class="mt-2">
            <option value="" default hidden>-- Teint --</option>
            <option value="Albinos">Albinos</option>
            <option value="Blond">Blond</option>
            <option value="Clair">Clair</option>
            <option value="Noir">Noir</option>
            <option value="Roux">Roux</option>
          </select>
          <!-- <x-input
            :error="$errors->has('complexion_color')"
            id="complexion-color"
            type="text"
            :value="old('complexion_color')"
            name="complexion_color"
            x-model="fields.complexion_color"
            required /> -->
          <span
            class="text-red-500 text-sm"
            x-text="fieldErrors.complexion_color"></span>
        </div>
        <div class="flex flex-col">
          <label for="height">Taille (en cm)<span
            class="text-red-500 text-sm">*</span></label>
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
        <div
          class="row-span-1 sm:row-span-2"
          x-model="photo"
          >
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

          <label for="photo">Photo (Facultatif)</label>
          <span class="mt-1 text-sm font-medium tracking wide block text-gray-500 mb-2">Assurez-vous que votre photo est au format jpg ou png et qu'il pèse moins de <strong>1024 Ko</strong></span>
          
          <div class="mt-2" x-show="photoPreview">
            <iframe class="w-full preview overflow-x-hidden" x-bind:src="photoPreview"></iframe>
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
              <i class="fa-solid fa-user fa-2x text-gray-700"></i>
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
        <div
          class="row-span-1 sm:row-span-2"
          x-model="certificate"
          >
          <!-- Birth certificate File Input -->
          <input
            type="file"
            class="hidden"
            x-ref="certificate"
            x-on:change="
                certificateName = $refs.certificate.files[0].name;
                $dispatch('certificat-updated', $refs.certificate.files[0]);
                console.log($refs.certificate.files[0].size)
                const reader2 = new FileReader();
                reader2.onload = (e) => {
                    certificatePreview = e.target.result;
                };
                reader2.readAsDataURL($refs.certificate.files[0]);
            " />

          <label for="certificat">Certificat de naissance (Facultatif)</label>
          <span class="mt-1 text-sm font-medium tracking wide block text-gray-500 mb-2">Assurez-vous que le certificat de naissance est au format jpg, png ou pdf et qu'il pèse moins de <strong>1024 Ko</strong></span>
          <div class="mt-2" x-show="certificatePreview">
            <iframe class="w-full preview overflow-x-hidden" x-bind:src="certificatePreview"></iframe>
          </div>

          <!-- New Profile Certificate Preview -->
          <div class="mt-2" x-show="!certificatePreview">
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
              <i class="fa-solid fa-file fa-2x text-gray-700"></i>
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
            x-on:click.prevent="$refs.certificate.click()">
            Choisir une nouveau certificat
          </button>

          <span
            class="text-red-500 text-sm block mt-2"
            x-text="fieldErrors.photo"></span>
        </div>
        <div
          class="row-span-1 sm:row-span-2"
          x-model="ID"
          >
          <!-- Profile ID File Input -->
          <input
            type="file"
            class="hidden"
            x-ref="ID"
            x-on:change="
                IDName = $refs.ID.files[0].name;
                $dispatch('photo-updated', $refs.ID.files[0]);
                console.log($refs.ID.files[0])
                const reader3 = new FileReader();
                reader3.onload = (e) => {
                    IDPreview = e.target.result;
                };
                reader3.readAsDataURL($refs.ID.files[0]);
            " />

          <label for="photo">Pièce d'dentité (facultatif)</label>
          <span class="mt-1 text-sm font-medium tracking wide block text-gray-500 mb-2">Assurez-vous que la pièce d'identité est au format jpg, png ou pdf et qu'il pèse moins de <strong>1024 Ko</strong></span>

          <div class="mt-2" x-show="photoPreview">
            <iframe class="w-full preview overflow-x-hidden" x-bind:src="IDPreview"></iframe>
          </div>

          <!-- New Profile ID Preview -->
          <div class="mt-2" x-show="!IDPreview">
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
              <i class="fa-solid fa-file fa-2x text-gray-700"></i>
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
            x-on:click.prevent="$refs.ID.click()">
            Choisir une nouvelle pièce d'identité
          </button>

          <span
            class="text-red-500 text-sm block mt-2"
            x-text="fieldErrors.photo"></span>
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
      </fieldset>

      <fieldset
        x-cloak
        class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5"
        x-show="step === 5"
        data-step="5">
        <legend class="text-xl font-medium mb-4">Informations supplémentaires</legend>
        <div class="flex flex-col">
          <div class="flex flex-row items-center mb-4">
            <input type="checkbox" name="rdv" class="mr-2" id="rdv" x-model="fields.rdv" value="check">
            <label for="rdv">Je veux prendre un rendez-vous VIP<span
              class="text-red-500 text-sm">(frais sups : 2000F)</span></label>
          </div>
          <div x-show="fields.rdv" x-cloak class="mb-4">
            <div class="flex flex-col mb-4">
              <label for="enrollment">Date d'enrôlement  <span class="text-red-500 text-sm">(deux jours ouvrables après la demande)</span></label>
              <x-input
                :error="$errors->has('enrollment_date')"
                id="enrollment_date"
                type="date"
                :value="old('enrollment_date')"
                name="enrollment_date"
                x-model="fields.enrollment_date"
                autocomplete="bday" />
              <span
                class="text-red-500 text-sm"
                x-text="fieldErrors.enrollment_date"></span>
            </div>
            <div class="flex flex-col mb-4">
              <label for="enrollment">Heure d'enrôlement <span class="text-red-500 text-sm">(08:00 à 11:30)</span></label>
              <x-input
                :error="$errors->has('enrollment_time')"
                id="enrollment_time"
                type="time"
                :value="old('enrollment_time')"
                name="enrollment_time"
                x-model="fields.enrollment_time" />
              <span
                class="text-red-500 text-sm"
                x-text="fieldErrors.enrollment_time"></span>
            </div>
          </div>

          <div class="flex flex-row items-center">
              <input type="checkbox" name="ship" class="mr-2" id="ship" x-model="fields.ship" value="ship">
              <label for="ship">Je veux me faire livrer <span
                class="text-red-500 text-sm">(frais sups : 1000F)</span></label>
          </div>
          <!-- <div x-show="ship != ''" x-cloak class="my-4">
            <div class="flex flex-col">
              <label for="enrollment">Adresse complète de livraison<span
                class="text-red-500 text-sm"></span></label>
                <x-textarea :error="$errors->has('enrollment_date')"
                id="enrollment_date"
                name="enrollment_date"
                x-model="fields.enrollment_date"></x-textarea>
              <span
                class="text-red-500 text-sm"
                x-text="fieldErrors.enrollment_date"></span>
            </div>
          </div> -->

          <div class="flex flex-row items-center mt-4">
              <input type="checkbox" name="mail" class="mr-2" id="mail" x-model="fields.mail" value="mail" checked>
              <label for="mail">Je veux recevoir un mail</label>
          </div>
          <div class="flex flex-row items-center mt-4">
              <input type="checkbox" name="sms" class="mr-2" id="sms" x-model="fields.sms" value="sms">
              <label for="sms">Je veux recevoir un SMS <span
                class="text-red-500 text-sm">(frais sups : 100F)</span></label>
          </div>
        </div>
        
      </fieldset>

      <fieldset
        x-cloak
        class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5"
        x-show="step === 6"
        data-step="6">
        <legend class="text-xl font-medium mb-4 text-red-500">Veuillez relire les informations renseignées et cocher l'accusé de lecture</legend>
        <div class="flex flex-col mt-4">
          <label class="font-semibold">Photo</label>
          <p x-show="photoPreview" class="mt-2">
              <iframe class="w-full preview overflow-x-hidden" x-bind:src="photoPreview"></iframe>
          </p>
          <div class="mt-2" x-show="!photoPreview">
            <span>
              -
            </span>
          </div>
        </div>
        <div class="flex flex-col mt-4">
          <label class="font-semibold">Acte de naissance</label>
          <p x-show="certificatePreview" class="mt-2">
              <iframe class="w-full preview overflow-x-hidden" x-bind:src="certificatePreview"></iframe>
          </p>
          <div class="mt-2" x-show="!certificatePreview">
            <span>
              -
            </span>
          </div>
        </div>
        <div class="flex flex-col mt-4">
          <label class="font-semibold">Pièce d'dentité</label>
          <p x-show="IDPreview" class="mt-2">
              <iframe class="w-full preview overflow-x-hidden" x-bind:src="IDPreview"></iframe>
          </p>
          <div class="mt-2" x-show="!IDPreview">
            <span>
              -
            </span>
          </div>
        </div>
        <div class="flex flex-col mt-4">
          <label class="font-semibold">Nom</label>
          <p x-text="fields.last_name ? fields.last_name : '-'"></p>
        </div>
        <div class="flex flex-col mt-4">
          <label class="font-semibold">Prénom(s)</label>
          <p x-text="fields.first_name ? fields.first_name : '-'"></p>
        </div>
        <div class="flex flex-col mt-4">
          <label class="font-semibold">Date de naissance</label>
          <p x-text="fields.birthdate ? formatted(fields.birthdate) : '-'"></p>
        </div>
        <div class="flex flex-col mt-4">
          <label class="font-semibold">Pays de naissance</label>
          <p x-text="fields.origin_country ? fields.origin_country : '-'"></p>
        </div>
        <div class="flex flex-col mt-4">
          <label class="font-semibold">Commune de naissance</label>
          <p x-text="fields.origin_commune ? fields.origin_commune : '-'"></p>
        </div>
        <div class="flex flex-col mt-4">
          <label class="font-semibold">Profession</label>
          <p x-text="fields.job ? fields.job : '-'"></p>
        </div>
        <div class="flex flex-col mt-4">
          <label class="font-semibold">Diplôme</label>
          <p x-text="fields.diploma ? fields.diploma : '-'"></p>
        </div>
        <div class="flex flex-col mt-4">
          <label class="font-semibold">Numero de téléphone</label>
          <p x-text="fields.phone ? fields.phone : '-'"></p>
          <!-- <a x-bind:href="'http://localhost:8000/sms/'+fields.phone" class="text-xs text-blue-500">Recevoir un message pour voir si le numéro est correcte</a> -->
        </div>
        <div class="flex flex-col mt-4">
          <label class="font-semibold">Numéro de téléphone alternatif</label>
          <p x-text="fields.phone_alt ? fields.phone_alt : '-'"></p>
        </div>
        <div class="flex flex-col mt-4">
          <label class="font-semibold">Sexe</label>
          <p x-text="fields.genre ? (fields.genre == 'male' ? 'Masculin' : 'Féminin') : ''"></p>
        </div>
        <div class="flex flex-col mt-4">
          <label class="font-semibold">Email</label>
          <p x-text="fields.email ? fields.email : '-'"></p>
        </div>
        <div class="flex flex-col mt-4">
          <label class="font-semibold">Boîte postale</label>
          <p x-text="fields.mailbox ? fields.mailbox : '-'"></p>
        </div>
        <div class="flex flex-col mt-4">
          <label class="font-semibold">Nom du père</label>
          <p x-text="fields.father_last_name ? fields.father_last_name : '-'"></p>
        </div>
        <div class="flex flex-col mt-4">
          <label class="font-semibold">Prénom(s) du père</label>
          <p x-text="fields.father_first_name ? fields.father_first_name : '-'"></p>
        </div>
        <div class="flex flex-col mt-4">
          <label class="font-semibold">Nom de la mère</label>
          <p x-text="fields.mother_last_name ? fields.mother_last_name : '-'"></p>
        </div>
        <div class="flex flex-col mt-4">
          <label class="font-semibold">Prénom(s) de la mère</label>
          <p x-text="fields.mother_first_name ? fields.mother_first_name : '-'"></p>
        </div>
        <div class="flex flex-col mt-4">
          <label class="font-semibold">Ethnie</label>
          <p x-text="fields.ethnic_grp ? fields.ethnic_grp : '-'"></p>
        </div>
        <div class="flex flex-col mt-4">
          <label class="font-semibold">Date d'arrivée en Côte d'ivoire</label>
          <p x-text="fields.arrival_date_ci ? formatted(fields.arrival_date_ci) : '-'"></p>
        </div>
        <div class="flex flex-col mt-4">
          <label class="font-semibold">Commune de résidence</label>
          <p x-text="fields.residence_commune ? fields.residence_commune : '-'"></p>
        </div>
        <div class="flex flex-col mt-4">
          <label class="font-semibold">Situation matrimoniale</label>
          <p x-text="fields.marital_situation ? (fields.marital_situation == 'single' ? 'Célibataire' : 'Marié') : ''"></p>
        </div>
        <div class="flex flex-col mt-4">
          <label class="font-semibold">Nombre d'enfants</label>
          <p x-text="fields.n_children ? fields.n_children : '-'"></p>
        </div>
        <div class="flex flex-col mt-4">
          <label class="font-semibold">Numero d'enrôlement RAVIP</label>
          <p x-text="fields.ravip_number ? fields.ravip_number : '-'"></p>
        </div>
        <div class="flex flex-col mt-4">
          <label class="font-semibold">Contact au Bénin</label>
          <p x-text="fields.benin_contact_fullname ? fields.benin_contact_fullname : '-'"></p>
        </div>
        <div class="flex flex-col mt-4">
          <label class="font-semibold">Numéro du contact au Bénin</label>
          <p x-text="fields.benin_contact_phone ? fields.benin_contact_phone : '-'"></p>
        </div>
        <div class="flex flex-col mt-4">
          <label class="font-semibold">Contact en Côte d'ivoire</label>
          <p x-text="fields.ci_contact_fullname ? fields.ci_contact_fullname : '-'"></p>
        </div>
        <div class="flex flex-col mt-4">
          <label class="font-semibold">Numéro du contact en Côte d'ivoire</label>
          <p x-text="fields.ci_contact_phone ? fields.ci_contact_phone : '-'"></p>
        </div>
        <div class="flex flex-col mt-4">
          <label class="font-semibold">Couleur des yeux</label>
          <p x-text="fields.eye_color ? fields.eye_color : '-'"></p>
        </div>
        <div class="flex flex-col mt-4">
          <label class="font-semibold">Couleur des cheveux</label>
          <p x-text="fields.hair_color ? fields.hair_color : '-'"></p>
        </div>
        <div class="flex flex-col mt-4">
          <label class="font-semibold">Teint</label>
          <p x-text="fields.complexion_color ? fields.complexion_color : '-'"></p>
        </div>
        <div class="flex flex-col mt-4">
          <label class="font-semibold">Taille</label>
          <p x-text="fields.height ? fields.height : '-'"></p>
        </div>
        <div class="flex flex-col mt-4">
          <label class="font-semibold">Autres signes</label>
          <p x-text="fields.other_signs ? fields.other_signs : '-'"></p>
        </div>
      </fieldset>

      <div class="mt-4" x-show="step == 6" x-cloak>
        <h3 class="font-bold">Informations supplémentaires</h3>
        <p class="mt-2" x-show="fields.rdv"><i class="fa-solid fa-check text-green-500"></i>&nbsp; &nbsp; Vous avez demandé un rendez-vous pour le <span x-text="formatted(fields.enrollment_date)"></span> à <span x-text="fields.enrollment_time"></span></p>
        <p class="mt-2" x-show="fields.ship"><i class="fa-solid fa-check text-green-500"></i>&nbsp; &nbsp; Vous avez demandé une livraison</p>
        <p class="mt-2" x-show="fields.mail"><i class="fa-solid fa-check text-green-500"></i>&nbsp; &nbsp; Vous allez recevoir un mail</p>
        <p class="mt-2" x-show="fields.sms"><i class="fa-solid fa-check text-green-500"></i>&nbsp; &nbsp; Vous allez recevoir un SMS</p>
      </div>

      <div class="flex flex-row items-center mt-4" x-show="step == 6" x-cloak>
          <input type="checkbox" name="verify" class="mr-2" id="verify" x-model="verify" value="verify">
          <label for="verify" class="text-blue-500">Je confirme les informations renseignées</label>
      </div>

      <div class="flex space-x-4 mt-12">
        <button
          class="bg-amber-500 px-3 py-2 text-white disabled:opacity-50"
          @click.prevent="step--"
          :disabled="step <= 1">
          <i class="fa-solid fa-chevron-left"></i> Précédent
        </button>
        <button
          class="bg-amber-500 px-3 py-2 text-white disabled:opacity-50"
          @click.prevent="nextStep()"
          :disabled="step >= 6" x-show="step != 6">
          Suivant <i class="fa-solid fa-chevron-right"></i>
        </button>
        <button type="submit" class="px-3 py-2 bg-blue-500 text-white" x-show="step == 6 && verify" x-cloak>
          <i class="fa-solid fa-credit-card"></i> Procéder au paiement
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
            href="{{ route('demands.show') }}"
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
              Consulter la demande
          </a>
        </x-slot>
      </x-sucess-modal>
    </form>
  </section>
</x-app-layout>

