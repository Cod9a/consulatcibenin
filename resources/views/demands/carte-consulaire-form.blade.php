<x-app-layout>
  <section class="max-w-7xl mx-auto px-4 md:px-6 lg:px-8">
    <h3 class="font-medium text-2xl">
      Formulaire de création d'une Carte Consulaire Biométrique
    </h3>
    <div class="my-8 flex justify-between gap-5">
      <div class="relative flex-grow">
        <button
          class="
            w-6
            h-6
            bg-blue-500
            inline-flex
            items-center
            justify-center
            rounded-full
            font-semibold
            text-white
            after:absolute after:w-full after:h-px after:bg-black after:left-7
          ">
          1
        </button>
      </div>
      <div class="relative flex-grow">
        <button
          class="
            w-6
            h-6
            bg-blue-500
            inline-flex
            items-center
            justify-center
            rounded-full
            font-semibold
            text-white
            after:absolute after:w-full after:h-px after:bg-black after:left-7
          ">
          2
        </button>
      </div>
      <div class="relative flex-shrink-0">
        <button
          class="
            w-6
            h-6
            bg-blue-500
            inline-flex
            items-center
            justify-center
            rounded-full
            font-semibold
            text-white
          ">
          3
        </button>
      </div>
    </div>
    <form>
      <fieldset class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
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
          <label for="origin_country">Pays de naissance</label>
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
          <label for="origin_commune">Commune de naissance</label>
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
          <label for="origin_commune">Numéro de téléphone</label>
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
          <label for="origin_commune">Numéro de téléphone alternatif</label>
          <x-input
            :error="$errors->has('phone_alt')"
            id="phone_alt"
            type="text"
            :value="old('phone_alt')"
            name="phone_alt"
            required
            autocomplete="tel" />
          <x-validation-errors name="phone_alt"></x-validation-errors>
        </div>
        <div class="flex flex-col">
          <label for="spouse_name">Nom de votre époux</label>
          <x-input
            :error="$errors->has('spouse_name')"
            id="spouse_name"
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
      </fieldset>
      <fieldset class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
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
                id="maried"
                name="marital_situation"
                value="maried" />
              <label for="maried">Marié</label>
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
      </fieldset>
    </form>
  </section>
</x-app-layout>
