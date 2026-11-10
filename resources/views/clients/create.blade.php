<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Add Client') }}
            </h2>
            <a href="{{ route('clients.index') }}"
                class="text-sm text-gray-600 hover:text-gray-900 hover:underline">
                &larr; {{ __('Back to Clients') }}
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 text-gray-900">
                <form method="POST" action="{{ route('clients.store') }}">
                    @csrf

                    <div>
                        <x-input-label for="contact_name" :value="__('Contact Name')" />
                        <x-text-input id="contact_name" class="block mt-1 w-full" type="text" name="contact_name" :value="old('contact_name')" required autofocus />
                        <x-input-error :messages="$errors->get('contact_name')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="contact_email" :value="__('Contact Email')" />
                        <x-text-input id="contact_email" class="block mt-1 w-full" type="email" name="contact_email" :value="old('contact_email')" />
                        <x-input-error :messages="$errors->get('contact_email')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="contact_phone_number" :value="__('Contact Phone')" />
                        <x-text-input id="contact_phone_number" class="block mt-1 w-full" type="text" name="contact_phone_number" :value="old('contact_phone_number')" />
                        <x-input-error :messages="$errors->get('contact_phone_number')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="company_name" :value="__('Company Name')" />
                        <x-text-input id="company_name" class="block mt-1 w-full" type="text" name="company_name" :value="old('company_name')" required />
                        <x-input-error :messages="$errors->get('company_name')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="company_city" :value="__('Company City')" />
                        <x-text-input id="company_city" class="block mt-1 w-full" type="text" name="company_city" :value="old('company_city')" />
                        <x-input-error :messages="$errors->get('company_city')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end gap-3 mt-6">
                        <a href="{{ route('clients.index') }}"
                            class="text-sm text-gray-600 hover:text-gray-900 hover:underline">{{ __('Cancel') }}</a>
                        <x-primary-button>{{ __('Save') }}</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>