<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Course') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 sm:py-2 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                {{ __('Update Course Details') }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-600">
                                {{ __("Add or update information such as introduction video, description and more") }}
                            </p>
                        </header>

                        <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                            @csrf
                        </form>

                        <form method="POST" action="{{ route('courses.intro', $course->id) }}" class="mt-6 space-y-6">
                            @csrf
                            @method('POST')
                            <div>
                                <x-input-label for="intro_video_link" :value="__('Introduction Video Link')" />
                                <x-text-input id="intro_video_link" name="intro_video_link" class="mt-1 block w-full"
                                    :value="old('intro_video_link', $course->intro_video_link)"
                                    placeholder="Add The Youtube Link To Introduce Students To Your Course" required />
                                <x-input-error class="mt-2" :messages="$errors->get('intro_video_link')" />
                            </div>

                            <div>
                                <x-input-label for="title" :value="__('Title')" />
                                <x-text-input id="title" name="title" class="mt-1 block w-full"
                                    :value="old('title', $course->title)" required />
                                <x-input-error class="mt-2" :messages="$errors->get('title')" />
                            </div>

                            <div>
                                <x-input-label for="placement" :value="__('Placement (Semester)')" />
                                <x-text-input id="placement" name="placement" class="mt-1 block w-full"
                                    :value="old('placement', $course->placement)" required />
                                <x-input-error class="mt-2" :messages="$errors->get('placement')" />
                            </div>
                            
                            <div class="flex flex-row">
                            <div>
                                <x-input-label for="no_of_units" :value="__('Number Of Units')" />
                                <x-text-input id="no_of_units" name="no_of_units" type="number" min="0" class="mt-1 block w-full"
                                    :value="old('no_of_units', $course->no_of_units)" required />
                                <x-input-error class="mt-2" :messages="$errors->get('no_of_units')" />
                            </div>

                            <div class="ml-4">
                                <x-input-label for="hours" :value="__('Hours')" />
                                <x-text-input id="hours" name="hours" type="number" pattern="/d+" class="mt-1 block w-full"
                                    :value="old('hours', $course->hours)" required />
                                <x-input-error class="mt-2" :messages="$errors->get('hours')" />
                            </div>

                            <div class="ml-4">
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
                            </div>

                            <div>
                                <x-input-label for="module_overview" :value="__('Module Overview')" />
                                <x-textarea id="module_overview" name="module_overview" :disabled="false"
                                    class="block mt-1 w-full">
                                    {{ old('module_overview', $course->module_overview) }}
                                </x-textarea>
                                <x-input-error class="mt-2" :messages="$errors->get('module_overview')" />
                            </div>

                            <div>
                                <x-input-label for="learning_outcomes" :value="__('Learning Outcomes')" />
                                <x-textarea id="learning_outcomes" name="learning_outcomes" :disabled="false"
                                    class="block mt-1 w-full">
                                    {{ old('learning_outcomes', $course->learning_outcomes) }}
                                </x-textarea>

                                <x-input-error class="mt-2" :messages="$errors->get('learning_outcomes')" />
                            </div>

                            <div>
                                <x-input-label for="learning_activities" :value="__('Learning Activities')" />
                                <x-textarea id="learning_activities" name="learning_activities" :disabled="false"
                                    class="block mt-1 w-full">
                                    {{ old('learning_activities', $course->learning_activities) }}
                                </x-textarea>
                                <x-input-error class="mt-2" :messages="$errors->get('learning_activities')" />
                            </div>

                            <div>
                                <x-input-label for="assessment_methods" :value="__('Assessment Methods')" />
                                <x-textarea id="assessment_methods" name="assessment_methods" :disabled="false"
                                    class="block mt-1 w-full">
                                    {{ old('assessment_methods', $course->assessment_methods) }}
                                </x-textarea>
                                <x-input-error class="mt-2" :messages="$errors->get('assessment_methods')" />
                            </div>

                            <div>
                                <x-input-label for="internal_weightage" :value="__('Weightage to Internal Assessment')" />
                                <x-textarea id="internal_weightage" name="internal_weightage" :disabled="false"
                                    class="block mt-1 w-full">
                                    {{ old('internal_weightage', $course->internal_weightage) }}
                                </x-textarea>
                                <x-input-error class="mt-2" :messages="$errors->get('internal_weightage')" />
                            </div>

                            <x-primary-button>{{ __('Save') }}</x-primary-button>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
    <div class="py-0">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 sm:py-2 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                {{ __('Add Material') }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-600">
                                {{ __("Add material to your course like lectures and assignments") }}
                            </p>
                        </header>

                        <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                            @csrf
                        </form>

                        <form method="POST" action="{{ route('courses.add', $course->id) }}" class="mt-6 space-y-6">
                            @csrf
                            @method('POST')

                            <div>
                                <x-input-label for="unit" :value="__('Unit (Integer)')" />
                                <x-text-input id="unit" name="unit" class="mt-1 block w-full" required />
                                <x-input-error class="mt-2" :messages="$errors->get('unit')" />
                            </div>

                            <div>
                                <x-input-label for="material_type" :value="__('Type Of Material')" />
                                <select name="material_type" id="material_type"
                                    class="form-control mt-1 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                    required>
                                    <option value="Lecture">Lecture</option>
                                    <option value="Assignment">Assignment</option>
                                </select>
                                <x-input-error class="mt-2" :messages="$errors->get('material_type')" />
                            </div>

                            <div>
                                <x-input-label for="title" :value="__('Title')" />
                                <x-text-input id="title" name="title" class="mt-1 block w-full"
                                    placeholder="Add the Title To This Session" required />
                                <x-input-error class="mt-2" :messages="$errors->get('title')" />
                            </div>

                            <div>
                                <x-input-label for="lecture_link" :value="__('Lecture Link')" />
                                <x-text-input id="lecture_link" name="lecture_link" class="mt-1 block w-full"
                                    placeholder="Add the Youtube Link to the lecture" />
                                <x-input-error class="mt-2" :messages="$errors->get('lecture_link')" />
                            </div>

                            <div>
                                <x-input-label for="assignment_link" :value="__('Assignment Link')" />
                                <div class="flex flex-row gap-2">
                                    <x-text-input id="assignment_link" name="assignment_link" class="mt-1 block w-full"
                                        placeholder="Add the Google Form link to the assignment" />
                                    <a id="assignment_button"
                                        href="https://docs.google.com/forms/d/1wghyDMuhQAfivPmif4cfos9BwdKjioZLnOkRMdamo9w/edit"
                                        target="_blank">
                                        <x-secondary-button class="ml-4">{{ __('Go To Forms')}}</x-secondary-button>
                                    </a>
                                    <x-input-error class="mt-2" :messages="$errors->get('assignment_link')" />
                                </div>

                                <input type="hidden" id="course_id" name="course_id" value="{{ $course->id }}">

                                <div class="flex items-center gap-4">
                                    <x-primary-button class="mt-6">{{ __('Save') }}</x-primary-button>

                                    @if (session('success') === 'course-updated')
                                    <p x-data="{ show: true }" x-show="show" x-transition
                                        x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600">{{
                                        __('Course updated successfully.') }}</p>
                                    @endif
                                </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var materialTypeSelect = document.getElementById('material_type');
            if (materialTypeSelect) {
                materialTypeSelect.addEventListener('change', toggleMaterialFields);
                toggleMaterialFields();
            }
        });

        function toggleMaterialFields() {
            var materialType = document.getElementById('material_type').value;
            var lectureLink = document.getElementById('lecture_link');
            var assignmentLink = document.getElementById('assignment_link');
            var assignmentButton = document.getElementById('assignment_button');

            lectureLink.removeAttribute('required');
            assignmentLink.removeAttribute('required');
            lectureLink.removeAttribute('disabled');
            assignmentLink.removeAttribute('disabled');
            lectureLink.style.backgroundColor = 'white';
            assignmentLink.style.backgroundColor = 'white';

            if (materialType === 'Lecture') {
                lectureLink.setAttribute('required', 'required');
                assignmentLink.setAttribute('disabled', 'disabled');
                assignmentLink.style.backgroundColor = '#eee';
            } else if (materialType === 'Assignment') {
                assignmentLink.setAttribute('required', 'required');
                lectureLink.setAttribute('disabled', 'disabled');
                lectureLink.style.backgroundColor = '#eee'     }
        }
    </script>
</x-app-layout>