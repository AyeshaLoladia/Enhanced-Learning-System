<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('View Course') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 sm:py-2 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                {{ __('Course Details') }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-600">
                                {{ __("Look at everything that the course offers") }}
                            </p>
                        </header>
                    </section>
                </div>
            </div>
        </div>
    </div>

    <div class="py-0">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 sm:py-2 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="w-full pr-4 mr-4">
                    <h2 class="text-3xl font-bold text-gray-900">
                        {{ $course->title }}
                    </h2>
                    <div class="border-t border-gray-300 mt-4 pt-4">

                    <p class="mt-2 text-base text-gray-600 text-justify">
                        <span class="font-bold text-gray-800">Module Overview:</span> {{ $course->module_overview }}
                    </p>

                    <p class="mt-2 text-base text-gray-600 text-justify">
                        <span class="font-bold text-gray-800">Learning Outcomes:</span> {{ $course->learning_outcomes }}
                    </p>

                    <p class="mt-2 text-base text-gray-600 text-justify">
                        <span class="font-bold text-gray-800">Learning Activities:</span> {{ $course->learning_activities }}
                    </p>

                    <p class="mt-2 text-base text-gray-600 text-justify">
                        <span class="font-bold text-gray-800">Assessment Methods:</span> {{ $course->assessment_methods }}
                    </p>

                    <p class="mt-2 text-base text-gray-600 text-justify">
                        <span class="font-bold text-gray-800">Weightage Of Internal Assessment:</span> {{ $course->internal_weightage }}
                    </p>



                    <div class="mt-4 space-y-2">
                        <p class="text-gray-600">
                            <span class="font-bold">{{ __('Number Of Units: ') }}</span>{{ $course->no_of_units }}
                        </p>
                        <p class="text-gray-600">
                            <span class="font-bold">{{ __('Type: ') }}</span>{{ $course->mandatory }}
                        </p>
                        <p class="text-gray-600">
                            <span class="font-bold">{{ __('Start Date: ') }}</span>{{ $course->start_date }}
                        </p>

                        <p class="text-gray-600">
                            <span class="font-bold">{{ __('End Date: ') }}</span>{{ $course->end_date }}
                        </p>

                        <p class="text-gray-600">
                            <span class="font-bold">{{ __('Faculty Assigned: ') }}</span>{{ $course->faculty->name }}
                        </p>
                    </div>

                    <form method="POST" action="{{ route('courses.enrollRequest', ['courseId' => $course->id]) }}"
                        class="mt-6 space-y-6">
                        @csrf
                        @method('POST')
                        <x-primary-button style="background-color: #a02929">{{ __('Enroll Now!') }}</x-primary-button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
