<div>
  <h3 class="mt-12 text-xl font-bold text-gray-700">{{ $document->title }}</h3>
  <p class="mt-8" style="text-align: justify;">{{ $document->description }}</p>
  <a href="{{ route('documents.demands.create', $document->id) }}" class="
              inline-flex
              items-center
              mt-6
              text-white
              bg-amber-500
              px-4
              py-3
              font-medium
              hover:bg-amber-400
            ">
      <span>Commencer</span>
      <span class="ml-6"><i class="fas fa-chevron-right"></i></span>
  </a>
</div>
