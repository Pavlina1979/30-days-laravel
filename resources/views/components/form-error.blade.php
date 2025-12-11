@props(['name'])

@error($name)
  <p class="text-sm text-red-800 font-semibold mt-1">{{ $message }}</p>
@enderror