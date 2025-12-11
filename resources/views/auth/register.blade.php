<x-layout>
  <x-slot:heading>Register new user</x-slot>

    <form method="post" action="{{ route('auth.store') }}">
      @csrf
      <div class="space-y-12">
        <div class="border-b border-gray-900/10 pb-12">

          <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

            <x-form-field>
              <x-form-label for="first_name">First name</x-form-label>
              <div class="mt-2">
                <x-form-input name="first_name" id="first_name" value="{{ old('first_name') ?? '' }}"
                  placeholder="John" />
              </div>
              <x-form-error name="first_name" />
            </x-form-field>

            <x-form-field>
              <x-form-label for="last_name">Last name</x-form-label>
              <div class="mt-2">
                <x-form-input name="last_name" id="last_name" value="{{ old('last_name') ?? '' }}" placeholder="Doe" />
              </div>
              <x-form-error name="last_name" />
            </x-form-field>

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

            <x-form-field>
              <x-form-label for="password_confirmation">Confirm password</x-form-label>
              <div class="mt-2">
                <x-form-input name="password_confirmation" id="password_confirmation"
                  value="{{ old('password_confirmation') ?? '' }}" type="password_confirmation"
                  placeholder="john.doe@email.com" />
              </div>
              <x-form-error name="password_confirmation" />
            </x-form-field>

          </div>
        </div>

      </div>

      <div class="mt-6 flex items-center justify-end gap-x-6">
        <a href="/">Cancel</a>
        <x-form-button type="submit">Register</x-form-button>
      </div>
    </form>


</x-layout>