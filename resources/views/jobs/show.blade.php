<x-layout>
  <x-slot:heading>Home page</x-slot>
    <h1 class="text-4xl mb-2">{{ $job->title }}</h1>

    <p class="mb-8">Salary: {{ $job->salary }}</p>

    @can('edit', $job)
      <a class="border rounded-md px-3 py-1" href="{{ route('job.edit', $job) }}">Edit job</a>
    @endcan

</x-layout>