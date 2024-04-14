<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Course') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 sm:py-2 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                {{ __('Create Course') }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-600">
                                {{ __("Create a course and assign a faculty to it") }}
                            </p>
                        </header>

                        <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                            @csrf
                        </form>

                        <form method="POST" action="{{ route('courses.store') }}" class="mt-6 space-y-6">
                            @csrf
                            @method('POST')

                            <div>
                                <x-input-label for="title" :value="__('Title')" />
                                <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" required
                                    autofocus />
                                <x-input-error class="mt-2" :messages="$errors->get('title')" />
                            </div>

                            <div>
                                <x-input-label for="placement" :value="__('Placement (Semester)')" />
                                <x-text-input id="placement" name="placement" type="text" class="mt-1 block w-full"
                                    required />
                                <x-input-error class="mt-2" :messages="$errors->get('placement')" />
                            </div>

                            <div class="mt-4">
                                <x-input-label for="mandatory" :value="__('Type')" />
                                <select name="mandatory" id="mandatory"
                                    class="form-control mt-1 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                    required>
                                    @foreach($types as $type)
                                    <option value="{{ $type }}">{{ $type }}</option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('mandatory')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="start_date" :value="__('Start Date')" />
                                <x-text-input id="start_date" name="start_date" class="mt-1 block w-full"
                                    placeholder="YYYY-MM-DD" required />
                                <x-input-error class="mt-2" :messages="$errors->get('start_date')" />
                            </div>

                            <div>
                                <x-input-label for="end_date" :value="__('End Date')" />
                                <x-text-input id="end_date" name="end_date" class="mt-1 block w-full"
                                    placeholder="YYYY-MM-DD" required />
                                <x-input-error class="mt-2" :messages="$errors->get('end_date')" />
                            </div>

                            <div>
                                <x-input-label for="email" :value="__('Assigned Faculty Email')" />
                                <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" required />
                                <x-input-error class="mt-2" :messages="$errors->get('email')" />
                            </div>

                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ __('Save') }}</x-primary-button>

                                @if (session('success') === 'course-created')
                                <p x-data="{ show: true }" x-show="show" x-transition
                                    x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600">{{
                                    __('Course
                                    updated successfully.') }}</p>
                                @endif
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>