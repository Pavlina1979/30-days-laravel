<x-layout>
  <x-slot:heading>Jobs listing</x-slot>



    <div class="space-y-4">
      @foreach ($jobs as $job)
        <a class="block px-4 py-6 border border-gray-300 rounded-lg" href="/jobs/{{ $job['id'] }}">
          <div class="font-bold text-blue-500">{{ $job->employer->name }}</div>
          <div><strong>{{ $job['title'] }}</strong> / {{ $job['salary'] }}</div>
        </a>
      @endforeach

      <div>{{ $jobs->links() }}</div>

    </div>



</x-layout>