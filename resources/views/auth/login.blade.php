<x-layout>
  <x-slot:heading>Log in</x-slot>

    <form method="post" action="{{ route('session.store') }}">
      @csrf
      <div class="space-y-12">
        <div class="border-b border-gray-900/10 pb-12">

          <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

            <x-form-field>
              <x-form-label for="email">Email</x-form-label>
              <div class="mt-2">
                <x-form-input name="email" id="email" value="{{ old('email') ?? '' }}"
                  placeholder="john.doe@email.com" />
              </div>
              <x-form-error name="email" />
            </x-form-field>

            <x-form-field>
              <x-form-label for="password">Password</x-form-label>
              <div class="mt-2">
                <x-form-input name="password" id="password" value="{{ old('password') ?? '' }}" type="password"
                  placeholder="john.doe@email.com" />
              </div>
              <x-form-error name="password" />
            </x-form-field>


          </div>
        </div>

      </div>

      <div class="mt-6 flex items-center justify-end gap-x-6">
        <a href="/">Cancel</a>
        <x-form-button type="submit">Log in</x-form-button>
      </div>
    </form>


</x-layout>