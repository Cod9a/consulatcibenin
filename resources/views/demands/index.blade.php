<x-app-layout>
  <section class="max-w-7xl mx-auto px-4 md:px-6 lg:px-8">
    <h1 class="text-3xl font-bold text-center text-gray-800">
      Choisissez l'acte consulaire à établir
    </h1>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8 mt-20">
      @foreach($documents as $document)
        <x-document-card :document="$document"></x-document-card>
      @endforeach
    </div>
  </section>
</x-app-layout>
