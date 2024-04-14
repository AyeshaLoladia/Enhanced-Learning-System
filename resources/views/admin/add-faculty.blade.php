<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add Faculty') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 sm:py-2 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                {{ __('Add Faculty') }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-600">
                                {{ __("Add faculties to the system") }}
                            </p>
                        </header>

                        <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                            @csrf
                        </form>

                        <form method="POST" action="{{ route('faculty.store') }}" class="mt-6 space-y-6">
                            @csrf
                            @method('POST')

                            <div>
                                <x-input-label for="name" :value="__('Name')" />
                                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" required
                                    autofocus />
                                <x-input-error class="mt-2" :messages="$errors->get('name')" />
                            </div>

                            <div>
                                <x-input-label for="email" :value="__('Email')" />
                                <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" required />
                                <x-input-error class="mt-2" :messages="$errors->get('email')" />
                            </div>

                            <div class="flex flex-row">

                                <div class="mt-4 ml-4 w-full">
                                    <x-input-label for="rollno" :value="__('Roll No')" />
                                    <x-text-input id="rollno" class="block mt-1 w-full" type="number" min="0"
                                        name="rollno" required autofocus autocomplete="name" />
                                    <x-input-error :messages="$errors->get('rollno')" class="mt-2" />
                                </div>

                            </div>

                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ __('Save') }}</x-primary-button>

                                @if (session('success') === 'faculty-added')
                                <p x-data="{ show: true }" x-show="show" x-transition
                                    x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600">{{
                                    __('Faculty added successfully.') }}</p>
                                @endif
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>