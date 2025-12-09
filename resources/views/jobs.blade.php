<x-layout>
  <x-slot:heading>Jobs listing</x-slot>
    <h1 class="text-3xl">Jobs page</h1>


    <ul>
      @foreach ($jobs as $job)
        <li><a href="/jobs/{{ $job['id'] }}">{{ $job['title'] }} / {{ $job['salary'] }}</a></li>
      @endforeach
    </ul>

</x-layout>