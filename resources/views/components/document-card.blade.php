<div>
  <h3 class="mt-12 text-xl font-bold text-gray-700">{{ $document->title }}</h3>
  <p class="mt-8">{{ $document->description }}</p>
  <a
    href="{{ route('documents.demands.create', $document->id) }}"
    class="mt-4 inline-block text-blue-700 font-medium underline"
    >Demander</a
  >
</div>
