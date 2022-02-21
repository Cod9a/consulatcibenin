<x-app-layout>
  <section class="max-w-3xl mx-auto px-4 md:px-6 lg:px-8">
    <section class="bg-white py-2 px-4">
      <img src="images/logo.png" class="my-4" style="width: 150px; height: 75px; object-fit:contain;">
      <h1 class="text-2xl font-bold text-center text-gray-800">
        Attestation de paiement de demande de carte consulaire
      </h1>
      <div class="mt-6 pb-4">
        {!! session('success') ? session('success') : '' !!}
      </div>
      <p><b>Référence de la demande:</b> <span class="text-sm">{{ session('id') ? 'CC-'. date('Ymd', strtotime(session('created_at'))) . str_pad(session('id'), 5, '0', STR_PAD_LEFT) : '' }}</span></p>
      <p class="mt-4"><b>Code de suivi:</b> <span class="text-sm font-bold text-red-600">{{ session('code') ? session('code') : 'a' }}</span></p>
      <p class="mt-4"><b>Statut:</b> <span class="text-sm">{{ session('status') ? ucfirst(session('status')) : '' }}</span></p>
      @if(session('rdv'))
        <p class="mt-4"><i class="fa-solid fa-check text-green-500"></i>&nbsp; &nbsp;Vous avez pris un rendez-vous pour l'enrôlement.</p>
      @endif
      @if(session('ship'))
        <p class="mt-4"><i class="fa-solid fa-check text-green-500"></i>&nbsp; &nbsp;Vous avez demandé à vous faire livrer.</p>
      @endif
    </section>
    
    <p class="mt-4">
      <a href="{{ session('attestation') ? route('download', session('attestation')) : '#' }}" class="
        w-auto
        inline-block
        rounded-md
        border border-transparent
        shadow-sm
        px-4
        py-2
        bg-red-500
        text-base
        font-medium
        text-white
        hover:bg-red-500
        focus:outline-none
        focus:ring-2
        focus:ring-offset-2
        focus:ring-blue-500
        sm:text-sm
      ">
          <i class="far fa-file-pdf"></i> Télécharger le fichier
      </a>
    </p>
  </section>
</x-app-layout>
